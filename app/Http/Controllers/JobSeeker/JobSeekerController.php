<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use App\Models\JobSeeker;
use App\Models\Review;
use App\Rules\PasswordValidation;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class JobSeekerController extends Controller
{
    public function dashboard()
    {
        return view('job_seeker.dashboard');
    }

    public function showRegisterForm()
    {
        return view('job_seeker.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:job_seekers',
            'username' => 'required|string|max:255|unique:job_seekers',
            'password' => ['required', 'confirmed', new PasswordValidation()],
            'phone_number' => ['required', new \App\Rules\PhoneNumber],
            'experience_level' => ['required', Rule::in(['entry', 'mid', 'senior'])],
            'address' => 'required|string|max:500',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        $cvPath = null;
        if ($request->hasFile('cv')) {
            $filename = $this->upload($request->cv, 'uploads/job_seekers', 'cv');
            $cvPath = 'uploads/job_seekers/' . $filename;
        }

        JobSeeker::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'experience_level' => $request->experience_level,
            'address' => $request->address,
            'cv' => $cvPath,
            'joined_at' => now(),
        ]);

        return redirect()->route('job_seeker.login')->with('success', 'Registration successful. Welcome!');
    }

    public function showLoginForm()
    {
        return view('job_seeker.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string|min:8',
        ]);
        $loginType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (Auth::guard('jobseeker')->attempt([$loginType => $request->username, 'password' => $request->password], $request->filled('remember'))) {
            return redirect()->intended(route('job_seeker.profile'))->with('success', 'Login successful.');
        }
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function logout()
    {
        Auth::guard('jobseeker')->logout();
        return redirect()->route('job_seeker.login')->with('success', 'Logout successful.');
    }

    public function showProfileForm()
    {
        return view('job_seeker.profile', ['jobSeeker' => Auth::guard('jobseeker')->user()]);
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->guard('jobseeker')->user();
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('job_seekers')->ignore($user->job_seeker_id, 'job_seeker_id'),
            ],
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('job_seekers')->ignore($user->job_seeker_id, 'job_seeker_id'),
            ],

            'phone_number' => ['required', new \App\Rules\PhoneNumber],
            'experience_level' => ['required', Rule::in(['entry', 'mid', 'senior'])],
            'address' => 'required|string|max:500',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        $cvPath = $user->cv;
        if ($request->hasFile('cv')) {
            $filename = $this->upload($request->file('cv'), 'uploads/job_seekers', 'cv');
            $cvPath = 'uploads/job_seekers/' . $filename;
        }

        $user->update([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'username' => $request->username,
            'phone_number' => $request->phone_number,
            'experience_level' => $request->experience_level,
            'address' => $request->address,
            'cv' => $cvPath,
        ]);

        if ($request->filled('password')) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function changePasswordForm()
    {
        return view('job_seeker.change_password');
    }

// Handle the Change Password request
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => ['required', 'confirmed', new PasswordValidation()],
        ]);

        $jobSeeker = Auth::guard('jobseeker')->user();

        if (!Hash::check($request->current_password, $jobSeeker->password)) {
            return back()->with(['error' => 'Current password is incorrect']);
        }
        $jobSeeker->password = Hash::make($request->new_password);
        $jobSeeker->save();
        return back()->with('success', 'Password changed successfully!');
    }

    public function showCV()
    {
        $jobSeeker = Auth::guard('jobseeker')->user();
        return view('job_seeker.show_cv', compact('jobSeeker'));
    }


    public function jobAlertsForm()
    {
        $jobSeeker = auth('jobseeker')->user();
        $jobCategories = JobCategory::all();

        return view('job_seeker.job_alerts', compact('jobSeeker', 'jobCategories'));
    }

    public function updateJobAlerts(Request $request)
    {
        $jobSeeker = auth('jobseeker')->user();
        $jobSeeker->jobSeekerJobCategories()->sync($request->input('job_categories', []));

        return redirect()->route('job_seeker.job_alerts')->with('success', 'Job alerts updated successfully.');
    }

    public function addReview(Request $request)
    {
        $jobSeeker = auth('jobseeker')->user();
        $data = $request->all();
        $data['job_seeker_id'] = $jobSeeker->job_seeker_id;
        $data['review_date_time'] = now();
        Review::create($data);
        return back()->with('success', 'thanks for your feedback');

    }

    public function myReviews(Request $request)
    {
        $jobSeeker = auth('jobseeker')->user();
        return view('job_seeker.my_reviews', compact('jobSeeker'));

    }

    public function deleteMyReview (Review $review)
    {
        $review->delete();
        return back()->with('success', 'feedback deleted successfully');
    }

    public function upload(UploadedFile $file, string $path = 'uploads', string $slug = 'dummy slug'): string
    {
        $slug = Str::slug($slug);
        $currentDate = Carbon::now()->toDateString();
        $filename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
        if (!file_exists($path)) {
            mkdir($path);
        }
        $file->move($path, $filename);
        return $filename;
    }
}

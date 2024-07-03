<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Rules\PasswordValidation;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{

    public function dashboard()
    {
        return view('company.dashboard');
    }

    public function showRegisterForm()
    {
        return view('company.register');
    }

    // Handle registration
    public function register(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:companies',
            'username' => 'required|string|max:255|unique:companies',
            "password" =>['required', 'confirmed', new PasswordValidation()],
            'company_name' => 'required|string|max:255',
            "phone_number_1" =>['required', new \App\Rules\PhoneNumber],
            "phone_number_2" =>['nullable', new \App\Rules\PhoneNumber],
            'website_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'industry' => 'required|string|max:255',
            'company_size' => ['required', Rule::in(['small', 'medium', 'large'])],
            'about_company' => 'required|string|max:5000',
            'founded_at' => 'required|date',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $logoPath= null;
        if ($request->hasFile('logo')) {
            $filename = $this->upload($request->logo, 'uploads/companies', 'W'); // Get the original file name
            $logoPath = 'companies/' . $filename;// Save relative path to database
        }
        $company = Company::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'company_name' => $request->company_name,
            'phone_number_1' => $request->phone_number_1,
            'phone_number_2' => $request->phone_number_2,
            'website_url' => $request->website_url,
            'linkedin_url' => $request->linkedin_url,
            'twitter_url' => $request->twitter_url,
            'industry' => $request->industry,
            'company_size' => $request->company_size,
            'about_company' => $request->about_company,
            'founded_at' => $request->founded_at,
            'joined_at' => now(),
            'logo' => $logoPath,
        ]);
        return redirect()->back()->with('success', 'Registration successful. We will review your request and inform you shortly.');

    }

    // Show the login form
    public function showLoginForm()
    {
        return view('company.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|email',
            'password' => 'required|string|min:8',
        ]);
        $loginType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (Auth::guard('company')->attempt([$loginType => $request->username, 'password' => $request->password], $request->filled('remember'))) {
            return redirect()->intended(route('company.dashboard'))->with('success', 'Login successful.');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // Handle logout
    public function logout()
    {
        Auth::guard('company')->logout();
        return redirect()->route('company.login')->with('success', 'Logout successful.');
    }

    // Show the profile update form
    public function showProfileForm()
    {
        return view('company.profile', ['company' => Auth::guard('company')->user()]);
    }

    // Handle profile update
    public function updateProfile(Request $request)
    {
        $user = auth()->guard('company')->user();
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('companies')->ignore($user->company_id, 'company_id'),
            ],
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('companies')->ignore($user->company_id, 'company_id'),
            ],
            'password' => ['nullable', 'confirmed', new PasswordValidation()],
            'company_name' => 'required|string|max:255',
            'phone_number_1' => ['required', new \App\Rules\PhoneNumber],
            'phone_number_2' => ['nullable', new \App\Rules\PhoneNumber],
            'website_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'industry' => 'required|string|max:255',
            'company_size' => ['required', Rule::in(['small', 'medium', 'large'])],
            'about_company' => 'required|string|max:5000',
            'founded_at' => 'required|date',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $logoPath = $user->logo;
        if ($request->hasFile('logo')) {
            $filename = $this->upload($request->file('logo'), 'uploads/companies', 'W');
            $logoPath = 'companies/' . $filename;
        }
        $user->update([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'username' => $request->username,
            'company_name' => $request->company_name,
            'phone_number_1' => $request->phone_number_1,
            'phone_number_2' => $request->phone_number_2,
            'website_url' => $request->website_url,
            'linkedin_url' => $request->linkedin_url,
            'twitter_url' => $request->twitter_url,
            'industry' => $request->industry,
            'company_size' => $request->company_size,
            'about_company' => $request->about_company,
            'founded_at' => $request->founded_at,
            'logo' => $logoPath,
        ]);
        if ($request->filled('password')) {
            $user->update(['password' => Hash::make($request->password)]);
        }
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }



    public function upload(UploadedFile $file, string $path = 'uploads', string $slug = 'dummy slug'): string
    {
        $slug = Str::slug($slug);
        $currentDate = Carbon::now()->toDateString();
        $imageName = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
        if (!file_exists($path)) {
            mkdir($path);
        }
        $file->move($path, $imageName);
        return $imageName;
    }
}

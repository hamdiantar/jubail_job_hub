<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Company;
use App\Models\JobAdvertisement;
use App\Models\JobSeeker;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $loginType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (Auth::guard('admin')->attempt([$loginType => $request->username, 'password' => $request->password], $request->filled('remember'))) {
            return redirect()->intended(route('admin.dashboard'));
        }
        throw ValidationException::withMessages([
            'username' => [trans('auth.failed')],
        ]);
    }

    public function dashboard()
    {
        $jobSeekersCount = JobSeeker::count();
        $companiesCount = Company::count();
        $jobsCount = JobAdvertisement::count();
        $subscriptionsCount = Subscription::count();

        // Retrieve companies with their job count
        $companies = Company::withCount('jobAdvertisements')->get();

        // Prepare data for chart
        $companyNames = $companies->pluck('company_name');
        $jobCounts = $companies->pluck('job_advertisements_count');

        return view('admin.dashboard', [
            'jobSeekersCount' => $jobSeekersCount,
            'companiesCount' => $companiesCount,
            'jobsCount' => $jobsCount,
            'subscriptionsCount' => $subscriptionsCount,
            'companyNames' => $companyNames,
            'jobCounts' => $jobCounts,
        ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function viewAccount()
    {
        $admin = auth()->guard('admin')->user();
        return view('admin.account.view', compact('admin'));
    }

    public function updateAccount(Request $request)
    {
        $admin = auth()->guard('admin')->user();

        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $admin->admin_id . ',admin_id',
            'password' => 'nullable|string|min:8|confirmed',
            'position' => 'required|string|max:255',
            'phoneNumber' => 'required|string|max:255',
        ]);

        $data = $request->only('fullname', 'email', 'position', 'phoneNumber');

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        $admin->update($data);
        return redirect()->route('admin.account.view')->with('success', 'Account updated successfully.');
    }
}

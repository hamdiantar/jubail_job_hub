<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
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
            'password' => 'required|string|min:8|confirmed',
            'company_name' => 'required|string|max:255',
            'phone_number_1' => 'required|string|max:15',
            'phone_number_2' => 'nullable|string|max:15',
            'website_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'industry' => 'required|string|max:255',
            'company_size' => ['required', Rule::in(['small', 'medium', 'large'])],
            'categories' => 'required|array',
            'categories.*' => 'string|max:255',
            'about_company' => 'required|string|max:5000',
        ]);

        $company = Company::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
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
            'joined_at' => now(),
        ]);
        return redirect()->back()->with('success', 'Registration successful.');
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
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::guard('company')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            return redirect()->route('company.dashboard')->with('success', 'Login successful.');
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
        $company = Auth::guard('company')->user();

        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('companies')->ignore($company->id, 'company_id')],
            'password' => 'nullable|string|min:8|confirmed',
            'company_name' => 'required|string|max:255',
            'phone_number_1' => 'required|string|max:15',
            'phone_number_2' => 'nullable|string|max:15',
            'website_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'industry' => 'required|string|max:255',
            'company_size' => ['required', Rule::in(['small', 'medium', 'large'])],
            'about_company' => 'required|string|max:5000',
        ]);

        $company->update([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $company->password,
            'company_name' => $request->company_name,
            'phone_number_1' => $request->phone_number_1,
            'phone_number_2' => $request->phone_number_2,
            'website_url' => $request->website_url,
            'linkedin_url' => $request->linkedin_url,
            'twitter_url' => $request->twitter_url,
            'industry' => $request->industry,
            'company_size' => $request->company_size,
            'about_company' => $request->about_company,
        ]);

        return redirect()->route('company.profile')->with('success', 'Profile updated successfully.');
    }
}

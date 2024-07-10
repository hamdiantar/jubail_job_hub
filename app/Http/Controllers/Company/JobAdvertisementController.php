<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\JobAdvertisement;
use App\Models\JobCategory;
use Illuminate\Http\Request;

class JobAdvertisementController extends Controller
{
    public function index()
    {
        $companyId = auth('company')->user()->company_id;
        $jobAds = JobAdvertisement::with('categories')->where('company_id', $companyId)->get();
        return view('company.job_ads.list', compact('jobAds'));
    }

    public function create()
    {
        $categories = JobCategory::all();
        return view('company.job_ads.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'job_title' => 'required|string|max:255',
            'job_description' => 'required|string',
            'job_type' => 'required|string|max:255',
            'requirements' => 'required|string',
            'experience_level' => 'required|string|max:255',
            'education_level' => 'required|string|max:255',
            'skills_required' => 'nullable|string',
            'salary' => 'nullable|string|max:255',
            'benefits' => 'nullable|string|max:255',
            'location' => 'required|string|max:255',
            'working_hours' => 'nullable|string|max:255',
            'application_deadline' => 'required|date',
            'is_published' => 'boolean',
            'categories' => 'array'
        ]);
        $data['company_id'] = auth('company')->user()->company_id;
        $data['posted_date'] = now();

        $jobAd = JobAdvertisement::create($data);
        $jobAd->categories()->sync($request->categories);

        return redirect()->route('company.job_ads.index')->with('success', 'Job advertisement created successfully.');
    }

    public function show(JobAdvertisement $jobAd)
    {
        return view('company.job_ads.show', compact('jobAd'));
    }

    public function edit(JobAdvertisement $jobAd)
    {
        $categories = JobCategory::all();
        $jobAd->load('categories');
        return view('company.job_ads.edit', compact('jobAd', 'categories'));
    }

    public function update(Request $request, JobAdvertisement $jobAd)
    {
        $data = $request->validate([
            'company_id' => 'required|integer',
            'admin_id' => 'required|integer',
            'job_title' => 'required|string|max:255',
            'job_description' => 'required|string',
            'job_type' => 'required|string|max:255',
            'requirements' => 'nullable|string',
            'experience_level' => 'nullable|string|max:255',
            'education_level' => 'nullable|string|max:255',
            'skills_required' => 'nullable|string',
            'salary' => 'nullable|string|max:255',
            'benefits' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'working_hours' => 'nullable|string|max:255',
            'application_deadline' => 'nullable|date',
            'posted_date' => 'nullable|date',
            'is_published' => 'boolean',
            'advertise' => 'boolean',
            'categories' => 'array'
        ]);

        $jobAd->update($data);
        $jobAd->categories()->sync($request->categories);

        return redirect()->route('company.job_ads.index')->with('success', 'Job advertisement updated successfully.');
    }

    public function destroy(JobAdvertisement $jobAd)
    {
        $jobAd->categories()->delete();
        $jobAd->delete();
        return redirect()->route('company.job_ads.index')->with('success', 'Job advertisement deleted successfully.');
    }
}

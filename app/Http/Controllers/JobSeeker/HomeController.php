<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\JobAdvertisement;
use App\Models\JobCategory;
use App\Models\ProductAuction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function home()
    {
        $fiveJobs = JobAdvertisement::where('application_deadline', '>=', Carbon::now())
            ->where('is_published', true)
            ->inRandomOrder()
            ->take(5)
            ->get();
        $categories = JobCategory::withCount('jobAdvertisementCategories')
            ->get()
            ->filter(function($category) {
                return $category->job_advertisement_categories_count > 0;
            });
        return view('job_seeker.home', compact('fiveJobs', 'categories'));
    }

    public function jobsAds(Request $request)
    {
        $query = JobAdvertisement::with('company')->where('application_deadline', '>=', Carbon::now())
            ->where('is_published', true);
        if ($request->filled('category')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('job_advertisement_categories.job_category_id', $request->category);
            });
        }

        if ($request->filled('type')) {
            $query->where('job_type', 'like', '%' . $request->type . '%');

        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        if ($request->filled('experience')) {
            $query->where('experience_level', 'like', '%' . $request->experience . '%');
        }

        if ($request->filled('posted_within')) {
            $days = (int)$request->posted_within;
            $query->where('posted_date', '>=', now()->subDays($days));
        }

        if ($request->filled('company')) {
            $query->whereHas('company', function ($q) use ($request) {
                $q->where('company_name', 'like', '%' . $request->company . '%');
            });
        }

        // Pagination
        $jobAdvertisements = $query->paginate(10);

        // Job Categories
        $jobCategories = JobCategory::all();

        return view('job_seeker.jobs', [
            'companies' => Company::all(),
            'jobAdvertisements' => $jobAdvertisements,
            'jobCategories' => $jobCategories,
            'selectedCategory' => $request->category,
            'selectedType' => $request->type,
            'selectedLocation' => $request->location,
            'selectedExperience' => $request->experience,
            'selectedPostedWithin' => $request->posted_within,
            'selectedCompany' => $request->company,
            'selectedLocation' => $request->location,
            'locations' => $this->getLocations(),
        ]);
    }

    public function companyProfile(Company $company)
    {
        return view('job_seeker.company_profile', compact('company'));
    }

    public function jobDetails(int $id)
    {
        $job = JobAdvertisement::findOrFail($id);
        return view('job_seeker.job_details', compact('job'));
    }



    private function getLocations()
    {
        return $locations = [
            'Industrial City',
            'City Center',
            'Industrial Area',
            'Royal Commission' ,
            'Corniche',
            'University College',
            'Technical Institute',
            'Industrial College',
            'Commercial Port',
            'Airport',
            'Mall',
            'General Hospital',
            'University Hospital',
            'Sport City',
            'Marina',
            'Island',
            'Waterfront',
            'Fish Market',
            'Downtown',
            'Heritage Village',
            'Refinery',
            'Petrochemical Complex',
            'Desalination Plant',
            'Shipyard',
            'Residential Area',
            'Industrial Support Area',
            'Commercial District',
            'Chamber of Commerce',
            'International School',
            'Police Headquarters',
            'Fire Station',
            'Municipality',
            'Saudi Electricity Company',
            'Saudi Aramco Office',
            'Saudi Telecom Office',
            'Saudi Railways Organization',
            'Medical Center',
            'Shopping Center',
            'Cultural Center',
            'Beach',
            'Public Park',
            'Residential Compound',
            'Golf Course',
            'Bowling Alley',
            'Tennis Club',
            'Youth Center',
            'Family Clinic',
            'Veterinary Clinic',
            'Car Dealerships',
            'Gas Stations'
        ];

    }
}

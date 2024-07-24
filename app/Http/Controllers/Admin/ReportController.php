<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\JobAdvertisement;
use App\Models\JobSeeker;
use App\Models\Application;
use App\Models\Review;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function jobAdvertisementsReport(Request $request)
    {
        $jobAdvertisements = JobAdvertisement::query();

        if ($request->filled('company_id')) {
            $jobAdvertisements->where('company_id', $request->input('company_id'));
        }

        if ($request->filled('job_type')) {
            $jobAdvertisements->where('job_type', $request->input('job_type'));
        }

        if ($request->filled('posted_date_from') && $request->has('posted_date_to')) {
            $jobAdvertisements->whereBetween('posted_date', [$request->input('posted_date_from'), $request->input('posted_date_to')]);
        }

        return view('admin.reports.jobAdvertisements', ['jobAdvertisements' => $jobAdvertisements->get()]);
    }

    public function applicationsReport(Request $request)
    {
        \DB::enableQueryLog();

        $applications = Application::query();

        if ($request->filled('company_id')) {
            $applications->whereHas('job', function ($query) use ($request) {
                $query->where('company_id', $request->input('company_id'));
            });
        }

        if ($request->filled('job_id')) {
            $applications->where('job_id', $request->input('job_id'));
        }

        if ($request->filled('status')) {
            $status = $request->input('status');
            $applications->whereHas('applicationStatuses', function ($query) use ($status) {
                $query->where('status', $status)
                    ->whereIn('application_status_id', function($subquery) {
                        $subquery->selectRaw('MAX(application_status_id)')
                            ->from('application_status')
                            ->groupBy('application_id');
                    });
            });
        }

        if ($request->filled('date_from') && $request->has('date_to')) {
            $applications->whereBetween('application_date', [$request->input('date_from'), $request->input('date_to')]);
        }

        return view('admin.reports.applications', ['applications' => $applications->get()]);
    }

    public function reviewsReport(Request $request)
    {
        $query = Review::query();

        if ($request->filled('company_id')) {
            $query->where('company_id', $request->company_id);
        }

        if ($request->filled('rating')) {
            $query->where('rating', $request->rating);
        }

        if ($request->filled('review_date_from')) {
            $query->whereDate('review_date_time', '>=', $request->review_date_from);
        }

        if ($request->filled('review_date_to')) {
            $query->whereDate('review_date_time', '<=', $request->review_date_to);
        }

        $reviews = $query->get();

        $companies = Company::with('reviews')->get()->map(function($company) {
            $company->average_rating = $company->reviews->avg('rating');
            return $company;
        });

        $bestCompany = $companies->sortByDesc('average_rating')->first();
        $worstCompany = $companies->sortBy('average_rating')->first();

        return view('admin.reports.reviews', compact('reviews', 'bestCompany', 'worstCompany', 'companies'));
    }

}

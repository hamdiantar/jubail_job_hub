<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobAdvertisement;
use App\Models\Company;
use Illuminate\Http\Request;

class JobAdvertisementController extends Controller
{
    public function index(Request $request)
    {
        $companyId = $request->get('company_id');
        $jobs = JobAdvertisement::with('company')
            ->when($companyId, function ($query) use ($companyId) {
                $query->where('company_id', $companyId);
            })
            ->get();

        $companies = Company::all();

        return view('admin.job_ads.list', compact('jobs', 'companies', 'companyId'));
    }

    public function accept($id)
    {
        $job = JobAdvertisement::findOrFail($id);
        $job->admin_id = auth('admin')->user()->admin_id;

        $job->status = true;
        $job->save();

        return redirect()->back()->with('success', 'Job advertisement accepted and published.');
    }

    public function reject($id)
    {
        $job = JobAdvertisement::findOrFail($id);
        $job->admin_id = auth('admin')->user()->admin_id;

        $job->status = false;
        $job->save();

        return redirect()->back()->with('success', 'Job advertisement rejected and unpublished.');
    }
}

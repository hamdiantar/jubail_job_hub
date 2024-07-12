<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Company;
use App\Models\JobSeeker;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $companies = Company::all();
        $jobSeekers = JobSeeker::all();

        $query = Review::query();

        if ($request->has('company_id') && $request->company_id != '') {
            $query->where('company_id', $request->company_id);
        }

        if ($request->has('job_seeker_id') && $request->job_seeker_id != '') {
            $query->where('job_seeker_id', $request->job_seeker_id);
        }

        $reviews = $query->with(['admin', 'company', 'jobSeeker'])->get();

        return view('admin.reviews.list', compact('reviews', 'companies', 'jobSeekers'));
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully.');
    }
}

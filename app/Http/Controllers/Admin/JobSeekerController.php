<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobSeeker;
use App\Models\Review;
use Illuminate\Http\Request;

class JobSeekerController extends Controller
{
    public function index()
    {
        $jobSeekers = JobSeeker::all();
        return view('admin.job_seekers.list', compact('jobSeekers'));
    }

    public function block($id)
    {
        $jobSeeker = JobSeeker::findOrFail($id);
        $jobSeeker->is_blocked = true;
        $jobSeeker->save();

        return redirect()->back()->with('success', 'Job seeker blocked successfully.');
    }

    public function unblock($id)
    {
        $jobSeeker = JobSeeker::findOrFail($id);
        $jobSeeker->is_blocked = false;
        $jobSeeker->save();

        return redirect()->back()->with('success', 'Job seeker unblocked successfully.');
    }

    public function show($id)
    {
        $jobSeeker = JobSeeker::findOrFail($id);
        return view('admin.job_seekers.show', compact('jobSeeker'));
    }

    public function deleteReview($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->back()->with('success', 'Review deleted successfully.');
    }
}

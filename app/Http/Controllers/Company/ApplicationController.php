<?php

namespace App\Http\Controllers\Company;

use App\Constants\ApplicationStatus;
use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $companyId = auth('company')->user()->company_id;
        $applications = Application::with(['job', 'jobSeeker', 'applicationStatuses'])->whereHas('job', function ($q)
        use ($companyId){
            $q->where('company_id', $companyId);
        })->get();
        return view('company.applications.list', compact('applications'));
    }

    public function show($id)
    {
        $application = Application::with(['job', 'jobSeeker', 'applicationStatuses'])->findOrFail($id);
        return view('company.applications.show', compact('application'));
    }

    public function destroy($id)
    {
        $application = Application::findOrFail($id);
        $application->applicationStatuses()->delete();
        $application->delete();
        return back()->with('success', 'Application deleted successfully.');
    }


    public function updateStatus(Request $request, $id)
    {
        $application = Application::findOrFail($id);
        $status = $request->input('status');

        if ($status === ApplicationStatus::INTERVIEWING) {
            $application->interview_date = $request->input('interview_date');
        }

        $application->applicationStatuses()->create([
            'status' => $status,
            'notes' => $request->input('notes'),
            'updated_date' => now(),
        ]);
        $application->save();
        return back()->with('success', 'Application status updated successfully.');
    }
}

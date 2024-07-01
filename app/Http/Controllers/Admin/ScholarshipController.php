<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    public function index()
    {
        $scholarships = Scholarship::all();
        return view('admin.scholarships.index', compact('scholarships'));
    }

    public function create()
    {
        return view('admin.scholarships.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'scholarshipName' => 'required|string|max:255',
            'description' => 'required|string',
            'eligibilityCriteria' => 'required|string',
            'applicationDeadline' => 'required|date',
            'amount' => 'required|numeric',
            'duration' => 'required|string|max:255',
            'sponsor' => 'required|string|max:255',
            'requirements' => 'required|string',
            'contactInfo' => 'required|string|max:255',
        ]);

        Scholarship::create($request->all());

        return redirect()->route('admin.scholarships.index')->with('success', 'Scholarship created successfully.');
    }

    public function show(Scholarship $scholarship)
    {
        return view('admin.scholarships.show', compact('scholarship'));
    }

    public function edit(Scholarship $scholarship)
    {
        return view('admin.scholarships.edit', compact('scholarship'));
    }

    public function update(Request $request, Scholarship $scholarship)
    {
        $request->validate([
            'scholarshipName' => 'required|string|max:255',
            'description' => 'required|string',
            'eligibilityCriteria' => 'required|string',
            'applicationDeadline' => 'required|date',
            'amount' => 'required|numeric',
            'duration' => 'required|string|max:255',
            'sponsor' => 'required|string|max:255',
            'requirements' => 'required|string',
            'contactInfo' => 'required|string|max:255',
        ]);

        $scholarship->update($request->all());

        return redirect()->route('admin.scholarships.index')->with('success', 'Scholarship updated successfully.');
    }

    public function destroy(Scholarship $scholarship)
    {
        $scholarship->delete();

        return redirect()->route('admin.scholarships.index')->with('success', 'Scholarship deleted successfully.');
    }
}

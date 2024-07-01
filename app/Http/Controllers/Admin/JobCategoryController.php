<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobCategory;
use Illuminate\Support\Facades\Validator;

class JobCategoryController extends Controller
{
    public function index()
    {
        $jobCategories = JobCategory::all();
        return view('admin.job_categories.list', compact('jobCategories'));
    }

    public function create()
    {
        return view('admin.job_categories.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'job_category_name' => 'required|string|max:255|unique:job_categories,job_category_name',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.job_categories.create')
                ->withErrors($validator)
                ->withInput();
        }

        JobCategory::create($request->only('job_category_name'));

        return redirect()->route('admin.job_categories.index')
            ->with('success', 'Job category created successfully.');
    }

    public function edit($id)
    {
        $jobCategory = JobCategory::findOrFail($id);
        return view('admin.job_categories.edit', compact('jobCategory'));
    }

    public function update(Request $request, $id)
    {
        $jobCategory = JobCategory::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'job_category_name' => 'required|string|max:255|unique:job_categories,job_category_name,' . $jobCategory->job_category_id . ',job_category_id',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.job_categories.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $jobCategory->update($request->only('job_category_name'));

        return redirect()->route('admin.job_categories.index')
            ->with('success', 'Job category updated successfully.');
    }

    public function destroy($id)
    {
        $jobCategory = JobCategory::findOrFail($id);
        $jobCategory->delete();

        return redirect()->route('admin.job_categories.index')
            ->with('success', 'Job category deleted successfully.');
    }
}

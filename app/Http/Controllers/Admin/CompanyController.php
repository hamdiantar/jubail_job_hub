<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('admin.companies.list', compact('companies'));
    }

    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('admin.companies.show', compact('company'));
    }

    public function block($id)
    {
        $company = Company::findOrFail($id);
        $company->admin_id = auth('admin')->user()->admin_id;

        $company->is_blocked = true;
        $company->save();
        return redirect()->route('admin.companies.index')->with('success', 'Company blocked successfully.');
    }

    public function unblock($id)
    {
        $company = Company::findOrFail($id);
        $company->admin_id = auth('admin')->user()->admin_id;
        $company->is_blocked = false;
        $company->save();
        return redirect()->route('admin.companies.index')->with('success', 'Company unblocked successfully.');
    }
}

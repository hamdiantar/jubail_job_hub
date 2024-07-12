<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\Company;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index(Request $request)
    {
        $companyId = $request->get('company_id');
        $subscriptions = Subscription::with('company', 'package', 'payments')
            ->when($companyId, function ($query, $companyId) {
                return $query->where('company_id', $companyId);
            })->get();
        $companies = Company::all();
        return view('admin.subscriptions.list', compact('subscriptions', 'companies', 'companyId'));
    }

    public function show($id)
    {
        $subscription = Subscription::with('company', 'package', 'payments')->findOrFail($id);

        return view('admin.subscriptions.show', compact('subscription'));
    }
}

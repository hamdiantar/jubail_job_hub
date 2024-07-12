<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Payment;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{

    public function getMySubscriptions()
    {
        $company = auth('company')->user();
        $subscriptions = $company->subscriptions;

        return view('company.subscription.my_subscription', compact('subscriptions'));
    }

    public function index()
    {
        $packages = Package::where('is_available', true)->get();
        return view('company.subscription.index', compact('packages'));
    }

    public function payment(Request $request)
    {
        // Find the package or fail if not found
        $package = Package::findOrFail($request->package_id);
        // Get the authenticated company
        $company = auth('company')->user();
        $companyId = $company->company_id;
        // Create a new subscription
        $sub = Subscription::create([
            'company_id' => $companyId,
            'package_id' => $request->package_id,
            'date_time' => now(),
        ]);
        // Generate a reference number
        $refNumber = 'REF-' . strtoupper(uniqid());
        // Create a new payment
        Payment::create([
            'sub_id' => $sub->sub_id,
            'amount' => $package->price,
            'date_time' => now(),
            'status' => 'completed',
            'ref_number' => $refNumber,
        ]);
        // Redirect to company job ads index with a success message
        return redirect()->route('company.job_ads.index')->with('success', 'Payment and subscription successful. You can now start posting new jobs.');
    }

}

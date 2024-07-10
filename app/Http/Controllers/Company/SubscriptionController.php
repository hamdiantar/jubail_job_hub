<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Package;

class SubscriptionController extends Controller
{
    public function index()
    {
        $packages = Package::where('is_available', true)->get();
        return view('company.subscription.index', compact('packages'));
    }

    public function store(Request $request)
    {
        // Logic to handle subscription
    }
}

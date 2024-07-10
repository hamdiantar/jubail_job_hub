<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $companyId = auth('company')->user()->company_id;
        $reviews = Review::with('jobSeeker', 'company')->where('company_id', $companyId)->get();
        return view('company.reviews.list', compact('reviews'));
    }
}

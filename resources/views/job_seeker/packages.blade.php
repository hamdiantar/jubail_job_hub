@extends('job_seeker.shared.app')

@section('content')

    <div id="pricing" class="container">
        <div class="text-center">
            <h2>Pricing</h2>
            <hr>
            <h4 class="mt-3 mb-5">Choose a payment plan that works for you</h4>
        </div>
        <div class="row slideanim">
            <!-- Free Plan -->
            <div class="col-sm-3 col-xs-12">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h1><i class="ti-gift text-dark"></i> Free Plan</h1>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <li>1- Login Free</li>
                            <li>2- Post up to 5 Job Advertisements</li>
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <h3>0 SAR</h3>
                        <h4>per month</h4>
                        <button class="btn btn-lg">Sign Up</button>
                    </div>
                </div>
            </div>
            <!-- Monthly Plan -->
            <div class="col-sm-3 col-xs-12">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h1><i class="ti-calendar text-dark"></i> Monthly Plan</h1>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <li>1- Unlimited Job Advertisements</li>
                            <li>2- Priority Support</li>
                            <li>3- Access to Premium Features</li>
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <h3>100 SAR</h3>
                        <h4>per month</h4>
                        <button class="btn btn-lg">Sign Up</button>
                    </div>
                </div>
            </div>
            <!-- Quarterly Plan -->
            <div class="col-sm-3 col-xs-12">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h1><i class="ti-calendar text-dark"></i> Quarterly Plan</h1>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <li>1- Unlimited Job Advertisements</li>
                            <li>2- Priority Support</li>
                            <li>3- Access to Premium Features</li>
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <h3>250 SAR</h3>
                        <h4>per quarter</h4>
                        <button class="btn btn-lg">Sign Up</button>
                    </div>
                </div>
            </div>
            <!-- Yearly Plan -->
            <div class="col-sm-3 col-xs-12">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h1><i class="ti-package text-dark"></i> Yearly Plan</h1>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <li>1- Unlimited Job Advertisements</li>
                            <li>2- Priority Support</li>
                            <li>3- Access to Premium Features</li>
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <h3>900 SAR</h3>
                        <h4>per year</h4>
                        <button class="btn btn-lg">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

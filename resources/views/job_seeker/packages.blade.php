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
                            <li><p>1- Login Free</p></li>
                            <li><p>2- Post up to 5 Job Advertisements</p></li>
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <h3>0 SAR</h3>
                        <h4>per month</h4>
                        <a href="{{route('company.register')}}" class="btn btn-lg">Sign Up</a>
                    </div>
                </div>
            </div>
            <!-- Monthly Plan -->
            @foreach(\App\Models\Package::where('is_available', 1)->get() as $package)
            <div class="col-sm-3 col-xs-12">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h1><i class="ti-calendar text-dark"></i> {{$package->type}}</h1>
                    </div>
                    <div class="panel-body">
                      {!! $package->description !!}
                    </div>
                    <div class="panel-footer">
                        <h3>{{$package->price}} SAR</h3>
                        <h4>{{$package->period}} months</h4>
                        <a href="{{route('company.register')}}" class="btn btn-lg">Sign Up</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

@endsection

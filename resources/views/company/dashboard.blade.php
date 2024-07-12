@extends('company.shared.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Dashboard</h4>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div style="background: #112546;" class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Jobs Advertisements</p>
                                    <h4 class="card-title">{{ $jobAdvertisementsCount }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div style="background: #112546;" class="icon-big text-center icon-info bubble-shadow-small">
                                    <i class="far fa-newspaper"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Applications</p>
                                    <h4 class="card-title">{{ $applicationsCount }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div style="background: #112546;" class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="far fa-chart-bar"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Reviews</p>
                                    <h4 class="card-title">{{ $reviewsCount }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <h4 class="card-title">Today Applications</h4>
                    </div>
                    <p class="card-category">{{ count($todayApplicationsCount) }} job seekers applied today</p>

                    @if($freeAdsCount >= 5 &&  count($company->subscriptions) == 0)
                        <div class="alert alert-warning mt-3">
                            You have reached the limit of free job advertisements. Please <a href="{{ route('company.subscription.index') }}">subscribe</a> to add more job advertisements.
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card card-info bg-info-gradient" style="background: #112546 !important;">
                                <div class="card-body">
                                    @if($company->subscriptions->isEmpty())
                                        <h4 class="mb-1 fw-bold">Free Subscription Plan</h4>
                                        <div id="freePlan" class="chart-circle mt-4 mb-3"></div>
                                    @else
                                        @php
                                            $subscription = $company->subscriptions->sortByDesc('date_time')->first();
                                            $packageName = $subscription->package->type;
                                            $period = $subscription->package->period;
                                            $endDate = $subscription->date_time->addMonths($period);
                                            $currentDate = now();
                                        @endphp
                                        @if($endDate < $currentDate)
                                            <div style="color: red;" class="alert alert-warning mt-3">
                                                Your subscription has ended. Please <a href="{{ route('company.subscription.index') }}">renew your subscription</a> to continue using our services.
                                            </div>
                                        @else
                                            <h4 class="mb-1 fw-bold">{{ $packageName }} Plan</h4>
                                            <p>Starts on: {{ $subscription->date_time->format('Y-m-d') }}</p>
                                            <p>Ends on: {{ $endDate->format('Y-m-d') }}</p>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="table-responsive table-hover table-sales">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Job Seeker Name</th>
                                        <th>Job Advertisement</th>
                                        <th>Phone Number</th>
                                        <th>Experience Level</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!-- Loop through applications data -->
                                    @foreach($todayApplicationsCount as $application)
                                        <tr>
                                            <td>{{ $application->jobSeeker->fullname }}</td>
                                            <td>{{ $application->job->job_title }}</td>
                                            <td>{{ $application->jobSeeker->phone_number }}</td>
                                            <td>{{ $application->jobSeeker->experience_level }}</td>
                                            <td>
                                                <a href="{{ route('company.applications.show', $application->application_id) }}" class="btn btn-link btn-lg" data-toggle="tooltip" title="View">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        Circles.create({
            id:           'freePlan',
            radius:       50,
            value:        {{ $freeAdsCount }},
            maxValue:     5,
            width:        5,
            text:         function(value){return value + '%';},
            colors:       ['#ffffff', '#990000'],
            duration:     400,
            wrpClass:     'circles-wrp',
            textClass:    'circles-text',
            styleWrapper: true,
            styleText:    true
        });
    </script>
@endsection

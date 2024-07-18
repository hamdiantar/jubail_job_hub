@extends('job_seeker.shared.app')

@section('content')
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{asset('assets/apply.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Job Details</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="job-post-company pt-15 pb-120">
        <div class="container">
            <div class="row justify-content-between mt-5">
                <!-- Left Content -->
                <div class="col-xl-7 col-lg-8">
                    <div style="    box-shadow: 0px 0px 3px #858585b5;" class="single-job-items mb-50">
                        <div class="job-items">
                            <div class="company-img company-img-details">
                                <a href="#"><img class="img-thumbnail" height="120px" width="120px" src="{{ $job->company->image_path }}" alt="{{ $job->company->company_name }}"></a>
                            </div>
                            <div class="job-tittle">
                                <a href="#">
                                    <h4>{{ $job->job_title }}</h4>
                                </a>
                                <ul>
                                    <li>{{ $job->company->company_name }}</li>
                                    <li><i class="fas fa-map-marker-alt"></i>{{ $job->location }}</li>
                                    <li>{{ $job->salary }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- job single End -->

                    <div class="job-post-details">
                        <div class="post-details1 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4><strong><i class="fa fa-arrow-right"> </i></strong> Job Description</h4>
                            </div>
                            <p>{!! $job->job_description !!}</p>
                        </div>
                        <div class="post-details1 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4><strong><i class="fa fa-arrow-right"> </i></strong> Job Requirements</h4>
                            </div>
                            <p>{!! $job->requirements !!}</p>
                        </div>
                        @if($job->benefits)
                            <div class="post-details1 mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4><strong><i class="fa fa-arrow-right"> </i></strong> Job Benefits</h4>
                                </div>
                                <p>{!! $job->benefits !!}</p>
                            </div>
                        @endif

                        <div class="post-details2 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4><strong><i class="fa fa-arrow-right"> </i></strong> Required Knowledge, Skills, and Abilities</h4>
                            </div>
                            <p>{!! $job->skills_required !!}</p>

                        </div>
                        <div class="post-details2 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4><strong><i class="fa fa-arrow-right"> </i></strong> Education + Experience</h4>
                            </div>
                            <ul>
                                <li>{{ $job->education_level }}</li>
                                <li>{{ $job->experience_level }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Right Content -->
                <div class="col-xl-4 col-lg-4">
                    <div class="post-details3 mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Job Overview</h4>
                        </div>
                        <ul>
                            <li>Posted date : <span>{{ $job->posted_date }}</span></li>
                            <li>Location : <span>{{ $job->location }}</span></li>
                            <li>Vacancy : <span>{{ $job->vacancies ?? 'N/A' }}</span></li>
                            <li>Job nature : <span>{{ $job->job_type }}</span></li>
                            <li>Salary : <span>{{ $job->salary }} SAR</span></li>
                            <li>Application deadline : <span>{{ $job->application_deadline }}</span></li>
                        </ul>
                        <div class="apply-btn2 text-center">
                            @auth('jobseeker')
                                @php
                                $seekerID = auth('jobseeker')->user()->job_seeker_id;
                                @endphp
                                @if(\App\Models\Application::where('job_seeker_id', $seekerID)->where('job_id', $job->job_id)->first())
                                    <blockquote class="generic-blockquote2">
                                     you have already applied the job before
                                    </blockquote>
                                @else
                                    <button type="button" class="button button-contactForm boxed-btn" data-toggle="modal" data-target="#applyModal">Apply Now</button>

                                @endif
                            @else
                                <button type="button" class="button button-contactForm boxed-btn" data-toggle="modal" data-target="#applyModal">Apply Now</button>
                            @endauth

                        </div>
                    </div>
                    <div class="post-details3 mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Job Categories</h4>
                        </div>
                        @foreach($job->categories as $cate)
                            <span class="badge badge-dark">{{$cate->job_category_name}}</span>
                        @endforeach
                    </div>
                    <div class="post-details3 mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Company Information</h4>
                        </div>
                        <span>{{ $job->company->company_name }}</span>
                        <p>{{ $job->company->about_company }}</p>
                        <ul>
                            <li><a class="btn-link" href="{{route('company_profile', $job->company_id)}}">see more about company</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Apply Modal -->
    <!-- Apply Modal -->
    <div class="modal fade" id="applyModal" tabindex="-1" role="dialog" aria-labelledby="applyModalLabel" aria-hidden="true" style="z-index: 99999999999999999;">
        <div class="modal-dialog modal-lg" role="document">
            @auth('jobseeker')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="applyModalLabel">Review Your Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('job_seeker.apply', $job->job_id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="job_id" value="{{ $job->job_id }}">
                            <input type="hidden" name="company_id" value="{{ $job->company_id }}">
                            <blockquote class="generic-blockquote2">
                                <strong><i class="fa fa-adversal"></i>Attention:</strong>
                                Please review your information before applying.
                                Make sure all details are up to date. You can also view your CV below.
                            </blockquote>

                            <ul class="list-group">
                                <li class="list-group-item"><strong>Name:</strong> {{ auth('jobseeker')->user()->fullname }}</li>
                                <li class="list-group-item"><strong>Email:</strong> {{ auth('jobseeker')->user()->email }}</li>
                                <li class="list-group-item"><strong>Phone:</strong> {{ auth('jobseeker')->user()->phone_number }}</li>
                                <li class="list-group-item"><strong>Experience Level:</strong> {{ auth('jobseeker')->user()->experience_level }}</li>
                                <li class="list-group-item"><strong>Address:</strong> {{ auth('jobseeker')->user()->address }}</li>
                            </ul>
                            <div class="mt-3">
                                <strong>CV:</strong>
                                <iframe src="{{ asset(auth('jobseeker')->user()->cv) }}" width="100%" height="400px"></iframe>
                            </div>
                            <div class="mt-3 d-flex justify-content-between">
                                <a href="{{ route('job_seeker.profile.update') }}" class="button button-contactForm boxed-btn">Edit Profile</a>
                                <button type="submit" class="button button-contactForm boxed-btn">Confirm and Apply</button>
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Please Log In</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>You need to be logged in to apply for a job.</p>
                        <a href="{{ route('job_seeker.login') }}" class="btn btn-primary">Log In</a>
                    </div>
                </div>
            @endauth
        </div>
    </div>



@endsection

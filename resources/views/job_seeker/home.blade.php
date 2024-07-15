@extends('job_seeker.shared.app')

@section('content')
{{--    <div class="slider-area ">--}}
{{--        <div class="slider-active">--}}
{{--            <div class="single-slider slider-height d-flex align-items-center"--}}
{{--                 data-background="{{asset('assets/bg.png')}}">--}}
{{--                <div class="container">--}}
{{--                    <div class="row">--}}
{{--                        <div style="margin-bottom: 400px;" class="col-xl-6">--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- slider Area End-->
    <!-- Our Services Start -->
    <div class="our-services section-pad-t30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="section-tittle text-center">
                        <span>Featured categories</span>
                        <h2>Browse Top Categories </h2>

                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-center">
                @foreach($categories as $category)
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-tour"></span>
                            </div>
                            <div class="services-cap">
                                <h5><a href="{{route('job_seeker.job_ads').'?category='.$category->job_category_id}}">{{ $category->job_category_name }}</a></h5>
                                <span><a class="btn seemore btn-link" href="{{route('job_seeker.job_ads').'?category='.$category->job_category_id}}">
                                        see more
                                    </a></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- More Btn -->
            <!-- Section Button -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="browse-btn2 text-center mt-50">
{{--                        <a href="#" class="border-btn2">Browse All Sectors</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <!-- Our Services End -->

    <!-- Featured_job_start -->
    <section class="featured-job-area feature-padding">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>Recent Job</span>
                        <h2>Featured Jobs</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    @foreach($fiveJobs as $job)
                        <div class="single-job-items mb-30">
                            <div class="job-items">
                                <div class="company-img">
                                    <a href="{{route('company_profile', $job->company_id)}}">
                                        <img class="img-thumbnail" height="120px" width="120px" src="{{ optional($job->company)->image_path }}" alt=""></a>
                                </div>
                                <div class="job-tittle job-tittle2">
                                    <a href="#">
                                        <h4>{{ $job->job_title }}</h4>
                                    </a>
                                    <ul>
                                        <li><a class="text-primary"  href="{{route('company_profile', $job->company_id)}}">{{ optional($job->company)->company_name }}</a></li>
                                        {{--                                                <li><i class="fas fa-map-marker-alt"></i>{{ $job->location }}</li>--}}
                                        <li><i class="fas fa-map-marker-alt"></i>Jubail</li>
                                        {{--                                                <li>SAR {{ number_format($job->salary, 2) }}</li>--}}
                                        <li>3000 - 6000 SAR</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="items-link items-link2 f-right">
                                <a href="{{route('job_details', $job->job_id)}}" class="btn-border">View <i class="fa fa-eye"></i></a>
                                <span>Posted At : {{ $job->posted_date }}</span>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    <div class="whole-wrap" id="haveCompany">
        <div class="container box_1170">
            <div class="section-top-border haveCompany">
                <h3 class="mb-30">Join Us and Find the Best Candidates for Your Company</h3>
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ asset('assets/img/Join-us.png') }}" alt="Hiring" class="img-fluid">
                    </div>
                    <div class="col-md-9 mt-sm-20 text-white">
                        <ul>
                            <li><strong>Are you looking to hire top talent for your company? Join us and take advantage
                                    of our platform to post job ads and connect with the best candidates. Our
                                    user-friendly interface makes it easy for you to manage your job postings and
                                    applications.</strong><br>
                            </li>
                            <li><strong>By registering with us, you'll gain access to a wide pool of job seekers who are
                                    actively looking for opportunities. Whether you're looking for experienced
                                    professionals or fresh graduates, our platform has the right candidates for your
                                    needs.</strong><br>
                            </li>
                            <li><strong>Don't miss out on the opportunity to streamline your hiring process and find the
                                    perfect fit for your company. Click the link below to get started with your
                                    registration.</strong>
                            </li>
                        </ul>
                        <div class="mt-2 text-center">
                            <a href="{{ route('company.register') }}" class="btn head-btn1">Register
                                Your Company</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Featured_job_end -->
    <!-- How  Apply Process Start-->
    <div class="apply-process-area apply-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle white-text text-center">
                        <span>Apply process</span>
                        <h2> How it works</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            <span class="flaticon-search"></span>
                        </div>
                        <div class="process-cap">
                            <h5>1. Search a job</h5>
                            <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut
                                laborea.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            <span class="flaticon-curriculum-vitae"></span>
                        </div>
                        <div class="process-cap">
                            <h5>2. Apply for job</h5>
                            <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut
                                laborea.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            <span class="flaticon-tour"></span>
                        </div>
                        <div class="process-cap">
                            <h5>3. Get your job</h5>
                            <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut
                                laborea.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- How  Apply Process End-->
@endsection

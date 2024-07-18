@extends('job_seeker.shared.app')

@section('content')
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/apply.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Get your job</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->
    <!-- Job List Area Start -->
    <div class="job-listing-area pt-120 pb-120">
        <div class="container">

            <div class="row">
                <!-- Left content -->
                <div class="col-xl-3 col-lg-3 col-md-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="small-section-tittle2 mb-45">
                                <div class="ion">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="20px" height="12px">
                                        <path fill-rule="evenodd" fill="rgb(27, 207, 107)"
                                              d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z"/>
                                    </svg>
                                </div>
                                <h4>Filter Jobs</h4>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('job_seeker.job_ads') }}" method="GET">
                        <!-- Job Category Listing start -->
                        <div class="job-category-listing mb-50">
                            <!-- single one -->
                            <div class="single-listing">
                                <div class="small-section-tittle2">
                                    <h4>Job Category</h4>
                                </div>
                                <!-- Select job items start -->
                                <div class="select-job-items2">
                                    <select class="select2 form-control"  name="category">
                                        <option value="">All Category</option>
                                        @foreach($jobCategories as $category)
                                            <option value="{{ $category->job_category_id }}" {{ $selectedCategory == $category->job_category_id ? 'selected' : '' }}>{{ $category->job_category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!--  Select job items End-->
                                <!-- select-Categories start -->
                                <div class="select-Categories pt-4 pb-5">
                                    <div class="small-section-tittle2 ">
                                        <h4>Job Type</h4>
                                    </div>


                                    <label class="container">Full time
                                        <input type="radio" name="type" value="Full-time" {{ $selectedType == 'Full-time' ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Part Time
                                        <input type="radio" name="type" value="Part-time" {{ $selectedType == 'Part-time' ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Remote
                                        <input type="radio" name="type" value="Remote" {{ $selectedType == 'Remote' ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Freelance
                                        <input type="radio" name="type" value="Freelance" {{ $selectedType == 'Freelance' ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>



                                    <label class="container">Contract
                                        <input type="radio" name="type" value="Contract" {{ $selectedType == 'Contract' ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Temporary
                                        <input type="radio" name="type" value="Temporary" {{ $selectedType == 'Temporary' ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Freelance
                                        <input type="radio" name="type" value="Internship" {{ $selectedType == 'Internship' ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <!-- select-Categories End -->
                            </div>
                            <!-- single two -->
                            <div class="single-listing">
                                <div class="small-section-tittle2">
                                    <h4>Job Location</h4>
                                </div>
                                <!-- Select job items start -->
                                <div class="select-job-items2 ">
                                    <select class="form-control select2" name="location">
                                        <option value="">Anywhere</option>
                                        @foreach ($locations as $location)
                                            <option value="{{ $location }}" {{ $selectedLocation == $location? 'selected' : '' }}>{{ $location }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!--  Select job items End-->
                                <!-- select-Categories start -->
                                <div class="select-Categories pt-4 pb-5">
                                    <div class="small-section-tittle2">
                                        <h4>Experience</h4>
                                    </div>
                                    <label class="container">Entry
                                        <input type="radio" name="experience" value="Entry" {{ $selectedExperience == 'Entry' ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Mid
                                        <input type="radio" name="experience" value="Mid" {{ $selectedExperience == 'Mid' ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Senior
                                        <input type="radio" name="experience" value="Senior" {{ $selectedExperience == 'Senior' ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Manager
                                        <input type="radio" name="experience" value="Manager" {{ $selectedExperience == 'Manager' ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">other
                                        <input type="radio" name="experience" value="other" {{ $selectedExperience == 'other' ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <!-- select-Categories End -->
                            </div>
                            <!-- single three -->
                            <div class="single-listing">
                                <!-- select-Categories start -->
                                <div class="select-Categories pb-5">
                                    <div class="small-section-tittle2">
                                        <h4>Posted Within</h4>
                                    </div>
                                    <label class="container">Any
                                        <input type="radio" name="posted_within" value="any" {{ $selectedPostedWithin == 'any' ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Last 24 hours
                                        <input type="radio" name="posted_within" value="1" {{ $selectedPostedWithin == '1' ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Last 7 days
                                        <input type="radio" name="posted_within" value="7" {{ $selectedPostedWithin == '7' ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Last 14 days
                                        <input type="radio" name="posted_within" value="14" {{ $selectedPostedWithin == '14' ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Last 30 days
                                        <input type="radio" name="posted_within" value="30" {{ $selectedPostedWithin == '30' ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <!-- select-Categories End -->
                            </div>
                            <!-- single four -->
                            <div class="single-listing">
                                <!-- select-Categories start -->
                                <div class="select-Categories pb-5">
                                    <div class="small-section-tittle2">
                                        <h4>Company</h4>
                                    </div>
                                    <div class="select-job-items2 ">
                                        <select class="form-control select2" name="company">
                                            <option value="">All Companies</option>
                                            @foreach($companies as $company)
                                                <option value="{{ $company->company_name }}" {{ $selectedCompany == $company->company_name ? 'selected' : '' }}>{{ $company->company_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- select-Categories End -->
                            </div>
                            <!-- button -->
                            <div class="submit-btn-area">
                                <button style="background: #112546;padding: 17px;border-radius: 6px !important" class="btn submit-btn btn-sm" type="submit">Apply Filter <i class="fa fa-filter"></i></button>
                                <a style="    padding: 18px;background: #ec6c6c;
    border-radius: 7px;" href="{{route('job_seeker.job_ads')}}" class="btn btn-danger submit-btn btn-sm"> <i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Right content -->
                <div class="col-xl-9 col-lg-9 col-md-8">
                    <!-- Featured_job_start -->
                    <section class="featured-job-area">
                        <div class="container">
                            <!-- Count of Job list Start -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="count-job mb-35">
                                        <span>{{ $jobAdvertisements->total() }} Jobs found</span>
                                    </div>
                                </div>
                            </div>
                            @foreach($jobAdvertisements as $job)
                                <!-- single-job-content -->
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
                    </section>
                    <!-- Featured_job_end -->
                    <!-- pagination -->

                    <!-- pagination End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Job List Area End -->

    <!--Pagination Start  -->
    <div class="pagination-area pb-115 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                @if ($jobAdvertisements->onFirstPage())
                                    <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $jobAdvertisements->previousPageUrl() }}">&laquo;</a></li>
                                @endif

                                @foreach ($jobAdvertisements->getUrlRange(1, $jobAdvertisements->lastPage()) as $page => $url)
                                    @if ($page == $jobAdvertisements->currentPage())
                                        <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                    @else
                                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach

                                @if ($jobAdvertisements->hasMorePages())
                                    <li class="page-item"><a class="page-link" href="{{ $jobAdvertisements->nextPageUrl() }}">&raquo;</a></li>
                                @else
                                    <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Pagination End  -->
@endsection

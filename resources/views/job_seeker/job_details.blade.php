@extends('job_seeker.shared.app')

@section('content')
    <div class="job-post-company pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Left Content -->
                <div class="col-xl-7 col-lg-8">
                    <!-- job single -->
                    <div class="single-job-items mb-50">
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
                                <h4>Job Description</h4>
                            </div>
                            <p>{{ $job->job_description }}</p>
                        </div>
                        <div class="post-details2 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Required Knowledge, Skills, and Abilities</h4>
                            </div>
                            <ul>
                                @foreach (explode(',', $job->skills_required) as $skill)
                                    <li>{{ $skill }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="post-details2 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Education + Experience</h4>
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
                            <li>Salary : <span>{{ $job->salary }}</span></li>
                            <li>Application deadline : <span>{{ $job->application_deadline }}</span></li>
                        </ul>
                        <div class="apply-btn2">
                            <a href="#" class="btn">Apply Now</a>
                        </div>
                    </div>
                    <div class="post-details4 mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Company Information</h4>
                        </div>
                        <span>{{ $job->company->company_name }}</span>
                        <p>{{ $job->company->about_company }}</p>
                        <ul>
                            <li>Name: <span>{{ $job->company->company_name }}</span></li>
                            <li>Web : <span><a href="{{ $job->company->website_url }}">{{ $job->company->website_url }}</a></span></li>
                            <li>Email: <span>{{ $job->company->email }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

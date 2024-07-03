@extends('job_seeker.shared.app')

@section('content')
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Join Us as a Company</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->
    <!-- ================ contact section start ================= -->
    <section class="contact-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="contact-title">Register Your Company</h2>
                    <hr>
                    <p class="mt-4 mb-4">Join us and post job ads to find the best candidates for your company. Fill out the form below to get started.</p>
                </div>
                <div class="col-lg-8">
                    <form class="form-contact boxSh" action="{{route('company.register')}}" method="post" id="contactForm" novalidate="novalidate">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fullname">Full Name</label>
                                    <input class="form-control valid" name="fullname" id="fullname" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Full Name'" placeholder="Enter Full Name">
                                    <span class="text-danger">@error('fullname') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email Address'" placeholder="Email">
                                    <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company_name">Company Name</label>
                                    <input class="form-control" name="company_name" id="company_name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Company Name'" placeholder="Enter Company Name">
                                    <span class="text-danger">@error('company_name') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone_number_1">Primary Phone Number</label>
                                    <input class="form-control valid" name="phone_number_1" id="phone_number_1" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Primary Phone Number'" placeholder="Enter Primary Phone Number">
                                    <span class="text-danger">@error('phone_number_1') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone_number_2">Secondary Phone Number</label>
                                    <input class="form-control valid" name="phone_number_2" id="phone_number_2" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Secondary Phone Number'" placeholder="Enter Secondary Phone Number">
                                    <span class="text-danger">@error('phone_number_2') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="website_url">Website URL</label>
                                    <input class="form-control" name="website_url" id="website_url" type="url" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Website URL'" placeholder="Enter Website URL">
                                    <span class="text-danger">@error('website_url') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="linkedin_url">LinkedIn URL</label>
                                    <input class="form-control" name="linkedin_url" id="linkedin_url" type="url" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter LinkedIn URL'" placeholder="Enter LinkedIn URL">
                                    <span class="text-danger">@error('linkedin_url') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="twitter_url">Twitter URL</label>
                                    <input class="form-control" name="twitter_url" id="twitter_url" type="url" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Twitter URL'" placeholder="Enter Twitter URL">
                                    <span class="text-danger">@error('twitter_url') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="industry">Industry</label>
                                    <input class="form-control" name="industry" id="industry" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Industry'" placeholder="Enter Industry">
                                    <span class="text-danger">@error('industry') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company_size">Select Company Size</label>
                                    <select class="form-control" name="company_size" id="company_size">
                                        <option value="">Select Company Size</option>
                                        <option value="small">Small</option>
                                        <option value="medium">Medium</option>
                                        <option value="large">Large</option>
                                    </select>
                                    <span class="text-danger">@error('company_size') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="twitter_url">Founded At</label>
                                    <input class="form-control" name="founded_at" id="founded_at" type="date" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Twitter URL'" placeholder="Enter Twitter URL">
                                    <span class="text-danger">@error('founded_at') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="about_company">About Company</label>
                                    <textarea class="form-control w-100" name="about_company" id="about_company" cols="10" rows="6" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter About Company'" placeholder="Enter About Company"></textarea>
                                    <span class="text-danger">@error('about_company') {{ $message }} @enderror</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3 text-center">
                            <button type="submit" class="button button-contactForm boxed-btn">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection

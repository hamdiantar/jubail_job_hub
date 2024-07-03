@extends('job_seeker.shared.app')

@section('content')
    <!-- Hero Area Start-->
{{--    <div class="slider-area ">--}}
{{--        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{asset('assets/img/hero/about.jpg')}}">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-xl-12">--}}
{{--                        <div class="hero-cap text-center">--}}
{{--                            <h2>Join Us as a Company</h2>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
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
                <div class="col-md-9 mb-3 text-center ">
                    <blockquote class="generic-blockquote2">
                        By registering, you will start with our Free Plan which allows you to post up to 5 job advertisements. To post more job advertisements, please consider subscribing to one of our other packages.
                        <a class="btn-link" href="{{ url('/packages') }}">View Our Packages</a>.
                    </blockquote>
                </div>
                @if (session('success'))
                    <div class="col-md-9 text-center alert alert-success alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            <li>{{ session('success') }}</li>
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="col-lg-9">
                    <form class="form-contact boxSh" action="{{ route('company.register') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">username</label>
                                    <input class="form-control valid" name="username" id="username" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter username'" placeholder="username" value="{{ old('username') }}">
                                    <span class="text-danger">@error('username') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email Address'" placeholder="Email" value="{{ old('email') }}">
                                    <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input class="form-control" name="password" id="password" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Password'" placeholder="Enter Password">
                                    <small class="form-text text-muted">The password must be at least 8 characters long and contain at least one letter, one digit, and one symbol (@$!%*#?&).</small>
                                    <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input class="form-control" name="password_confirmation" id="password_confirmation" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'" placeholder="Confirm Password">
                                    <span class="text-danger">@error('password_confirmation') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fullname"> Owner Name </label>
                                    <input class="form-control valid" name="fullname" id="fullname" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Full Name'" placeholder="Enter Full Name" value="{{ old('fullname') }}">
                                    <span class="text-danger">@error('fullname') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company_name">Company Name</label>
                                    <input class="form-control" name="company_name" id="company_name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Company Name'" placeholder="Enter Company Name" value="{{ old('company_name') }}">
                                    <span class="text-danger">@error('company_name') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone_number_1">Primary Phone Number</label>
                                    <input class="form-control valid" name="phone_number_1" id="phone_number_1" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Primary Phone Number'" placeholder="Enter Primary Phone Number" value="{{ old('phone_number_1') }}" onkeypress="return isNumber(event)">
                                    <small class="form-text text-muted">The phone number must start with +96605 or 05 followed by 8 digits.</small>
                                    <span class="text-danger">@error('phone_number_1') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone_number_2">Secondary Phone Number</label>
                                    <input class="form-control valid" name="phone_number_2" id="phone_number_2" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Secondary Phone Number'" placeholder="Enter Secondary Phone Number" value="{{ old('phone_number_2') }}" onkeypress="return isNumber(event)">
                                    <small class="form-text text-muted">The phone number must start with +96605 or 05 followed by 8 digits.</small>
                                    <span class="text-danger">@error('phone_number_2') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="website_url">Website URL</label>
                                    <input class="form-control" name="website_url" id="website_url" type="url" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Website URL'" placeholder="Enter Website URL" value="{{ old('website_url') }}">
                                    <span class="text-danger">@error('website_url') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="linkedin_url">LinkedIn URL</label>
                                    <input class="form-control" name="linkedin_url" id="linkedin_url" type="url" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter LinkedIn URL'" placeholder="Enter LinkedIn URL" value="{{ old('linkedin_url') }}">
                                    <span class="text-danger">@error('linkedin_url') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="twitter_url">Twitter URL</label>
                                    <input class="form-control" name="twitter_url" id="twitter_url" type="url" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Twitter URL'" placeholder="Enter Twitter URL" value="{{ old('twitter_url') }}">
                                    <span class="text-danger">@error('twitter_url') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="industry">Industry</label>
                                    <select class="form-control" name="industry" id="industry">
                                        <option value="">Select Industry</option>
                                        <option value="Technology">Technology</option>
                                        <option value="Finance">Finance</option>
                                        <option value="Healthcare">Healthcare</option>
                                        <option value="Education">Education</option>
                                        <option value="Retail">Retail</option>
                                        <!-- Add other industries as needed -->
                                    </select>
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
                                    <label for="founded_at">Founded At</label>
                                    <input class="form-control" name="founded_at" id="founded_at" type="date" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Founded Date'" placeholder="Enter Founded Date" max="{{ date('Y-m-d') }}" value="{{ old('founded_at') }}">
                                    <span class="text-danger">@error('founded_at') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="logo">Company Logo</label>
                                    <input class="form-control-file" name="logo" id="logo" type="file" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Upload Company Logo'">
                                    <small class="form-text text-muted">Upload your company logo (JPG, PNG, or GIF).</small>
                                    <span class="text-danger">@error('logo') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="about_company">About Company</label>
                                    <textarea class="form-control w-100" name="about_company" id="about_company" cols="5" rows="5" onfocus="this.placeholder = ''" onblur="this.placeholder = 'About Company'" placeholder="About Company">{{ old('about_company') }}</textarea>
                                    <span class="text-danger">@error('about_company') {{ $message }} @enderror</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12  text-center">
                            <button type="submit" class="button button-contactForm boxed-btn">Register</button>
                                <span >Already have an account? <a href="{{route('company.login')}}" class="text-primary">Login</a></span>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection

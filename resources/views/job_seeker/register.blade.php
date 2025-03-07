@extends('job_seeker.shared.app')

@section('content')
    <section class="contact-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="contact-title">Register</h2>
                    <hr class="mb-4">
                    <p  class="mt-4 mb-4 w-50 m-auto">
                        Join our community to find exciting job opportunities tailored to your skills and experience. Please fill out the form below to create your account.
                    </p>
                </div>
                @include('job_seeker.shared.messages')
                <div class="col-lg-9 m-3">
                    <form class="form-contact boxSh" action="{{ route('job_seeker.register') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fullname">Full Name <strong class="text-danger">*</strong></label>
                                    <input class="form-control valid" name="fullname" id="fullname" type="text" placeholder="Enter full name" value="{{ old('fullname') }}">
                                    <span class="text-danger">@error('fullname') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email <strong class="text-danger">*</strong></label>
                                    <input class="form-control valid" name="email" id="email" type="email" placeholder="Enter email" value="{{ old('email') }}">
                                    <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Username <strong class="text-danger">*</strong></label>
                                    <input class="form-control valid" name="username" id="username" type="text" placeholder="Enter username" value="{{ old('username') }}">
                                    <span class="text-danger">@error('username') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password <strong class="text-danger">*</strong></label>
                                    <input class="form-control" name="password" id="password" type="password" placeholder="Enter password">
                                    <small class="form-text text-muted">The password must be at least 8 characters long and contain at least one letter, one digit, and one symbol (@$!%*#?&).</small>

                                    <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password <strong class="text-danger">*</strong></label>
                                    <input class="form-control" name="password_confirmation" id="password_confirmation" type="password" placeholder="Confirm password">
                                    <span class="text-danger">@error('password_confirmation') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone_number">Phone Number <strong class="text-danger">*</strong></label>
                                    <input class="form-control valid" name="phone_number" id="phone_number" type="text" placeholder="Enter phone number" value="{{ old('phone_number') }}">
                                    <small class="form-text text-muted">The phone number must start with +966 or 05 followed by 8 digits.</small>

                                    <span class="text-danger">@error('phone_number') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="experience_level">Experience Level <strong class="text-danger">*</strong></label>
                                    <select class="form-control valid" name="experience_level" id="experience_level">
                                        <option value="entry" {{ old('experience_level') == 'entry' ? 'selected' : '' }}>Entry</option>
                                        <option value="mid" {{ old('experience_level') == 'mid' ? 'selected' : '' }}>Mid</option>
                                        <option value="senior" {{ old('experience_level') == 'senior' ? 'selected' : '' }}>Senior</option>
                                    </select>
                                    <span class="text-danger">@error('experience_level') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Address <strong class="text-danger">*</strong></label>
                                    <input class="form-control valid" name="address" id="address" type="text" placeholder="Enter address" value="{{ old('address') }}">
                                    <span class="text-danger">@error('address') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cv">CV (PDF or Word format only) <strong class="text-danger">*</strong></label>
                                    <input class="form-control valid" name="cv" id="cv" type="file">
                                    <span class="text-danger">@error('cv') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="button button-contactForm boxed-btn">Register</button>
                                <span>Already have an account? <a href="{{ route('job_seeker.login') }}" class="text-primary">Login</a></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

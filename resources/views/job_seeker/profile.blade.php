@extends('job_seeker.shared.app')

@section('content')
    <section class="blog_area single-post-area section-padding section-padding1">
        <div class="">
            <div class="row col-md-12">
                @include('job_seeker.shared.messages')
                <div class="col-lg-2 navBAR">
                    @include('job_seeker.shared.sidebar')
                </div>
                <div class="col-lg-9 posts-list">
                    <div style="    border-top: none;margin-left: 39px;" class="comment-form">
                        <h2 class="contact-title text-center">Update Profile</h2>
                        <hr class="mb-4">
                        <p class="mt-4 mb-4  m-auto">
                            Keep your profile up-to-date to ensure you receive the best job opportunities. Please fill out the form below to update your account information.
                        </p>


                        <form class="form-contact comment_form" action="{{ route('job_seeker.profile.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fullname">Full Name <strong class="text-danger">*</strong></label>
                                        <input class="form-control valid" name="fullname" id="fullname" type="text" placeholder="Enter full name" value="{{ old('fullname', $jobSeeker->fullname) }}">
                                        <span class="text-danger">@error('fullname') {{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email <strong class="text-danger">*</strong></label>
                                        <input class="form-control valid" name="email" id="email" type="email" placeholder="Enter email" value="{{ old('email', $jobSeeker->email) }}">
                                        <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Username <strong class="text-danger">*</strong></label>
                                        <input class="form-control valid" name="username" id="username" type="text" placeholder="Enter username" value="{{ old('username', $jobSeeker->username) }}">
                                        <span class="text-danger">@error('username') {{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone_number">Phone Number <strong class="text-danger">*</strong></label>
                                        <input class="form-control valid" name="phone_number" id="phone_number" type="text" placeholder="Enter phone number" value="{{ old('phone_number', $jobSeeker->phone_number) }}">
                                        <small class="form-text text-muted">The phone number must start with +966 or 05 followed by 8 digits.</small>
                                        <span class="text-danger">@error('phone_number') {{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="experience_level">Experience Level <strong class="text-danger">*</strong></label>
                                        <select class="form-control valid" name="experience_level" id="experience_level">
                                            <option value="entry" {{ old('experience_level', $jobSeeker->experience_level) == 'entry' ? 'selected' : '' }}>Entry</option>
                                            <option value="mid" {{ old('experience_level', $jobSeeker->experience_level) == 'mid' ? 'selected' : '' }}>Mid</option>
                                            <option value="senior" {{ old('experience_level', $jobSeeker->experience_level) == 'senior' ? 'selected' : '' }}>Senior</option>
                                        </select>
                                        <span class="text-danger">@error('experience_level') {{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Address <strong class="text-danger">*</strong></label>
                                        <input class="form-control valid" name="address" id="address" type="text" placeholder="Enter address" value="{{ old('address', $jobSeeker->address) }}">
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
                                    <button type="submit" class="button button-contactForm boxed-btn">Update Profile</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

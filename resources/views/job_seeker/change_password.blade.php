@extends('job_seeker.shared.app')

@section('content')
    <section class="blog_area single-post-area section-padding section-padding1">
        <div class="">
            <div class="row col-md-12">
                @include('job_seeker.shared.messages')
                <div class="col-lg-2 navBAR">
                    @include('job_seeker.shared.sidebar')
                </div>
                <div class="col-lg-8 posts-list">
                    <div style="    border-top: none;margin-left: 39px;" class="comment-form">
                        <h2 class="contact-title text-center">Change Password</h2>
                        <hr class="mb-4">
                        <p class="mt-4 mb-4 m-auto">
                            Ensure your account is secure by changing your password regularly. Please fill out the form below to update your password.
                        </p>

                        <form class="form-contact comment_form" action="{{ route('job_seeker.change_password.submit') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="current_password">Current Password <strong class="text-danger">*</strong></label>
                                        <input class="form-control" name="current_password" id="current_password" type="password" placeholder="Enter current password">
                                        <span class="text-danger">@error('current_password') {{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="new_password">New Password <strong class="text-danger">*</strong></label>
                                        <input class="form-control" name="new_password" id="new_password" type="password" placeholder="Enter new password">
                                        <small class="form-text text-muted">The password must be at least 8 characters long and contain at least one letter, one digit, and one symbol (@$!%*#?&).</small>

                                        <span class="text-danger">@error('new_password') {{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="new_password_confirmation">Confirm New Password <strong class="text-danger">*</strong></label>
                                        <input class="form-control" name="new_password_confirmation" id="new_password_confirmation" type="password" placeholder="Confirm new password">
                                        <span class="text-danger">@error('new_password_confirmation') {{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="button button-contactForm boxed-btn">Change Password</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

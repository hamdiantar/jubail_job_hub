@extends('job_seeker.shared.app')

@section('content')
    <section class="contact-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="contact-title mb-4">Reset Password</h2>
                </div>

                @include('job_seeker.shared.messages')
                <div class="col-lg-6 mt-4">
                    <form class="form-contact boxSh" action="{{ route('password.confirmResetPassword') }}" method="post">
                        <input type="hidden" name="type" value="{{ request()->type }}">
                        @csrf
                        <!-- Username or Email Input -->
                        <div class="row">
                            <input name="email" type="hidden" value="{{ $user->email }}">
                            <!-- Code Input -->
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label for="code">Reset Code <strong class="text-danger">*</strong></label>
                                    <input class="form-control valid" required name="code" id="code" type="text" placeholder="Enter the reset code" value="{{ old('code') }}">
                                    <span class="text-danger">@error('code') {{ $message }} @enderror</span>
                                </div>
                            </div>

                            <!-- Password Input -->
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label for="password">New Password <strong class="text-danger">*</strong></label>
                                    <input class="form-control valid" required name="password" id="password" type="password" placeholder="Enter new password">
                                    <small class="form-text text-muted">The password must be at least 8 characters long and contain at least one letter, one digit, and one symbol (@$!%*#?&).</small>

                                    <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                                </div>
                            </div>

                            <!-- Confirm Password Input -->
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm New Password <strong class="text-danger">*</strong></label>
                                    <input class="form-control valid" required name="password_confirmation" id="password_confirmation" type="password" placeholder="Confirm new password">
                                    <span class="text-danger">@error('password_confirmation') {{ $message }} @enderror</span>
                                </div>
                            </div>

                            <div class="col-12 text-center mt-4">
                                <button type="submit" class="button button-contactForm boxed-btn">Reset Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

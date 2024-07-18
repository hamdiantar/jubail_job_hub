@extends('job_seeker.shared.app')

@section('content')
    <section class="contact-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="contact-title mb-4">Company | Login</h2>
                    <hr>
                    <h6 class="mt-4 mb-4"><strong>Welcome Back</strong></h6>

                </div>

                @include('job_seeker.shared.messages')
                <div class="col-lg-6 mt-4">
                    <form class="form-contact boxSh" action="{{ route('company.login') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="username">Username or Email <strong class="text-danger">*</strong></label>
                                    <input class="form-control valid" name="username" id="username" type="text" placeholder="Enter username or email" value="{{ old('username') }}">
                                    <span class="text-danger">@error('username') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password">Password <strong class="text-danger">*</strong></label>
                                    <input class="form-control" name="password" id="password" type="password" placeholder="Enter password">
                                    <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="button button-contactForm boxed-btn">Login</button>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <span>Don't have an account? <a href="{{ route('company.register') }}" class="text-primary">Register</a></span>
                                <br>
                                <br>
                                <span> <a href="#" class="text-primary">Forget Password?</a></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

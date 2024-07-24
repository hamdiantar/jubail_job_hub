@extends('job_seeker.shared.app')

@section('content')
    <section class="contact-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="contact-title mb-4">Forget Password?</h2>

                </div>

                @include('job_seeker.shared.messages')
                <div class="col-lg-6 mt-4">
                    <form class="form-contact boxSh" action="{{ route('password.reset') }}" method="get">
                        <input type="hidden" name="type" value="{{request()->type}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="username">Username or Email <strong class="text-danger">*</strong></label>
                                    <input class="form-control valid" required name="username" id="username" type="text" placeholder="Enter username or email" value="{{ old('username') }}">
                                    <span class="text-danger">@error('username') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="button button-contactForm boxed-btn">Send Code</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

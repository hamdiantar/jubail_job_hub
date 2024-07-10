@extends('job_seeker.shared.app')

@section('content')
    <section class="blog_area single-post-area section-padding section-padding1">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('job_seeker.shared.sidebar')
                </div>
                <div class="col-lg-9 posts-list">
                    <div style="    border-top: none;" class="comment-form">
                        <h2 class="contact-title text-center">My CV</h2>
                        <hr class="mb-4">
                        <p class="mt-4 mb-4 m-auto">
                            Below is your uploaded CV. Ensure it is up-to-date and reflects your current skills and experiences.
                        </p>
                        <div class="mt-4">
                            <p>Would you like to update your CV?</p>
                            <p><a class="btn-link text-primary" href="{{ route('job_seeker.profile') }}">Click here</a> to update your profile and upload a new CV.</p>
                        </div>
                        @if($jobSeeker->cv)
                            <div class="cv-container mt-4">
                                <iframe src="{{ asset( $jobSeeker->cv) }}" frameborder="0" width="100%" height="600px"></iframe>
                            </div>
                        @else
                            <p class="text-center text-danger mt-4">No CV uploaded.</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

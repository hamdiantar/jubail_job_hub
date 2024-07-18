@extends('job_seeker.shared.app')

@section('content')

    <section class="blog_area single-post-area section-padding section-padding1">
        <div class="">
            <div class="row col-md-12">
                @include('job_seeker.shared.messages')
                <div class="col-lg-2 navBAR">
                    @include('job_seeker.shared.sidebar')
                </div>
                <div class="col-lg-8 text-center posts-list">
                    <div class="comment-form" style="border-top: none;margin-left: 39px;">
                        <h2 class="contact-title text-center">Track Application Status</h2>
                        <hr class="mb-4">
                        <p class="mt-4 mb-4 m-auto">
                            Enter your application ID to track the status of your job application.
                        </p>

                        <form class="mt-3 mb-3" action="{{ route('job_seeker.track_application') }}" method="get">
                            <div class="row col-md-12 justify-content-center">
                                <div class="form-group col-md-12">
                                    <input type="text" value="{{request()->application_id}}" class="form-control" name="application_id" placeholder="Application ID" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" class="button button-contactForm boxed-btn">Track Application <i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>

                        @if($application)
                            <div class="table-responsive">
                                <table class="table table-bordered ">
                                    <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Notes</th>
                                        <th>Updated Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($application->applicationStatuses as $status)
                                        <tr class="status-{{ strtolower(str_replace(' ', '-', $status->status)) }}">
                                            <td>{{ $status->status }}</td>
                                            <td>{{ $status->notes }}</td>
                                            <td>{{ date('Y-m-d H:i A', strtotime($status->updated_date)) }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p>No application found. Please enter a valid application ID.</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

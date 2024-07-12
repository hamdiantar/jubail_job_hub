@extends('admin.shared.app')

@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Job Seeker Details</h4>
                        <button onclick="window.location.href='{{ route('admin.job_seekers.index') }}'" class="btn btn-icon btn-rounded btn-danger float-right">
                            <i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Full Name:</strong> {{ $jobSeeker->fullname }}</p>
                                <p><strong>Email:</strong> {{ $jobSeeker->email }}</p>
                                <p><strong>Phone Number:</strong> {{ $jobSeeker->phone_number }}</p>
                                <p><strong>Experience Level:</strong> {{ $jobSeeker->experience_level }}</p>
                                <p><strong>Address:</strong> {{ $jobSeeker->address }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>CV:</strong> <a href="{{ asset( $jobSeeker->cv) }}" target="_blank">View CV</a></p>
                                <p><strong>Joined At:</strong> {{ date('Y-m-d H:i A', strtotime($jobSeeker->joined_at)) }}</p>
                            </div>
                        </div>

                        <hr>

                        <h4>Applications</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Job Title</th>
                                    <th>Application Date</th>
                                    <th>Interview Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($jobSeeker->applications as $application)
                                    <tr>
                                        <td>{{ $application->application_id }}</td>
                                        <td><a href="{{ route('job_details', $application->job->job_id) }}" target="_blank">{{ $application->job->job_title }}</a></td>
                                        <td>{{ date('Y-m-d H:i A', strtotime($application->application_date)) }}</td>
                                        <td>{{ $application->interview_date ? date('Y-m-d H:i A', strtotime($application->interview_date)) : '-' }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <hr>

                        <h4>Feedback (Reviews)</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Reviewer</th>
                                    <th>Review Text</th>
                                    <th>Rating</th>
                                    <th>Review Date</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($jobSeeker->reviews as $review)
                                    <tr>
                                        <td>{{ $review->review_id }}</td>
                                        <td>{{ $review->admin ? $review->admin->fullname : 'N/A' }}</td>
                                        <td>{{ $review->review_text }}</td>
                                        <td>{{ $review->rating }}</td>
                                        <td>{{ date('Y-m-d H:i A', strtotime($review->review_date_time)) }}</td>
                                        <td>
                                            <button onclick="confirmDelete('{{ route('admin.reviews.delete', $review->review_id) }}')" type="submit" class="btn btn-link btn-danger" data-toggle="tooltip" title="Remove">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

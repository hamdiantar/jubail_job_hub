@extends('job_seeker.shared.app')

@section('content')
    <section class="blog_area single-post-area section-padding section-padding1">
        <div class="container">
            <div class="row">
                @include('job_seeker.shared.messages')
                <div class="col-lg-3">
                    @include('job_seeker.shared.sidebar')
                </div>
                <div class="col-lg-9 text-center posts-list">
                    <div style="border-top: none;" class="comment-form">
                        <h2 class="contact-title text-center">My Applications</h2>
                        <hr class="mb-4">
                        <section class="section-top-border">
                            <div class="table-responsive">
                                <table id="" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Job Title</th>
                                        <th>Company</th>
                                        <th>Application Date</th>
                                        <th>Application Status</th>
                                        <th>Track</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($jobSeeker->applications as $index => $application)
                                        <tr>
                                            <td>{{$application->application_id }}</td>
                                            <td><a class="text-primary" target="_blank" href="{{route('job_details', optional($application->job)->job_id)}}">{{ optional($application->job)->job_title }}</a></td>
                                            <td>
                                                <a class="text-primary" target="_blank" href="{{ route('company_profile', optional($application->job)->company_id) }}">{{ optional($application->job)->company->company_name }}</a>
                                            </td>
                                            <td>{{ date('Y-m-d H:i A', strtotime($application->application_date)) }}</td>
                                            <td>
                                                @if ($application->applicationStatuses->isNotEmpty())
                                                    {{ $application->applicationStatuses->last()->status }}
                                                @else
                                                    Pending
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('job_seeker.track_application').'?application_id='.$application->application_id}}" class="text-primary" style="cursor: pointer">
                                                    <i class="fa fa-eye-dropper"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a onclick="confirmDelete('{{ route('job_seeker.delete_application', $application->application_id) }}')" class="text-danger" style="cursor: pointer"><i class="fa fa-trash"></i></a>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

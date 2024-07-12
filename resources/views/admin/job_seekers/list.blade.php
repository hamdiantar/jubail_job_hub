@extends('admin.shared.app')

@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Job Seekers</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatables" class="display table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Experience Level</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($jobSeekers as $jobSeeker)
                                    <tr>
                                        <td>{{ $jobSeeker->job_seeker_id }}</td>
                                        <td>{{ $jobSeeker->fullname }}</td>
                                        <td>{{ $jobSeeker->email }}</td>
                                        <td>{{ $jobSeeker->phone_number }}</td>
                                        <td>{{ $jobSeeker->experience_level }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                @if(!$jobSeeker->is_blocked)
                                                    <form
                                                        action="{{ route('admin.job_seekers.block', $jobSeeker->job_seeker_id) }}"
                                                          method="POST" style="display: inline-block;"
                                                        onsubmit="event.preventDefault();
                                                        confirmAction('{{ route('admin.job_seekers.block',$jobSeeker->job_seeker_id) }}', 'block');">
                                                        @csrf
                                                        <button type="submit" class="btn btn-link btn-danger" data-toggle="tooltip" title="Block">
                                                            <i class="fa fa-lock"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <form
                                                        action="{{ route('admin.job_seekers.unblock', $jobSeeker->job_seeker_id) }}"
                                                        method="POST" style="display: inline-block;"
                                                        onsubmit="event.preventDefault();
                                                        confirmAction('{{ route('admin.job_seekers.unblock',$jobSeeker->job_seeker_id) }}', 'unblock');">
                                                        @csrf
                                                        <button type="submit" class="btn btn-link btn-success" data-toggle="tooltip" title="Unblock">
                                                            <i class="fa fa-unlock"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                                <a href="{{ route('admin.job_seekers.show', $jobSeeker->job_seeker_id) }}" class="btn btn-link btn-lg" data-toggle="tooltip" title="View">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </div>
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

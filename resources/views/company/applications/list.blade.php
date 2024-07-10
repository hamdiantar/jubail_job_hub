@extends('company.shared.app')

@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Job Applications [ <span class="badge badge-danger badge-count">{{ $applications->count() }}</span> ] | List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatables" class="display table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Job Title</th>
                                    <th>Applicant Name</th>
                                    <th>Application Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($applications as $index => $application)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $application->job->job_title }}</td>
                                        <td>{{ $application->jobSeeker->fullname }}</td>
                                        <td>{{ date('Y-m-d H:i A', strtotime($application->application_date)) }}</td>
                                        <td>{{ $application->applicationStatuses->last()->status ?? 'Pending' }}</td>
                                        <td>
                                            <a href="{{ route('company.applications.show', $application->application_id) }}" class="btn btn-link btn-lg" data-toggle="tooltip" title="View">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <button onclick="confirmDelete('{{ route('company.applications.destroy', $application->application_id) }}')" type="submit" class="btn btn-link btn-danger" data-toggle="tooltip" title="Remove">
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

@extends('admin.shared.app')

@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Applications Report</h4>
                    </div>
                    <div class="card-body">
                        <form  class="boxFilter" method="GET" action="{{ route('admin.reports.applications') }}">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="company_id">Company</label>
                                        <select class="form-control" name="company_id" id="company_id">
                                            <option value="">Select Company</option>
                                            @foreach(\App\Models\Company::all() as $company)
                                                <option value="{{ $company->company_id }}" {{ request('company_id') == $company->company_id ? 'selected' : '' }}>
                                                    {{ $company->company_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="job_id">Job</label>
                                        <select class="form-control" name="job_id" id="job_id">
                                            <option value="">Select Job</option>
                                            @foreach(\App\Models\JobAdvertisement::all() as $job)
                                                <option value="{{ $job->job_id }}" {{ request('job_id') == $job->job_id ? 'selected' : '' }}>
                                                    {{ $job->job_title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="">Select Status</option>
                                            @foreach(App\Constants\ApplicationStatus::getStatuses() as $status)
                                                <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>
                                                    {{ $status }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date_from">Date From</label>
                                        <input type="date" class="form-control" name="date_from" id="date_from" value="{{ request('date_from') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date_to">Date To</label>
                                        <input type="date" class="form-control" name="date_to" id="date_to" value="{{ request('date_to') }}">
                                    </div>
                                </div>
                            <div class="col-md-12">
                                <button style="float: right;" type="submit" class="btn btn-primary mt-5 ml-2">Filter <i class="fa fa-filter"></i></button>
                                <a href="{{route('admin.reports.applications')}}" style="float: right;" type="submit" class="btn btn-danger mt-5"> <i class="fa fa-trash"></i></a>
                            </div>
                            </div>

                        </form>
                        <div class="table-responsive mt-4">
                            <table id="datatables" class="display table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Company</th>
                                    <th>Job</th>
                                    <th>Job Seeker</th>
                                    <th>Status</th>
                                    <th>Date Applied</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($applications as $application)
                                    <tr>
                                        <td>{{ $application->application_id }}</td>
                                        <td>{{ optional($application->job)->company->company_name }}</td>
                                        <td>{{ optional($application->job)->job_title }}</td>
                                        <td>{{ optional($application->jobSeeker)->fullname }}</td>
                                        @if($application->applicationStatuses()->orderBy('application_status_id', 'desc')->first())

                                            <td>{{ $application->applicationStatuses()->orderBy('application_status_id', 'desc')->first()->status }}</td>
                                        @else
                                            <td>Pending</td>
                                        @endif
                                        <td>{{ date('Y-m-d H:i A', strtotime($application->application_date)) }}</td>
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

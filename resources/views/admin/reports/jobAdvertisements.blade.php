@extends('admin.shared.app')

@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Job Advertisements Report</h4>
                    </div>
                    <div class="card-body">
                        <form class="boxFilter" method="GET" action="{{ route('admin.reports.jobAdvertisements') }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="job_type">Company</label>

                                    <select name="company_id" class="form-control">
                                        <option value="">All Companies</option>
                                        @foreach(\App\Models\Company::all() as $company)
                                            <option value="{{ $company->company_id }}" {{ request('company_id') == $company->company_id ? 'selected' : '' }}>{{ $company->company_name }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="job_type">Job Type</label>
                                        <select class="form-control @error('job_type') is-invalid @enderror" id="job_type" name="job_type">
                                            <option value="">Select Job Type</option>
                                            <option value="Full-time" {{ old('job_type',  request('job_type') == 'Full-time' ? 'selected' : '') }}>Full-time</option>
                                            <option value="Part-time" {{ old('job_type',  request('job_type') == 'Part-time' ? 'selected' : '') }}>Part-time</option>
                                            <option value="Remote" {{ old('job_type',   request('job_type') == 'Remote' ? 'selected' : '') }}>Remote</option>
                                            <option value="Freelance" {{ old('job_type',  request('job_type') == 'Freelance' ? 'selected' : '') }}>Freelance</option>
                                            <option value="Contract" {{ old('job_type',  request('job_type') == 'Contract' ? 'selected' : '') }}>Contract</option>
                                            <option value="Temporary" {{ old('job_type',  request('job_type') == 'Temporary' ? 'selected' : '') }}>Temporary</option>
                                            <option value="Internship" {{ old('job_type',  request('job_type') == 'Internship' ? 'selected' : '') }}>Internship</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="posted_date_from">Posted Date From</label>
                                        <input type="date" class="form-control" name="posted_date_from" id="posted_date_from" value="{{ request('posted_date_from') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="posted_date_to">Posted Date To</label>
                                        <input type="date" class="form-control" name="posted_date_to" id="posted_date_to" value="{{ request('posted_date_to') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button style="float: right;" type="submit" class="btn btn-primary mt-5 ml-2">Filter <i class="fa fa-filter"></i></button>
                                    <a href="{{route('admin.reports.jobAdvertisements')}}" style="float: right;" type="submit" class="btn btn-danger mt-5"> <i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive mt-4">
                            <table id="datatables" class="display table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Company</th>
                                    <th>Job Title</th>
                                    <th>Job Type</th>
                                    <th>Posted Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($jobAdvertisements as $jobAdvertisement)
                                    <tr>
                                        <td>{{ $jobAdvertisement->job_id }}</td>
                                        <td>{{ $jobAdvertisement->company->company_name }}</td>
                                        <td>{{ $jobAdvertisement->job_title }}</td>
                                        <td>{{ $jobAdvertisement->job_type }}</td>
                                        <td>{{ date('Y-m-d H:i A', strtotime($jobAdvertisement->posted_date)) }}</td>
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

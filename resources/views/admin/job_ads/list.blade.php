@extends('admin.shared.app')

@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Job Advertisements</h4>
                        <div class="float-right">
                            <form action="{{ route('admin.job_ads.index') }}" method="GET">
                                <select name="company_id" class="form-control" onchange="this.form.submit()">
                                    <option value="">Select Company</option>
                                    @foreach($companies as $company)
                                        <option value="{{ $company->company_id }}" {{ $companyId == $company->company_id ? 'selected' : '' }}>{{ $company->company_name }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatables" class="display table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Company</th>
                                    <th>Job Title</th>
                                    <th>Published</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($jobs as $job)
                                    <tr>
                                        <td>{{ $job->job_id }}</td>
                                        <td>{{ $job->company->company_name }}</td>
                                        <td><a href="{{ route('job_details', $job->job_id) }}" target="_blank">{{ $job->job_title }}</a></td>
                                        <td>{{ $job->status ? 'Published' : 'Not Published' }}</td>
                                        <td>
                                            <div class="form-button-action">
{{--                                                @if(!$job->status)--}}
                                                    <form action="{{ route('admin.job_ads.accept', $job->job_id) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-link btn-success" data-toggle="tooltip" title="Accept and Publish">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                    </form>
{{--                                                @endif--}}
{{--                                                @if($job->status)--}}
                                                    <form action="{{ route('admin.job_ads.reject', $job->job_id) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-link btn-danger" data-toggle="tooltip" title="Reject and Unpublish">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </form>
{{--                                                @endif--}}
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

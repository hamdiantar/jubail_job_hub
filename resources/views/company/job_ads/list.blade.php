@extends('company.shared.app')

@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Job Advertisements [ <span class="badge badge-danger badge-count">{{ $jobAds->count() }}</span> ] | List</h4>
                        @if($jobAds->count() >= 5 && count($company->subscriptions) == 0)
                        <div class="alert alert-warning mt-3">
                            You have reached the limit of free job advertisements. Please <a href="{{ route('company.subscription.index') }}">subscribe</a> to add more job advertisements.
                        </div>
                        @else
                        <button onclick="window.location.href='{{ route('company.job_ads.create') }}'" class="btn btn-icon btn-rounded btn-primary float-right">
                            <i class="fa fa-plus"></i>
                        </button>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatables" class="display table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Posted Date</th>
                                    <th>Published?</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($jobAds as $jobAd)
                                    <tr>
                                        <td>{{ $jobAd->job_id }}</td>
                                        <td>{{ $jobAd->job_title }}</td>
                                        <td>{{ $jobAd->posted_date }}</td>
                                        <td>
                                            @if($jobAd->is_published)
                                                <span class="badge badge-success">Yes</span>
                                            @else
                                                <span class="badge badge-danger">No</span>
                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{ route('company.job_ads.edit', $jobAd->job_id) }}" class="btn btn-link btn-lg" data-toggle="tooltip" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button onclick="confirmDelete('{{ route('company.job_ads.destroy', $jobAd->job_id) }}')" type="submit" class="btn btn-link btn-danger" data-toggle="tooltip" title="Remove">
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

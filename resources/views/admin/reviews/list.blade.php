@extends('admin.shared.app')

@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Reviews</h4>
                    </div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('admin.reviews.index') }}" class="mb-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <select name="company_id" class="form-control">
                                        <option value="">All Companies</option>
                                        @foreach($companies as $company)
                                            <option value="{{ $company->company_id }}" {{ request('company_id') == $company->company_id ? 'selected' : '' }}>{{ $company->company_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select name="job_seeker_id" class="form-control">
                                        <option value="">All Job Seekers</option>
                                        @foreach($jobSeekers as $jobSeeker)
                                            <option value="{{ $jobSeeker->job_seeker_id }}" {{ request('job_seeker_id') == $jobSeeker->job_seeker_id ? 'selected' : '' }}>{{ $jobSeeker->username }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                    <a href="{{route('admin.reviews.index')}}" class="btn btn-danger">clear</a>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table id="datatables" class="display table table-bordered table-hover">                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Company</th>
                                    <th>Job Seeker</th>
                                    <th>Review Text</th>
                                    <th>Rating</th>
                                    <th>Review Date</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reviews as $review)
                                    <tr>
                                        <td>{{ $review->review_id }}</td>
                                        <td>{{ $review->company ? $review->company->company_name : 'N/A' }}</td>
                                        <td>{{ $review->jobSeeker ? $review->jobSeeker->fullname : 'N/A' }}</td>
                                        <td>{{ $review->review_text }}</td>
                                        <td>
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $review->rating)
                                                    <i class="fa fa-star text-warning"></i>
                                                @else
                                                    <i class="fa fa-star text-dark"></i>
                                                @endif
                                            @endfor
                                        </td>
                                        <td>{{ date('Y-m-d H:i A', strtotime($review->review_date_time)) }}</td>
                                        <td>
                                            <button onclick="confirmDelete('{{ route('admin.reviews.destroy', $review->review_id) }}')" type="submit" class="btn btn-link btn-danger" data-toggle="tooltip" title="Delete Review">
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

@extends('admin.shared.app')

@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Reviews Report</h4>
                    </div>
                    <div class="card-body">
                        <form class="boxFilter" method="GET" action="{{ route('admin.reports.reviews') }}">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="company_id">Company</label>
                                        <select class="form-control" name="company_id" id="company_id">
                                            <option value="">Select Company</option>
                                            @foreach($companies as $company)
                                                <option value="{{ $company->company_id }}" {{ request('company_id') == $company->company_id ? 'selected' : '' }}>
                                                    {{ $company->company_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="rating">Rating</label>
                                        <input type="number" min="1" max="5" class="form-control" name="rating" id="rating" value="{{ request('rating') }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="review_date_from">Review Date From</label>
                                        <input type="date" class="form-control" name="review_date_from" id="review_date_from" value="{{ request('review_date_from') }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="review_date_to">Review Date To</label>
                                        <input type="date" class="form-control" name="review_date_to" id="review_date_to" value="{{ request('review_date_to') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button style="float: right;" type="submit" class="btn btn-primary mt-5 ml-2">Filter <i class="fa fa-filter"></i></button>
                                    <a href="{{ route('admin.reports.reviews') }}" style="float: right;" type="submit" class="btn btn-danger mt-5"> <i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </form>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="alert alert-success">
                                    <h5>Best Company</h5>
                                    <p>{{ $bestCompany->company_name }} (Average Rating:
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= round($bestCompany->average_rating))
                                                <i class="fa fa-star text-warning"></i>
                                            @else
                                                <i class="fa fa-star text-dark"></i>
                                            @endif
                                        @endfor
                                        {{ number_format($bestCompany->average_rating, 2) }}
                                        )</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="alert alert-danger">
                                    <h5>Worst Company</h5>
                                    <p>{{ $worstCompany->company_name }} (Average Rating:
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= round($worstCompany->average_rating))
                                                <i class="fa fa-star text-warning"></i>
                                            @else
                                                <i class="fa fa-star text-dark"></i>
                                            @endif
                                        @endfor
                                        {{ number_format($worstCompany->average_rating, 2) }}
                                        )</p>
                                </div>
                            </div>
                        </div>


                        <div class="table-responsive mt-4">
                            <table id="datatables" class="display table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Company</th>
                                    <th>Job Seeker</th>
                                    <th>Review Text</th>
                                    <th>Rating</th>
                                    <th>Review Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reviews as $review)
                                    <tr>
                                        <td>{{ $review->review_id }}</td>
                                        <td>{{ $review->company->company_name }}</td>
                                        <td>{{ $review->jobSeeker->fullname }}</td>
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

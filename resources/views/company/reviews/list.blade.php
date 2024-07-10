@extends('company.shared.app')

@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Reviews</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatables" class="display table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Job Seeker</th>
                                    <th>Company</th>
                                    <th>Review Text</th>
                                    <th>Rating</th>
                                    <th>Review Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reviews as $review)
                                    <tr>
                                        <td>{{ $review->review_id }}</td>
                                        <td>{{ $review->jobSeeker->fullname }}</td>
                                        <td>{{ $review->company->company_name }}</td>
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
                                        <td>{{ $review->date_time }}</td>
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

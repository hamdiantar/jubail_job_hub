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
                    <div style=" border-top: none;" class="comment-form">
                        <h2 class="contact-title text-center">My Reviews</h2>
                        <hr class="mb-4">
                        <section class="section-top-border">
                            <div class="table-responsive">
                                <table id="" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Company</th>
                                        <th>Review</th>
                                        <th>Rating</th>
                                        <th>DateTime</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($jobSeeker->reviews as $index => $review)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <a class="text-primary" href="{{route('company_profile', optional($review->company)->company_id)}}">{{optional($review->company)->company_name}}</a>
                                            </td>
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
                                            <td>
                                                <a onclick="confirmDelete('{{ route('job_seeker.delete_review', $review->review_id) }}')" class="text-danger" style="cursor: pointer"><i class="fa fa-trash"></i></a>
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



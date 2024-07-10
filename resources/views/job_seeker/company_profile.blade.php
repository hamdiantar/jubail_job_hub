@extends('job_seeker.shared.app')

@section('content')
    <section class="blog_area single-post-area section-padding section-padding2">
        <div class="container">
            <div class="row">
                @include('job_seeker.shared.messages')
                <div class="col-lg-9 posts-list">
                    <div class="single-post">
{{--                        <div class="feature-img text-center">--}}
{{--                            <img class="img-fluid comLogo" src="{{$company->image_path}}" alt="">--}}
{{--                            <h2>{{$company->company_name}}</h2>--}}
{{--                            <ul class="blog-info-link mt-4 mb-4 d-flex justify-content-center">--}}
{{--                                <li><a href="#"><i class="fa fa-user"></i> {{$company->fullname}}</a></li>--}}
{{--                                <li><a href="#"><i class="fa fa-comments"></i> {{count($company->reviews)}}</a></li>--}}
{{--                                <li><a href="#"><i class="fas fa-calendar"></i> {{$company->founded_at}}</a></li>--}}
{{--                                <li><a href="#"><i class="fas fa-map-marker"></i> Jubail</a></li>--}}
{{--                                <li><a href="#"><i class="fas fa-info"></i> {{$company->industry}}</a></li>--}}
{{--                                <li><a href="#"><i class="fas fa-heart"></i> {{$company->company_size}}</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                        <div class="blog_details">
                            <div class="quote-wrapper">
                                <h4>About Company :</h4>
                                <div class="quotes">
                                    {!! $company->about_company !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comments-area">
                        <h4>{{count($company->reviews)}} Reviews</h4>

                            @foreach ($company->reviews as $review)
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                           <i class="fa fa-user-circle"></i>
                                        </div>
                                        <div class="desc">
                                            <p class="comment">
                                                {{ $review->review_text }}
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <h5>
                                                        <a href="#">By : {{ optional($review->jobSeeker)->fullname }}</a>
                                                    </h5>
                                                    <p class="date">{{ $review->date_time }} </p>
                                                </div>
                                                <div class="reply-btn">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $review->rating)
                                                            <i class="fa fa-star text-warning"></i>
                                                        @else
                                                            <i class="fa fa-star text-dark"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                    </div>
                    <div class="comment-form">
                        <h4>Leave a review</h4>
                        <p class="mb-4">Please leave a fair review based on your experience with the company.</p>
                        <form method="post" class="form-contact comment_form" action="{{route('job_seeker.add_review')}}" id="commentForm">
                            @csrf
                            <input type="hidden" name="company_id" value="{{$company->company_id}}">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea required class="form-control w-100" name="review_text" id="review_text" cols="4" rows="4" placeholder="Write Comment"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select class="form-control" name="rating" required>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="button button-contactForm btn_1 boxed-btn">submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3">

                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget single_sidebar_widget2 post_category_widget footer-bg">
                            <div class="text-center">
                                <img style="height: 100px !important;;width: 100px !important;" class="img-fluid comLogo" src="{{$company->image_path}}" alt="">
                            </div>
                            <h4 class="widget_title text-white text-center">{{$company->company_name}}</h4>
                            <ul class="list cat-list social-icons">
                                <li class="newLi" ><a class="text-white" href="#"><i class="fa mr-2 fa-user"></i> Owner :{{$company->fullname}}</a></li>
                                <li class="newLi"><a class="text-white" href="#"><i class="fa mr-2 fa-comments"></i> Reviews :{{count($company->reviews)}}</a></li>
                                <li class="newLi"><a class="text-white" href="#"><i class="fas mr-2 fa-calendar"></i> Founded At :{{$company->founded_at}}</a></li>
                                <li class="newLi"><a class="text-white" href="#"><i class="fas mr-2 fa-map-marker"></i>Location: Jubail</a></li>
                                <li class="newLi"><a class="text-white" href="#"><i class="fas mr-2 fa-industry"></i> Industry :{{$company->industry}}</a></li>
                                <li class="newLi"><a class="text-white" href="#"><i class="fas mr-2 fa-info"></i> Size :{{$company->company_size}}</a></li>
                            </ul>
                        </aside>

                        <aside class="single_sidebar_widget single_sidebar_widget2 post_category_widget footer-bg">
                            <h4 class="widget_title text-white text-center">Social Links</h4>
                            <ul class="list cat-list social-icons">
                                <li class="d-flex justify-content-between">
                                    <a href="{{$company->website_url}}" target="_blank" class="text-white soFont"><i class="fa fa-link"></i></a>
                                    <a href="{{$company->linkedin_url}}" target="_blank" class="text-white soFont"><i class="fab fa-linkedin"></i></a>
                                    <a href="{{$company->twitter_url}}" target="_blank" class="text-white soFont"><i class="fab fa-twitter"></i></a>
                                </li>
                            </ul>
                        </aside>
                        <aside class="single_sidebar_widget single_sidebar_widget2 post_category_widget footer-bg">
                            <h4 class="widget_title text-white text-center">Contact Info</h4>
                            <ul class="list cat-list social-icons">
                                <li class="text-white"><i class="fa fa-phone mr-2"></i> {{$company->phone_number_1}}</li>
                                @if($company->phone_number_2)
                                    <li class="text-white"><i class="fa fa-phone mr-2"></i> {{$company->phone_number_2}}</li>
                                @endif
                                <li class="text-white"><i class="fas fa-inbox mr-2"></i> {{$company->email}}</li>
                            </ul>
                        </aside>
                        <aside class="single_sidebar_widget single_sidebar_widget2 popular_post_widget">
                            <h3 class="widget_title text-white text-center">Recent Jobs</h3>
                            <div class="media post_item">
                                <img src="{{asset('assets/img/post/post_1.png')}}" alt="post">
                                <div class="media-body">
                                    <a href="#">
                                        <h3 class="text-white">Hr Manager</h3>
                                    </a>
                                    <p class="text-white">January 12, 2019</p>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
{{--                <img src="{{asset('lo.png')}}" alt="">--}}
                <p>Jubail Job HUB</p>
            </div>
        </div>
    </div>
</div>
<header>
    <!-- Header Start -->
    <div class="header-area header-transparrent">
        <div class="headder-top header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-2">
                        <div class="logo">
                            <img style="    margin-bottom: 10px;" height="73px" src="{{asset('logo.png')}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="menu-wrapper">
                            <!-- Main-menu -->
                            <div class="main-menu">
                                <nav class="d-none d-lg-block">
                                    <ul id="navigation">
                                        <li><a class="{{request()->is('/') ? 'active2' : ''}}" href="{{route('job_seeker.home')}}">Home</a></li>
                                        <li><a class="{{request()->is('job_ads') ? 'active2' : ''}}" href="{{route('job_seeker.job_ads')}}">Find Jobs</a></li>
                                        <li><a class="{{request()->is('about_us') ? 'active2' : ''}}" href="{{route('about_us')}}">About Us</a></li>
                                        <li><a class="{{request()->is('have_company') ? 'active2' : ''}}" href="{{route('have_company')}}">Have A Company?</a></li>
                                        <li><a class="{{request()->is('contact_us') ? 'active2' : ''}}" href="{{route('contact_us')}}">Contact Us</a></li>
{{--                                        <li><a href="#">Page</a>--}}
{{--                                            <ul class="submenu">--}}
{{--                                                <li><a href="#">Blog</a></li>--}}
{{--                                                <li><a href="#">Blog Details</a></li>--}}
{{--                                                <li><a href="#">Elements</a></li>--}}
{{--                                                <li><a href="#">job Details</a></li>--}}
{{--                                            </ul>--}}
{{--                                        </li>--}}
                                    </ul>
                                </nav>
                            </div>
                            <!-- Header-btn -->
                            <div class="header-btn d-none f-right d-lg-block">
                                @auth('jobseeker')
                                    <a href="{{route('job_seeker.job_alerts')}}" class="notification2"><i class="fa fa-bell text-white"></i> <span class="badge badge-danger">
                                               {{ auth('jobseeker')->user()->jobAlerts()->where('is_read', false)->count() }}
                                        </span></a>
                                    <a href="{{route('job_seeker.profile')}}" class="btn head-btn1 authBTN"><i class="fa fa-user"></i> My Profile</a>
                                    <a id="logout-link" style="color: red;" href="#" class="btn head-btn2 authBTN">
                                        <i class="fa fa-power-off"></i> Logout</a>
                                @else
{{--                                    <a href="{{route('job_seeker.register')}}" class="btn head-btn1 aHeader">Register</a>--}}
{{--                                    <a href="{{route('job_seeker.login')}}" class="btn head-btn2 aHeader">Login</a>--}}
                                    <a href="#" class="btn head-btn1 aHeader" data-toggle="modal" data-target="#authModalRegister">Register</a>
                                    <a href="#" class="btn head-btn2 aHeader" data-toggle="modal" data-target="#authModalLogin">Login</a>
                                @endauth


                            </div>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>

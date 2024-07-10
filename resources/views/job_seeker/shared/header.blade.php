<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="{{asset('logo.png')}}" alt="">
{{--                <p>Jubail Job HUB</p>--}}
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
                        <!-- Logo -->
                        <div class="logo">
                            <img style="    margin-bottom: 10px;" height="73px" src="{{asset('logo.png')}}" alt="">
{{--                            <h3 class="mainLogoH">Jubail Job HUB</h3>--}}
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="menu-wrapper">
                            <!-- Main-menu -->
                            <div class="main-menu">
                                <nav class="d-none d-lg-block">
                                    <ul id="navigation">
                                        <li><a href="{{route('job_seeker.home')}}">Home</a></li>
                                        <li><a href="{{route('job_seeker.job_ads')}}">Find a Jobs</a></li>
                                        <li><a href="#haveCompany">Have A Company ?</a></li>
                                        <li><a href="#">Page</a>
                                            <ul class="submenu">
                                                <li><a href="#">Blog</a></li>
                                                <li><a href="#">Blog Details</a></li>
                                                <li><a href="#">Elements</a></li>
                                                <li><a href="#">job Details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- Header-btn -->
                            <div class="header-btn d-none f-right d-lg-block">
                                @auth('jobseeker')
                                    <a href="{{route('job_seeker.profile')}}" class="btn head-btn1 authBTN">
                                        <i class="fa fa-user"></i> My Profile</a>
                                    <a id="logout-link" style="color: red;" href="{{route('job_seeker.login')}}" class="btn head-btn2 authBTN">    <i class="fa fa-power-off"></i> Logout</a>
                                @else
                                    <a href="{{route('job_seeker.register')}}" class="btn head-btn1">Register</a>
                                    <a href="{{route('job_seeker.login')}}" class="btn head-btn2">Login</a>

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

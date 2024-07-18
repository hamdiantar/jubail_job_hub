<div class="sidebar-background"></div>
<div class="sidebar-wrapper scrollbar-inner">
    <div class="sidebar-content">
        <div class="user">
            <div class="avatar-sm float-left mr-2">
                <img src="{{ Auth::guard('company')->user()->image_path }}" alt="..." class="avatar-img rounded-circle">
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                    <span>{{ Auth::guard('company')->user()->company_name }}
                        <span class="user-level">Joined At : {{ Auth::guard('company')->user()->joined_at }}</span>
{{--                        <span class="caret"></span>--}}
                    </span>
                </a>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item {{ request()->is('company/dashboard*') ? 'active' : '' }}">
                <a href="{{route('company.dashboard')}}">
                    <i class="fas fa-cogs"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-item {{ request()->is('company/my_subscription*') ? 'active' : '' }}">
                <a href="{{route('company.my_subscription')}}">
                    <i class="fas fa-file-code"></i>
                    <p>My Subscriptions</p>
                </a>
            </li>

            <li class="nav-item {{ request()->is('company/job_ads*') ? 'active' : '' }}">
            <a href="{{route('company.job_ads.index')}}">
                    <i class="fas fa-bullhorn"></i>
                    <p>Job Advertisements</p>
                </a>
            </li>

            <li class="nav-item {{ request()->is('company/applications*') ? 'active' : '' }}">
                <a href="{{route('company.applications.index')}}">
                    <i class="fas fa-file"></i>
                    <p>Applications</p>
                </a>
            </li>

            <li class="nav-item {{ request()->is('company/reviews*') ? 'active' : '' }}">
                <a href="{{route('company.reviews.index')}}">
                    <i class="fas fa-comment-dots"></i>
                    <p>Reviews</p>
                </a>
            </li>
            <li class="nav-item">
                <a id="logout-link2" href="#">
                    <i class="fas fa-power-off"></i>
                    <p>Logout</p>
                </a>
            </li>

{{--            <li class="nav-item">--}}
{{--                <a data-toggle="collapse" href="#base" class="collapsed" aria-expanded="false">--}}
{{--                    <i class="fas fa-file-contract"></i>--}}
{{--                    <p>Reports</p>--}}
{{--                    <span class="caret"></span>--}}
{{--                </a>--}}
{{--                <div class="collapse" id="base" style="">--}}
{{--                    <ul class="nav nav-collapse">--}}
{{--                        <li>--}}
{{--                            <a href="#">--}}
{{--                                <span class="sub-item">Reports 1</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#">--}}
{{--                                <span class="sub-item">Reports 2</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                        <li>--}}
{{--                            <a href="#">--}}
{{--                                <span class="sub-item">Reports 3</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}
        </ul>
    </div>
</div>

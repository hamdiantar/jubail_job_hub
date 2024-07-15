<div class="sidebar-background"></div>
<div class="sidebar-wrapper scrollbar-inner">
    <div class="sidebar-content">
        <div class="user">
            <div class="avatar-sm float-left mr-2">
                <img src="{{asset('admin/img/profile.png')}}" alt="..." class="avatar-img rounded-circle">
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                    <span>{{ Auth::guard('admin')->user()->fullname }}<span class="user-level">Administrator</span><span class="caret"></span></span>
                </a>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
                <a href="{{route('admin.dashboard')}}">
                    <i class="fas fa-cogs"></i>
                    <p>Dashboard</p>
{{--                    <span class="badge badge-count">5</span>--}}
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/managers*') ? 'active' : '' }}">
                <a href="{{route('admin.managers.index')}}">
                    <i class="fas fa-user-secret"></i>
                    <p>Admins</p>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/job_categories*') ? 'active' : '' }}">
                <a href="{{route('admin.job_categories.index')}}">
                    <i class="fas fa-memory"></i>
                    <p>Job Categories</p>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/packages*') ? 'active' : '' }}">
                <a href="{{route('admin.packages.index')}}">
                    <i class="fas fa-toolbox"></i>
                    <p>Packages</p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/companies*') ? 'active' : '' }}">
                <a href="{{route('admin.companies.index')}}">
                    <i class="fas fa-home"></i>
                    <p>Companies</p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/subscriptions*') ? 'active' : '' }}">
                <a href="{{route('admin.subscriptions.index')}}">
                    <i class="far fa-money-bill-alt"></i>
                    <p>Subscriptions</p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/job_ads*') ? 'active' : '' }}">
                <a href="{{route('admin.job_ads.index')}}">
                    <i class="fas fa-bullhorn"></i>
                    <p>Job Advertisements</p>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/job_seekers*') ? 'active' : '' }}">
                <a href="{{route('admin.job_seekers.index')}}">
                    <i class="fas fa-user-tie"></i>
                    <p>Job Seekers</p>
                </a>
            </li>


            <li class="nav-item {{ request()->is('admin/reviews*') ? 'active' : '' }}">
                <a href="{{route('admin.reviews.index')}}">
                    <i class="fas fa-comment-dots"></i>
                    <p>Reviews</p>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/reports*') ? 'submenu' : '' }}">
                <a data-toggle="collapse" href="#base" class="{{ request()->is('admin/reports*') ? 'subMenuActive' : 'collapsed' }} " aria-expanded="false">
                    <i class="fas fa-file-contract"></i>
                    <p>Reports</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse {{ request()->is('admin/reports*') ? 'show' : '' }}" id="base" style="">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="{{route('admin.reports.jobAdvertisements')}}">
                                <span class="sub-item {{ request()->is('admin/reports/jobAdvertisements') ? 'subActive' : '' }}">Job Ads Summary</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.reports.applications')}}">
                                <span class="sub-item {{ request()->is('admin/reports/applications') ? 'subActive' : '' }}">Applications Summary</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.reports.reviews')}}">
                                <span class="sub-item {{ request()->is('admin/reports/reviews') ? 'subActive' : '' }}">Performance Report</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>

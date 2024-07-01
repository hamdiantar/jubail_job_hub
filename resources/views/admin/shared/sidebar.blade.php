<div class="sidebar-background"></div>
<div class="sidebar-wrapper scrollbar-inner">
    <div class="sidebar-content">
        <div class="user">
            <div class="avatar-sm float-left mr-2">
                <img src="{{asset('admin/img/profile.jpg')}}" alt="..." class="avatar-img rounded-circle">
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                    <span>admin<span class="user-level">Administrator</span><span class="caret"></span></span>
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
                    <p>Managers</p>
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
            <li class="nav-item">
                <a href="#">
                    <i class="far fa-money-bill-alt"></i>
                    <p>Subscriptions</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="fas fa-home"></i>
                    <p>Companies</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#">
                    <i class="fas fa-user-tie"></i>
                    <p>Job Seekers</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#">
                    <i class="fas fa-bullhorn"></i>
                    <p>Job Advertisements</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#">
                    <i class="fas fa-comment-dots"></i>
                    <p>Reviews</p>
                </a>
            </li>

            <li class="nav-item">
                <a data-toggle="collapse" href="#base" class="collapsed" aria-expanded="false">
                    <i class="fas fa-file-contract"></i>
                    <p>Reports</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="base" style="">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="#">
                                <span class="sub-item">Reports 1</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="sub-item">Reports 2</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span class="sub-item">Reports 3</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>

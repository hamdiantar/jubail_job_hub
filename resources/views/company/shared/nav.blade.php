<nav class="navbar navbar-header navbar-expand-lg">
    <div class="container-fluid">
        <form class="navbar-left navbar-form nav-search mr-md-3" action="">
            <div class="input-group">
                <input type="text" placeholder="Search ..." class="form-control">
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="la la-search search-icon"></i>
                    </span>
                </div>
            </div>
        </form>
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item dropdown hidden-caret">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="la la-bell"></i>
                    <span class="notification">3</span>
                </a>
                <ul class="dropdown-menu notif-box" aria-labelledby="navbarDropdown">
                    <li>
                        <div class="dropdown-title">You have 4 new notification</div>
                    </li>
                    <li>
                        <div class="notif-center">
                            <a href="#">
                                <div class="notif-icon notif-primary"> <i class="la la-user-plus"></i> </div>
                                <div class="notif-content">
                                    <span class="block">New user registered</span>
                                    <span class="time">5 minutes ago</span>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <a class="see-all" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="la la-angle-right"></i> </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                    <img src="{{ asset('admin/img/admin.png') }}" alt="user-img" width="36" class="img-circle">
                    <span>{{ Auth::guard('company')->user()->firstName }}</span>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li>
                        <div class="user-box">
                            <div class="u-img"><img src="{{ Auth::guard('company')->user()->image_path }}" alt="user"></div>
                            <div class="u-text">
                                <h4>{{ Auth::guard('admin')->user()->firstName }}</h4>
                                <p class="text-muted">{{ Auth::guard('admin')->user()->email }}</p>
                                <a href="#" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                            </div>
                        </div>
                    </li>
                    <div class="dropdown-divider"></div>
                    <a onclick="confirmLogout(event);" class="dropdown-item" href="#"><i class="fa fa-power-off"></i> Logout <i class="la la-sign-out"></i></a>
                    <form action="{{ route('admin.logout') }}" method="POST" id="logoutFormAdmin">
                        @csrf
                    </form>
                </ul>
            </li>
        </ul>
    </div>
</nav>


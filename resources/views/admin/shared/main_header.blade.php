<div class="logo-header">
    <a href="#" class="logo">
        <img style="    background: #112546;width: 100%;
    height: 68px;
    margin-top: 10px;" src="{{asset('logo.png')}}">
    </a>
    <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
            <i class="fa fa-bars"></i>
        </span>
    </button>
    <button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
    <div class="navbar-minimize">
        <button class="btn btn-minimize btn-rounded">
            <i class="fa fa-bars"></i>
        </button>
    </div>
</div>
<nav class="navbar navbar-header navbar-expand-lg">
    <div class="container-fluid">
        <div class="collapse" id="search-nav">
            <form class="navbar-left navbar-form nav-search mr-md-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="submit" class="btn btn-search pr-1">
                            <i class="fa fa-search search-icon"></i>
                        </button>
                    </div>
                    <input type="text" placeholder="Search ..." class="form-control">
                </div>
            </form>
        </div>
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item toggle-nav-search hidden-caret">
                <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                    <i class="fa fa-search"></i>
                </a>
            </li>
            @php
                $todayCompanies = \App\Models\Company::whereDate('joined_at', \Illuminate\Support\Carbon::today())->get();
            @endphp

            <li class="nav-item dropdown hidden-caret">
                <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bell"></i>
                    <span class="notification">{{ count($todayCompanies) }}</span>
                </a>
                <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                    <li>
                        <div class="dropdown-title">You have {{ count($todayCompanies) }} new notification(s)</div>
                    </li>
                    <li>
                        <div class="notif-scroll scrollbar-outer">
                            <div class="notif-center">
                                @foreach ($todayCompanies as $company)
                                    <a href="{{ route('admin.companies.show', $company->company_id) }}">
                                        <div class="notif-icon notif-primary"> <i class="fa fa-building"></i> </div>
                                        <div class="notif-content">
                                <span class="block">
                                    {{ $company->company_name }} registered
                                </span>
                                            <span class="time">{{ $company->joined_at }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li>
                        <a class="see-all" href="{{ route('admin.companies.index') }}">See all notifications<i class="fa fa-angle-right"></i> </a>
                    </li>
                </ul>
            </li>

            <li style="margin-right: 22px;" class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                        <img src="{{ asset('admin/img/profile.png') }}" alt="..." class="avatar-img rounded-circle">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <li>
                        <div class="user-box">
                            <div class="avatar-lg"><img src="{{ asset('admin/img/profile.png') }}" alt="image profile" class="avatar-img rounded"></div>
                            <div class="u-text">
                                <h4>{{ Auth::guard('admin')->user()->fullname }}</h4>
                                <p class="text-muted">{{ Auth::guard('admin')->user()->email }}</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('admin.account.view') }}"><i class="flaticon-user"></i> My Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" id="logout-link"><i class="flaticon-log"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<script>
    document.getElementById('logout-link').addEventListener('click', function (event) {
        event.preventDefault();
        if (confirm('Are you sure you want to log out?')) {
            document.getElementById('logout-form').submit();
        }
    });

</script>
<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
    @csrf
</form>


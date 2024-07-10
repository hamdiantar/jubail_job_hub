<div class="blog_right_sidebar">
    @php
    if (isset($jobSeeker)) {

    } else {
        $jobSeeker = auth('jobseeker')->user();
    }
 @endphp
    <aside class="single_sidebar_widget post_category_widget sinfCustom">
        <div class="text-center pt-4">
            <i class="fa fa-user-circle text-white font-weight-bold fauser"></i>
        </div>
        <p class="widget_title text-white widget_title2">Welcome : {{$jobSeeker->fullname}}</p>
        <ul class="list cat-list">
            <li class="{{ request()->is('job_seeker/profile') ? 'active' : '' }}">
                <a href="{{ route('job_seeker.profile') }}" class="d-flex align-items-center">
                    <p style="    margin-top: 11px;" class="text-white"><i class="fa fa-user mr-2"></i>Update Profile</p>
                </a>
            </li>
            <li class="{{ request()->is('job_seeker/change_password') ? 'active' : '' }}">
                <a href="{{ route('job_seeker.change_password') }}" class="d-flex align-items-center">
                    <p class="text-white"><i class="fa fa-key mr-2"></i>Change Password</p>
                </a>
            </li>
            <li class="{{ request()->is('job_seeker/show_cv') ? 'active' : '' }}">
                <a href="{{ route('job_seeker.show_cv') }}" class="d-flex align-items-center">
                    <p class="text-white"><i class="fa fa-file-alt mr-2"></i>My CV</p>
                </a>
            </li>
            <li class="{{ request()->is('job_seeker/job_alerts') ? 'active' : '' }}">
                <a href="{{ route('job_seeker.job_alerts') }}" class="d-flex align-items-center">
                    <p class="text-white"><i class="fa fa-bell mr-2"></i>Job Alerts</p>
                </a>
            </li>
            <li class="{{ request()->is('job_seeker/my_reviews') ? 'active' : '' }}">
                <a href="{{ route('job_seeker.my_reviews') }}" class="d-flex align-items-center">
                    <p class="text-white"><i class="fa fa-star mr-2"></i>My Reviews</p>
                </a>
            </li>
            <li class="{{ request()->is('job_seeker/my_applications') ? 'active' : '' }}">
                <a href="{{ route('job_seeker.my_applications') }}" class="d-flex align-items-center">
                    <p class="text-white"><i class="fa fa-file mr-2"></i>My Applications</p>
                </a>
            </li>
            <li class="{{ request()->is('track') ? 'active' : '' }}">
                <a href="{{ route('job_seeker.profile') }}" class="d-flex align-items-center">
                    <p class="text-white"><i class="fa fa-search mr-2"></i>Track Application</p>
                </a>
            </li>
            <li style="    padding-bottom: 232px" class="pb-50">
                <a href="{{ route('job_seeker.logout') }}" class="d-flex align-items-center">
                    <p class="text-white"><i class="fa fa-power-off mr-2"></i>Logout</p>
                </a>
            </li>
        </ul>
    </aside>
</div>

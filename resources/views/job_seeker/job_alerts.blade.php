@extends('job_seeker.shared.app')

@section('content')
    <section class="blog_area single-post-area section-padding section-padding1">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('job_seeker.shared.sidebar')
                </div>
                <div class="col-lg-8 text-center posts-list">
                    <div style="    border-top: none;" class="comment-form">
                        <h2 class="contact-title text-center">Job Alerts</h2>
                        <hr class="mb-4">
                        <p class="mt-4 mb-4 m-auto">
                            Manage your job alerts by selecting job categories you are interested in.
                        </p>

                        <form class="mt-5 mb-5" action="{{ route('job_seeker.job_alerts.update') }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row col-md-12 justify-content-center">
                                <div class="form-group col-md-12">
                                    <label for="job_categories">Select Job Categories:</label>
                                    <select class="form-control select2-multi" name="job_categories[]" multiple="multiple" style="width: 100%;">
                                        @foreach($jobCategories as $category)
                                            <option value="{{ $category->job_category_id }}" {{ $jobSeeker->jobSeekerJobCategories->contains($category->job_category_id) ? 'selected' : '' }}>{{ $category->job_category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" class="button button-contactForm boxed-btn">Update Job Alerts</button>
                                </div>
                            </div>
                        </form>

                        <div class="alert-list mt-5">
                            <h4>Your Notifications</h4>
                            <ul class="list-group">
                                @foreach($jobAlerts as $alert)
                                    <li class="list-group-item {{ $alert->is_read ? '' : 'reading' }}">

                                        <div class="d-flex justify-content-between">
                                            <p>
                                                <a class="text-primary" target="_blank" href="{{route('job_details', optional($alert->job)->job_id)}}">{{ optional($alert->job)->job_title }}</a></p>
                                            <p>{{ date('Y-m-d', strtotime($alert->notification_date)) }} at {{date('H:i A', strtotime($alert->notification_time))  }}</p>
                                            @if(!$alert->is_read)
                                                <form action="{{ route('job_seeker.job_alerts.read', $alert->job_alert_id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="makeReade">Mark as Read</button>
                                                </form>
                                            @endif

                                            <form action="{{ route('job_seeker.job_alerts.destroy', $alert->job_alert_id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class=" btn-sm btn-danger cursor"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('.select2-multi').select2({
                placeholder: "Select job categories",
                allowClear: true
            });
        });
    </script>
@endpush

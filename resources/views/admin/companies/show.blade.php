@extends('admin.shared.app')

@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $company->company_name }} Details</h4>

                        <button onclick="window.location.href='{{ route('admin.companies.index') }}'" class="btn btn-icon btn-rounded btn-danger float-right">
                            <i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item"><i class="mr-2 fa fa-building"></i> <strong class="mr-3">Company Name:</strong> {{ $company->company_name }}</li>
                            <li class="list-group-item"><i class="mr-2 fa fa-comment-dots"></i> <strong class="mr-3">Company Email:</strong> {{ $company->email }}</li>

                            <li class="list-group-item"><i class="mr-2 fa fa-industry"></i> <strong class="mr-3">Industry:</strong> {{ $company->industry }}</li>
                            <li class="list-group-item"><i class="mr-2 fa fa-users"></i> <strong class="mr-3">Company Size:</strong> {{ $company->company_size }}</li>
                            <li class="list-group-item"><i class="mr-2 fa fa-phone"></i> <strong class="mr-3">Phone Number 1:</strong> {{ $company->phone_number_1 }}</li>
                            <li class="list-group-item"><i class="mr-2 fa fa-phone-square"></i> <strong class="mr-3">Phone Number 2:</strong> {{ $company->phone_number_2 }}</li>
                            <li class="list-group-item"><i class="mr-2 fa fa-globe"></i> <strong class="mr-3">Website:</strong> <a href="{{ $company->website_url }}" target="_blank">{{ $company->website_url }}</a></li>
                            <li class="list-group-item"><i class="mr-2 fa fa-globe"></i> <strong class="mr-3">LinkedIn:</strong> <a href="{{ $company->linkedin_url }}" target="_blank">{{ $company->linkedin_url }}</a></li>
                            <li class="list-group-item"><i class="mr-2 fa fa-globe"></i> <strong class="mr-3">Twitter:</strong> <a href="{{ $company->twitter_url }}" target="_blank">{{ $company->twitter_url }}</a></li>
                            <li class="list-group-item"><i class="mr-2 fa fa-calendar"></i> <strong class="mr-3">Founded At:</strong> {{date('Y-m-d', strtotime( $company->founded_at)) }}</li>
                            <li class="list-group-item"><i class="mr-2 fa fa-calendar-check"></i> <strong class="mr-3">Joined At:</strong> {{ date('Y-m-d', strtotime($company->joined_at)) }}</li>
                            <li class="list-group-item"><i class="mr-2 fa fa-calendar-check"></i> <strong class="mr-3">About Company:</strong>

                                <p> {!! $company->about_company !!}</p>
                            </li>
                            <li class="list-group-item"><i class="mr-2 fa fa-info-circle"></i> <strong class="mr-3">Blocked?:</strong>
                                @if($company->is_blocked)
                                    <span class="text-danger bold">YES</span>
                                @else
                                    <span class="text-success bold">NO</span>
                                @endif
                            </li>
                            <li class="list-group-item"><i class="mr-2 fa fa-briefcase"></i> <strong class="mr-3">Job Advertisements Count:</strong> {{ $company->jobAdvertisements->count() }}</li>
                            <li class="list-group-item"><i class="mr-2 fa fa-star"></i> <strong class="mr-3">Reviews Count:</strong> {{ $company->reviews->count() }}</li>
                            <li class="list-group-item"><i class="mr-2 fa fa-credit-card"></i> <strong class="mr-3">Subscriptions Count:</strong> {{ $company->subscriptions->count() }}</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

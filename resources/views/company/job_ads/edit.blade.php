@extends('company.shared.app')

@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Job Advertisement</h4>
                        <button onclick="window.location.href='{{ route('company.job_ads.index') }}'" class="btn btn-icon btn-rounded btn-danger float-right">
                            <i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                    <form action="{{ route('company.job_ads.update', $jobAd->job_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('company.job_ads.form', ['jobAd' => $jobAd])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

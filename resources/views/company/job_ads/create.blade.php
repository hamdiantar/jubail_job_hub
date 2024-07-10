@extends('company.shared.app')

@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Job Advertisement</h4>
                        <button onclick="window.location.href='{{ route('company.job_ads.index') }}'" class="btn btn-icon btn-rounded btn-danger float-right">
                            <i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                    <form action="{{ route('company.job_ads.store') }}" method="POST">
                        @csrf
                        @include('company.job_ads.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

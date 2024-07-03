@extends('admin.shared.app')

@section('content')
    <div class="page-inner">


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Job Categories | Edit </h4>
                        <button onclick="window.location.href='{{ route('admin.job_categories.index') }}'" class="btn btn-icon btn-rounded btn-danger float-right">
                            <i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                    <form action="{{ route('admin.job_categories.update', $jobCategory->job_category_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('admin.job_categories.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

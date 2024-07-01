@extends('admin.shared.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Job Categories</h4>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Job Category</h4>

                        <button onclick="window.location.href='{{ route('admin.job_categories.index') }}'" class="btn btn-icon btn-rounded btn-danger float-right">
                            <i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                    <form action="{{ route('admin.job_categories.store') }}" method="POST">
                        @csrf
                        @include('admin.job_categories.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

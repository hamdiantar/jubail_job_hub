@extends('admin.shared.app')

@section('content')
    <div class="page-inner">


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Packages | Edit</h4>
                        <button onclick="window.location.href='{{ route('admin.packages.index') }}'" class="btn btn-icon btn-rounded btn-danger float-right">
                            <i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                    <form action="{{ route('admin.packages.update', $package->package_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('admin.packages.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

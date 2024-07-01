@extends('admin.shared.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Managers Management</h4>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Manager</h4>
                        <button onclick="window.location.href='{{ route('admin.managers.index') }}'" class="btn btn-icon btn-rounded btn-danger float-right">
                            <i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                    <form action="{{ route('admin.managers.update', $manager->admin_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('admin.managers.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

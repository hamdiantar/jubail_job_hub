@extends('admin.shared.app')

@section('content')
    <div class="page-inner">


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Job Categories [ <span class="badge badge-danger badge-count">{{ $jobCategories->count() }}</span> ] | List</h4>
                        <button onclick="window.location.href='{{ route('admin.job_categories.create') }}'" class="btn btn-icon btn-rounded btn-primary float-right">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatables" class="display table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>

                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($jobCategories as $jobCategory)
                                    <tr>
                                        <td>{{ $jobCategory->job_category_id }}</td>
                                        <td>{{ $jobCategory->job_category_name }}</td>
                                        <td>
                                            <div class="form-button-action">

                                                <a href="{{ route('admin.job_categories.edit', $jobCategory->job_category_id) }}" class="btn btn-link btn-lg" data-toggle="tooltip" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <button onclick="confirmDelete('{{ route('admin.job_categories.destroy', $jobCategory->job_category_id) }}')" type="submit" class="btn btn-link btn-danger" data-toggle="tooltip" title="Remove">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

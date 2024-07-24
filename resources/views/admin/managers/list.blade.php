@extends('admin.shared.app') <!-- Adjust according to your layout -->

@section('content')
    <div class="page-inner">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Admins Management [ <span class="badge badge-danger badge-count">{{ $managers->count() }}</span> ]  | List</h4>
                        <button onclick="window.location.href='{{ route('admin.managers.create') }}'" class="btn btn-icon btn-rounded btn-primary float-right">
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
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($managers as $manager)
                                    <tr>
                                        <td>{{ $manager->admin_id }}</td>
                                        <td>{{ $manager->fullname }}</td>
                                        <td>{{ $manager->email }}</td>
                                        <td>{{ $manager->username }}</td>
                                        <td>
                                            <div class="form-button-action">

{{--                                                <a href="{{ route('admin.managers.edit', $manager->admin_id) }}" class="btn btn-link  btn-lg" data-toggle="tooltip" title="" data-original-title="Edit">--}}
{{--                                                    <i class="fa fa-edit"></i>--}}
{{--                                                </a>--}}
                                                @if($manager->admin_id != auth('admin')->user()->admin_id)
                                                    <button onclick="confirmDelete('{{ route('admin.managers.destroy', $manager->admin_id) }}')" type="submit" class="btn btn-link btn-danger" data-toggle="tooltip" title="" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                @endif
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



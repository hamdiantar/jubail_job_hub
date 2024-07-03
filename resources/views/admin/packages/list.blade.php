@extends('admin.shared.app')

@section('content')
    <div class="page-inner">


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Packages [ <span class="badge badge-danger badge-count">{{ $packages->count() }}</span> ] | list</h4>
                        <button onclick="window.location.href='{{ route('admin.packages.create') }}'" class="btn btn-icon btn-rounded btn-primary float-right">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatables" class="display table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Package Period</th>
                                    <th>Package Price</th>
                                    <th>Description</th>
                                    <th>Availability</th>
                                    <th>Added By</th>
                                    <th>Subscriptions Count</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($packages as $package)
                                    <tr>
                                        <td>{{ $package->package_id }}</td>
                                        <td>{{ $package->type }}</td>
                                        <td>{{ number_format($package->price, 2) }} SAR</td>
                                        <td>{!! $package->description !!}</td>
                                        <td>
                                            @if($package->is_available)
                                                <span class="text-success bold">Available</span>
                                            @else
                                                <span class="text-danger bold">Not Available</span>
                                            @endif
                                          </td>
                                        <td>{{ optional($package->admin)->fullname }}</td>
                                        <td>{{ $package->subscriptions_count }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{ route('admin.packages.edit', $package->package_id) }}" class="btn btn-link btn-lg" data-toggle="tooltip" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                @if($package->subscriptions_count == 0)
                                                    <button onclick="confirmDelete('{{ route('admin.packages.destroy', $package->package_id) }}')" type="submit" class="btn btn-link btn-danger" data-toggle="tooltip" title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                @else
                                                    <button type="button" class="btn  btn-danger" data-toggle="tooltip" title="Cannot delete package with subscriptions" disabled>
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

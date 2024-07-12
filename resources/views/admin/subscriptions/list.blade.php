@extends('admin.shared.app')

@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Subscriptions [ <span class="badge badge-danger badge-count">{{ $subscriptions->count() }}</span> ] | list</h4>
                        <div class="float-right">
                            <form action="{{ route('admin.subscriptions.index') }}" method="GET">
                                <select name="company_id" class="form-control" onchange="this.form.submit()">
                                    <option value="">Select Company</option>
                                    @foreach($companies as $company)
                                        <option value="{{ $company->company_id }}" {{ $companyId == $company->company_id ? 'selected' : '' }}>{{ $company->company_name }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatables" class="display table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Company Name</th>
                                    <th>Package Name</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subscriptions as $subscription)
                                    <tr>
                                        <td>{{ $subscription->sub_id }}</td>
                                        <td>{{ $subscription->company->company_name }}</td>
                                        <td>{{ $subscription->package->type }}</td>
                                        <td>{{ $subscription->date_time }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{ route('admin.subscriptions.show', $subscription->sub_id) }}" class="btn btn-link btn-lg" data-toggle="tooltip" title="View">
                                                    <i class="fa fa-eye"></i>
                                                </a>
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

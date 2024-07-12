@extends('admin.shared.app')

@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Companies [ <span class="badge badge-danger badge-count">{{ $companies->count() }}</span> ] | list</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatables" class="display table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Company Name</th>
                                    <th>Industry</th>
                                    <th>Phone Number</th>
                                    <th>Website</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($companies as $company)
                                    <tr>
                                        <td>{{ $company->company_id }}</td>
                                        <td>{{ $company->company_name }}</td>
                                        <td>{{ $company->industry }}</td>
                                        <td>{{ $company->phone_number_1 }}</td>
                                        <td><a href="{{ $company->website_url }}" target="_blank">{{ $company->website_url }}</a></td>
                                        <td>
                                            @if($company->status == 'blocked')
                                                <span class="text-danger bold">Blocked</span>
                                            @elseif($company->status == 'accepted')
                                                <span class="text-success bold">Accepted</span>
                                            @elseif($company->status == 'rejected')
                                                <span class="text-danger bold">Rejected</span>
                                            @else
                                                <span class="text-warning bold">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{ route('admin.companies.show', $company->company_id) }}" class="btn btn-link btn-lg" data-toggle="tooltip" title="View">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                @if($company->status != 'accepted')
                                                    <form action="{{ route('admin.companies.accept', $company->company_id) }}" method="POST" style="display: inline-block;" onsubmit="event.preventDefault(); confirmAction('{{ route('admin.companies.accept', $company->company_id) }}', 'accept');">
                                                        @csrf
                                                        <button type="submit" class="btn btn-link btn-success" data-toggle="tooltip" title="Accept">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                                @if($company->status != 'rejected')
                                                    <form action="{{ route('admin.companies.reject', $company->company_id) }}" method="POST" style="display: inline-block;" onsubmit="event.preventDefault(); confirmAction('{{ route('admin.companies.reject', $company->company_id) }}', 'reject');">
                                                        @csrf
                                                        <button type="submit" class="btn btn-link btn-danger" data-toggle="tooltip" title="Reject">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                                @if($company->status == 'blocked')
                                                    <form action="{{ route('admin.companies.unblock', $company->company_id) }}" method="POST" style="display: inline-block;" onsubmit="event.preventDefault(); confirmAction('{{ route('admin.companies.unblock', $company->company_id) }}', 'unblock');">
                                                        @csrf
                                                        <button type="submit" class="btn btn-link btn-success" data-toggle="tooltip" title="Unblock">
                                                            <i class="fa fa-unlock"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('admin.companies.block', $company->company_id) }}" method="POST" style="display: inline-block;" onsubmit="event.preventDefault(); confirmAction('{{ route('admin.companies.block', $company->company_id) }}', 'block');">
                                                        @csrf
                                                        <button type="submit" class="btn btn-link btn-danger" data-toggle="tooltip" title="Block">
                                                            <i class="fa fa-lock"></i>
                                                        </button>
                                                    </form>
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


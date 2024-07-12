@extends('admin.shared.app')

@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card" id="printableArea">
                    <div class="card-header">
                        <h4 class="card-title">Subscription Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Company Information</h5>
                                <p><i class="mr-2 fa fa-building"></i> {{ $subscription->company->company_name }}</p>
                                <p><i class="mr-2 fa fa-phone"></i> {{ $subscription->company->phone_number_1 }}</p>
                                <p><i class="mr-2 fa fa-envelope"></i> {{ $subscription->company->email }}</p>
                            </div>
                            <div class="col-md-6">
                                <h5>Subscription Information</h5>
                                <p><i class="mr-2 fa fa-calendar"></i> {{ $subscription->date_time }}</p>
                                <p><i class="mr-2 fa fa-archive"></i> Package : {{ $subscription->package->type }}</p>
                            </div>
                        </div>
                        <hr>
                        <h5>Payment Information</h5>
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Ref Number</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Payment Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subscription->payments as $payment)
                                <tr>
                                    <td>{{ $payment->ref_number }}</td>
                                    <td>{{ $payment->amount }} SAR</td>
                                    <td>{{ $payment->date_time }}</td>
                                    <td>{{ $payment->status }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a id="PrintBUtton" href="#" onclick="printDiv('printableArea')" class="btn btn-primary mt-4">Print <i class="fa fa-print"></i></a>

                </div>

            </div>
        </div>
    </div>
@endsection

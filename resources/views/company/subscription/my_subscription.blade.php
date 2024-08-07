@extends('company.shared.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">My Subscriptions</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">My Subscriptions</h4>

                        <button onclick="window.location.href='{{ route('company.subscription.index') }}'"
                                class="btn btn-icon w-25 btn-warning float-right">
                            <i class="fa fa-eye"></i> View Packages
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatables" class="display table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Subscription ID</th>
                                    <th>Package Name</th>
                                    <th>Period (months)</th>
                                    <th>Subscription Date</th>
                                    <th>Subscription End Date</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subscriptions as $subscription)
                                    @php
                                        $subscriptionDate = $subscription->date_time;
                                        $endDate = $subscriptionDate->clone()->addMonths($subscription->package->period);
                                        $isExpired = $endDate < now();
                                    @endphp
                                    <tr>
                                        <td>{{ $subscription->sub_id }}</td>
                                        <td>{{ $subscription->package->type }}</td>
                                        <td>{{ $subscription->package->period }}</td>
                                        <td>{{ $subscriptionDate->format('Y-m-d') }}</td>
                                        <td>{{ $endDate->format('Y-m-d') }}</td>
                                        <td>
                                            @if($isExpired)
                                                <a href="{{ route('company.subscription.index') }}" class="btn btn-warning">Renew Subscription</a>
                                            @else
                                                <span class="text-success">Active</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @if($subscription->payments->isNotEmpty())
                                        <tr>
                                            <th>Ref Number</th>
                                            <th>Amount</th>
                                            <th>Payment Date</th>
                                            <th>Status</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                                    @foreach($subscription->payments as $payment)
                                                        <tr>
                                                            <td>{{ $payment->ref_number }}</td>
                                                            <td>{{ $payment->amount }} SAR</td>
                                                            <td>{{ $payment->date_time }}</td>
                                                            <td>{{ $payment->status }}</td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    @endforeach

                                    @else
                                        <tr>
                                            <td colspan="6"><strong>No Payment Details Available</strong></td>
                                        </tr>
                                    @endif
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

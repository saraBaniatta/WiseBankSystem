@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                <div class="iq-card-body iq-box-relative">
                    <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-primary">
                        <i class="ri-focus-2-line"></i>
                    </div>
                    <p class="text-secondary">Total Accounts</p>
                    <div class="d-flex align-items-center justify-content-between" style="position: relative;">
                        <h4><b>{{ count(auth()->user()->accounts) }}</b></h4>

                        <div class="resize-triggers"><div class="expand-trigger"><div style="width: 340px; height: 51px;"></div></div><div class="contract-trigger"></div></div></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                <div class="iq-card-body iq-box-relative">
                    <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-danger">
                        <i class="ri-pantone-line"></i>
                    </div>
                    <p class="text-secondary">Total Debit Transactions</p>
                    <div class="d-flex align-items-center justify-content-between" style="position: relative;">
                        <h4><b>{{ $totalDebit }}</b></h4>

                        <div class="resize-triggers"><div class="expand-trigger"><div style="width: 340px; height: 51px;"></div></div><div class="contract-trigger"></div></div></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                <div class="iq-card-body iq-box-relative">
                    <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-success">
                        <i class="ri-database-2-line"></i>
                    </div>
                    <p class="text-secondary">Total Credit Transaction</p>
                    <div class="d-flex align-items-center justify-content-between" style="position: relative;">
                        <h4><b>{{ $totalCredit }}</b></h4>

                        <div class="resize-triggers"><div class="expand-trigger"><div style="width: 340px; height: 51px;"></div></div><div class="contract-trigger"></div></div></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                <div class="iq-card-body iq-box-relative">
                    <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-warning">
                        <i class="ri-pie-chart-2-line"></i>
                    </div>
                    <p class="text-secondary">Total Deposits</p>
                    <div class="d-flex align-items-center justify-content-between" style="position: relative;">
                        <h4><b>{{ $totalDeposits }}</b></h4>

                        <div class="resize-triggers"><div class="expand-trigger"><div style="width: 340px; height: 51px;"></div></div><div class="contract-trigger"></div></div></div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Open Invoices</h4>
                    </div>
                    <div class="iq-card-header-toolbar d-flex align-items-center">
{{--                        <div class="dropdown">--}}
{{--                                 <span class="dropdown-toggle text-primary" id="dropdownMenuButton5" data-toggle="dropdown">--}}
{{--                                 <i class="ri-more-fill"></i>--}}
{{--                                 </span>--}}
{{--                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton5">--}}
{{--                                <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>--}}
{{--                                <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>--}}
{{--                                <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>--}}
{{--                                <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>--}}
{{--                                <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-light">
                            <tr>
                                <th>Account Number</th>
                                <th>Bank Name</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Comment</th>
                                <th>Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->account->account_number }}</td>
                                    <td>{{ $transaction->account->bank_name }}</td>
                                    <td>{{ $transaction->type->description }}</td>
                                    <td>{{ $transaction->amount }} </td>
                                    <td>{{ $transaction->comment }} </td>
                                    <td>{{ $transaction->created_at }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                <div class="iq-card-body">
                    @foreach($deposits as $deposit)
                        <div class="d-flex align-items-center mt-3">
                            <div class="icon iq-icon-box rounded iq-bg-danger mr-3">
                                <i class="ri-shopping-bag-line"></i>
                            </div>
                            <div class="iq-details col-sm-9 p-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="title text-dark">{{ $deposit->account->account_number }}</span>
                                    <div class="percentage"><b><span>$</span> {{ $deposit->balance }} </b></div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="">{{$deposit->period}} Months</span>
                                  
                                </div>
                            </div>
                        </div>
                        <hr class="mt-4 mb-4">

                    @endforeach

                </div>
            </div>
        </div>

    </div>
@endsection

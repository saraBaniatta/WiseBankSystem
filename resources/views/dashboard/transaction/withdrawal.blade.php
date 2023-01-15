@extends("layouts.app")

@section("content")
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Withdrawals Table</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <button type="button" class="btn btn-primary position-right" data-toggle="modal" data-target="#addAccount">
                Add
            </button>
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Account Number</th>
                        <th>Account Bank Name</th>
                        <th>Transaction Type</th>
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
    {{--                            <td>--}}
    {{--                                --}}{{--                                <button type="button" class="btn btn-secondary mb-3"  onclick=" event.preventDefault();--}}
    {{--                                --}}{{--                                     document.getElementById('change-status-{{$transaction->id}}').submit()--}}
    {{--                                --}}{{--                                  ">Change Status</button>--}}
    {{--                                --}}{{--                                <form id="change-status-{{$transaction->id}}" action="{{ route("changeStatus.accounts", $transaction->id) }}" method="post" class="hidden">--}}
    {{--                                --}}{{--                                    @method('PUT')--}}
    {{--                                --}}{{--                                    @csrf--}}
    {{--                                --}}{{--                                </form>--}}

    {{--                                <button type="button" class="btn btn-danger mb-3"  onclick=" event.preventDefault();--}}
    {{--                                     document.getElementById('delete-{{$transaction->id}}').submit()--}}
    {{--                                 ">Delete</button>--}}
    {{--                                <form id="delete-{{$transaction->id}}" action="{{ route("delete.deposits", $transaction->id) }}" method="post" class="hidden">--}}
    {{--                                    @method('DELETE')--}}
    {{--                                    @csrf--}}
    {{--                                </form>--}}

    {{--                            </td>--}}
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Make Action</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addAccountForm" action="{{ route("create.withdrawal") }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Sender Account Number</label>
                            <select class="form-control" name="account_id" id="exampleFormControlSelect1">
                                <option selected="" disabled="">Select Account</option>
                                @foreach($senderAccounts as $account)
                                    <option value="{{$account->id}}" {{ old("account_id") == $account->id ? "selected" : "" }}>{{ $account->account_number }}</option>
                                @endforeach
                            </select>
                            @error("account_id")
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Recipient Account Number</label>
                            <select class="form-control" name="to_account_id" id="exampleFormControlSelect1">
                                <option selected="" disabled="">Select Account</option>
                                @foreach($accounts as $account)
                                    <option value="{{$account->id}}" {{ old("to_account_id") == $account->id ? "selected" : "" }}>{{ $account->account_number }}</option>
                                @endforeach
                            </select>
                            @error("to_account_id")
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pwd">Amount</label>
                            <input type="text" value="{{ old("amount") }}" name="amount" class="form-control @error("amount") is-invalid @enderror" id="pwd">
                            @error("amount")
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pwd">Comment</label>
                            <input type="text" value="{{ old("comment") }}" name="comment" class="form-control @error("comment") is-invalid @enderror" id="pwd">
                            @error("comment")
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick=" event.preventDefault();
                                     document.getElementById('addAccountForm').submit()
                     ">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@endsection

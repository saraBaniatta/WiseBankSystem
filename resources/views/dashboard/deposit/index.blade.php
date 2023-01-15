@extends("layouts.app")

@section("content")
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Deposits Table</h4>
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
                        <th>Deposit Account Number</th>
                        <th>Deposit Account Bank Name</th>
                        <th>Balance</th>
                        <th>Period</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($deposits as $deposit)
                        <tr>
                            <td>{{ $deposit->account->account_number }}</td>
                            <td>{{ $deposit->account->bank_name }}</td>
                            <td>{{ $deposit->balance }}</td>
                            <td>{{ $deposit->period }} Months</td>

                            <td>{{ $deposit->created_at }}</td>
                            <td>
{{--                                <button type="button" class="btn btn-secondary mb-3"  onclick=" event.preventDefault();--}}
{{--                                     document.getElementById('change-status-{{$deposit->id}}').submit()--}}
{{--                                  ">Change Status</button>--}}
{{--                                <form id="change-status-{{$deposit->id}}" action="{{ route("changeStatus.accounts", $deposit->id) }}" method="post" class="hidden">--}}
{{--                                    @method('PUT')--}}
{{--                                    @csrf--}}
{{--                                </form>--}}

                                <button type="button" class="btn btn-danger mb-3"  onclick=" event.preventDefault();
                                     document.getElementById('delete-{{$deposit->id}}').submit()
                                 ">Delete</button>
                                <form id="delete-{{$deposit->id}}" action="{{ route("delete.deposits", $deposit->id) }}" method="post" class="hidden">
                                    @method('DELETE')
                                    @csrf
                                </form>

                            </td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addAccountForm" action="{{ route("create.deposits") }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Account Number</label>
                            <select class="form-control" name="account_id" id="exampleFormControlSelect1">
                                <option selected="" disabled="">Select Account</option>
                                @foreach($accounts as $account)
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
                            <label for="pwd">Balance</label>
                            <input type="text" value="{{ old("balance") }}" name="balance" class="form-control @error("balance") is-invalid @enderror" id="pwd">
                            @error("balance")
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pwd">Period In Months</label>
                            <input type="text" value="{{ old("period") }}" name="period" class="form-control @error("period") is-invalid @enderror" id="pwd">
                            @error("period")
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

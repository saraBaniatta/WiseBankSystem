@extends("layouts.app")

@section("content")
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Account Table</h4>
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
                        <th>Bank Name</th>
                        <th>Current Balance</th>
                        <th>Previous Balance</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($accounts as $account)
                        <tr>
                            <td>{{ $account->account_number }}</td>
                            <td>{{ $account->bank_name }}</td>
                            <td>{{ $account->current_balance }}</td>
                            <td>{{ $account->previous_balance }}</td>
                            <td>{{ $account->status }}</td>
                            <td>{{ $account->created_at }}</td>
                            <td>
                                <button type="button" class="btn btn-secondary mb-3"  onclick=" event.preventDefault();
                                     document.getElementById('change-status-{{$account->id}}').submit()
                                  ">Change Status</button>
                                <form id="change-status-{{$account->id}}" action="{{ route("changeStatus.accounts", $account->id) }}" method="post" class="hidden">
                                    @method('PUT')
                                    @csrf
                                </form>

                                <button type="button" class="btn btn-danger mb-3"  onclick=" event.preventDefault();
                                     document.getElementById('delete-{{$account->id}}').submit()
                                 ">Delete</button>
                                <form id="delete-{{$account->id}}" action="{{ route("delete.accounts", $account->id) }}" method="post" class="hidden">
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
                    <form id="addAccountForm" action="{{ route("create.accounts") }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Account Number</label>
                            <input type="text" value="{{ old("account_number") }}" name="account_number" class="form-control @error('account_number') is-invalid @enderror" id="email1">
                            @error("account_number")
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pwd">Bank Name</label>
                            <input type="text" value="{{ old("bank_name") }}" name="bank_name" class="form-control @error('bank_name') is-invalid @enderror" id="pwd">
                            @error("bank_name")
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="checkbox mb-3">
                            <label><input name="status" value="1" type="checkbox"> Active</label>
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

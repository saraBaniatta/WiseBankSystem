<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //
    public function index()
    {
        $accounts = Account::where("user_id", auth()->id())->get();
        return view("dashboard.account.index", compact("accounts"));
    }

    public function create(Request $request)
    {
        $request->validate([
            "account_number" => "required|digits:21|numeric",
            "bank_name" => "required"
        ]);

        $account = Account::create([
            "account_number" => $request->account_number,
            "bank_name" => $request->bank_name,
            "current_balance" => 0,
            "previous_balance" => 0,
            "status" => $request->status ?? false,
            "user_id" => auth()->id()
        ]);

        Notification::create([
            "title" => "Account Created",
            "description" => "New Account Created On ". $account->created_at ,
            "status" => "success",
            "user_id" => auth()->id()
        ]);
        return redirect()->route("get.accounts");
    }

    public function changeStatus(Request $request, Account $account)
    {
        $account->update([
            "status" => !$account->status
        ]);
        Notification::create([
            "title" => "Account Status Changed",
            "description" => "Account{ ". $account->account_number." } Status Changed Successfully On". $account->updated_at ,
            "status" => "success",
            "user_id" => auth()->id()
        ]);
        return redirect()->route("get.accounts");
    }

    public function destroy(Request $request, Account $account)
    {
        $account->delete();
        Notification::create([
            "title" => "Account Deleted",
            "description" => "Account{ ". $account->account_number." } Deleted Successfully Successfully On". $account->updated_at ,
            "status" => "danger",
            "user_id" => auth()->id()
        ]);
        return redirect()->route("get.accounts");
    }
}

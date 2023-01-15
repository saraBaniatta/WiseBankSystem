<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Deposit;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    //

    public function index()
    {
        $accountsId = Account::where("user_id", auth()->id())->get("id")->toArray();
        //dd($accounts);
        $accounts = Account::where("user_id", auth()->id())->get();
        $deposits = Deposit::whereIn("account_id", $accountsId)->get();

//        dd(Deposit::all());
        return view('dashboard.deposit.index', compact("deposits", "accounts"));
    }

    public function create(Request $request)
    {
        $request->validate([
            "account_id" => "required",
            "balance" => "required",
            "period" => "required"
        ]);

        $deposit =Deposit::create([
           "account_id" => $request->account_id,
            "balance" => $request->balance,
            "period" => $request->period
        ]);

        Notification::create([
            "title" => "Deposit Created",
            "description" => "New Deposit Created On ". $deposit->created_at . " And Linked With Account ". $deposit->account->account_number ,
            "status" => "success",
            "user_id" => auth()->id()
        ]);
        return redirect()->route("get.deposits");
    }

    public function destroy(Request $request, Deposit $deposit)
    {

        $deposit->delete();

        Notification::create([
            "title" => "Deposit Deleted",
            "description" => "Deposit that linked with Account ". $deposit->account->account_number." Deleted On ". Carbon::now() ,
            "status" => "danger",
            "user_id" => auth()->id()
        ]);
        return redirect()->route("get.deposits");

    }
}

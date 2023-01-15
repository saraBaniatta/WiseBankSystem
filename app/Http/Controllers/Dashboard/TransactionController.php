<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Notification;
use App\Models\Transaction;
use App\Models\TransactionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    //


    public function showWithdrawal()
    {
        $senderAccounts = auth()->user()->accounts;
        $accounts = Account::all();
        $accountsId = Account::where("user_id", auth()->id())->get("id")->toArray();
        $transactions = Transaction::whereIn("account_id", $accountsId)->get();
//        dd($transactions[0]->type);
        return view("dashboard.transaction.withdrawal", compact("accounts", "senderAccounts","transactions"));
    }

    public function withdrawal(Request $request)
    {
        $val = Validator::make($request->all(), [
            "account_id" => "required",
            "to_account_id" => "required|different:account_id",
            "amount" => "required",
            "comment" => "required"
        ]);
//        dd($val->messages());
        $request->validate([
            "account_id" => "required",
            "to_account_id" => "required|different:account_id",
            "amount" => "required",
            "comment" => "required"
        ], [
            "to_account_id.different" => "sender and receiver account must be different",

        ]);

        $debit = TransactionType::where("code", "1")->first();
        $traSend = Transaction::create([
            "account_id" => $request->account_id,
            "transaction_type_id" => $debit->id,
            "amount" => $request->amount,
            "comment" => $request->comment,
        ]);
        $credit = TransactionType::where("code", "2")->first();
        $traReceive = Transaction::create([
            "account_id" => $request->to_account_id,
            "transaction_type_id" => $credit->id,
            "amount" => $request->amount,
            "comment" => $request->comment,
        ]);

        $sender = Account::find($request->account_id);
        $sender->update([
            "previous_balance" => $sender->current_balance,
            "current_balance" => $sender->current_balance - $traSend->amount
        ]);

        $recieve = Account::find($request->to_account_id);
        $recieve->update([
            "previous_balance" => $recieve->current_balance,
            "current_balance" => $recieve->current_balance + $traReceive->amount
        ]);
        Notification::create([
            "title" => "Withdrawal Action Created",
            "description" => "New Withdrawal Created On " . $traSend->created_at . " And Transacted From " . $traSend->account->account_number . " To " . $traReceive->account->account_number,
            "status" => "success",
            "user_id" => auth()->id()
        ]);
        return redirect()->route("get.withdrawal");

    }
}

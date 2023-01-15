<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Deposit;
use App\Models\Transaction;
use App\Models\TransactionType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $accountID =  Account::where("user_id", auth()->id())->get("id");
        $debit = TransactionType::where("code", "=", "1")->first();
        $credit = TransactionType::where("code", "=", "2")->first();
        $totalDebit = Transaction::where("transaction_type_id", $debit->id)->whereIn("account_id", $accountID)->count();
        $totalCredit = Transaction::where("transaction_type_id", $credit->id)->whereIn("account_id", $accountID)->count();
        $totalDeposits = Deposit::whereIn("account_id", $accountID)->count();
        $transactions = Transaction::whereIn("account_id", $accountID)->get();
        $deposits = Deposit::whereIn("account_id", $accountID)->get();
        return view('home', compact("totalCredit", "totalDebit", "totalDeposits", "transactions", "deposits"));
    }
}

<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route("login");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware("auth")->group(function(){
    Route::get("/account", [\App\Http\Controllers\Dashboard\AccountController::class, 'index'])->name("get.accounts");
    Route::post("/account", [\App\Http\Controllers\Dashboard\AccountController::class, 'create'])->name("create.accounts");
    Route::put("/account/{account}", [\App\Http\Controllers\Dashboard\AccountController::class, 'changeStatus'])->name("changeStatus.accounts");
    Route::delete("/account/{account}", [\App\Http\Controllers\Dashboard\AccountController::class, 'destroy'])->name("delete.accounts");


    Route::get("deposit", [\App\Http\Controllers\Dashboard\DepositController::class, "index"])->name("get.deposits");
    Route::post("deposit", [\App\Http\Controllers\Dashboard\DepositController::class, "create"])->name("create.deposits");
    Route::delete("deposit/{deposit}", [\App\Http\Controllers\Dashboard\DepositController::class, "destroy"])->name("delete.deposits");

    Route::get("withdrawal", [\App\Http\Controllers\Dashboard\TransactionController::class, "showWithdrawal"])->name("get.withdrawal");
    Route::post("withdrawal", [\App\Http\Controllers\Dashboard\TransactionController::class, "withdrawal"])->name("create.withdrawal");

    Route::get("notification", [\App\Http\Controllers\Dashboard\NotificationController::class, "__invoke"])->name("get.notifications");

    Route::get("web3", [\App\Http\Controllers\Dashboard\NotificationController::class, "web3"])->name("get.web3");

});

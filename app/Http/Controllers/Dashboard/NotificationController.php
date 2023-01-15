<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function __invoke()
    {
        $notifications =Notification::where("user_id", auth()->id())->get();
        return view("dashboard.notifications.index",compact("notifications")) ;
    }
    public function web3()
    {
    
        return view("dashboard.web3.index") ;
    }
}

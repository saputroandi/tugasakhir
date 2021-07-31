<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomHelper\CustomHelperController;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function Index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->user_id)->orderBy('order_id', 'desc')->get();
        $namaSurat = CustomHelperController::namaSuratGenerator($orders);

        return view('user.dashboard', compact(['orders', 'namaSurat']));
        // $now              = date("Ymd",time());
        // $userPaymentYear  = Str::substr(Auth::user()->payments->last()->payment_id, 1, 4);
        // $userPaymentMonth = Str::substr(Auth::user()->payments->last()->payment_id, 5, 2);
        // $userPaymentDay   = Str::substr(Auth::user()->payments->last()->payment_id, 7, 2);
        // dd(Auth::user());
    }
}

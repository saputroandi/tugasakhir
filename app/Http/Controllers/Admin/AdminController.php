<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomHelper\CustomHelperController;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function Index()
    {

        $payments = Payment::where('payment_status', 2)->with('user')->get();
        
        return view('admin.dashboard', compact('payments'));
    }

    public function AllDocument()
    {
        $orders = Order::all();
        $namaSurat = CustomHelperController::namaSuratGenerator($orders);
        return view('admin.all_document', compact(['orders', 'namaSurat']));
    }

    public function Users()
    {
        return view('admin.users');
    }
}

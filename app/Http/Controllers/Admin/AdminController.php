<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomHelper\CustomHelperController;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Str;
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
        $orders = Order::orderBy('order_id', 'desc')->get();
        $namaSurat = CustomHelperController::namaSuratGenerator($orders);
        return view('admin.all_document', compact(['orders', 'namaSurat']));
    }

    public function Users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function deleteUser(User $user)
    {
        if(Str::substr($user->user_id, 0, 1) == 1) return redirect('/admin/users')->with('fail', 'user gagal di hapus');
        
        $user->delete();

        return redirect('/admin/users')->with('success', 'user berhasil di hapus');
    }

    public function deleteOrder(Order $order)
    {
        $order->delete();

        return redirect('/admin/all-document')->with('success', 'surat berhasil di hapus');
    }
}

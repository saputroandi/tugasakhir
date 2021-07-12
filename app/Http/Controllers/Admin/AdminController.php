<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return view('admin.all_document');
    }

    public function Users()
    {
        return view('admin.users');
    }
}

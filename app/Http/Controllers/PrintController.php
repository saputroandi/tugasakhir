<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\SPD;

class PrintController extends Controller
{
    public function Download($slug, Order $order)
    {
        $document = SPD::where('order_id', $order->order_id)->first();
        return view('spd.surat', compact('document'));
    }
}

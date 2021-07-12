<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function Index()
    {
        $orders = Order::all();
        $namaSurat = collect([]);

        foreach ($orders as $key => $value) {
            $dataNamaOrder = Str::of($value->nama_order)->explode('_')[0];

            switch ($dataNamaOrder) {
                case 'spd':
                    $namaSurat->push('Surat Pengunduran Diri');
                    break;

                case 'sk':
                    $namaSurat->push('Surat Kuasa');
                    break;
                
                default:
                    $namaSurat->push('Surat Yang Lain');
                    break;
            }
        }

        return view('user.dashboard', compact(['orders', 'namaSurat']));
    }
}

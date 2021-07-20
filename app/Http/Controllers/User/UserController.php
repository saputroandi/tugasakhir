<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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

                case 'spm':
                    $namaSurat->push('Surat Permohonan Maaf');
                    break;

                case 'sitmk':
                    $namaSurat->push('Surat Izin Tidak Masuk Kerja');
                    break;

                case 'slp':
                    $namaSurat->push('Surat Lamaran Pekerjaan');
                    break;
                
                default:
                    return abort(404);
                    break;
            }
        }

        return view('user.dashboard', compact(['orders', 'namaSurat']));
        // $now              = date("Ymd",time());
        // $userPaymentYear  = Str::substr(Auth::user()->payments->last()->payment_id, 1, 4);
        // $userPaymentMonth = Str::substr(Auth::user()->payments->last()->payment_id, 5, 2);
        // $userPaymentDay   = Str::substr(Auth::user()->payments->last()->payment_id, 7, 2);
        // dd(Auth::user());
    }
}

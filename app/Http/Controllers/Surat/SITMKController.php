<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomHelper\CustomHelperController;
use App\Models\Order;
use App\Models\SITMK;
use App\Models\User;
use Illuminate\Http\Request;

class SITMKController extends Controller
{
    public function __construct()
    {
        $this->orderName = 'sitmk_';
    }

    public function Create()
    {
        // dd('ok');
        return view('sitmk.create');
    }

    public function Edit(Order $order)
    {
        // dd('ok');
        $order->load('sitmks');
        return view('sitmk.edit', compact(['order']));
    }

    public function Store(User $user, Request $request)
    {
        $request->validate([
            "nama_order"        => "required|max:30",
            "nama_sitmk"        => "required|max:20",
            "jabatan_sitmk"     => "required|max:20",
            "alamat_sitmk"      => "required|max:100",
            "mulai_sitmk"       => "required",
            "sampai_sitmk"      => "required",
            "alasan_sitmk"      => "required|max:100",
            "penerima_sitmk"    => "required|max:20",
            "tmpt_sitmk_terbit" => "required|max:20",
            "tgl_sitmk_terbit"  => "required",
        ]);

        $lastRecord = Order::all()->last();
        $primaryKey = 'order_id';
        $role       = '2';

        $order['order_id']   = CustomHelperController::IdGenerator($lastRecord, $primaryKey, $role);
        $order['nama_order'] = $this->orderName.$request->nama_order;
        $order['user_id']    = $user->user_id;
        Order::create($order);

        $sitmk = $request->only([
            "nama_sitmk",
            "jabatan_sitmk",
            "alamat_sitmk",
            "mulai_sitmk",
            "sampai_sitmk",
            "alasan_sitmk",
            "penerima_sitmk",
            "tmpt_sitmk_terbit",
            "tgl_sitmk_terbit",
        ]);

        $sitmkLastRecord = SITMK::all()->last();
        $sitmkPrimaryKey = 'sitmk_id';

        $sitmk['sitmk_id']   = CustomHelperController::IdGenerator($sitmkLastRecord, $sitmkPrimaryKey, $role);
        $sitmk['order_id'] = $order['order_id'];
        SITMK::create($sitmk);

        return redirect('/dashboard')->with('success', 'surat berhasil dibuat');
    }

    public function Update(Order $order, Request $request)
    {
        $request->validate([
            "nama_sitmk"        => "required|max:20",
            "jabatan_sitmk"     => "required|max:20",
            "alamat_sitmk"      => "required|max:100",
            "mulai_sitmk"       => "required",
            "sampai_sitmk"      => "required",
            "alasan_sitmk"      => "required|max:100",
            "penerima_sitmk"    => "required|max:20",
            "tmpt_sitmk_terbit" => "required|max:20",
            "tgl_sitmk_terbit"  => "required",
        ]);

        $order->load('sitmks');

        $dataSITMK = $request->only([
            "nama_sitmk",
            "jabatan_sitmk",
            "alamat_sitmk",
            "mulai_sitmk",
            "sampai_sitmk",
            "alasan_sitmk",
            "penerima_sitmk",
            "tmpt_sitmk_terbit",
            "tgl_sitmk_terbit",
        ]);

        $order->sitmks[0]->update($dataSITMK);

        return redirect('/dashboard')->with('success', 'surat berhasil di update');
    }

    public function Delete(Order $order)
    {
        $order->delete();

        return redirect('/dashboard')->with('success', 'surat berhasil di hapus');
    }
}

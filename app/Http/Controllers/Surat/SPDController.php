<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomHelper\CustomHelperController;
use App\Models\Order;
use App\Models\SPD;
use App\Models\User;
use Illuminate\Http\Request;

class SPDController extends Controller
{
    public function __construct()
    {
        $this->orderName = 'spd_';
    }
    
    public function Create()
    {
        return view('spd.create');
    }

    public function Edit(Order $order)
    {
        $order->load('spds');
        // $spd = SPD::where('order_id', $order->order_id)->first();
        return view('spd.edit', compact(['order']));
    }

    public function Store(User $user, Request $request)
    {
        $request->validate([
            "nama_order"      => "required",
            "nama_spd"        => "required",
            "perusahaan_spd"  => "required",
            "jabatan_spd"     => "required",
            "tgl_spd"         => "required",
            "penerima_spd"    => "required",
            "tmpt_spd_terbit" => "required",
            "tgl_spd_terbit"  => "required",
        ]);

        $lastRecord = Order::all()->last();
        $primaryKey = 'order_id';
        $role       = '2';

        $order['order_id']   = CustomHelperController::IdGenerator($lastRecord, $primaryKey, $role);
        $order['nama_order'] = $this->orderName . $request->nama_order;
        $order['user_id']    = $user->user_id;
        Order::create($order);

        $spd = $request->only([
            'nama_spd',
            'perusahaan_spd',
            'jabatan_spd',
            'tgl_spd',
            'penerima_spd',
            'tmpt_spd_terbit',
            'tgl_spd_terbit',
        ]);

        $spdLastRecord = SPD::all()->last();
        $spdPrimaryKey = 'spd_id';

        $spd['spd_id']   = CustomHelperController::IdGenerator($spdLastRecord, $spdPrimaryKey, $role);
        $spd['order_id'] = $order['order_id'];
        SPD::create($spd);

        return redirect('/dashboard')->with('success', 'surat berhasil dibuat');
    }

    public function Update(Order $order, Request $request)
    {
        $request->validate([
            "nama_order"      => "required",
            "nama_spd"        => "required",
            "perusahaan_spd"  => "required",
            "jabatan_spd"     => "required",
            "tgl_spd"         => "required",
            "penerima_spd"    => "required",
            "tmpt_spd_terbit" => "required",
            "tgl_spd_terbit"  => "required",
        ]);

        $order->load('spds');

        $dataSpd = $request->only([
            'nama_spd',
            'perusahaan_spd',
            'jabatan_spd',
            'tgl_spd',
            'penerima_spd',
            'tmpt_spd_terbit',
            'tgl_spd_terbit',
        ]);

        $order->spds[0]->update($dataSpd);

        return redirect('/dashboard')->with('success', 'surat berhasil di update');
    }
    
    public function Delete(Order $order)
    {
        // dd($order);
        $order->delete();

        return redirect('/dashboard')->with('success', 'surat berhasil di hapus');
    }
}

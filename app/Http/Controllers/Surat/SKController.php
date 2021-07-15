<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomHelper\CustomHelperController;
use App\Models\Order;
use App\Models\SK;
use App\Models\User;
use Illuminate\Http\Request;

class SKController extends Controller
{
    public function __construct()
    {
        $this->orderName = 'sk_';
    }
    
    public function Create()
    {
        return view('sk.create');
    }

    public function Edit(Order $order)
    {
        $order->load('sks');
        return view('sk.edit', compact(['order']));
    }

    public function Store(Request $request, User $user)
    {
        // dd($request, $user);
        $request->validate([
            "nama_order"             => "required",
            "nama_sk"                => "required",
            "tmpt_lahir_sk"          => "required",
            "tgl_lahir_sk"           => "required",
            "jns_klm_sk"             => "required",
            "no_ktp_sk"              => "required",
            "alamat_sk"              => "required",
            "nama_penerima_sk"       => "required",
            "tmpt_lahir_penerima_sk" => "required",
            "tgl_lahir_penerima_sk"  => "required",
            "jns_klm_penerima_sk"    => "required",
            "no_ktp_penerima_sk"     => "required",
            "alamat_penerima_sk"     => "required",
            "keperluan_sk"           => "required",
            "tmpt_sk_terbit"         => "required|max:20",
            "tgl_sk_terbit"          => "required",
        ]);

        $lastRecord = Order::all()->last();
        $primaryKey = 'order_id';
        $role       = '2';

        $order['order_id']   = CustomHelperController::IdGenerator($lastRecord, $primaryKey, $role);
        $order['nama_order'] = $this->orderName.$request->nama_order;
        $order['user_id']    = $user->user_id;
        Order:: create($order);

        $spd = $request->only([
            'nama_sk',
            'tmpt_lahir_sk',
            'tgl_lahir_sk',
            'jns_klm_sk',
            'no_ktp_sk',
            'alamat_sk',
            'nama_penerima_sk',
            'tmpt_lahir_penerima_sk',
            'tgl_lahir_penerima_sk',
            'jns_klm_penerima_sk',
            'no_ktp_penerima_sk',
            'alamat_penerima_sk',
            'keperluan_sk',
            'tmpt_sk_terbit',
            'tgl_sk_terbit',
        ]);

        $spdLastRecord = SK::all()->last();
        $spdPrimaryKey = 'sk_id';

        $spd['sk_id']   = CustomHelperController::IdGenerator($spdLastRecord, $spdPrimaryKey, $role);
        $spd['order_id'] = $order['order_id'];
        SK::create($spd);

        return redirect('/dashboard')->with('success', 'surat berhasil dibuat');
    }

    public function Update(Order $order, Request $request)
    {
        $request->validate([
            "nama_sk"                => "required",
            "tmpt_lahir_sk"          => "required",
            "tgl_lahir_sk"           => "required",
            "jns_klm_sk"             => "required",
            "no_ktp_sk"              => "required",
            "alamat_sk"              => "required",
            "nama_penerima_sk"       => "required",
            "tmpt_lahir_penerima_sk" => "required",
            "tgl_lahir_penerima_sk"  => "required",
            "jns_klm_penerima_sk"    => "required",
            "no_ktp_penerima_sk"     => "required",
            "alamat_penerima_sk"     => "required",
            "keperluan_sk"           => "required",
            "tmpt_sk_terbit"         => "required|max:20",
            "tgl_sk_terbit"          => "required",
        ]);

        $order->load('sks');

        $dataSK = $request->only([
            "nama_sk",
            "tmpt_lahir_sk",
            "tgl_lahir_sk",
            "jns_klm_sk",
            "no_ktp_sk",
            "alamat_sk",
            "nama_penerima_sk",
            "tmpt_lahir_penerima_sk",
            "tgl_lahir_penerima_sk",
            "jns_klm_penerima_sk",
            "no_ktp_penerima_sk",
            "alamat_penerima_sk",
            "keperluan_sk",
            "tmpt_sk_terbit",
            "tgl_sk_terbit",
        ]);

        $order->sks[0]->update($dataSK);

        return redirect('/dashboard')->with('success', 'surat berhasil di update');
    }

    public function Delete(Order $order)
    {
        $order->delete();

        return redirect('/dashboard')->with('success', 'surat berhasil di hapus');
    }
}

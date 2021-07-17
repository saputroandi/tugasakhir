<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomHelper\CustomHelperController;
use App\Models\Order;
use App\Models\SPM;
use App\Models\User;
use Illuminate\Http\Request;

class SPMController extends Controller
{
    public function __construct()
    {
        $this->orderName = 'spm_';
    }

    public function Create()
    {
        // dd('ok');
        return view('spm.create');
    }

    public function Edit(Order $order)
    {
        $order->load('spms');
        return view('spm.edit', compact(['order']));
    }

    public function Store(User $user, Request $request)
    {
        $request->validate([
            "nama_order"      => "required",
            "nama_spm"        => "required",
            "jns_klm_spm"     => "required",
            "alamat_spm"      => "required",
            "pekerjaan_spm"   => "required|max:20",
            "kesalahan_spm"   => "required|max:100",
            "penerima_spm"    => "required|max:30",
            "tmpt_spm_terbit" => "required",
            "tgl_spm_terbit"  => "required",
        ]);

        $lastRecord = Order::all()->last();
        $primaryKey = 'order_id';
        $role       = '2';

        $order['order_id']   = CustomHelperController::IdGenerator($lastRecord, $primaryKey, $role);
        $order['nama_order'] = $this->orderName.$request->nama_order;
        $order['user_id']    = $user->user_id;
        Order::create($order);

        $spm = $request->only([
            "nama_spm",
            "jns_klm_spm",
            "alamat_spm",
            "pekerjaan_spm",
            "kesalahan_spm",
            "penerima_spm",
            "tmpt_spm_terbit",
            "tgl_spm_terbit",
        ]);

        $spmLastRecord = SPM::all()->last();
        $spmPrimaryKey = 'spm_id';

        $spm['spm_id']   = CustomHelperController::IdGenerator($spmLastRecord, $spmPrimaryKey, $role);
        $spm['order_id'] = $order['order_id'];
        SPM::create($spm);

        return redirect('/dashboard')->with('success', 'surat berhasil dibuat');
    }

    public function Update(Order $order, Request $request)
    {
        $request->validate([
            "nama_spm"        => "required",
            "jns_klm_spm"     => "required",
            "alamat_spm"      => "required",
            "pekerjaan_spm"   => "required|max:20",
            "kesalahan_spm"   => "required|max:100",
            "penerima_spm"    => "required|max:30",
            "tmpt_spm_terbit" => "required",
            "tgl_spm_terbit"  => "required",
        ]);

        $order->load('spms');

        $dataSPM = $request->only([
            "nama_spm",
            "jns_klm_spm",
            "alamat_spm",
            "pekerjaan_spm",
            "kesalahan_spm",
            "penerima_spm",
            "tmpt_spm_terbit",
            "tgl_spm_terbit",
        ]);

        $order->spms[0]->update($dataSPM);

        return redirect('/dashboard')->with('success', 'surat berhasil di update');
    }
    
    public function Delete(Order $order)
    {
        $order->delete();

        return redirect('/dashboard')->with('success', 'surat berhasil di hapus');
    }
}

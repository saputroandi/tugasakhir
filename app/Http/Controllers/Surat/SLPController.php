<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomHelper\CustomHelperController;
use App\Models\Lampiran;
use App\Models\Order;
use App\Models\SLP;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SLPController extends Controller
{
    public function __construct()
    {
        $this->orderName = 'slp_';
    }

    public function Create()
    {
        // dd('ok');
        return view('slp.create');
    }

    public function Edit(Order $order)
    {
        $order->load(['slps']);
        $order->slps->load(['lampirans']);
        return view('slp.edit', compact(['order']));
    }

    public function Store(User $user, Request $request)
    {
        $validatingLampiran = $request->lampiran;
        $arrayMessages      = ['lampiran' => 'Lampiran cannot be empty'];

        CustomHelperController::ManualValidation($validatingLampiran, $arrayMessages);

        $request->validate([
            "nama_order"      => "required|max:30",
            "nama_slp"        => "required|max:20",
            "tmpt_lahir_slp"  => "required|max:20",
            "tgl_lahir_slp"   => "required",
            "jns_klm_slp"     => "required|max:10",
            "pendidikan_slp"  => "required|max:10",
            "no_hp_slp"       => "required|max:15",
            "email_slp"       => "required|max:30",
            "alamat_slp"      => "required|max:100",
            "posisi_slp"      => "required|max:20",
            "penerima_slp"    => "required|max:20",
            "tmpt_slp_terbit" => "required|max:20",
            "tgl_slp_terbit"  => "required",
        ]);

        $lastRecord = Order::all()->last();
        $primaryKey = 'order_id';
        $role       = '2';

        $order['order_id']   = CustomHelperController::IdGenerator($lastRecord, $primaryKey, $role);
        $order['nama_order'] = $this->orderName . $request->nama_order;
        $order['user_id']    = $user->user_id;
        Order::create($order);

        $slp = $request->only([
            "nama_slp",
            "tmpt_lahir_slp",
            "tgl_lahir_slp",
            "jns_klm_slp",
            "pendidikan_slp",
            "no_hp_slp",
            "email_slp",
            "alamat_slp",
            "posisi_slp",
            "penerima_slp",
            "tmpt_slp_terbit",
            "tgl_slp_terbit",
        ]);

        $slpLastRecord = SLP::all()->last();
        $slpPrimaryKey = 'slp_id';

        $slp['slp_id']   = CustomHelperController::IdGenerator($slpLastRecord, $slpPrimaryKey, $role);
        $slp['order_id'] = $order['order_id'];
        SLP::create($slp);

        foreach ($request->lampiran as $index => $value) {
            $lampiranLastRecord = Lampiran::all()->last();
            $lampiranPrimaryKey = 'lampiran_id';
            $lampiranId         = CustomHelperController::IdGenerator($lampiranLastRecord, $lampiranPrimaryKey, $role);

            $dataLampiran       = array(
                'lampiran_id'   => $lampiranId,
                'slp_id'        => $slp['slp_id'],
                'nama_lampiran' => $request->lampiran[$index],
            );

            if ($request->lampiran[$index] == null) continue;

            Lampiran::create($dataLampiran);
        }

        return redirect('/dashboard')->with('success', 'surat berhasil dibuat');
    }

    public function Update(Order $order, Request $request)
    {
        $validatingLampiranUpdate = $request->lampiran;
        $arrayMessagesUpdate      = ['lampiran' => 'Lampiran cannot be empty'];

        CustomHelperController::ManualValidation($validatingLampiranUpdate, $arrayMessagesUpdate);

        $request->validate([
            "nama_slp"        => "required|max:20",
            "tmpt_lahir_slp"  => "required|max:20",
            "tgl_lahir_slp"   => "required",
            "jns_klm_slp"     => "required|max:10",
            "pendidikan_slp"  => "required|max:10",
            "no_hp_slp"       => "required|max:15",
            "email_slp"       => "required|max:30",
            "alamat_slp"      => "required|max:100",
            "posisi_slp"      => "required|max:20",
            "penerima_slp"    => "required|max:20",
            "tmpt_slp_terbit" => "required|max:20",
            "tgl_slp_terbit"  => "required",
        ]);

        $order->load(['slps']);
        $order->slps->load(['lampirans']);

        foreach ($order->slps as $key => $slp) {
            foreach ($slp->lampirans as $i => $v) {
                $v->delete();
            }

            foreach ($request->lampiran as $index => $value) {
                $lampiranLastRecord = Lampiran::all()->last();
                $lampiranPrimaryKey = 'lampiran_id';
                $role               = '2';
                $lampiranId         = CustomHelperController::IdGenerator($lampiranLastRecord, $lampiranPrimaryKey, $role);

                $dataLampiran       = array(
                    'lampiran_id'   => $lampiranId,
                    'slp_id'        => $slp->slp_id,
                    'nama_lampiran' => $request->lampiran[$index],
                );

                if ($request->lampiran[$index] == null) continue;

                Lampiran::create($dataLampiran);
            }
        }

        $dataSLP = $request->only([
            "nama_slp",
            "tmpt_lahir_slp",
            "tgl_lahir_slp",
            "jns_klm_slp",
            "pendidikan_slp",
            "no_hp_slp",
            "email_slp",
            "alamat_slp",
            "posisi_slp",
            "penerima_slp",
            "tmpt_slp_terbit",
            "tgl_slp_terbit",
        ]);

        $order->slps[0]->update($dataSLP);

        return redirect('/dashboard')->with('success', 'surat berhasil di update');
    }

    public function Delete(Order $order)
    {
        $order->delete();

        return redirect('/dashboard')->with('success', 'surat berhasil di hapus');
    }
}

<?php
namespace App\Http\Controllers;

use App\Http\Controllers\CustomHelper\CustomHelperController;
use App\Models\Order;

class PrintController extends Controller
{
    public function Download($slug, Order $order)
    {
        switch ($slug) {
            case 'spd': 

                $order->load('spds');
                $spd              = $order->spds[0];
                $namaOrder        = explode('_',$order->nama_order)[1];
                $tanggalSPD       = CustomHelperController::tanggalIndo(date('Y-n-d', strtotime($spd->tgl_spd)));
                $tanggalSPDTerbit = CustomHelperController::tanggalIndo(date('Y-n-d', strtotime($spd->tgl_spd_terbit)));

                return view('spd.surat', compact(['order', 'spd', 'namaOrder', 'tanggalSPD', 'tanggalSPDTerbit']));

                break;
            case 'sk': 

                $order->load('sks');
                $sk                     = $order->sks[0];
                $namaOrder              = explode('_',$order->nama_order)[1];
                $tanggalLahirSK         = CustomHelperController::tanggalIndo(date('Y-n-d', strtotime($sk->tgl_lahir_sk)));
                $tanggalLahirPenerimaSK = CustomHelperController::tanggalIndo(date('Y-n-d', strtotime($sk->tgl_lahir_penerima_sk)));
                $tanggalSKTerbit        = CustomHelperController::tanggalIndo(date('Y-n-d', strtotime($sk->tgl_sk_terbit)));

                return view('sk.surat', compact(['order', 'sk', 'namaOrder', 'tanggalLahirSK', 'tanggalLahirPenerimaSK', 'tanggalSKTerbit']));

                break;

            case 'spm': 

                $order->load('spms');
                $spm              = $order->spms[0];
                $namaOrder        = explode('_',$order->nama_order)[1];
                $tanggalSPMTerbit = CustomHelperController::tanggalIndo(date('Y-n-d', strtotime($spm->tgl_spm_terbit)));

                return view('spm.surat', compact(['order', 'spm', 'namaOrder', 'tanggalSPMTerbit']));

                break;

            case 'sitmk': 

                $order->load('sitmks');
                $sitmk              = $order->sitmks[0];
                $namaOrder          = explode('_',$order->nama_order)[1];
                $tanggalMulaiSITMK  = CustomHelperController::tanggalIndo(date('Y-n-d', strtotime($sitmk->mulai_sitmk)));
                $tanggalAkhirSITMK  = CustomHelperController::tanggalIndo(date('Y-n-d', strtotime($sitmk->sampai_sitmk)));
                $tanggalSITMKTerbit = CustomHelperController::tanggalIndo(date('Y-n-d', strtotime($sitmk->tgl_sitmk_terbit)));

                return view('sitmk.surat', compact(['order', 'sitmk', 'namaOrder', 'tanggalMulaiSITMK', 'tanggalAkhirSITMK', 'tanggalSITMKTerbit']));

                break;

            case 'slp': 

                $order->load('slps');
                $order->slps->load('lampirans');
                $tanggalLahirSLP  = CustomHelperController::tanggalIndo(date('Y-n-d', strtotime($order->slps[0]->tgl_lahir_slp)));
                $tanggalSLPTerbit = CustomHelperController::tanggalIndo(date('Y-n-d', strtotime($order->slps[0]->tgl_slp_terbit)));

                return view('slp.surat', compact(['order', 'tanggalSLPTerbit', 'tanggalLahirSLP']));

                break;
            
            default: 
                $suratNotFound = 'surat tidak ditemukan';
                return view('spd.surat', compact('suratNotFound'));
                break;
        }
    }
}

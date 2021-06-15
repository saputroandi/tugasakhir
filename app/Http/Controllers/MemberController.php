<?php

namespace App\Http\Controllers;

use App\Mail\VerificationMail;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MemberController extends Controller
{
    public function Index()
    {
        $data = [
            'title' => 'Member'
        ];
        return view('member.index', $data);
    }

    public function create(User $user)
    {
        $create = new Payment;
        $create->payment_status = 1;

        $lastPayment = Payment::all()->last();
        if($lastPayment)
        {
            $paymentActualId = $lastPayment->payment_id[9] + 1;
        } else {
            $paymentActualId = 1;
        }
        $getDate = date("Ymd",time());
        $create->payment_id = '2'.$getDate.$paymentActualId;
        $create->user_id = $user->user_id;
        $create->save();

        $note = url('/') . '/payment-confirmation/' . $user->user_id;
        $note2 = 'Simpan bukti transaksi anda untuk dijadikan sebagai bukti pembayaran yang akan di upload pada halaman konfirmasi pembayaran sesuai tautan di atas.';
        $details = [
            'title' => 'Konfirmasi pembayaran anda dengan meng-klik tautan dibawah ini: ',
            'note' => $note,
            'note2' => $note2,
        ];

        Mail::to($user->email)->send(new VerificationMail($details));

        return redirect('/dashboard')->with('success', 'Silahkan cek email anda, untuk melakukan pembayaran..');
    }
}

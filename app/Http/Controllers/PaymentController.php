<?php

namespace App\Http\Controllers;

use App\Mail\VerificationMail;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function CreatePayment()
    {
        $data = [
            'title' => 'Daftar Member'
        ];
        return view('payments.create', $data);
    }

    public function SavePayment(User $user)
    {
        $payment = new Payment;
        $payment->payment_status = 1;

        $lastPayment = Payment::all()->last();
        if($lastPayment)
        {
            // $paymentActualId = $lastPayment->payment_id[9] + 1;
            $paymentActualId = substr($lastPayment->payment_id, 9, 1) + 1;
        } else {
            $paymentActualId = 1;
        }
        $getDate = date("Ymd",time());
        $payment->payment_id = intval('2'.$getDate.$paymentActualId);
        $payment->user_id = $user->user_id;
        $payment->save();

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

    public function PaymentConfirmation()
    {
        return view('payments.confirmation');
    }

    public function SavePaymentConfirmation(User $user, Payment $payment, Request $request)
    {
        dd($request->file("proof_of_payment")->getClientOriginalName());
    }
}

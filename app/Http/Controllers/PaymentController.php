<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CustomHelper\CustomHelperController;
use App\Mail\VerificationMail;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PaymentController extends Controller
{

    protected $CustomHelperController;

    public function __construct(CustomHelperController $CustomHelperController)
    {
        $this->CustomHelperController = $CustomHelperController;
    }

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
        $payment->user_id = $user->user_id;

        $lastPayment = Payment::all()->last();
        $role = "2";

        $payment->payment_id = $this->CustomHelperController->IdGenerator($lastPayment, 'payment_id', $role);
        
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
        $request->validate([
            "proof_of_payment" => "required|image|mimes:jpeg,jpg,png|max:1999",
            "note" => "nullable|string",
        ]);

        $uploadedFile = $request->file("proof_of_payment");
        
        $filenameWithExt = $request->file("proof_of_payment")->getClientOriginalName();
        $extension = $request->file("proof_of_payment")->getClientOriginalExtension();

        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $saved_filename = Str::remove(' ', $filename)."_".time().".".$extension;
        $path = Storage::putFileAs(
            'public/proof_of_payment', $uploadedFile, $saved_filename
        );

        // update payment
        $payment->payment_status = 2;
        $payment->proof_of_payment = $saved_filename;
        $payment->note = $request->note;
        $payment->save();

        // dd(Storage::url($path));
        return redirect('/dashboard')->with('success', 'Tunggu maksimal 1 x 24 jam untuk proses verifikasi pembayaran oleh admin, status pembayaran akan dikirim melalui email...');
    }

    public function PaymentAccepted(User $user, Payment $payment)
    {
        $payment->payment_status = 3;
        $payment->save();

        $title = 'Konfirmasi pembayaran anda telah diterima';
        $note = 'Selamat pembayaran anda telah diterima, anda nikmati fasilitas-fasilitas aplikasi Buat Surat';
        $note2 = 'Terima kasih semoga bermanfaat';

        $details = [
            'title' => $title,
            'note' => $note,
            'note2' => $note2,
        ];

        Mail::to($user->email)->send(new VerificationMail($details));

        return redirect('/admin')->with('success', 'Pembayaran di terima');
    }

    public function PaymentDenied(User $user, Payment $payment)
    {
        
        Storage::delete('public/proof_of_payment/' . $payment->proof_of_payment);
        $payment->payment_status = 1;
        $payment->proof_of_payment = null;
        $payment->note = null;
        $payment->save();

        $title = 'Konfirmasi pembayaran anda ditolak';
        $note = 'Pembayaran anda ditolak, silahkan lakukan konfirmasi pembayaran ulang';

        $details = [
            'title' => $title,
            'note' => $note,
        ];

        Mail::to($user->email)->send(new VerificationMail($details));

        return redirect('/admin')->with('fail', 'Pembayaran di tolak');
    }
    
}

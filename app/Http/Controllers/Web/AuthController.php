<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomHelper\CustomHelperController;
use App\Mail\VerificationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function Login()
    {
        $data = [
            "title" => "Login",
        ];

        if (url()->previous() == route('payment.confirmation')) {
            session_start();
            $_SESSION["paymentConfirmation"] = 1;
        };

        return view("auth.login", $data);
    }

    public function Register()
    {
        $data = [
            "title" => "Register",
        ];

        return view("auth.register", $data);
    }

    public function RegisterUser(Request $request)
    {
        $request->validate([
            "nama" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|confirmed|min:6|max:12"
        ]);

        $user = new User;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->email_verifikasi = false;
        $user->password = Hash::make($request->password);

        $lastUser = User::all()->last();
        $role = "2";

        $user->user_id = CustomHelperController::IdGenerator($lastUser, 'user_id', $role);
        // dd($user->user_id);

        $query = $user->save();

        $UserNotConfirmedEmailYet = User::where('email', $request->email)->first();

        $title = 'Konfirmasi email anda dengan meng-klik tautan dibawah ini: ';
        $detailsMailBody = url('/') . '/email-confirmation/' . $UserNotConfirmedEmailYet->user_id;

        $details = [
            'title' => $title,
            'note' => $detailsMailBody,
        ];

        Mail::to($request->email)->send(new VerificationMail($details));

        if ($query) {
            return back()->with('success', 'Anda telah berhasil mendaftar silahkan cek email untuk verifikasi');
        } else {
            return back()->with('fail', 'Gagal mendaftar, terjadi kesalahan');
        }
    }

    public function LoginUser(Request $request)
    {
        $user = $request->validate([
            "email" => "required",
            "password" => "required|min:6|max:12",
        ]);

        session_start();

        if (Auth::attempt($user)) {

            if (Auth::user()->email_verifikasi == false) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->with('fail', 'Harap verifikasi email terlebih dahulu');
            };

            $request->session()->regenerate();

            if (Str::substr(Auth::user()->user_id, 0, 1) == 1) {
                return redirect('/admin');
            } else {

                if (count($_SESSION) > 0 && $_SESSION["paymentConfirmation"] === 1) {
                    $_SESSION;
                    session_unset();
                    session_destroy();
                    return redirect()->route('payment.confirmation');
                };

                return redirect('/dashboard');
            }
        }
        return back()->with("fail", "Email atau password salah");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        session_start();

        session_unset();

        session_destroy();

        return redirect('/auth/login');
    }

    public function MailConfirmation(User $user)
    {
        $user->email_verifikasi = true;
        $user->save();

        return redirect('/auth/login')->with('success', 'Email anda sudah terverifikasi, silahkan login..');
    }
}

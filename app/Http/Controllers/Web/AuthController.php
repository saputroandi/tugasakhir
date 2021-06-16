<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Mail\VerificationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function Login()
    {
        $data = [
            "title" => "Login",
        ];
        
        return view( "auth.login", $data );
    }

    public function Register()
    {
        $data = [
            "title" => "Register",
        ];

        return view( "auth.register", $data );
    }

    public function RegisterUser(Request $request)
    {
        $request->validate([
            "nama"=>"required",
            "email"=>"required|email|unique:users,email",
            "password"=>"required|confirmed|min:6|max:12"
        ]);

        $user = new User;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->email_verifikasi = false;
        $user->password = Hash::make($request->password);

        $lastUser = User::all()->last();
        if($lastUser)
        {
            // $userActualId = $lastUser->user_id[9] + 1;
            $userActualId = substr($lastUser->user_id, 9, 1) + 1;
        } else {
            $userActualId = 1;
        }
        $getDate = date("Ymd",time());
        $user->user_id = intval("2".$getDate.$userActualId);
        // dd($user->user_id);

        $query = $user->save();

        $UserNotConfirmedEmailYet = User::where('email', $request->email)->first();

        $detailsMailBody = url('/') . '/email-confirmation/' . $UserNotConfirmedEmailYet->user_id ;

        $details = [
        'title' => 'Konfirmasi email anda dengan meng-klik tautan dibawah ini: ',
        'body' => $detailsMailBody,
        ];

        Mail::to($request->email)->send(new VerificationMail($details));

        if($query){
            return back()->with('success', 'Anda telah berhasil mendaftar silahkan cek email untuk verifikasi');
        } else {
            return back()->with('fail', 'Gagal mendaftar, terjadi kesalahan');
        }
    }

    public function LoginUser(Request $request)
    {
        $user = $request->validate([
            "email"=>"required",
            "password"=>"required|min:6|max:12",
        ]);

        if (Auth::attempt($user)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return back()->with("fail", "Email atau password salah");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/auth/login');
    }

    public function MailConfirmation(User $user)
    {
        $user->email_verifikasi = true;
        $user->save();

        return redirect('/auth/login')->with('success', 'Email anda sudah terverifikasi, silahkan login..');
    }
}

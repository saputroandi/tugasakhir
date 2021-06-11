<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $query = $user->save();

        if($query){
            return back()->with('success', 'Anda telah berhasil mendaftar');
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
}

<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}

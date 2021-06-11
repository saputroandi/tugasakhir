<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\VerificationMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function TestMail(){

        $details = [
        'title' => 'Mail from websitepercobaan.com',
        'body' => 'This is for testing email using smtp'
        ];

        Mail::to('saputro.andi593@gmail.com')->send(new VerificationMail($details));

        dd("Email sudah terkirim.");

	}
}

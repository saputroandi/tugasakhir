<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\VerificationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function Create()
    {
        return view('feedback.create');
    }

    public function Send(User $user, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'note'  => 'required',
        ]);

        $admin = 'saputro.andi593@gmail.com';
        $title = $request->title;
        $note  = 'feedback dari user: '.$user->nama.' ('.$user->email.')';
        $note2 = $request->note;

        $data = [
            'title' => $title,
            'note'  => $note,
            'note2' => $note2,
        ];

        Mail::to($admin)->send(new VerificationMail($data));

        return redirect('/dashboard')->with('success', 'Terima atas feedback/saran anda');
    }
}

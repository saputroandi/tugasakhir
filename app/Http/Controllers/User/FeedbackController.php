<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function Create()
    {
        return view('feedback.create');
    }

    public function Send(User $user, Request $request)
    {
        dd($user, $request);
    }
}

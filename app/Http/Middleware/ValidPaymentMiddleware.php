<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ValidPaymentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $lastPayment         = Auth::user()->payments->last();
        $validMemberStatus   = 3;

        if ($lastPayment) {

            if ($lastPayment->payment_status == $validMemberStatus) {
                return redirect('/dashboard')->with('fail', 'Member anda masih aktif, anda tidak bisa mendaftar member');
            };
        }
        return $next($request);
    }
}

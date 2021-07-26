<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PaymentMiddleware
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
        $invalidMemberStatus = 4;

        if($lastPayment){

            $getPaymentDateAsEpoch = strtotime(Str::substr($lastPayment->payment_id, 1, 8));
            $monthAfterPaymentDate = strtotime('+1 month', $getPaymentDateAsEpoch);

            if($lastPayment->payment_status == $validMemberStatus && $monthAfterPaymentDate < time()){
    
                $lastPayment->payment_status = $invalidMemberStatus;
                $lastPayment->save();
                return redirect('/dashboard')->with('fail', 'Membership anda sudah tidak valid, harap memperbarui membership anda..');
    
            };

        }

        return $next($request);
    }
}

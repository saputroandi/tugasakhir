<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberMiddleware
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
        $invalidMemberStatus = 4;

        if(!$lastPayment || $lastPayment->payment_status == $invalidMemberStatus) return redirect('/dashboard')->with('fail', 'Unauthorize action');
        
        return $next($request);
    }
}

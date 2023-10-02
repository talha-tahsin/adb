<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ReceiptAuth
{
    
    public function handle(Request $request, Closure $next)
    {
        if(!empty(auth()->user()->role)){
            if(auth()->user()->role == 'admin' || auth()->user()->role == 'receipt_all'){
               return $next($request);
            }
        }
        else {
            session()->flush();
            return redirect()->route('login');
        }
    }
}

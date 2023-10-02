<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdmitAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!empty(auth()->user()->role)){
            if(auth()->user()->role == 'admin' || auth()->user()->role == 'admit_all'){
               return $next($request);
            }
        }
        else {
            session()->flush();
            return redirect()->route('login');
        }
    }
}

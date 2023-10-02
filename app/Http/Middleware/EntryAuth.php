<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EntryAuth
{
   
    public function handle(Request $request, Closure $next)
    {
        if(!empty(auth()->user()->role)){
            if(auth()->user()->role == 'admin' || auth()->user()->role == 'all_entry'){
               return $next($request);
            }
        }
        else {
            session()->flush();
            return redirect()->route('login');
        }
    }
}

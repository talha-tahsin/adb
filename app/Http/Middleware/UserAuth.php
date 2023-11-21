<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAuth
{
   
    public function handle(Request $request, Closure $next): Response
    {
        if(!empty(auth()->user()->role))
        {
            if(auth()->user()->role == 'admin' || auth()->user()->role == 'user' || auth()->user()->role == 'entry')
            {
               return $next($request);
            }
        }
        else 
        {
            session()->flush();
            return redirect()->route('login');
        }
    }
}

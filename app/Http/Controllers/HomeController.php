<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function view_dashboard(){
        if(!empty(auth()->user()->role)){ 
            return view('dashboard');
        }
        else {
            return view('auth.login');
        }
    }

    public function view_login(){
        
        if(!empty(auth()->user()->role)){ 
            return redirect()->route('dashboard');
        }
        else {
            return view('auth.login');
        }
    }

    public function view_register(){
        return view('auth.register');
    }

    public function view_userPanel(){
        return view('admin.user_panel');
    }

    

}

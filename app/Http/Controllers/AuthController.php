<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

use App\Models\User;
use App\Models\UserResets;



class AuthController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);


        $data = array(
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        );

        $insrt = User::create($data);
        $insrt->save();

        $reset_data = array(
            'plain_password' => $request['password']
        );

        $insrt_reset = UserResets::create($reset_data);
        $insrt_reset->save();

        // return redirect("dashboard")->withSuccess('Registration Successful...');
        return redirect()->route('login');

    }

    public function get_login(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        $credentials = $request->only('name', 'password');
        
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
        else {
            return redirect("login");
        }

    }

    public function get_logout(){

        Session()->flush();
        Auth::logout();

        return redirect()->route('login');

    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function view_dashboard()
    {
        if(!empty(auth()->user()->role)){
            $data = DB::table('key_watershed')->orderBy('id')->get();
            
            return view('layouts.watershed._dashboard', compact('data'));
        }
        else {
            return view('auth.login');
        }
    }

    public function view_login()
    {
        if(!empty(auth()->user()->role)){ 
           
            return redirect()->route('dashboard', compact('data'));
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
    public function watershed_view(){
        return view('watershed_dashboard', compact('data'));
    }
    public function data_entry_dashboard(){
        return view('layouts.para._dashboard2');
    }

    public function store_watershed_info_for_entry(Request $request)
    {
        $receiveData = $request['dataToSend'];
        $value = json_decode($receiveData);

        $userName = $value->user_name;

        $timestamp = time();
        $created_at = date("Y-m-d H:i:s", $timestamp);

        $store_data = array(
            'user_name' => $value->user_name,
            'watershed_id' => $value->watershed_id,
            'watershed_name' => $value->watershed_name,
            'created_at' => $created_at,
        );

        DB::table('tbl_active_watershed')->where('user_name', $userName)->update($store_data);
        DB::commit();
            
        return response()->json([ 'status' => 'SUCCESS', 'message' => 'Data store successfully...' ]);

    }

    public function logout_current_watershed()
    {
        Cache::forget('watershed_id');
        Cache::forget('watershed_name');

        $data = DB::table('key_watershed')->orderBy('id')->get();
            
        return view('layouts.watershed._dashboard', compact('data'));

    }
    

}

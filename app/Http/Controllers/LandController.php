<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

use App\Models\Land;


use Illuminate\Http\Request;

class LandController extends Controller
{
    
    public function view_land_entry(){
        return view('land.land_entry');
    }



}

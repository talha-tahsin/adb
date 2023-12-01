<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class LulcValidationController extends Controller
{
    public function show_ground_truth1(){
        return view('lulc_validation.ground_truth_1st');
    }
    public function show_ground_truth2(){
        return view('lulc_validation.ground_truth_2nd');
    }
}

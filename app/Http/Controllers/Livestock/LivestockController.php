<?php

namespace App\Http\Controllers\Livestock;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class LivestockController extends Controller
{
    
    public function livestock_entry(){
        return view('livestock.livestock_entry');
    }

}

<?php

namespace App\Http\Controllers\Societal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

use App\Models\Livelihood;

class LivelihoodController extends Controller
{
    public function store_livelihood_info(Request $request)
    {
        $xml = $request['json_data'];
        $value = json_decode($xml);

        dd($value);
        
        $timestamp = time();
        $created_at = date("Y-m-d H:i:s", $timestamp);

    }
}

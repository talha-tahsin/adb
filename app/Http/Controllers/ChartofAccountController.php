<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountCode;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;

class ChartofAccountController extends Controller
{
    public function view_chartofAccounts()
    {
        return view('admin.chartof_accounts');
    }
}

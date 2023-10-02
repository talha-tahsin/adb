<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

use App\Models\AdmitMaster;
use App\Models\HealthStatus;
use App\Models\AdmitDetails;
use App\Models\ReceiptMaster;
use App\Models\ReceiptDetails;
use App\Models\AccountCode;



class LedgerViewController extends Controller
{
    public function view_ledger(){
        return view('ledger.ledger_view');
    }
}

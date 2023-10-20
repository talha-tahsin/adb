<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

use App\Models\Doctor;
use App\Models\AdmitMaster;
use App\Models\HealthStatus;
use App\Models\AdmitDetails;
use App\Models\ReceiptMaster;
use App\Models\ReceiptDetails;
use App\Models\AccountCode;

class UtilsController extends Controller
{
    public function getCommunityList(){
        
        $retStr = '';
        $data = DB::table('lookup_community')
                    ->select('id', 'community_name')
                    ->orderBy('community_name')
                    ->get();

        // $retStr .= '<option value="" selected disabled>Select Doctor</option>'; 
        // foreach($data as $v) {
        //     $retStr .= '<option value="'.$v->doctor_name.'">'.$v->doctor_name.' ('.$v->title.')</option>';
        // }

        return response()->json([ 'message' => $data ]);

    }

    public function getPatientList(){
        
        $retStr = '';
        $data = DB::table('tab_admit_master')
                    ->select('patient_id', 'patient_name')
                    ->where('delete_row', '0')
                    ->orderBy('patient_name')
                    ->get();

        $retStr .= '<option value="" selected disabled>Select Patient </option>'; 
        foreach($data as $v) {
            $retStr .= '<option value="'.$v->patient_id.'">'.$v->patient_name.' ('.$v->patient_id.')</option>';
        }

        return $retStr;

    }

    public function getAllMedicalTest(){
        
        $retStr = '';
        $data = DB::table('tab_acc_codes')
                    ->select('acc_code', 'acc_name_en')
                    ->where('acc_code', 'like', '410%')
                    ->where('acc_code_type', '=', 'child')
                    ->orderBy('acc_name_en')
                    ->get();

        $retStr .= '<option value="" selected disabled>Select Test</option>'; 
        foreach($data as $v) {
            $retStr .= '<option value="'.$v->acc_code.'">'.$v->acc_name_en.' ('.$v->acc_code.')</option>';
        }

        return $retStr;

    }
    
}

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


class AdmitController extends Controller
{
    public function view_admitEntry(){
        return view('admit.admit_entry');
    }

    public function getDoctorsList(){
        
        $retStr = '';
        $data = DB::table('tab_doctors')
                    ->select('id', 'doctor_name', 'title')
                    ->where('status', 'active')
                    ->orderBy('doctor_name')
                    ->get();

        $retStr .= '<option value="" selected disabled>Select Doctor</option>'; 
        foreach($data as $v) {
            $retStr .= '<option value="'.$v->doctor_name.'">'.$v->doctor_name.' ('.$v->title.')</option>';
        }

        return $retStr;

    }

    public function AdmitEntry(Request $request){
        
        $personal_info = array(
            'patient_id' => $request['patient_id'],
            'admit_date' => $request['admit_date'],
            'patient_name' => $request['patient_nm'],
            'age' => $request['patient_age'],
            'weight' => $request['patient_weight'],
            'blood_grp' => $request['blood_grp'],
            'admit_cause' => $request['admit_cause'],
            'gender' => $request['gender'],
            'cont_number' => $request['cont_num'],
            'address' => $request['address'],
            'entry_by' => $request['entry_by']
        );

        $insert_1 = AdmitMaster::create($personal_info);
        
        $insert_1->save();


        $health_info = array(
            'patient_id' => $request['patient_id'],
            'admit_date' => $request['admit_date'],
            'health_condition' => $request['helth_condt'],
            'health_condt_descrip' => $request['helth_discrip'],
            'allergies' => $request['allergies'],
            'allergies_descrip' => $request['allergies_discrip'],
            'surgery' => $request['surgery'],
            'surgery_descrip' => $request['surgery_discrip'],
            'entry_by' => $request['entry_by']
        );

        $insert_2 = HealthStatus::create($health_info);
        $insert_2->save();

        $admit_info = array(
            'patient_id' => $request['patient_id'],
            'admit_date' => $request['admit_date'],
            'admit_acc_code' => $request['admit_acc_code'],
            'admited_by' => $request['admit_by'],
            'admit_type' => $request['admit_type'],
            'bed_cabin_type' => $request['bed_cabin_type'],
            'bed_cabin_no' => $request['bed_cabin_no'],
            'bed_cabin_charge' => $request['cabin_charge'],
            'entry_by' => $request['entry_by']
        );

        $insert_3 = AdmitDetails::create($admit_info);
        $insert_3->save();
    

        if ($insert_1 && $insert_2 && $insert_3) { 
            return response()->json([ 'status' => 'SUCCESS', 'message' => 'Admit save successfully..' ]);
        }
        else {
            return response()->json([ 'status' => 'ERROR', 'message' => 'Admit not save, something went wrong..' ]);
        }

    }

}

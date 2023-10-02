<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

use App\Models\ReceiptMaster;
use App\Models\ReceiptDetails;
use App\Models\AccountCode;

class ReceiptController extends Controller
{

    public function insertReceiptEntry(Request $request){
        
        $mstr_data = array(
            'receipt_no' => $request['receipt_no'],
            'doctor_name' => $request['test_by'],
            'receipt_date' => $request['entry_date'],
            'patient_name' => $request['patient_nm'],
            'patient_age' => $request['patient_age'],
            'gender' => $request['gender'],
            'blood_group' => $request['blood_grp'],
            'cont_number' => $request['cont_num'],
            'address' => $request['address'],
            'entry_by' => $request['entry_by']
        );

        $insert = ReceiptMaster::create($mstr_data);
        $insert->save();

        $xml = $request['xml_data'];
        $xmlStr = simplexml_load_string($xml);

        foreach ($xmlStr->trans as $key => $value) {

            $detls_data = array(
                'receipt_no' => $value->receipt_no,
                'receipt_date' => $value->receipt_date,
                'test_name' => $value->test_nm,
                'test_code' => $value->test_code,
                'amount' => $value->amount
            );

            $insert2 = ReceiptDetails::create($detls_data);
            $insert2->save();
        
        }

        if ($insert && $insert2) { 
            return response()->json([ 'status' => 'SUCCESS', 'message' => 'Receipt save successfully..' ]);
        }
        else {
            return response()->json([ 'status' => 'ERROR', 'message' => 'Receipt not save, something went wrong..' ]);
        }

    }

    public function view_receiptCheckPrint(){
        return view('receipt.receipt_check_print');
    }

    public function get_patient_detls(Request $request){

        $patint_id = $request['patient_id'];

        $data = DB::table('tab_admit_master')
                    ->select('patient_name', 'age', 'gender', 'blood_grp', 'cont_number', 'address')
                    ->where('patient_id', $patint_id)
                    ->get();

        return response()->json([ 'status' => 'SUCCESS', 'message' => $data ]);
    
    }

    public function get_receipt_list(Request $request){

        $start_date = $request['start_date'];
        $end_date = $request['end_date'];

        $data = DB::table('tab_receipt_master as a')
                    ->select('a.receipt_no as rec_no', 
                                DB::raw('max(a.receipt_date) as date'), 
                                DB::raw('max(patient_name) as name'), DB::raw('max(patient_age) as age'), 
                                DB::raw('max(cont_number) as number'), DB::raw('max(status) as status'), 
                                DB::raw('sum(amount) as amt')
                            )
                    ->leftJoin('tab_receipt_details as b', 'a.receipt_no', '=', 'b.receipt_no')
                    ->whereBetween('a.receipt_date', [$start_date, $end_date])
                    ->groupBy('a.receipt_no')
                    ->orderBy('a.receipt_date')
                    ->get();
      
        // dd($data);
        $tabStr = '';
        $count = 1;

        foreach ($data as $user) {
            $tabStr .= '<tr>';
            // $tabStr .= '<td style="text-align: center;">'.$count++.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$user->rec_no.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$user->date.'</td>';
            $tabStr .= '<td style="text-align: left;">'.$user->name.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$user->age.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$user->number.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$user->amt.'</td>';

            if($user->status == '0')
              $tabStr .= '<td style="text-align: center;color: red;">Pending</td>';
            else
              $tabStr .= '<td style="text-align: center;color: green;">Complete</td>';

            // $tabStr .= '<td style="text-align: center;">
            // <button type="submit" id="btn_edit" class="btn btn-primary" row_id="'.$user->receipt_no.'">Edit</button></td>';
            $tabStr .= '<td style="text-align: center;">
            <button type="submit" id="btn_delte" class="btn btn-warning" row_id="'.$user->rec_no.'">Details</button></td>';
            $tabStr .= '</tr>';
        }

        return $tabStr;

    }

}

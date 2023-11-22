<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class ParaBoundaryController extends Controller
{
    public function show_basic_info(){
        return view('para_boundary.basic_info');
    }

    public function store_basic_info_para_boundary(Request $request)
    {
        $receiveData = $request['dataToSend'];
        $value = json_decode($receiveData);
        // dd($value,$v_xml, $xmlstr);
        
        $timestamp = time();
        $created_at = date("Y-m-d H:i:s", $timestamp);

        // check dupliacte record in database ::
        // $found = DB::table('tbl_water_resources1')->select('id')
        //                     ->where('watershed_id', $value->watershed_id)
        //                     ->where('para_id', $value->para_id)
        //                     ->count();

        // if($found > 0){
        //     $message = 'Data already exsits for this watershed and para, not possible to store...';
        //     return response()->json([ 'status' => 'ERROR', 'message' => $message ]);
        // }

        try 
        {
            DB::beginTransaction();

            $store_data = array(
                'survey_date' => $value->survey_date,
                'watershed_id' => $value->watershed_id,
                'watershed_name' => $value->watershed_name,
                'para_name' => $value->para_name,
                'mouza_name' => $value->mouza_name,
                'union_name' => $value->union,            
                'upozila' => $value->upozila,            
                'district' => $value->district,            
                'headman_name' => $value->headman_name,            
                'karbari_name' => $value->karbari_name,            
                'chairman_name' => $value->chairman_name,            
                'para_area' => $value->para_area,            
                'any_remarks' => $value->any_remarks,            
                'created_by' => $value->created_by,
                'created_at' => $created_at,
            );

            DB::table('p1_basic_info')->insert($store_data);
          
            DB::commit();
            
            return response()->json([ 'status' => 'SUCCESS', 'message' => 'Data store successfully...' ]);
            
        }
        catch (\Exception $e) 
        {
            DB::rollBack();
            $message = "Opps!! Something is wrong, data not saved and rollback..";
            return response()->json([ 'status' => 'ERROR', 'message' => $message ]);
        } 


    }

}

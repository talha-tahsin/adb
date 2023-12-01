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
    public function store_first_ground_truth(Request $request)
    {
        $receiveData = $request['dataToSend'];
        $xmlstr = simplexml_load_string($receiveData);
        dd($xmlstr->row);
        
        $timestamp = time();
        $created_at = date("Y-m-d H:i:s", $timestamp);

        try 
        {
            DB::beginTransaction();

            foreach ($xmlstr->row as $value) 
            {

                $store_data = array(
                    'watershed_id' => $value->watershed_id,
                    'watershed_name' => $value->watershed_name,
                    'para_id' => $value->para_id,
                    'para_name' => $value->para_name,
                    'map_code_unit' => $value->map_code_unit,
                    'longitude_east' => $value->longitude_east,
                    'longitude_north' => $value->longitude_north,
                    'elevation' => $value->elevation,
                    'map_code' => $value->map_code,
                    'observed_code' => $value->observed_code,
                    'gcp_type' => $value->gcp_type,
                    'created_by' => $value->created_by,
                    'created_at' => $created_at,
                );
                
                DB::table('tbl_1st_ground_truth')->insert($store_data);
                DB::commit();
            }
            
            return response()->json([ 'status' => 'SUCCESS', 'message' => 'Data store successfully...' ]);
            
        }
        catch (\Exception $e) 
        {
            DB::rollBack();
            $message = "Opps!! Something is wrong, data not saved and rollback..";
            return response()->json([ 'status' => 'ERROR', 'message' => $message ]);
        }

    }
    public function store_second_ground_truth(Request $request)
    {
        $receiveData = $request['dataToSend'];
        $xmlstr = simplexml_load_string($receiveData);
        dd($xmlstr->row);
        
        $timestamp = time();
        $created_at = date("Y-m-d H:i:s", $timestamp);

        try 
        {
            DB::beginTransaction();

            foreach ($xmlstr->row as $value) 
            {

                $store_data = array(
                    'watershed_id' => $value->watershed_id,
                    'watershed_name' => $value->watershed_name,
                    'para_id' => $value->para_id,
                    'para_name' => $value->para_name,
                    'map_code_unit' => $value->map_code_unit,
                    'longitude_east' => $value->longitude_east,
                    'longitude_north' => $value->longitude_north,
                    'elevation' => $value->elevation,
                    'map_code' => $value->map_code,
                    'observed_code' => $value->observed_code,
                    'gcp_type' => $value->gcp_type,
                    'created_by' => $value->created_by,
                    'created_at' => $created_at,
                );
                
                DB::table('tbl_2nd_ground_truth')->insert($store_data);
                DB::commit();
            }
            
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

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

class AccessibilityController extends Controller
{
    public function store_accessibility1_info(Request $request)
    {
        $xml = $request['xml_data'];
        $xmlstr = simplexml_load_string($xml);
        // dd($xmlstr->row);
        
        $timestamp = time();
        $created_at = date("Y-m-d H:i:s", $timestamp);
       
        // check dupliacte record in database ::
        $found = DB::table('tbl_accessibility1')->select('id')
                        ->where('watershed_id', $xmlstr->row->watershed_id)
                        ->where('para_id', $xmlstr->row->para_id)
                        ->count();

        if($found > 0){
            return response()->json([ 'status' => 'ERROR', 'message' => 'Data already exsits for this watershed and para, not possible to store...' ]);
        }

        try 
        {
            foreach ($xmlstr->row as $value) 
            {
                DB::beginTransaction();

                $store_data = array(
                    'watershed_id' => $value->watershed_id,
                    'para_id' => $value->para_id,
                    'para_name' => $value->para_name,
                    'transportation_id' => $value->transportation_id,
                    'transportation_name' => $value->transportation_name,
                    'trans_condition' => $value->condition,
                    'comments' => $value->comments,
                    'created_by' => $value->created_by,
                    'created_at' => $created_at,
                );
                
                DB::table('tbl_accessibility1')->insert($store_data);

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

    public function store_accessibility2_info(Request $request)
    {
        $xml = $request['json_data'];
        $value = json_decode($xml);
        // dd($value);
        
        $timestamp = time();
        $created_at = date("Y-m-d H:i:s", $timestamp);

        // check dupliacte record in database ::
        $found = DB::table('tbl_accessibility2')->select('id')
                        ->where('watershed_id', $value->watershed_id)
                        ->where('para_id', $value->para_id)
                        ->count();

        if($found > 0){
            return response()->json([ 'status' => 'ERROR', 'message' => 'Data already exsits for this watershed and para, not possible to store...' ]);
        }

        try 
        {
            DB::beginTransaction();

            $store_data = array(
                'watershed_id' => $value->watershed_id,
                'para_id' => $value->para_id,
                'para_name' => $value->para_name,
                'phone_less20' => $value->phone_less20,
                'phone_20to40' => $value->phone_20to40,
                'phone_up40' => $value->phone_up40,
                'anroid_less20' => $value->anroid_less20,
                'anroid_20to40' => $value->anroid_20to40,
                'anroid_up40' => $value->anroid_up40,
                'intertnet_less20' => $value->intertnet_less20,
                'intertnet_20to40' => $value->intertnet_20to40,
                'intertnet_up40' => $value->intertnet_up40,
                'remarks' => $value->remarks,
                'created_by' => $value->created_by,
                'created_at' => $created_at,
            );
            
            DB::table('tbl_accessibility2')->insert($store_data);

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

    public function store_accessibility3_info(Request $request)
    {
        $xml = $request['json_data'];
        $value = json_decode($xml);
        // dd($value);
        
        $timestamp = time();
        $created_at = date("Y-m-d H:i:s", $timestamp);

        // check dupliacte record in database ::
        $found = DB::table('tbl_accessibility3')->select('id')
                        ->where('watershed_id', $value->watershed_id)
                        ->where('para_id', $value->para_id)
                        ->count();

        if($found > 0){
            return response()->json([ 'status' => 'ERROR', 'message' => 'Data already exsits for this watershed and para, not possible to store...' ]);
        }

        try 
        {
            DB::beginTransaction();

            $store_data = array(
                'watershed_id' => $value->watershed_id,
                'para_id' => $value->para_id,
                'para_name' => $value->para_name,
                'national_highway' => $value->national_highway,
                'regional_highway' => $value->regional_highway,
                'zilla_road' => $value->zilla_road,
                'local_road' => $value->local_road,
                'main_transportation' => $value->main_transportation,
                'goods_transportation' => $value->goods_transportation,
                'created_by' => $value->created_by,
                'created_at' => $created_at,
            );
            
            DB::table('tbl_accessibility3')->insert($store_data);

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

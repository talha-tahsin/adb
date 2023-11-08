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

    public function store_livestock_entry1(Request $request)
    {
        $xml = $request['xml_data'];
        $xmlstr = simplexml_load_string($xml);
        // dd($xmlstr->row);
        
        $timestamp = time();
        $created_at = date("Y-m-d H:i:s", $timestamp);

         // check dupliacte record in database ::
         $found = DB::table('tbl_livestock1')->select('id')
                                ->where('watershed_id', $xmlstr->row->watershed_id)
                                ->where('para_id', $xmlstr->row->para_id)
                                ->count();

        if($found > 0){
            $message = 'Data already exsits for this watershed and para, not possible to store...';
            return response()->json([ 'status' => 'ERROR', 'message' => $message ]);
        }

        try 
        {
            DB::beginTransaction();

            foreach ($xmlstr->row as $value) 
            {

                $store_data = array(
                    'watershed_id' => $value->watershed_id,
                    'para_id' => $value->para_id,
                    'para_name' => $value->para_name,
                    'livestock_id' => $value->livestock_id,
                    'livestock_name' => $value->livestock_name,
                    'nos' => $value->nos,
                    'unit_value' => $value->unit_value,
                    'created_by' => $value->created_by,
                    'created_at' => $created_at,
                );
                
                // $store = Economic::insert($store_data);
                DB::table('tbl_livestock1')->insert($store_data);

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

    public function store_livestock_entry2(Request $request)
    {
        $xml = $request['xml_data'];
        $xmlstr = simplexml_load_string($xml);
        // dd($xmlstr->row);
        
        $timestamp = time();
        $created_at = date("Y-m-d H:i:s", $timestamp);

         // check dupliacte record in database ::
         $found = DB::table('tbl_livestock2')->select('id')
                                ->where('watershed_id', $xmlstr->row->watershed_id)
                                ->where('para_id', $xmlstr->row->para_id)
                                ->count();

        if($found > 0){
            $message = 'Data already exsits for this watershed and para, not possible to store...';
            return response()->json([ 'status' => 'ERROR', 'message' => $message ]);
        }

        try 
        {
            DB::beginTransaction();

            foreach ($xmlstr->row as $value) 
            {

                $store_data = array(
                    'watershed_id' => $value->watershed_id,
                    'para_id' => $value->para_id,
                    'para_name' => $value->para_name,
                    'livestock_id' => $value->livestock_id,
                    'livestock_name' => $value->livestock_name,
                    'diseases_name' => $value->diseases_name,
                    'mechanism' => $value->mechanism,
                    'created_by' => $value->created_by,
                    'created_at' => $created_at,
                );
                
                DB::table('tbl_livestock2')->insert($store_data);

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

    public function store_livestock_entry3(Request $request)
    {
        $xml = $request['xml_data'];
        $xmlstr = simplexml_load_string($xml);
        // dd($xmlstr->row);
        
        $timestamp = time();
        $created_at = date("Y-m-d H:i:s", $timestamp);

         // check dupliacte record in database ::
         $found = DB::table('tbl_livestock3')->select('id')
                                ->where('watershed_id', $xmlstr->row->watershed_id)
                                ->where('para_id', $xmlstr->row->para_id)
                                ->count();

        if($found > 0){
            $message = 'Data already exsits for this watershed and para, not possible to store...';
            return response()->json([ 'status' => 'ERROR', 'message' => $message ]);
        }

        try 
        {
            DB::beginTransaction();

            foreach ($xmlstr->row as $value) 
            {

                $store_data = array(
                    'watershed_id' => $value->watershed_id,
                    'para_id' => $value->para_id,
                    'para_name' => $value->para_name,
                    'farm_item_id' => $value->farm_item_id,
                    'farm_item_name' => $value->farm_item_name,
                    'unit_cost' => $value->unit_cost,
                    'total_cost' => $value->total_cost,
                    'created_by' => $value->created_by,
                    'created_at' => $created_at,
                );
                
                DB::table('tbl_livestock3')->insert($store_data);

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

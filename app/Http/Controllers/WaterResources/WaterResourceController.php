<?php

namespace App\Http\Controllers\WaterResources;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;



class WaterResourceController extends Controller
{
    public function water_resource_entry1(){
        return view('water_resources.water_resources_entry1');
    }

    public function water_resource_entry2(){
        return view('water_resources.water_resources_entry2');
    }

    public function store_resources_entry1(Request $request)
    {
        $jsonData = $request['json_data'];
        $value = json_decode($jsonData);

        $v_purpose = $request['json_data2'];
        // $v_purpose = json_decode($v_xml);

        // dd($value,$v_xml, $xmlstr);
        
        $timestamp = time();
        $created_at = date("Y-m-d H:i:s", $timestamp);

        // check dupliacte record in database ::
        $found = DB::table('tbl_water_resources1')->select('id')
                            ->where('watershed_id', $value->watershed_id)
                            ->where('para_id', $value->para_id)
                            ->count();

        if($found > 0){
            $message = 'Data already exsits for this watershed and para, not possible to store...';
            return response()->json([ 'status' => 'ERROR', 'message' => $message ]);
        }

        try 
        {
            DB::beginTransaction();

            $store_data = array(
                'watershed_id' => $value->watershed_id,
                'para_id' => $value->para_id,
                'para_name' => $value->para_name,
                'cat_name' => $value->catname,
                'location_north' => $value->location_north,
                'location_south' => $value->location_south,            
                'source' => $value->source,            
                'outlet' => $value->outlet,            
                'distance' => $value->distance,            
                'availability_mam' => $value->availability_mam,            
                'availability_jjas' => $value->availability_jjas,            
                'availability_on' => $value->availability_on,            
                'availability_djf' => $value->availability_djf,            
                'depth_mam' => $value->depth_mam,            
                'depth_jjas' => $value->depth_jjas,            
                'depth_on' => $value->depth_on,            
                'depth_djf' => $value->depth_djf,            
                'purpose' => $v_purpose,
                'created_by' => $value->created_by,
                'created_at' => $created_at,
            );

            
            DB::table('tbl_water_resources1')->insert($store_data);
          
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

    public function store_resources_entry2(Request $request)
    {
        $jsonData = $request['json_data'];
        $value = json_decode($jsonData);

        // dd($value,$v_xml, $xmlstr);
        
        $timestamp = time();
        $created_at = date("Y-m-d H:i:s", $timestamp);

        // check dupliacte record in database ::
        $found = DB::table('tbl_water_resources2')->select('id')
                            ->where('watershed_id', $value->watershed_id)
                            ->where('para_id', $value->para_id)
                            ->count();

        if($found > 0){
            $message = 'Data already exsits for this watershed and para, not possible to store...';
            return response()->json([ 'status' => 'ERROR', 'message' => $message ]);
        }

        try 
        {
            DB::beginTransaction();

            $store_data = array(
                'watershed_id' => $value->watershed_id,
                'para_id' => $value->para_id,
                'para_name' => $value->para_name,
                'current_state' => $value->current_state,
                'existing_conversation' => $value->existing_conversation,
                'tech_used_for_transport' => $value->tech_used_for_transport,            
                'recommendation' => $value->recommendation,                      
                'created_by' => $value->created_by,
                'created_at' => $created_at,
            );

            
            DB::table('tbl_water_resources2')->insert($store_data);
          
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

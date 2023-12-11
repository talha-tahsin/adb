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

use App\Models\Health;

class HealthController extends Controller
{
    
    public function store_tendency_health_services(Request $request)
    {
        $receiveData = $request['dataToSend'];
        $xmlstr = simplexml_load_string($receiveData);
        // dd($xmlstr->row);
        
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
                    'health_center' => $value->health_center,
                    'people_percentage' => $value->people_percentage,
                    'distance' => $value->distance,
                    'service_reason' => $value->service_reason,
                    'created_by' => $value->created_by,
                    'created_at' => $created_at,
                );
                
                DB::table('tbl_tendency_health_services')->insert($store_data);
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
    public function store_health_additional_info(Request $request)
    {
        if (request()->ajax()) {
            $validator = Validator::make($request->all(), [
                'watershed_id' => 'required|string|max:255',
                'watershed_name' => 'required',
                'tendency_of_medicine' => 'required',
            ], [],[]);

            if ($validator->fails()){
                return response()->json(['success' => false,'message' => strval(implode("<br>",$validator->errors()->all()))]);
            }
        
            $timestamp = time();
            $created_at = date("Y-m-d H:i:s", $timestamp);

            // check dupliacte record in database ::
            $found = DB::table('tbl_health_additional_info')->select('id')
                                ->where('watershed_id',  $request['watershed_id'])
                                ->where('para_id', $request['para_id'])
                                ->count();

            if($found > 0){
                $message = 'Data already exsits for this watershed and para, not allow to store again...';
                return response()->json([ 'status' => 'ERROR', 'message' => $message ]);
            }

            try 
            {
                DB::beginTransaction();

                $store_data = array(
                    'watershed_id' => $request['watershed_id'],
                    'watershed_name' => $request['watershed_name'],
                    'para_id' => $request['para_id'],
                    'para_name' => $request['para_name'],
                    'tendency_of_medicine' => $request['tendency_of_medicine'],           
                    'nearby_medical_services' => $request['nearby_medical_services'],          
                    'created_by' => $request['created_by'],
                    'created_at' => $created_at,
                );

                DB::table('tbl_health_additional_info')->insert($store_data);
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
    public function store_electricity_info(Request $request)
    {
        if (request()->ajax()) {
            $validator = Validator::make($request->all(), [
                'watershed_id' => 'required|string|max:255',
                'watershed_name' => 'required',
                'national_power_grid' => 'required',
            ], [],[]);

            if ($validator->fails()){
                return response()->json(['success' => false,'message' => strval(implode("<br>",$validator->errors()->all()))]);
            }
        
            $timestamp = time();
            $created_at = date("Y-m-d H:i:s", $timestamp);

            // check dupliacte record in database ::
            $found = DB::table('tbl_electricity_info')->select('id')
                                ->where('watershed_id',  $request['watershed_id'])
                                ->where('para_id', $request['para_id'])
                                ->count();

            if($found > 0){
                $message = 'Data already exsits for this watershed and para, not allow to store again...';
                return response()->json([ 'status' => 'ERROR', 'message' => $message ]);
            }

            try 
            {
                DB::beginTransaction();

                $store_data = array(
                    'watershed_id' => $request['watershed_id'],
                    'watershed_name' => $request['watershed_name'],
                    'para_id' => $request['para_id'],
                    'para_name' => $request['para_name'],
                    'national_power_grid' => $request['national_power_grid'],           
                    'solar' => $request['solar'],          
                    'generator' => $request['generator'],          
                    'no_source' => $request['no_source'],          
                    'others' => $request['others'],          
                    'remarks' => $request['any_electricity_services'],          
                    'created_by' => $request['created_by'],
                    'created_at' => $created_at,
                );

                DB::table('tbl_electricity_info')->insert($store_data);
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
    public function store_diseases_ranking_frequency(Request $request)
    {
        $receiveData = $request['dataToSend'];
        $xmlstr = simplexml_load_string($receiveData);
        // dd($xmlstr->row);
        
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
                    'diseases_name' => $value->diseases_name,
                    'ranking' => $value->ranking,
                    'once_in_year' => $value->once_in_year,
                    'twice_in_year' => $value->twice_in_year,
                    'once_in_2_3years' => $value->once_in_2_3years,
                    'others' => $value->others,
                    'created_by' => $value->created_by,
                    'created_at' => $created_at,
                );
                
                DB::table('tbl_diseases_ranking_frequency')->insert($store_data);
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

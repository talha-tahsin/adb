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

use App\Models\Literacy;

class EducationController extends Controller
{
    
    public function store_literacy_rate_level (Request $request)
    {
        $receiveData = $request['dataToSend'];
        $xmlstr = simplexml_load_string($receiveData);
        // dd($xmlstr->row);
        
        $timestamp = time();
        $created_at = date("Y-m-d H:i:s", $timestamp);

        try 
        {
            $dupCount = 0;
            $newCount = 0;
            $cname = '';
            
            DB::beginTransaction();

            foreach ($xmlstr->row as $value) 
            {
                $store_data = array(
                    'watershed_id' => $value->watershed_id,
                    'watershed_name' => $value->watershed_name,
                    'para_id' => $value->para_id,
                    'para_name' => $value->para_name,
                    'level_name' => $value->level_name,
                    'male' => $value->male,
                    'female' => $value->female,
                    'created_by' => $value->created_by,
                    'created_at' => $created_at,
                );
                
                DB::table('tbl_literacy')->insert($store_data);
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

    public function store_availability_education_institution(Request $request)
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
                    'institution_name' => $value->institution_name,
                    'no_of_institution' => $value->no_of_institution,
                    'average_distance' => $value->average_distance,
                    'average_time' => $value->average_time,
                    'created_by' => $value->created_by,
                    'created_at' => $created_at,
                );
                
                DB::table('tbl_availability_institution')->insert($store_data);
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

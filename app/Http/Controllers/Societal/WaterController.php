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

use App\Models\Water;

class WaterController extends Controller
{
    
    public function check_duplicate_record(Request $request)
    {
        $exsits_watershed_id = $request['watershed_id'];
        $exsits_para_id = $request['para_id'];
        $exsits_source_id = $request['water_source_id'];

        $found = DB::table('tbl_water')->select('id')
                        ->where('watershed_id', $exsits_watershed_id)
                        ->where('para_id', $exsits_para_id)
                        ->where('source_id', $exsits_source_id)
                        ->count();
        
        if($found == 0){
            return response()->json([ 'status' => 'SUCCESS', 'message' => 'No data found according to inputs..' ]);
        }
        else{
            return response()->json([ 'status' => 'ERROR', 'message' => 'This Para and source record already exsits, can not allow for entry...' ]);
        }

    }

    public function store_water_info(Request $request)
    {
        $xml = $request['json_data'];
        $value = json_decode($xml);
        // dd($value);
        
        $timestamp = time();
        $created_at = date("Y-m-d H:i:s", $timestamp);

        // $validator = Validator::make($value, [
        //     'jhum_male' => 'required|numeric|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
        // ]);

        // if ($validator->fails()){
        //     return response()->json(['status' => 'ERROR', 
        //         'message' => strval(implode("<br>",$validator->errors()->all()))
        //     ]);
        // }

        try 
        {
            DB::beginTransaction();

            $store_data = array(
                'watershed_id' => $value->watershed_id,
                'para_id' => $value->para_id,
                'para_name' => $value->para_name,
                'source_id' => $value->source_id,
                'source_name' => $value->source_name,
                'preferred_source' => $value->preferred_source,
                'drinking_water_number' => $value->drinking_water_number,
                'distance' => $value->distance,
                'availability' => $value->availability,
                'quality' => $value->quality,
                'created_by' => $value->created_by,
                'created_at' => $created_at,
            );
            
            // $store = Economic::insert($store_data);
            DB::table('tbl_water')->insert($store_data);

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

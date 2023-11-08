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
    

    public function store_water_info(Request $request)
    {
        $xml = $request['xml_data'];
        $xmlstr = simplexml_load_string($xml);
        // dd($xmlstr->row);
        
        $timestamp = time();
        $created_at = date("Y-m-d H:i:s", $timestamp);

         // check dupliacte record in database ::
         $found = DB::table('tbl_water')->select('id')
                                ->where('watershed_id', $xmlstr->row->watershed_id)
                                ->where('para_id', $xmlstr->row->para_id)
                                ->where('source_id', $xmlstr->row->source_id)
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

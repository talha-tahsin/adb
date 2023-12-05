<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class LandDegradationController extends Controller
{
    public function show_land_degradation(){
        return view('agro_ecological.land_degradation');
    }
    public function getindicator1List(){
        
        $data = DB::table('key_indicator1')->select('id', 'indicator')->orderBy('id')
                    ->get();

        return response()->json([ 'message' => $data ]);
    }
    public function getindicator2List(){
        
        $data = DB::table('key_indicator2')->select('id', 'indicator')->orderBy('id')
                    ->get();

        return response()->json([ 'message' => $data ]);
    }
    public function getindicator3List(){
        
        $data = DB::table('key_indicator3')->select('id', 'indicator')->orderBy('id')
                    ->get();

        return response()->json([ 'message' => $data ]);
    }
    public function store_degradation_info(Request $request)
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
                    'map_unit' => $value->map_unit,
                    'area_map_unit' => $value->para_name,
                    'indicator' => $value->indicator,
                    'forest' => $value->forest,
                    'herb' => $value->herb,
                    'orchard' => $value->orchard,
                    'shifting' => $value->shifting,
                    'crop_land' => $value->crop_land,
                    'lake' => $value->lake,
                    'baor' => $value->baor,
                    'rivers' => $value->rivers,
                    'ponds' => $value->ponds,
                    'aquaculture' => $value->aquaculture,
                    'rural' => $value->rural,
                    'brickfield' => $value->brickfield,
                    'helipad' => $value->helipad,
                    'road' => $value->road,
                    'sand' => $value->sand,
                    'remark' => $value->remark,
                    'created_by' => $value->created_by,
                    'created_at' => $created_at,
                );
                
                DB::table('tbl_degradation_info')->insert($store_data);
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class WatershedHealthController extends Controller
{
    public function watershed_sample_quality(){
        return view('watershed_health.water_sample_quality');
    }
    public function soil_sample_lab_test(){
        return view('watershed_health.soil_sample_lab_test');
    }
    public function store_water_sample_quality(Request $request)
    {
        if (request()->ajax()) {
            $validator = Validator::make($request->all(), [
                'watershed_id' => 'required|string|max:255',
                'watershed_name' => 'required',
                'up_image' => 'required|image|mimes:jpeg,png,jpg',
            ], [],[]);

            if ($validator->fails()){
                return response()->json(['success' => false,'message' => strval(implode("<br>",$validator->errors()->all()))]);
            }
        
            $timestamp = time();
            $created_at = date("Y-m-d H:i:s", $timestamp);
            // Get unique id for every single image ::
            $timestamp1 = now()->timestamp;
            $randomNumber = mt_rand(1000000000, 9999999999);
            $image_id = (int) substr($timestamp1 . $randomNumber, -10);

            // check dupliacte record in database ::
            $found = DB::table('tbl_water_sample_quality')->select('id')
                                ->where('watershed_id',  $request['watershed_id'])
                                ->where('para_id', $request['para_id'])
                                ->count();

            if($found > 0){
                return response()->json([ 'status' => 'ERROR', 'message' => 'Data already exsits for this watershed and para, not possible to store...' ]);
            }

            DB::beginTransaction();

            $store_data = array(
                'watershed_id' => $request['watershed_id'],
                'watershed_name' => $request['watershed_name'],
                'para_id' => $request['para_id'],
                'para_name' => $request['para_name'],
                'collection_date' => $request['collection_date'],           
                'collection_time' => $request['collection_time'],            
                'farmar_name' => $request['farmar_name'],            
                'sample_id' => $request['sample_id'],                        
                'approx_area' => $request['approx_area'],            
                'longitude' => $request['longitude'],            
                'latitude' => $request['latitude'],
                'dry_season' => $request['dry_season'],
                'wet_season' => $request['wet_season'],
                'weather_condition' => $request['weather_condition'],
                'sediment_type' => $request['sediment_type'],
                'water_flow_status' => $request['water_flow_status'],
                'lulc_type' => $request['lulc_type'],
                'intervention_upstream' => $request['intervention_upstream'],
                'intervention_nearby' => $request['intervention_nearby'],
                'navigation_practice' => $request['navigation_practice'],
                'fishing_practice' => $request['fishing_practice'],
                'use_of_wetland' => $request['use_of_wetland'],
                'waste_discharge' => $request['waste_discharge'],
                'major_mollusks' => $request['major_mollusks'],
                'overall_wetland' => $request['overall_wetland'],
                'any_remark' => $request['any_remark'],
                'created_by' => $request['userName'],
                'created_at' => $created_at,
            );

            DB::table('tbl_water_sample_quality')->insert($store_data);
            DB::commit();

            if ($files = $request->file('up_image')) {
                $file = $image_id . "." .$files->getClientOriginalExtension();
                $path_str = $files->storeAs( 'upload', $file, 'public' );
                $store_image = array(
                    'image' =>'/' . $path_str,
                );

                DB::table('tbl_water_sample_quality')
                            ->where('watershed_id', $request['watershed_id'])
                            ->where('para_id', $request['para_id'])
                            ->update($store_image);
                DB::commit();
            }
            
            return response()->json([ 'status' => 'SUCCESS', 'message' => 'Data store successfully...' ]);

        }
    }
    public function store_water_test_report(Request $request)
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
                    'test_name' => $value->test_name,
                    'test_1st' => $value->test_1st,
                    'test_2nd' => $value->test_2nd,
                    'test_3rd' => $value->test_3rd,
                    'average' => $value->average,
                    'created_by' => $value->created_by,
                    'created_at' => $created_at,
                );
                
                DB::table('tbl_water_test_report')->insert($store_data);
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
    // Soil Sample and Land Test
    public function store_soil_sample_basic_info(Request $request)
    {
        if (request()->ajax()) {
            $validator = Validator::make($request->all(), [
                'watershed_id' => 'required|string|max:255',
                'watershed_name' => 'required',
            ], [],[]);

            if ($validator->fails()){
                return response()->json(['success' => false,'message' => strval(implode("<br>",$validator->errors()->all()))]);
            }
        
            $timestamp = time();
            $created_at = date("Y-m-d H:i:s", $timestamp);

            // check dupliacte record in database ::
            $found = DB::table('tbl_soil_sample_basic')->select('id')
                                ->where('watershed_id',  $request['watershed_id'])
                                ->where('para_id', $request['para_id'])
                                ->count();

            if($found > 0){
                $message = 'Data already exsits for this watershed and para, not possible to store...';
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
                    'collection_date' => $request['collection_date'],           
                    'collection_time' => $request['collection_time'],            
                    'farmer_name' => $request['farmer_name'],            
                    'farmer_cell_no' => $request['farmer_cell_no'],                        
                    'soil_sample_id' => $request['soil_sample_id'],            
                    'longitude' => $request['longitude'],            
                    'latitude' => $request['latitude'],
                    'kharif_1' => $request['kharif_1'],
                    'kharif_2' => $request['kharif_2'],
                    'rabi' => $request['rabi'],
                    'soil_depth' => $request['soil_depth'],
                    'inundation_depth' => $request['inundation_depth'],
                    'land_form' => $request['land_form'],
                    'land_type' => $request['land_type'],
                    'any_remark' => $request['any_remark'],
                    'created_by' => $request['userName'],
                    'created_at' => $created_at,
                );

                DB::table('tbl_soil_sample_basic')->insert($store_data);
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
    public function store_soil_test_result(Request $request)
    {
        if (request()->ajax()) {
            $validator = Validator::make($request->all(), [
                'watershed_id' => 'required|string|max:255',
                'watershed_name' => 'required',
            ], [],[]);

            if ($validator->fails()){
                return response()->json(['success' => false,'message' => strval(implode("<br>",$validator->errors()->all()))]);
            }
        
            $timestamp = time();
            $created_at = date("Y-m-d H:i:s", $timestamp);

            // check dupliacte record in database ::
            $found = DB::table('tbl_soil_test_result')->select('id')
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
                    'soil_reaction' => $request['soil_reaction'],           
                    'organic_matter' => $request['organic_matter'],            
                    'water_holding' => $request['water_holding'],            
                    'percolation' => $request['percolation'],                        
                    'nitrogen' => $request['nitrogen'],            
                    'phosphorus' => $request['phosphorus'],            
                    'potassium' => $request['potassium'],
                    'sulphur' => $request['sulphur'],
                    'calcium' => $request['calcium'],
                    'magnesium' => $request['magnesium'],
                    'iron' => $request['iron'],
                    'manganese' => $request['manganese'],
                    'copper' => $request['copper'],
                    'molybdenum' => $request['molybdenum'],
                    'zinc' => $request['zinc'],
                    'boron' => $request['boron'],
                    'cadmium' => $request['cadmium'],
                    'lead' => $request['lead'],
                    'created_by' => $request['created_by'],
                    'created_at' => $created_at,
                );

                DB::table('tbl_soil_test_result')->insert($store_data);
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
    public function store_soil_texture_class(Request $request)
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
                    'soil_texture_class' => $value->soil_texture_class,
                    'sand' => $value->sand,
                    'slit' => $value->slit,
                    'clay' => $value->clay,
                    'created_by' => $value->created_by,
                    'created_at' => $created_at,
                );
                
                DB::table('tbl_soil_texture_class')->insert($store_data);
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

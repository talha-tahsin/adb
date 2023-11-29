<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class VCFBoundaryController extends Controller
{
    
    public function show_basic_info(){
        return view('vcf_boundary.basic_info_vcf');
    }
    public function show_gps_point(){
        return view('vcf_boundary.gps_points_vcf');
    }
    public function show_dominant_plant(){
        return view('vcf_boundary.dominant_plant_vcf');
    }

    public function store_basic_info_vcf_boundary(Request $request)
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
            // $found = DB::table('tbl_water_resources1')->select('id')
            //                     ->where('watershed_id', $value->watershed_id)
            //                     ->where('para_id', $value->para_id)
            //                     ->count();

            // if($found > 0){
            //     $message = 'Data already exsits for this watershed and para, not possible to store...';
            //     return response()->json([ 'status' => 'ERROR', 'message' => $message ]);
            // }

            try 
            {
                DB::beginTransaction();

                $store_data = array(
                    'watershed_id' => $request['watershed_id'],
                    'watershed_name' => $request['watershed_name'],
                    'dependent_para_id' => $request['dependent_para_id'],
                    'dependent_para_name' => $request['dependent_para_name'],
                    'vcf_name' => $request['vcf_name'],           
                    'vcf_group_name' => $request['vcf_group_name'],            
                    'chairmane_name' => $request['karbari_name'],            
                    'chairman_cell' => $request['chairman_cell_no'],                        
                    'approx_area' => $request['approx_vcf_area'],            
                    'average_distance' => $request['avg_distance'],            
                    'accessibility' => $request['accessilibity'],
                    'overall_status' => $request['overall_status'],
                    'current_problem' => $request['current_problem'],
                    'forest_type' => $request['forest_type'],
                    'observed_wild_birds' => $request['observed_wild_birds'],
                    'exist_conversation' => $request['existing_conservation'],
                    'any_remarks' => $request['any_remarks'],
                    'created_by' => $request['userName'],
                    'created_at' => $created_at,
                );

                DB::table('tbl_vcf_basic_info')->insert($store_data);
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
    public function store_gps_point_vcf(Request $request)
    {
        $receiveData = $request['dataToSend'];
        $xmlstr = simplexml_load_string($receiveData);
        // dd($xmlstr->row);
        
        $timestamp = time();
        $created_at = date("Y-m-d H:i:s", $timestamp);

         // check dupliacte record in database ::
        //  $found = DB::table('tbl_livestock1')->select('id')
        //                         ->where('watershed_id', $xmlstr->row->watershed_id)
        //                         ->where('para_id', $xmlstr->row->para_id)
        //                         ->count();

        // if($found > 0){
        //     $message = 'Data already exsits for this watershed and para, not possible to store...';
        //     return response()->json([ 'status' => 'ERROR', 'message' => $message ]);
        // }

        try 
        {
            DB::beginTransaction();

            foreach ($xmlstr->row as $value) 
            {

                $store_data = array(
                    'watershed_id' => $value->watershed_id,
                    'watershed_name' => $value->watershed_name,
                    'para_name' => $value->para_name,
                    'para_id' => $value->para_id,
                    'east_degree' => $value->east_degree,
                    'east_minute' => $value->east_minute,
                    'east_second' => $value->east_second,
                    'north_degree' => $value->north_degree,
                    'north_minute' => $value->north_minute,
                    'north_second' => $value->north_second,
                    'created_by' => $value->created_by,
                    'created_at' => $created_at,
                );
                
                DB::table('tbl_vcf_gps_point')->insert($store_data);
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
    public function store_plot1_dominant_plants(Request $request)
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
                    'para_name' => $value->para_name,
                    'para_id' => $value->para_id,
                    'species_name1' => $value->species_name1,
                    'diameter_height1' => $value->diameter_height1,
                    'avg_height1' => $value->avg_height1,
                    'dimensions1' => $value->dimensions1,
                    'created_by' => $value->created_by,
                    'created_at' => $created_at,
                );
                
                DB::table('tbl_plot1_dominant_plant')->insert($store_data);
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

    public function store_plot2_dominant_plants(Request $request)
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
                    'para_name' => $value->para_name,
                    'para_id' => $value->para_id,
                    'species_name2' => $value->species_name2,
                    'diameter_height2' => $value->diameter_height2,
                    'avg_height2' => $value->avg_height2,
                    'dimensions2' => $value->dimensions2,
                    'created_by' => $value->created_by,
                    'created_at' => $created_at,
                );
                
                DB::table('tbl_plot2_dominant_plant')->insert($store_data);
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
    public function store_plot3_dominant_plants(Request $request)
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
                    'para_name' => $value->para_name,
                    'para_id' => $value->para_id,
                    'species_name3' => $value->species_name3,
                    'diameter_height3' => $value->diameter_height3,
                    'avg_height3' => $value->avg_height3,
                    'dimensions3' => $value->dimensions3,
                    'created_by' => $value->created_by,
                    'created_at' => $created_at,
                );
                
                DB::table('tbl_plot3_dominant_plant')->insert($store_data);
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

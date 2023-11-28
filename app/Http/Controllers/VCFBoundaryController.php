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

}

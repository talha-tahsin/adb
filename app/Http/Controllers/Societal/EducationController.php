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
    
    public function store_education_part1_info(Request $request)
    {
        $xml = $request['json_data'];
        // $value = simplexml_load_string($xml);
        $value = json_decode($xml);
        
        $timestamp = time();
        $created_at = date("Y-m-d H:i:s", $timestamp);

        try {
                $dupCount = 0;
                $newCount = 0;
                $cname = '';
                
                DB::beginTransaction();
    
                $store_data = array(
                    'watershed_id' => $value->WatershedId,
                    'para_id' => $value->ParaId,
                    'para_name' => $value->ParaName,
                    'male_read_write' => $value->maleReadWrite,
                    'female_read_write' => $value->femaleReadWrite,
                    'male_primary' => $value->malePrimary,
                    'female_primary' => $value->femalePrimary,
                    'male_ssc' => $value->maleSsc,
                    'female_ssc' => $value->femaleSsc,
                    'male_hsc' => $value->maleHsc,
                    'female_hsc' => $value->femaleHsc,
                    'male_graduation' => $value->maleGraduate,
                    'female_graduation' => $value->femaleGraduate,
                    'male_post' => $value->malePost,
                    'female_post' => $value->femalePost,
                    'male_total' => $value->totalMale,
                    'female_total' => $value->totalFemale,
                    'income_training' => $value->incomeTraining,
                    'created_by' => $value->CreatedBy,
                    'created_at' => $created_at,
                );

                // check duplicate record for community
                $exist_watershed_id = $value->WatershedId;
                $exist_para_id = $value->ParaId;
        
                $found = DB::table('tbl_literacy')->select('id')
                                ->where('watershed_id', $exist_watershed_id)
                                ->where('para_id', $exist_para_id)
                                ->count();
  
                $tem_cname = $value->ParaName;
                

                if($found == 0){
                    // $store = Economic::insert($store_data);
                    DB::table('tbl_literacy')->insert($store_data);
                    $newCount++;
                }
                else
                {
                    $dupCount++;

                    if($cname == ''){
                        $cname = $tem_cname;
                    }
                    else{
                        $cname = $cname.', '.$tem_cname;
                    }
                    $found = 0;
                }
                    

                DB::commit();

                if($dupCount > 0 && $newCount == 0){ 
                    return response()->json([ 'status' => 'EXIST', 'message' => 'Becasue, ['.$cname.'] para has already exsits for the selected watershed and para...' ]);
                }
                else if ($dupCount > 0 && $newCount > 0){
                    return response()->json([ 'status' => 'SUCCESS', 'message' => 'But ['.$cname.'] para already exsits and can not possible to store...' ]);
                }
                else{ 
                    return response()->json([ 'status' => 'SUCCESS', 'message' => 'No Data found as duplicate...' ]);
                }
            }
            catch (\Exception $e) 
            {
                DB::rollBack();
                $message = "Opps!! Something is wrong, data not saved and rollback..";
                return response()->json([ 'status' => 'ERROR', 'message' => $message ]);
            }       
            
    }

    public function store_education_part2_info(Request $request)
    {
        $xml = $request['xml_data'];
        $xmlstr = simplexml_load_string($xml);

        $timestamp = time();
        $created_at = date("Y-m-d H:i:s", $timestamp);

        try {
                $dupCount = 0;
                $newCount = 0;
                $cname = '';
                DB::beginTransaction();

                foreach ($xmlstr->row as $value) 
                { 

                    $store_data = array(
                        'watershed_id' => $value->WatershedId,
                        'para_id' => $value->ParaId,
                        'training_id' => $value->training_id,
                        'training_name' => $value->training_name,
                        'training_receive' => $value->training_receive,
                        'is_useful' => $value->is_useful,
                        'in_future' => $value->is_future,
                        'women_percentage' => $value->women_percentage,
                        'govt' => $value->govt,
                        'ngo' => $value->ngo,
                        'developer' => $value->developer,
                        'created_by' => $value->CreatedBy,
                        'created_at' => $created_at,
                    );

                    // check duplicate record for community
                    $exist_watershed_id = $value->WatershedId;
                    $exist_para_id = $value->ParaId;
                    $exist_training_id = $value->training_id;
            
                    $found = DB::table('tbl_livelihood_training')->select('id')
                                    ->where('watershed_id', $exist_watershed_id)
                                    ->where('para_id', $exist_para_id)
                                    ->where('training_id', $exist_training_id)
                                    ->count();
                   
                    $get_community =json_encode($value->training_name);
                    $jsonData = json_decode($get_community, TRUE);
                    $tem_cname = $jsonData[0];

                    if($found == 0){
                        // $store = Economic::insert($store_data);
                        DB::table('tbl_livelihood_training')->insert($store_data);
                        $newCount++;
                    }
                    else
                    {
                        $dupCount++;

                        if($cname == ''){
                            $cname = $tem_cname;
                        }
                        else{
                            $cname = $cname.', '.$tem_cname;
                        }
                        $found = 0;
                    }
                    
                    
                }

                DB::commit();

                if($dupCount > 0 && $newCount == 0){ 
                    return response()->json([ 'status' => 'EXIST', 'message' => 'Becasue, ['.$cname.'] training has already exsits for the selected watershed and para...' ]);
                }
                else if ($dupCount > 0 && $newCount > 0){
                    return response()->json([ 'status' => 'SUCCESS', 'message' => 'But ['.$cname.'] training already exsits and can not possible to store...' ]);
                }
                else{ 
                    return response()->json([ 'status' => 'SUCCESS', 'message' => 'No Data found as duplicate...' ]);
                }
            }
            catch (\Exception $e) 
            {
                DB::rollBack();
                $message = "Opps!! Something is wrong, data not saved and rollback..";
                return response()->json([ 'status' => 'ERROR', 'message' => $message ]);
            }     
            
    }
    

}

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
    
    public function store_health_info(Request $request)
    {
        $xml = $request['xml_data'];
        $xmlstr = simplexml_load_string($xml);

        $json_data = $request['ranking'];
        $val = json_decode($json_data);

        // dd($value);
        
        $timestamp = time();
        $created_at = date("Y-m-d H:i:s", $timestamp);

        // try {
                $dupCount = 0;
                $newCount = 0;
                $cname = '';
                $dupCount2 = 0;
                $successCount = 0;

                DB::beginTransaction();

                foreach ($xmlstr->row as $value) 
                {
                    $store_data1 = array(
                        'watershed_id' => $value->WatershedId,
                        'para_id' => $value->ParaId,
                        'para_name' => $value->paraName,
                        'center_id' => $value->center_id,
                        'center_name' => $value->center_name,
                        'people_percentage' => $value->people_percentage,
                        'distance' => $value->distance,
                        'service_reason' => $value->service_reason,
                        'created_by' => $value->CreatedBy,
                        'created_at' => $created_at,
                    );

                    // check duplicate record for community
                    $exist_watershed_id = $value->WatershedId;
                    $exist_para_id = $value->ParaId;
                    $exist_center_id = $value->center_id;
            
                    $found = DB::table('tbl_health_services')->select('id')
                                    ->where('watershed_id', $exist_watershed_id)
                                    ->where('para_id', $exist_para_id)
                                    ->where('center_id', $exist_center_id)
                                    ->count();
                    
                    $get_community =json_encode($value->center_name);
                    $jsonData = json_decode($get_community, TRUE);
                    $tem_cname = $jsonData[0];
                    

                    if($found == 0){
                        // $store = Economic::insert($store_data);
                        DB::table('tbl_health_services')->insert($store_data1);
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

                $store_data2 = array(
                    'watershed_id' => $val->WatershedId,
                    'para_id' => $val->ParaId,
                    'para_name' => $val->ParaName,
                    'diarrhoeal' => $val->diarrhoeal,
                    'heat_stroke' => $val->heat_stroke,
                    'malaria' => $val->malaria,
                    'dengue' => $val->dengue,
                    'typhoid' => $val->typhoid,
                    'zika_fever' => $val->zika_fever,
                    'skin_diseases' => $val->skin_diseases,
                    'others' => $val->others,
                    'created_by' => $val->CreatedBy,
                    'created_at' => $created_at,
                );

                // check duplicate record for community
                $exist_watershed_id2 = $val->WatershedId;
                $exist_para_id2 = $val->ParaId;
        
                $found2 = DB::table('tbl_diseases')->select('id')
                                ->where('watershed_id', $exist_watershed_id2)
                                ->where('para_id', $exist_para_id2)
                                ->count();
                
                $tem_cname = $value->ParaName;

                if($found2 == 0){
                    // $store = Economic::insert($store_data);
                    DB::table('tbl_diseases')->insert($store_data2);
                    $successCount = 1;
                }
                else{
                    $dupCount2 = 1;
                }
                    

                DB::commit();

                if($dupCount > 0 && $newCount == 0){ 
                    return response()->json([ 'status' => 'EXIST', 'message' => 'Becasue, ['.$cname.'] para has already exsits in the record...' ]);
                }
                else if ($dupCount > 0 && $newCount > 0 &&  $successCount == 1){
                    return response()->json([ 'status' => 'SUCCESS', 'message' => 'But ['.$cname.'] para already exsits and can not possible to store...' ]);
                }
                else{ 
                    return response()->json([ 'status' => 'SUCCESS', 'message' => 'No Data found as duplicate...' ]);
                }
            // }
            // catch (\Exception $e) 
            // {
            //     DB::rollBack();
            //     $message = "Opps!! Something is wrong, data not saved and rollback..";
            //     return response()->json([ 'status' => 'ERROR', 'message' => $message ]);
            // }       
            
    }


}

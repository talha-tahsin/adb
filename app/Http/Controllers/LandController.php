<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

use App\Models\Land;


use Illuminate\Http\Request;

class LandController extends Controller
{
    
    public function store_land_info(Request $request)
    {
        $xml = $request['xml_data'];
        $xmlStr = simplexml_load_string($xml);

        $timestamp = time();
        $created_at = date("Y-m-d H:i:s", $timestamp);
        // dd($date);

        try {
                $cnt = 0;
                DB::beginTransaction();

                foreach ($xmlStr->row as $key => $value) 
                {
                    $exist_watershed_id = $value->WatershedId;
                    $exist_para_id = $value->ParaId;
                    $exist_community_id = $value->CommunityId;
                    
                    // dd($checkCommunityId);

                    $save_data = array(
                        'watershed_id' => $value->WatershedId,
                        'para_id' => $value->ParaId,
                        'community_id' => $value->CommunityId,
                        'community_name' => $value->CommunityName,
                        'landless' => $value->Landless,
                        'self_owned' => $value->Self_owned,
                        'community_land' => $value->Community_Land,
                        'lease' => $value->Lease,
                        'sharecropping' => $value->Sharecropping,
                        'occupation_land' => $value->Occupation_Land,
                        'grove_land' => $value->Grove_Land,
                        'valley' => $value->Valley,
                        'plain_land' => $value->Plain_Land,
                        'hilly' => $value->Hilly,
                        'mixed' => $value->Mixed,
                        'profit_value' => $value->Profit,
                        'profit_name' => $value->ProfitName,
                        'created_by' => $value->CreatedBy,
                        'created_at' => $created_at,
                    );
            
                    $check = DB::table('tbl_land')->select('id')
                                    ->where('watershed_id', $exist_watershed_id)
                                    ->where('para_id', $exist_para_id)
                                    ->where('community_id', $exist_community_id)
                                    ->count();

                    if($check == 0)
                    {
                        $store = Land::create($save_data);
                        $duplicate = false;
                    }
                    else
                    {
                        $cnt++;
                        $duplicate = true;
                    }
                    
                    
                }

                DB::commit();

                if($duplicate)
                    return response()->json([ 'status' => 'SUCCESS', 'message' => ''.$cnt.' row found already exsits, Data saved without this..' ]);
                else
                    return response()->json([ 'status' => 'SUCCESS', 'message' => 'Data save successfully without duplicate..' ]);
            }
            catch (\Exception $e) 
            {
                DB::rollBack();
                $message = "Opps!! Something is wrong and data not saved..";
                return response()->json([ 'status' => 'ERROR', 'message' => $message ]);
            }

                
            
    }



}

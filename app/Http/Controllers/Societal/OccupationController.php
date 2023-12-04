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

use App\Models\Occupation;

class OccupationController extends Controller
{
    
    public function store_occupation_info(Request $request)
    {
        $xml = $request['xml_data'];
        $xmlstr = simplexml_load_string($xml);
        // dd($xml);
        $timestamp = time();
        $created_at = date("Y-m-d H:i:s", $timestamp);

        try {
                $dupCount = 0;
                $cname = '';
                DB::beginTransaction();

                foreach ($xmlstr->row as $value) 
                {

                    $store_data = array(
                        'watershed_id' => $value->WatershedId,
                        'watershed_name' => $value->watershed_name,
                        'para_id' => $value->ParaId,
                        'para_name' => $value->para_name,
                        'community_id' => $value->CommunityId,
                        'community_name' => $value->CommunityName,
                        'jhum' => $value->Jhum,
                        'plain_land' => $value->PlainLand,
                        'orchard' => $value->Orchard,
                        'fuel_wood' => $value->FuelWood,
                        'wage_labour' => $value->WageLabour,
                        'poultry' => $value->Poultry,
                        'livestock' => $value->Livestock,
                        'aquaculture' => $value->AquaCulture,
                        'service_holder' => $value->ServiceHolder,
                        'business' => $value->Business,
                        'handicraft' => $value->HandiCraft,
                        'others' => $value->Others,
                        'created_by' => $value->CreatedBy,
                        'created_at' => $created_at,
                    );

                    // check duplicate record for community
                    $exist_watershed_id = $value->WatershedId;
                    $exist_para_id = $value->ParaId;
                    $exist_community_id = $value->CommunityId;
            
                    $found = DB::table('tbl_occupation')->select('id')
                                    ->where('watershed_id', $exist_watershed_id)
                                    ->where('para_id', $exist_para_id)
                                    ->where('community_id', $exist_community_id)
                                    ->count();

                    $get_community =json_encode($value->CommunityName);
                    $jsonData = json_decode($get_community, TRUE);
                    $tem_cname = $jsonData[0];

                    if($found == 0){
                        // $store = Occupation::insert($store_data);
                        DB::table('tbl_occupation')->insert($store_data);
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

                if($dupCount > 0){ 
                    return response()->json([ 'status' => 'ERROR', 'message' => '['.$cname.'] community already exsits for same selected watershed and para...' ]);
                }
                else{ 
                    return response()->json([ 'status' => 'SUCCESS', 'message' => 'Data save successfully without duplicate...' ]);
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

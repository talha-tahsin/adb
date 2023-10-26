<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $xmlStr = simplexml_load_string($xml);
        // dd($xml);

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
                    );
            
                    $check = DB::table('tbl_occupation')->select('id')
                                    ->where('watershed_id', $exist_watershed_id)
                                    ->where('para_id', $exist_para_id)
                                    ->where('community_id', $exist_community_id)
                                    ->count();

                    if($check == 0)
                    {
                        $store = Occupation::create($save_data);
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

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

use App\Models\Livelihood;

class LivelihoodController extends Controller
{
    public function store_livelihood_info(Request $request)
    {
        $xml = $request['json_data'];
        $value = json_decode($xml);
        // dd($value);
        
        $timestamp = time();
        $created_at = date("Y-m-d H:i:s", $timestamp);

        // $validator = Validator::make($value, [
        //     'jhum_male' => 'required|numeric|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
        // ]);

        // if ($validator->fails()){
        //     return response()->json(['status' => 'ERROR', 
        //         'message' => strval(implode("<br>",$validator->errors()->all()))
        //     ]);
        // }

        try 
        {
            DB::beginTransaction();

            $store_data = array(
                'watershed_id' => $value->watershed_id,
                'para_id' => $value->para_id,
                'para_name' => $value->para_name,
                'community_id' => $value->community_id,
                'community_name' => $value->community_name,
                'jhum_male' => $value->jhum_male,
                'jhum_female' => $value->jhum_female,
                'plain_land_male' => $value->plain_land_male,
                'plain_land_female' => $value->plain_land_female,
                'orchard_male' => $value->orchard_male,
                'orchard_female' => $value->orchard_female,
                'fuel_wood_male' => $value->fuel_wood_male,
                'fuel_wood_female' => $value->fuel_wood_female,
                'wage_labour_male' => $value->wage_labour_male,
                'wage_labour_female' => $value->wage_labour_female,
                'poultry_male' => $value->poultry_male,
                'poultry_female' => $value->poultry_female,
                'livestock_male' => $value->livestock_male,
                'livestock_female' => $value->livestock_female,
                'aquaculture_male' => $value->aquaculture_male,
                'aquaculture_female' => $value->aquaculture_female,
                'service_male' => $value->service_male,
                'service_female' => $value->service_female,
                'business_male' => $value->business_male,
                'business_female' => $value->business_female,
                'handicraft_male' => $value->handicraft_male,
                'handicraft_female' => $value->handicraft_female,
                'other_male' => $value->other_male,
                'other_female' => $value->other_female,
                'created_by' => $value->created_by,
                'created_at' => $created_at,
            );
            
            // $store = Economic::insert($store_data);
            DB::table('tbl_livelihood')->insert($store_data);

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

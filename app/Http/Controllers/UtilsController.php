<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

use App\Models\LookupPara;


class UtilsController extends Controller
{
    public function getCommunityList(){
        
        $data = DB::table('lookup_community')
                    ->select('id', 'community_id', 'community_name')
                    ->orderBy('community_name')
                    ->get();

        return response()->json([ 'message' => $data ]);

    }

    public function getWatershedId(){
        
        $data = DB::table('lookup_watershed')
                    ->select('id', 'watershed_id')->orderBy('watershed_id')
                    ->get();
        
        $retStr = '';
        $retStr .= '<option value="" selected disabled>Select Watershed Id</option>';

        foreach($data as $v) {
            $retStr .= '<option value="'.$v->watershed_id.'">'.$v->watershed_id.'</option>';
        }

        return $retStr;

    }

    public function getParaList(Request $request)
    {
        $watershedId = $request['watershed_id'];
        // dd($watershedId);

        $data = DB::table('lookup_para')
                    ->select('para_id', 'para_name')
                    ->where('watershed_id', $watershedId)->orderBy('para_name')
                    ->get();
                    
        $retStr = '';
        $retStr .= '<option value="" selected disabled>Select Para  </option>';

        foreach($data as $v) {
            $retStr .= '<option value="'.$v->para_id.'">'.$v->para_name.'</option>';
        }

        return $retStr;

    }

    public function get_community_list(){
        
        $data = DB::table('lookup_community')
                    ->select('id', 'community_id', 'community_name')
                    ->orderBy('community_name')
                    ->get();
        
        $retStr = '';
        $retStr .= '<option value="" selected disabled>Select</option>';

        foreach($data as $v) {
            $retStr .= '<option value="'.$v->community_id.'">'.$v->community_name.'</option>';
        }

        return $retStr;

    }

    public function get_training_list()
    {

        $data = DB::table('lookup_training')
                    ->select('training_id', 'training_name')
                    ->orderBy('training_name')
                    ->get();

        return response()->json([ 'message' => $data ]);

    }

    public function get_health_center_list(){

        $data = DB::table('lookup_health_center')
                    ->select('center_id', 'center_name')
                    ->orderBy('center_name')
                    ->get();

        return response()->json([ 'message' => $data ]);

    }

    public function get_latrine_type(){

        $data = DB::table('lookup_latrine_list')
                    ->select('id','latrine_type_id', 'latrine_type_name')
                    ->orderBy('latrine_type_name')
                    ->get();

        return response()->json([ 'status' => 'SUCCESS', 'message' => $data ]);

    }

    public function get_transportation_list(){

        $data = DB::table('lookup_transportation')
                    ->select('id','transportation_id', 'transportation_name')
                    ->orderBy('transportation_name')
                    ->get();

        return response()->json([ 'status' => 'SUCCESS', 'message' => $data ]);

    }

    public function get_water_source(){

        $data = DB::table('key_water_source')
                    ->select('id','water_source_id', 'water_source_name')
                    ->orderBy('water_source_name')
                    ->get();

        return response()->json([ 'status' => 'SUCCESS', 'message' => $data ]);

    }

    public function get_livestock_type(){

        $data = DB::table('key_livestock')
                    ->select('id','livestock_id', 'livestock_name')
                    ->orderBy('livestock_name')
                    ->get();

        return response()->json([ 'status' => 'SUCCESS', 'message' => $data ]);

    }

    public function get_farm_item(){

        $data = DB::table('key_farm_item')
                    ->select('id','item_id', 'item_name')
                    ->orderBy('id')
                    ->get();

        return response()->json([ 'status' => 'SUCCESS', 'message' => $data ]);

    }

    public function get_active_watershed(Request $request)
    {
        $userNm = $request['userNm'];
        $data = DB::table('tbl_active_watershed')->where('user_name', $userNm)->get();
            
        return response()->json([ 'status' => 'SUCCESS', 'message' => $data ]);

    }

    public function get_district_name()
    {
        $data = DB::table('key_district')->select('id', 'district_code', 'district_name')->orderBy('district_name')->get();
        
        $retStr = '';
        $retStr .= '<option value="" selected disabled>Select District</option>';

        foreach($data as $v) {
            $retStr .= '<option value="'.$v->district_code.'">'.$v->district_name.'</option>';
        }

        return $retStr;
    }
    public function get_upazila_list(Request $request)
    {
        $district_code = $request['district_code'];

        $data = DB::table('key_upazila')->select('id', 'upazila_code', 'upazila_name')
                            ->where('district_code', $district_code)
                            ->orderBy('upazila_name')
                            ->get()
                            ->unique('upazila_name');
        
        $retStr = '';
        $retStr .= '<option value="" selected disabled>Select Upazila</option>';

        foreach($data as $v) {
            $retStr .= '<option value="'.$v->upazila_code.'">'.$v->upazila_name.'</option>';
        }

        return $retStr;
    }
    public function get_union_list(Request $request)
    {
        $upazila_code = $request['upozila_code'];

        $data = DB::table('key_union')->select('id', 'union_name')
                            ->where('upazila_code', $upazila_code)
                            ->orderBy('union_name')
                            ->get()
                            ->unique('union_name');
        
        $retStr = '';
        $retStr .= '<option value="" selected disabled>Select Upazila</option>';

        foreach($data as $v) {
            $retStr .= '<option value="'.$v->union_name.'">'.$v->union_name.'</option>';
        }

        return $retStr;
    }
  
    
}

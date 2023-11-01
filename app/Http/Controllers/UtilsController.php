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
use App\Models\AdmitMaster;
use App\Models\HealthStatus;
use App\Models\AdmitDetails;
use App\Models\ReceiptMaster;
use App\Models\ReceiptDetails;
use App\Models\AccountCode;

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
        $retStr .= '<option value="" selected disabled>Select Community</option>';

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

    public function get_health_center_list()
    {

        $data = DB::table('lookup_health_center')
                    ->select('center_id', 'center_name')
                    ->orderBy('center_name')
                    ->get();

        return response()->json([ 'message' => $data ]);

    }

  
    
}

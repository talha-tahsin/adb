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

use App\Models\Household;

class HouseholdController extends Controller
{

    public function store_household_info(Request $request)
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
                        'para_id' => $value->para_id,
                        'para_name' => $value->para_name,
                        'community_id' => $value->community_id,
                        'community_name' => $value->community_name,
                        'jhupri_house' => $value->JhupriType,
                        'kacha_house' => $value->KachaType,
                        'semi_pacca_house' => $value->SemiPaccaType,
                        'pacca_house' => $value->PaccaType,
                        'total_house' => $value->TotalHouse,
                        'created_by' => $value->CreatedBy,
                        'created_at' => $created_at
                    );
            
                    // check duplicate record 
                    $exist_watershed_id = $value->WatershedId;
                    $exist_para_id = $value->para_id;
                    $exist_community_id = $value->community_id;

                    $found = DB::table('tbl_household')->select('id')
                                        ->where('watershed_id', $exist_watershed_id)
                                        ->where('para_id', $exist_para_id)
                                        ->where('community_id', $exist_community_id)
                                        ->count();

                    $get_community =json_encode($value->community_name);
                    $jsonData = json_decode($get_community, TRUE);
                    $tem_cname = $jsonData[0];

                    if($found == 0){
                        // $store = Household::insert($store_data);
                        DB::table('tbl_household')->insert($store_data);
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
                    return response()->json([ 'status' => 'ERROR', 'message' => '['.$cname.'] community already exsits for same watershed and para...' ]);
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

    public function get_household_info_list(Request $request)
    {
        $watershed_id = $request['watershed_id'];
        $para_id = $request['para_id'];
        // dd($watershed_id);

        $data = DB::table('tbl_household')
                        ->where('watershed_id', $watershed_id) 
                        ->where('para_id', $para_id)           
                        ->get();

        $tabStr = '';
        $i = 1;

        foreach ($data as $info) 
        {

            $tabStr .= '<tr>';
            $tabStr .= '<td style="text-align: center;">'.$i++.'</td>';
            $tabStr .= '<td style="text-align: left;">'.$info->community_name.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$info->jhupri_house.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$info->kacha_house.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$info->semi_pacca_house.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$info->pacca_house.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$info->total_house.'</td>';

            $tabStr .= '<td style="text-align: center;">
            <button type="submit" id="btn_edit" class="btn btn-primary" row_id="'.$info->id.'">Edit</button></td>';
             $tabStr .= '<td style="text-align: center;">
            <button type="submit" id="btn_delte" class="btn btn-warning" row_id="'.$info->id.'">Delete</button></td>';
             $tabStr .= '</tr>';
        }

        return $tabStr;
    }

    public function get_household_info_edit(Request $request)
    {
        
        $rowId = $request['row_id'];

        $sql_data = DB::table('tbl_household')->where('id', $rowId)->get();

        return response()->json([ 'status' => 'SUCCESS', 'message' => $sql_data ]);

    }

    public function update_household_info(Request $request)
    {
        
        $row_id = $request['row_id'];
        $xml = $request['xml_data'];
        $xml = simplexml_load_string($xml);
        // dd($xml);

        $RequestData = array(
          
            'jhupri_house' => $xml->jhupriType,
            'kacha_house' => $xml->kachaType,
            'semi_pacca_house' => $xml->semiPacca,
            'pacca_house' => $xml->paccaType,
            'total_house' => $xml->totalHouse,
            'update_by' => $xml->UpdateBy,
            
        );
        // dd($row_id);

        $update = Household::findOrFail($row_id);
        $update->fill($RequestData);
        $update->save();

        return response()->json([ 'status' => 'SUCCESS', 'message' => 'Data Update Successfully..' ]);

    }


    public function delete_household_info(Request $request)
    {
        
        $row_Id = $request['row_id'];

        Household::find($row_Id)->delete($row_Id);

        $status = 'SUCCESS';
        $message = "Data Deleted Successfully!";

        return response()->json([ 'status' => 'SUCCESS', 'message' => $message ]);

    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $xmlStr = simplexml_load_string($xml);
        // dd($xml);

        try {
                DB::beginTransaction();

                foreach ($xmlStr->row as $key => $value) 
                {
                    $checkWatershedId = $value->WatershedId;
                    $checkParaId = $value->ParaId;
                    $checkCommunityId = $value->CommunityId;
                    
                    // dd($checkCommunityId);

                    $RequestData = array(
                        'watershed_id' => $value->WatershedId,
                        'para_id' => $value->ParaId,
                        'community_id' => $value->CommunityId,
                        'community_name' => $value->CommunityName,
                        'jhupri_house' => $value->JhupriType,
                        'kacha_house' => $value->KachaType,
                        'semi_pacca_house' => $value->SemiPaccaType,
                        'pacca_house' => $value->PaccaType,
                        'total_house' => $value->TotalHouse,
                        'created_by' => $value->CreatedBy
                    );
                    
                    $request_insert = Household::insert($RequestData);
            
                    // DB::table('t01_populations')
                    //                 ->select('id')
                    //                 ->where('WatershedId', $checkWatershedId)
                    //                 ->where('ParaId', $checkParaId)
                    //                 ->where('CommunityId', $checkCommunityId)
                    //                 ->get();
                        
                    DB::commit();
                    return response()->json([ 'status' => 'SUCCESS', 'message' => 'Household Info save successfully..' ]);
                }
            }
            catch (\Exception $e) 
            {
                DB::rollBack();
                $message = "Opps!! Something is wrong and data not saved..";
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

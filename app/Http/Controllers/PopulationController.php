<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

use App\Models\Population;


class PopulationController extends Controller
{
    
    public function population_entry(){
        return view('population.entry_population');
    }

    public function view_population(){
        return view('population.view_population');
    }

    public function insert_community_population(Request $request)
    {
        $xml = $request['xml_data'];
        $xmlStr = simplexml_load_string($xml);
        // dd($xml);

        
        DB::beginTransaction();

        foreach ($xmlStr->row as $key => $value) 
        {
            $checkWatershedId = $value->WatershedId;
            $checkParaId = $value->ParaId;
            $checkCommunityId = $value->CommunityId;
            
            // dd($checkCommunityId);

            $RequestData = array(
                'WatershedId' => $value->WatershedId,
                'ParaId' => $value->ParaId,
                'CommunityId' => $value->CommunityId,
                'CommunityName' => $value->CommunityName,
                'MaleUnder5' => $value->MaleUnder5,
                'Male5to14' => $value->Male5to14,
                'Male15to19' => $value->Male15to19,
                'Male20to49' => $value->Male20to49,
                'Male50to65' => $value->Male50to65,
                'Male65Up' => $value->Male65Up,
                'FemaleUnder5' => $value->FemaleUnder5,
                'Female5to14' => $value->Female5to14,
                'Female15to19' => $value->Female15to19,
                'Female20to49' => $value->Female20to49,
                'Female50to65' => $value->Female50to65,
                'Female65Up' => $value->Female65Up,
                'Totalmale' => $value->Totalmale,
                'TotalFemale' => $value->TotalFemale,
                'TotalPopulation' => $value->TotalPopulation,
                'DisbaleMale' => $value->DisbaleMale,
                'DisabledFemale' => $value->DisabledFemale,
                'Created_by' => $value->CreatedBy
            );

            $check = DB::table('t01_populations')
                            ->select('id')
                            ->where('WatershedId', $checkWatershedId)
                            ->where('ParaId', $checkParaId)
                            ->where('CommunityId', $checkCommunityId)
                            ->exists();

            // dd($check);

            if($check)
            { 
                $message = "Opps!! $value->CommunityName Community Already Exist in the Record, You Can not Insert Again But Update. Please, Deselect this Community and Insert Your Data Again ";
                DB::rollBack();
                return response()->json([ 'status' => 'ERROR', 'message' => $message ]);
            } 
            else 
            {
                $InsertData = Population::create($RequestData);
                $InsertData->save();
                DB::commit();
            }
        
        }

        if ($InsertData) { 
            return response()->json([ 'status' => 'SUCCESS', 'message' => 'Data save successfully..' ]);
        }
        else {
            return response()->json([ 'status' => 'ERROR', 'message' => 'Data not save, something went wrong..' ]);
        }
    }

    public function get_population_list(Request $request)
    {
        $watershed_id = $request['watershed_id'];
        $para_id = $request['para_id'];
        // dd($watershed_id);

        $data = DB::table('t01_populations')
                        ->where('WatershedId', $watershed_id) 
                        ->where('ParaId', $para_id)           
                        ->get();

        $tabStr = '';

        foreach ($data as $user) 
        {

            $tabStr .= '<tr>';
            $tabStr .= '<td style="text-align: left;">'.$user->CommunityName.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$user->MaleUnder5.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$user->Male5to14.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$user->Male15to19.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$user->Male20to49.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$user->Male50to65.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$user->Male65Up.'</td>';

            $tabStr .= '<td style="text-align: center;">'.$user->FemaleUnder5.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$user->Female5to14.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$user->Female15to19.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$user->Female20to49.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$user->Female50to65.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$user->Female65Up.'</td>';

            $tabStr .= '<td style="text-align: center;">'.$user->Totalmale.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$user->TotalFemale.'</td>';
            //$tabStr .= '<td style="text-align: center;">'.$user->TotalPopulation.'</td>';

            $tabStr .= '<td style="text-align: center;">'.$user->DisbaleMale.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$user->DisabledFemale.'</td>';

            $tabStr .= '<td style="text-align: center;">
            <button type="submit" id="btn_edit" class="btn btn-primary" row_id="'.$user->id.'">Edit</button></td>';
             $tabStr .= '<td style="text-align: center;">
            <button type="submit" id="btn_delte" class="btn btn-warning" row_id="'.$user->id.'">Delete</button></td>';
             $tabStr .= '</tr>';
        }

        return $tabStr;
    }

    public function get_population_details(Request $request){
        
        $rowId = $request['row_id'];

        $sql_data = DB::table('t01_populations')
                        ->where('id', $rowId)
                        ->get();


        return response()->json([ 'status' => 'SUCCESS', 'message' => $sql_data ]);

    }

    public function delete_population(Request $request){
        
        $userId = $request['user_id'];

        Population::find($userId)->delete($userId);

        $status = 'SUCCESS';
        $message = "Data Deleted Successfully!";
        

        return response()->json([ 'status' => $status, 'message' => $message ]);

    }

}

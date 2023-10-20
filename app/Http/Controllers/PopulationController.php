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
    
    public function view_population(){
        return view('receipt.population');
    }

    public function insert_community_population(Request $request)
    {
        $xml = $request['xml_data'];
        $xmlStr = simplexml_load_string($xml);
        // dd($xml);

        foreach ($xmlStr->row as $key => $value) 
        {

            $RequestData = array(
                'CommunityId' => $value->CommunityId,
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

            $InsertData = Population::create($RequestData);
            $InsertData->save();
        
        }

        if ($InsertData) { 
            return response()->json([ 'status' => 'SUCCESS', 'message' => 'Data save successfully..' ]);
        }
        else {
            return response()->json([ 'status' => 'ERROR', 'message' => 'Data not save, something went wrong..' ]);
        }
    }

}

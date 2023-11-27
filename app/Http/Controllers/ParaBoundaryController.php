<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class ParaBoundaryController extends Controller
{
    public function show_basic_info(){
        return view('para_boundary.basic_info');
    }
    public function show_para_list(){
        return view('para_boundary.para_info_list');
    }
    public function show_gps_point(){
        return view('para_boundary.gps_points_para');
    }

    public function store_basic_info_para_boundary(Request $request)
    {
        $receiveData = $request['dataToSend'];
        $value = json_decode($receiveData);
        // dd($value,$v_xml, $xmlstr);
        
        $timestamp = time();
        $created_at = date("Y-m-d H:i:s", $timestamp);

        // Get unique id for every single user ::
        $timestamp1 = now()->timestamp;
        $randomNumber = mt_rand(1000000000, 9999999999);
        $para_id = (int) substr($timestamp1 . $randomNumber, -10);

        // check dupliacte record in database ::
        // $found = DB::table('tbl_water_resources1')->select('id')
        //                     ->where('watershed_id', $value->watershed_id)
        //                     ->where('para_id', $value->para_id)
        //                     ->count();

        // if($found > 0){
        //     $message = 'Data already exsits for this watershed and para, not possible to store...';
        //     return response()->json([ 'status' => 'ERROR', 'message' => $message ]);
        // }

        try 
        {
            DB::beginTransaction();

            $store_data = array(
                'survey_date' => $value->survey_date,
                'watershed_id' => $value->watershed_id,
                'watershed_name' => $value->watershed_name,
                'para_id' => $para_id,
                'para_name' => $value->para_name,
                'mouza_name' => $value->mouza_name,
                'union_name' => $value->union,            
                'upozila' => $value->upozila,            
                'district' => $value->district,            
                'headman_name' => $value->headman_name,            
                'karbari_name' => $value->karbari_name,            
                'chairman_name' => $value->chairman_name,            
                'para_area' => $value->para_area,            
                'any_remarks' => $value->any_remarks,            
                'created_by' => $value->created_by,
                'created_at' => $created_at,
            );

            DB::table('tbl_para_basic_info')->insert($store_data);

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

    public function get_all_para_list(Request $request)
    {
        // $userNm = $request['user_name'];
        $waterId = $request['watershed_id'];
        // dd($waterId);

        $sql_ret = DB::table('tbl_para_basic_info')->where('watershed_id',$waterId)
                                ->latest()->get();

        $tabStr = '';
        $serial=1;
 
        foreach ($sql_ret as $v) {
            
            $timestamp = strtotime($v->created_at);
            $date = date('d-M-Y', $timestamp);
          
            $tabStr .= '<tr>';
            $tabStr .= '<td style="text-align: center;">'.$serial++.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$v->watershed_id.'</td>';
            $tabStr .= '<td style="text-align: left;">'.$v->para_name.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$v->para_area.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$v->karbari_name.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$v->headman_name.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$v->mouza_name.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$v->union_name.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$v->upozila.'</td>';

            $tabStr .= '<td style="text-align: center;">
            <button type="submit" id="btn_edit" class="btn btn-primary" row_id="'.$v->id.'">Update</button></td>';
            $tabStr .= '<td style="text-align: center;">
            <button type="submit" id="btn_data_entry" class="btn btn-warning" para_name="'.$v->para_name.'" para_id="'.$v->para_id.'">Data Entry</button></td>';
            $tabStr .= '</tr>';
        }

        return $tabStr;

    }

    public function store_para_name_for_entry(Request $request)
    {
        $receiveData = $request['dataToSend'];
        $value = json_decode($receiveData);
        $userName = $value->user_name;
        // dd($userName);

        $store_data = array(
            'para_id' => $value->para_id,
            'para_name' => $value->para_name,
        );

        DB::table('tbl_active_watershed')->where('user_name', $userName)->update($store_data);
        DB::commit();

        return response()->json([ 'status' => 'SUCCESS', 'message' => 'data store...' ]);
    }

    public function store_gps_point_para(Request $request)
    {
        $receiveData = $request['dataToSend'];
        $xmlstr = simplexml_load_string($receiveData);
        // dd($xmlstr->row);
        
        $timestamp = time();
        $created_at = date("Y-m-d H:i:s", $timestamp);

         // check dupliacte record in database ::
        //  $found = DB::table('tbl_livestock1')->select('id')
        //                         ->where('watershed_id', $xmlstr->row->watershed_id)
        //                         ->where('para_id', $xmlstr->row->para_id)
        //                         ->count();

        // if($found > 0){
        //     $message = 'Data already exsits for this watershed and para, not possible to store...';
        //     return response()->json([ 'status' => 'ERROR', 'message' => $message ]);
        // }

        try 
        {
            DB::beginTransaction();

            foreach ($xmlstr->row as $value) 
            {

                $store_data = array(
                    'watershed_id' => $value->watershed_id,
                    'watershed_name' => $value->watershed_name,
                    'para_name' => $value->para_name,
                    'para_id' => $value->para_id,
                    'east_degree' => $value->east_degree,
                    'east_minute' => $value->east_minute,
                    'east_second' => $value->east_second,
                    'north_degree' => $value->north_degree,
                    'north_minute' => $value->north_minute,
                    'north_second' => $value->north_second,
                    'created_by' => $value->created_by,
                    'created_at' => $created_at,
                );
                
                DB::table('tbl_para_gps_point')->insert($store_data);
                DB::commit();
            }
            
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

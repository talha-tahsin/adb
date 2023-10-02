<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;

use App\Models\User;
use App\Models\UserResets;


class UserRoleController extends Controller
{
    
    public function get_userRole(Request $request){
        
        // $ret_data = User::latest()->get();
        $data = DB::table('users')
                    ->leftJoin('user_resets', 'users.id', '=', 'user_resets.id')            
                    ->get();

        $tabStr = '';
 
        foreach ($data as $user) {
            
            $timestamp = strtotime($user->created_at);
            $date = date('d-M-Y', $timestamp);
          
            $tabStr .= '<tr>';
            $tabStr .= '<td style="text-align: center;">'.$user->id.'</td>';
            $tabStr .= '<td style="text-align: left;">'.$user->name.'</td>';
            $tabStr .= '<td style="text-align: left;">'.$user->email.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$user->plain_password.'</td>';

            if($user->status == 'disabled')
              $tabStr .= '<td style="text-align: center;color: red;">'.$user->status.'</td>';
            else
              $tabStr .= '<td style="text-align: center;color: green;">'.$user->status.'</td>';

            $tabStr .= '<td style="text-align: center;">'.$user->role.'</td>';
            $tabStr .= '<td style="text-align: center;">'.$date.'</td>';

            $tabStr .= '<td style="text-align: center;">
            <button type="submit" id="btn_edit" class="btn btn-primary" row_id="'.$user->id.'">Edit</button></td>';
            $tabStr .= '<td style="text-align: center;">
            <button type="submit" id="btn_delte" class="btn btn-warning" row_id="'.$user->id.'">Delete</button></td>';
            $tabStr .= '</tr>';
        }

        return $tabStr;
        
        // return response()->json([ 'status' => 'SUCCESS', 'message' => $ret_data ]);
    }

    public function updt_userRole(Request $request){
        
        $userId = $request['user_id'];

        // $updt = User::where('id', $userId)
                    // ->update([ 'status' => $usrStatus, 'role' => $usrRole ]);

        $updt_data = array(
            'status' => $request['user_status'],
            'role' => $request['user_role']
        );

        $update = User::findOrFail($userId);
        $update->fill($updt_data);
        $update->save();

        $ret_data = "User Role Update Successfully";
        
        return response()->json([ 'status' => 'SUCCESS', 'message' => $ret_data ]);
    }

    public function delte_userRole(Request $request){
        
        $userId = $request['user_id'];

        if ($userId == 1) {
            $status = 'ERROR';
            $message = "Sorry !! This Id belongs to admin, It cannot be deleted!";
        } else {
            User::find($userId)->delete($userId);
            UserResets::find($userId)->delete($userId);
            
            $status = 'SUCCESS';
            $message = "User Id Deleted Successfully!";
        }

        return response()->json([ 'status' => $status, 'message' => $message ]);

    }

}

<?php 

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use App\Users;
use Redirect;

class AdminUsersController extends Controller{

    public function userIntro(Request $request){
        return view('admin');
    }

    public function updateUserMeta(Request $request){
           
    	//delete user data
    	if (!empty($request->user_select_submit)) {
    		if (!empty($request->user_select_submit)) {
    			if ($request->user_select_action == 'delete') {
    				if (!empty($request->action_users)) {
    					foreach ($request->action_users as $red_ids) {
                            \App\Users::destroy((int)$red_ids);
    					}
    				}
    			} elseif ($request->user_select_action == 'update') {
    				if (!empty($request->action_users) && isset($request->action_users)) {
    					if (sizeof($request->action_users) < 2) {
                                $userObj = new Users();
                                $current_user = $userObj->getUserData($request->action_users[0]);
	    						return view('admin.admin-new-user')->with('current_user', $current_user);
    					} 
    				}
    			}
    		}
    	}


    	//update user meta
    	if (isset($request->update_user_btn)) {
            $update_user = \App\Users::find($request->user_id);
            $update_user->user_email = $request->user_email;
            $update_user->user_role = $request->user_role;
            $update_user->user_status = $request->user_status;
            $update_user->display_name = $request->user_display_name;

    		if (!empty($request->user_password)) {
    			$update_user->user_pass = md5($request->user_password);
    		} 
            $update_user->save();
    	}

    	if (isset($request->new_user_btn)) {
    		return view('admin.admin-new-user');
    	}

    	if (isset($request->add_user_btn)) {
    		$new_user = new Users();
            $new_user->user_login = $request->user_login;
            $new_user->user_pass = md5($request->user_password);
            $new_user->user_email = $request->user_email;
            $new_user->user_registered = date('Y-m-d H:i:s');
            $new_user->user_role = $request->user_role;
            $new_user->user_status = $request->user_status;
            $new_user->display_name = $request->user_display_name;
            $new_user->save(); 
    	}
        $users = Users::all();
        return view('admin.admin-users')->with('users', $users);
    }

    public function getUserList($admins){
        $data_users =  \App\Users::all();
        return view('admin.admin-'.$admins)->with('users',$data_users);
    }

}
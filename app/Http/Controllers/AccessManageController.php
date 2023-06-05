<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Access;
use App\Models\DataAccess;
use App\Models\DetailRole;
use App\Models\Role;

class AccessManageController extends Controller
{
    public function viewAccessModAdmin()
    {
        //$access = Access::join('users', 'users.username', '=', 'access.username')->select('access.*', 'users.*')->paginate(10);

        $access_list = DataAccess::all();
        $roles = Role::with('details')->get();

        // for($i = 1; $i <= 26; $i++)
        // {
        //     DetailRole::create(["id_role" => 3, "id_access" => $i]);
        // }

        return view('admins.access_mod_adm', compact('access_list' , 'roles'));
    }

    public function changeAccessAdmin(Request $request)
    {
        //nama akses
        // $access = $request->data_access;

        // $pengguna = Access::where('username', $request->data_user)->first();
        
    	// if($pengguna->$access == 1){
        //     $pengguna->$access = 0;
    	// }else{
        //     $pengguna->$access = 1;
    	// }
        // $pengguna->save();

        $access = $request->data_access;
        $role = $request->data_role;
        $checked = $request->data_checked;

        if($checked == 1){
            $detail_role = DetailRole::where('id_role', $role)->where('id_access', $access)->first();
            if ($detail_role != NULL) {
                $detail_role->delete();
            }
        }else{
            $detail_role = DetailRole::where('id_role', $role)->where('id_access', $access)->first();
            if($detail_role == NULL){
                $detail_role = DetailRole::create(["id_role" => $role, "id_access" => $access]);
            }
        }
        
    	return response()->json(['code'=>200]);
    }
}

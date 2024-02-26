<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserHistory;
use Auth;

class AuthManageController extends Controller
{

    public function viewLogin()
    {
        return view('auth.login');
    }

    public function viewLoginJamaat()
    {
        return view('auth.login_jamaat');
    }

    public function postLoginAdmin(Request $request)
    {
        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password]))
        {
            $newActivity['user_id'] = Auth::guard('admin')->user()->id;
            $newActivity['kegiatan'] = "Log In";
            UserHistory::create($newActivity);

            $guard_name = 'admin';
            return view('templates.admin_main', compact('guard_name'));
        }
        
        return redirect()->route('login_admin');
    }

    public function postLoginJamaat(Request $request)
    {
        if (Auth::guard('user')->attempt(['no_handphone_1' => $request->no_handphone, 'password' => $request->password]))
        {
            $id_code = Auth::guard('user')->user()->id_code;
            return redirect()->route('tampil_barcode', $id_code);
        }
        elseif (Auth::guard('user')->attempt(['no_handphone_2' => $request->no_handphone, 'password' => $request->password]))
        {
            $id_code = Auth::guard('user')->user()->id_code;
            return redirect()->route('tampil_barcode', $id_code);
        }
        
        return redirect()->route('login_jamaat');
    }

    public function checkSession(Request $request)
    {
        if (Auth::guard('admin')->check())
        {
            return view('templates.admin_main');
        }
        elseif (Auth::guard('user')->check())
        {
            return view('jamaats.home');
        }
    }

    public function logout(Request $request)
    {

        if (Auth::guard('admin')->check())
        {
            $newActivity['user_id'] = Auth::guard('admin')->user()->id;
            $newActivity['kegiatan'] = "Log Out";
            UserHistory::create($newActivity);
            
            Auth::guard('admin')->logout();
        }
        elseif (Auth::guard('user')->check())
        {
            Auth::guard('user')->logout();
        }
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

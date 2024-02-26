<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Access;
use App\Models\Role;
use App\Models\UserHistory;
use Auth;

class AdminManageController extends Controller
{
    public function __construct()
    {
        $this->User = new User();
        $this->Access = new Access();
        $this->middleware('auth');
    }

    public function viewAddAdmin()
    {
        $users = User::all();
        $roles = Role::all();

        return view('admins.add_adm', compact('users', 'roles'));
    }

    public function addAdmin()
    {
        Request()->validate([
            'name' => 'required',
            'no_handphone' => 'required',
            'gol_darah' => 'required',
            'jenis_kelamin' => 'required',
            'role' => 'required',
            'username' => 'required|unique:users,username',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'password' => 'required|min:3',
        ]);

        $role = Role::find(Request()->role);

        $data = [
            'name' => Request()->name,
            'no_handphone' => Request()->no_handphone,
            'gol_darah' => Request()->gol_darah,
            'jenis_kelamin' => Request()->jenis_kelamin,
            'role' => $role->nama,
            'id_role' => $role->id,
            'username' => Request()->username,
            'alamat' => Request()->alamat,
            'tempat_lahir' => Request()->tempat_lahir,
            'tanggal_lahir' => Request()->tanggal_lahir,
            'password' => Hash::make(Request()->password),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->User->addDataAdminOnly($data);

        $newActivity['user_id'] = Auth::guard('admin')->user()->id;
        $newActivity['kegiatan'] = "Tambah akun"." ". $data['username'];
        UserHistory::create($newActivity);

        return redirect()->route('tambah_admin')->with('success', $role->nama.' '.Request()->name.' berhasil ditambahkan!');
    }

    public function viewDetailDataAdmin($username)
    {
        $admin = User::where('username', $username)->first();
        return view('admins.edit_data_admin', compact('admin'));
    }

    public function updateAdmin($username)
    {
        Request()->validate([
            'name' => 'required',
            'no_handphone' => 'required',
            'gol_darah' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        $data = [
            'name' => Request()->name,
            'no_handphone' => Request()->no_handphone,
            'gol_darah' => Request()->gol_darah,
            'jenis_kelamin' => Request()->jenis_kelamin,
            'alamat' => Request()->alamat,
            'tempat_lahir' => Request()->tempat_lahir,
            'tanggal_lahir' => Request()->tanggal_lahir,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->User->editDataAdminByUsername($username, $data);

        $newActivity['user_id'] = Auth::guard('admin')->user()->id;
        $newActivity['kegiatan'] = "Edit akun"." ". $username;
        UserHistory::create($newActivity);

        return redirect()->route('detail_data_admin', $username)->with('success','Edit data Admin '.Request()->name.' berhasil!');
    }

    public function deleteAdmin($username)
    {
        $this->User->deleteDataAdmin($username);
        // $this->Access->deleteAccess($username);

        $newActivity['user_id'] = Auth::guard('admin')->user()->id;
        $newActivity['kegiatan'] = "Hapus akun"." ". $username;
        UserHistory::create($newActivity);

        return redirect()->route('daftar_admin');
    }

    public function viewDataAdmin()
    {
        $users = User::all();
        return view('admins.list_adm', compact('users'));
    }

    public function viewHistoryDataAdmin($id)
    {
        $users = User::where('id', $id)->first()->name;
        $histories = UserHistory::where('user_id', $id)->orderBy('created_at', 'DESC')->get();
        return view('admins.akun.history_admin', compact('histories', 'users'));
    }

    // Profile Admin
    public function showProfileAdmin($username)
    {
        return view('admins.profile_admin.update_profile_admin');
    }

    public function showChangePasswordAdmin($username)
    {
        return view('admins.profile_admin.change_password_admin');
    }

    public function updateProfileAdmin($username)
    {
        if ($username != Request()->username)
        {
            Request()->validate([
                'name' => 'required',
                'id_admin' => 'required',
                'no_handphone' => 'required',
                'gol_darah' => 'required',
                'jenis_kelamin' => 'required',
                'username' => 'required|unique:users',
                'alamat' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
            ],[
                'username.unique' => 'Username sudah dipakai!'
            ]);

            $data = [
                'name' => Request()->name,
                'no_handphone' => Request()->no_handphone,
                'gol_darah' => Request()->gol_darah,
                'jenis_kelamin' => Request()->jenis_kelamin,
                'username' => Request()->username,
                'alamat' => Request()->alamat,
                'tempat_lahir' => Request()->tempat_lahir,
                'tanggal_lahir' => Request()->tanggal_lahir,
                'updated_at' => date('Y-m-d H:i:s')
            ];
    
            $username = ['username' => Request()->username];
    
            $this->User->editDataAdmin(Request()->id_admin, $data);
            $this->Access->editAccess(Request()->id_admin, $username);
        }
        else 
        {
            // dd('masuk else');
            Request()->validate([
                'name' => 'required',
                'id_admin' => 'required',
                'no_handphone' => 'required',
                'gol_darah' => 'required',
                'jenis_kelamin' => 'required',
                'username' => 'required',
                'alamat' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
            ]);

            $data = [
                'name' => Request()->name,
                'no_handphone' => Request()->no_handphone,
                'gol_darah' => Request()->gol_darah,
                'jenis_kelamin' => Request()->jenis_kelamin,
                'alamat' => Request()->alamat,
                'tempat_lahir' => Request()->tempat_lahir,
                'tanggal_lahir' => Request()->tanggal_lahir,
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $this->User->editDataAdmin(Request()->id_admin, $data);
        }

        $newActivity['user_id'] = Auth::guard('admin')->user()->id;
        $newActivity['kegiatan'] = "Update profile"." ". $username;
        UserHistory::create($newActivity);

        return redirect()->route('profile_admin', $username)->with('success', 'Update profil berhasil!');
    }

    public function changePasswordAdmin(Request $req, $username)
    {
        $req->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|confirmed'
        ],[
            'old_password.required' => 'Password Lama belum diisi!',
            'old_password.current_password' => 'Password Lama salah!',
            'new_password.required' => 'Password Baru belum diisi!',
            'new_password.confirmed' => 'Konfirmasi Password Baru salah!',
        ]);

        $admin = User::where('username', $username)->first();
        
        $admin->password = Hash::make(Request()->new_password);
        $admin->save();
        Request()->session()->regenerate();

        $newActivity['user_id'] = Auth::guard('admin')->user()->id;
        $newActivity['kegiatan'] = "Ubah password"." ". $username;
        UserHistory::create($newActivity);

        return redirect()->route('ganti_password_admin', $admin->username)->with('success', 'Update password berhasil!');
    }
}

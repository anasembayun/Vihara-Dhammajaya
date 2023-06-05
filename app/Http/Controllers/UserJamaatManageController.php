<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\UserJamaat;
use App\Models\absensiJamaat;
use App\Models\Kegiatan;
use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;

class UserJamaatManageController extends Controller
{
    public function __construct()
    {
        $this->UserJamaat = new UserJamaat();
        $this->middleware('auth');
    }

    public function viewUpdateProfile($id_code)
    {   
        // $all_kegiatans = absensiJamaat::join('data_kegiatan', 'data_absensi_jamaat.idkegiatan', '=', 'data_kegiatan.id')->get(['data_absensi_jamaat.*', 'data_kegiatan.nama']);

        $all_id_kegiatans = absensiJamaat::where('idjamaat', $id_code)->distinct('idkegiatan')->pluck('idkegiatan');
        
        $kegiatans = array();

        for ($i = 0; $i < count($all_id_kegiatans); $i++) { 
            array_push($kegiatans, Kegiatan::where('id', $all_id_kegiatans[$i])->value('nama'));
        }

        if(UserJamaat::where('id_code', $id_code)->exists())
        {
            //$qrCode =  \SimpleSoftwareIO\QrCode\Facades\QrCode:: size(150)->generate($id_code);
            $d = new DNS1D();
            $c = new DNS2D();
            $qrCode = $c->getBarcodePNG($id_code, 'QRCODE', 4, 4);
            $barCode =  $d->getBarcodePNG($id_code, 'C128', 2, 30);
        }
        
        $data = [
            'jamaats' => UserJamaat::select('*')->where('id_code', $id_code)->first(),
            'kegiatans' => $kegiatans,
            'id_code' => $id_code,
            'qr_code' => $qrCode,
            'barCode' => $barCode,
        ];

        return view('jamaats.update_profile', $data);
    }

    public function showChangePasswordJamaat($id_code)
    {
        $data = [
            'jamaats' => UserJamaat::select('*')->where('id_code', $id_code)->first(),
            'id_code' => $id_code
        ];
        return view('jamaats.change_password_jamaat', $data);
    }

    public function showBarcodeAfterLogin($id_code)
    {
        if(UserJamaat::where('id_code', $id_code)->exists())
        {
            //$qrCode =  \SimpleSoftwareIO\QrCode\Facades\QrCode:: size(150)->generate($id_code);
            $d = new DNS1D();
            $c = new DNS2D();
            $qrCode = $c->getBarcodePNG($id_code, 'QRCODE', 8, 8);
            $barCode =  $d->getBarcodePNG($id_code, 'C128', 3, 40);
        }

        $data = [
            'jamaats' => UserJamaat::select('*')->where('id_code', $id_code)->first(),
            'qr_code' => $qrCode,
            'barCode' => $barCode,
        ];

        return view('jamaats.show_barcode', $data);
    }

    public function updateProfile($id_code)
    {
        Request()->validate([
            'nama_baru' => 'required',
            'no_handphone_1' => 'required',
            'gol_darah' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'kelurahan_kecamatan' => 'required',
            'kabupaten_kota' => 'required',
            'rt_rw' => 'required',
            'bidang_usaha' => 'required',
            'pekerjaan' => 'required',
            'foto_profile',
        ]);

        if (Request()->foto_profile <> "") 
        {
            $file = Request()->foto_profile;
            $filename =  Request()->id_code.'.'.$file->extension();
            $file->move(public_path('images/app_jamaat/foto_profile'), $filename);

            $data = [
                'name' => Request()->nama_baru,
                'no_handphone_1' => Request()->no_handphone_1,
                'no_handphone_2' => Request()->no_handphone_2,
                'gol_darah' => Request()->gol_darah,
                'jenis_kelamin' => Request()->jenis_kelamin,
                'tempat_lahir' => Request()->tempat_lahir,
                'tanggal_lahir' => Request()->tanggal_lahir,
                'alamat' => Request()->alamat,
                'kelurahan_kecamatan' => Request()->kelurahan_kecamatan,
                'kabupaten_kota' => Request()->kabupaten_kota,
                'rt_rw' => Request()->rt_rw,
                'bidang_usaha' => Request()->bidang_usaha,
                'pekerjaan' => Request()->pekerjaan,
                'foto_profile' => $filename,
            ];
            
            $this->UserJamaat->editDataJamaat($id_code, $data);
        }
        else
        {
            
            $data = [
                'name' => Request()->nama_baru,
                'no_handphone_1' => Request()->no_handphone_1,
                'no_handphone_2' => Request()->no_handphone_2,
                'gol_darah' => Request()->gol_darah,
                'jenis_kelamin' => Request()->jenis_kelamin,
                'tempat_lahir' => Request()->tempat_lahir,
                'tanggal_lahir' => Request()->tanggal_lahir,
                'alamat' => Request()->alamat,
                'kelurahan_kecamatan' => Request()->kelurahan_kecamatan,
                'kabupaten_kota' => Request()->kabupaten_kota,
                'rt_rw' => Request()->rt_rw,
                'bidang_usaha' => Request()->bidang_usaha,
                'pekerjaan' => Request()->pekerjaan,
            ];
            
            $this->UserJamaat->editDataJamaat($id_code, $data);
        }

        return redirect('update-profile/'.$id_code)->with('success', 'Profil berhasil diupdate!');;
    }

    public function changePasswordJamaat(Request $req, $id_code)
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

        $jamaat = UserJamaat::where('id_code', $id_code)->first();
        
        $jamaat->password = Hash::make(Request()->new_password);
        $jamaat->save();
        Request()->session()->regenerate();

        return redirect()->route('ganti_password_jamaat', $jamaat->id_code)->with('success', 'Update password berhasil!');
    }
}

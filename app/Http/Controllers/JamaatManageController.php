<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\UserJamaat;
use App\Models\Baptisan;
use App\Models\DataPernikahan;
use App\Models\TransaksiFotoUnreg;
use App\Models\TransaksiFoto;
use App\Models\Transaksi;
use App\Models\absensiJamaat;
use App\Models\Kegiatan;
use App\Models\UserHistory;
use Auth;
use PDF;

class JamaatManageController extends Controller
{
    public function __construct()
    {
        $this->UserJamaat = new UserJamaat();
        $this->Baptisan = new Baptisan();
        $this->DataPernikahan = new DataPernikahan();
        $this->middleware('auth');
    }

    // Mengambil data jamaat untuk ditampilkan
    public function showDataJamaat($id)
    {
        $jamaat = UserJamaat::find($id);

        return response()->json([
            'id_code' => $jamaat->id_code,
            'name' => $jamaat->name,
            'no_handphone_1' => $jamaat->no_handphone_1,
            'no_handphone_2' => $jamaat->no_handphone_2,
            'email' => $jamaat->email,
            'gol_darah' => $jamaat->gol_darah,
            'jenis_kelamin' => $jamaat->jenis_kelamin,
            'alamat'=> $jamaat->alamat,
            'kelurahan_kecamatan'=> $jamaat->kelurahan_kecamatan,
            'kabupaten_kota'=> $jamaat->kabupaten_kota,
            'rt_rw'=> $jamaat->rt_rw,
            'tempat_lahir' => $jamaat->tempat_lahir,
            'tanggal_lahir' => $jamaat->tanggal_lahir,
            'bidang_usaha' => $jamaat->bidang_usaha,
            'pekerjaan' => $jamaat->pekerjaan,
            'nama_kerabat' => $jamaat->nama_kerabat,
            'no_handphone_kerabat' => $jamaat->no_handphone_kerabat,
            'alamat_kerabat' => $jamaat->alamat_kerabat,
            'last_visit' => $jamaat->last_visit
        ]);
    }

    public function showDataJamaatByIdCode($id)
    {
        $jamaat = UserJamaat::where('id_code', $id)->get();

        return response()->json([
            'jamaat' => $jamaat
        ]);
    }

    public function getSumJamaatData()
    {
        $sum_jamaat = UserJamaat::withTrashed()->count('id');
        return response()->json([
            'sum_jamaat' => $sum_jamaat
        ]);
    }

    public function filterDataJamaat(Request $r)
    {
        if (($r->date_awal == null && $r->date_akhir != null) ||
            ($r->date_awal != null && $r->date_akhir == null)) {
            $jamaats = UserJamaat::all();
            return view('admins.manage_jamaat.list_jamaat', compact('jamaats'));
        }
        else if (($r->date_awal != null && $r->date_akhir != null) && $r->gol_darah == null && $r->usia == null) {
            $jamaats = UserJamaat::select('*')
                        ->whereDate('created_at', '>=', $r->date_awal)
                        ->whereDate('created_at', '<=', $r->date_akhir)
                        ->get();
        }
        else if (($r->date_awal == null && $r->date_akhir == null) && $r->gol_darah != null && $r->usia == null) {
            $jamaats = UserJamaat::select('*')
                ->where('gol_darah', '=', $r->gol_darah)
                ->get();
        }
        else if (($r->date_awal == null && $r->date_akhir == null) && $r->gol_darah == null && $r->usia != null) {
            $jamaats = UserJamaat::select('*')
                ->where('tanggal_lahir', '<', $r->usia)
                ->get();
        }
        else if (($r->date_awal != null && $r->date_akhir != null) && $r->gol_darah != null && $r->usia == null) {
            $jamaats = UserJamaat::select('*')
                        ->whereDate('created_at', '>=', $r->date_awal)
                        ->whereDate('created_at', '<=', $r->date_akhir)
                        ->where('gol_darah', '=', $r->gol_darah)
                        ->get();
        }
        else if (($r->date_awal != null && $r->date_akhir != null) && $r->gol_darah == null && $r->usia != null) {
            $jamaats = UserJamaat::select('*')
                        ->whereDate('created_at', '>=', $r->date_awal)
                        ->whereDate('created_at', '<=', $r->date_akhir)
                        ->where('tanggal_lahir', '<', $r->usia)
                        ->get();
        }
        else if (($r->date_awal == null && $r->date_akhir == null) && $r->usia != null && $r->gol_darah != null) {
            $jamaats = UserJamaat::select('*')
                ->where('gol_darah', '=', $r->gol_darah)
                ->where('tanggal_lahir', '<', $r->usia)
                ->get();
        }
        else if (($r->date_awal != null && $r->date_akhir != null) && $r->gol_darah != null && $r->usia != null) {
            $jamaats = UserJamaat::select('*')
                        ->whereDate('created_at', '>=', $r->date_awal)
                        ->whereDate('created_at', '<=', $r->date_akhir)
                        ->where('gol_darah', '=', $r->gol_darah)
                        ->where('tanggal_lahir', '<', $r->usia)
                        ->get();
        }
        else {
            $jamaats = UserJamaat::all();
            return view('admins.manage_jamaat.list_jamaat', compact('jamaats'));
        }

        $data = [
            'jamaats' => $jamaats
        ];

        return view('admins.manage_jamaat.list_jamaat', $data);
    }

    // Tambah JAMAAT 
    public function viewAddJamaat()
    {
        return view('admins.manage_jamaat.add_jamaat');
    }

    public function viewDataJamaat()
    {
        $jamaats = UserJamaat::whereNotNull('id_code')->get();
        return view('admins.manage_jamaat.list_jamaat', compact('jamaats'));
    }

    public function addJamaat()
    {
        Request()->validate([
            'id_code' => 'required',
            'name' => 'required',
            'no_handphone_1' => 'required',
            'no_handphone_2',
            'email' => 'required|unique:usr_jamaat,email',
            'gol_darah',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'kelurahan_kecamatan' => 'required',
            'kabupaten_kota' => 'required',
            'rt_rw' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'bidang_usaha' => 'required',
            'pekerjaan' => 'required',
            'nama_kerabat' => 'required',
            'no_handphone_kerabat' => 'required',
            'alamat_kerabat' => 'required',
            'password' => 'required|min:3',
        ]);

        $data = [
            'id_code' => Request()->id_code,
            'name' => Request()->name,
            'no_handphone_1' => Request()->no_handphone_1,
            'no_handphone_2' => Request()->no_handphone_2,
            'email' => Request()->email,
            'gol_darah' => Request()->gol_darah,
            'jenis_kelamin' => Request()->jenis_kelamin,
            'alamat' => Request()->alamat,
            'kelurahan_kecamatan' => Request()->kelurahan_kecamatan,
            'kabupaten_kota' => Request()->kabupaten_kota,
            'rt_rw' => Request()->rt_rw,
            'tempat_lahir' => Request()->tempat_lahir,
            'tanggal_lahir' => Request()->tanggal_lahir,
            'bidang_usaha' => Request()->bidang_usaha,
            'pekerjaan' => Request()->pekerjaan,
            'nama_kerabat' => Request()->nama_kerabat,
            'no_handphone_kerabat' => Request()->no_handphone_kerabat,
            'alamat_kerabat' => Request()->alamat_kerabat,
            'password' => bcrypt(Request()->password),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->UserJamaat->addDataJamaat($data);

        $newActivity['user_id'] = Auth::guard('admin')->user()->id;
        $newActivity['kegiatan'] = "Tambah umat terdaftar"." ".$data['id_code'];
        UserHistory::create($newActivity);

        return redirect()->route('tambah_jamaat')->with('success','Data Umat '.Request()->name.' berhasil ditambahkan!');
    }

    public function viewEditDataJamaat($id_code)
    {
        $jamaat = UserJamaat::where('id_code', $id_code)->first();
        return view('admins.manage_jamaat.edit_data_jamaat', compact('jamaat'));
    }

    public function updateDataJamaat($id_code)
    {
        if ($id_code != Request()->id_code)
        {
            Request()->validate([
                'id_code' => 'required|unique:usr_jamaat,id_code',
                'name' => 'required',
                'no_handphone_1' => 'required',
                'no_handphone_2',
                // 'email' => 'required|unique:usr_jamaat,email',
                // 'gol_darah' => 'required',
                // 'jenis_kelamin' => 'required',
                // 'alamat' => 'required',
                // 'kelurahan_kecamatan' => 'required',
                // 'kabupaten_kota' => 'required',
                // 'rt_rw' => 'required',
                // 'tempat_lahir' => 'required',
                // 'tanggal_lahir' => 'required',
                // 'bidang_usaha' => 'required',
                // 'pekerjaan' => 'required',
                // 'nama_kerabat' => 'required',
                // 'no_handphone_kerabat' => 'required',
                // 'alamat_kerabat' => 'required'
            ], [
                'id_code.unique' => 'ID Code sudah dipakai!'
            ]);
    
            $data = [
                'id_code' => Request()->id_code,
                'name' => Request()->name,
                'no_handphone_1' => Request()->no_handphone_1,
                'no_handphone_2' => Request()->no_handphone_2,
                'email' => Request()->email,
                'gol_darah' => Request()->gol_darah,
                'jenis_kelamin' => Request()->jenis_kelamin,
                'alamat' => Request()->alamat,
                'kelurahan_kecamatan' => Request()->kelurahan_kecamatan,
                'kabupaten_kota' => Request()->kabupaten_kota,
                'rt_rw' => Request()->rt_rw,
                'tempat_lahir' => Request()->tempat_lahir,
                'tanggal_lahir' => Request()->tanggal_lahir,
                'bidang_usaha' => Request()->bidang_usaha,
                'pekerjaan' => Request()->pekerjaan,
                'nama_kerabat' => Request()->nama_kerabat,
                'no_handphone_kerabat' => Request()->no_handphone_kerabat,
                'alamat_kerabat' => Request()->alamat_kerabat,
                'updated_at' => date('Y-m-d H:i:s')
            ];
        } 
        else
        {
            Request()->validate([
                'name' => 'required',
                'no_handphone_1' => 'required',
                'no_handphone_2',
                // 'email' => 'required|unique:usr_jamaat,email',
                // 'gol_darah' => 'required',
                // 'jenis_kelamin' => 'required',
                // 'alamat' => 'required',
                // 'kelurahan_kecamatan' => 'required',
                // 'kabupaten_kota' => 'required',
                // 'rt_rw' => 'required',
                // 'tempat_lahir' => 'required',
                // 'tanggal_lahir' => 'required',
                // 'bidang_usaha' => 'required',
                // 'pekerjaan' => 'required',
                // 'nama_kerabat' => 'required',
                // 'no_handphone_kerabat' => 'required',
                // 'alamat_kerabat' => 'required'
            ]);

            $data = [
                'name' => Request()->name,
                'no_handphone_1' => Request()->no_handphone_1,
                'no_handphone_2' => Request()->no_handphone_2,
                'email' => Request()->email,
                'gol_darah' => Request()->gol_darah,
                'jenis_kelamin' => Request()->jenis_kelamin,
                'alamat' => Request()->alamat,
                'kelurahan_kecamatan' => Request()->kelurahan_kecamatan,
                'kabupaten_kota' => Request()->kabupaten_kota,
                'rt_rw' => Request()->rt_rw,
                'tempat_lahir' => Request()->tempat_lahir,
                'tanggal_lahir' => Request()->tanggal_lahir,
                'bidang_usaha' => Request()->bidang_usaha,
                'pekerjaan' => Request()->pekerjaan,
                'nama_kerabat' => Request()->nama_kerabat,
                'no_handphone_kerabat' => Request()->no_handphone_kerabat,
                'alamat_kerabat' => Request()->alamat_kerabat,
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }
        
        $this->UserJamaat->editDataJamaat($id_code, $data);
        
        $newActivity['user_id'] = Auth::guard('admin')->user()->id;
        $newActivity['kegiatan'] = "Edit umat"." ". $data['id_code'];
        UserHistory::create($newActivity);

        return redirect()->route('detail_data_jamaat', Request()->id_code)->with('success','Edit data Umat '.Request()->$id_code.' berhasil!');
    }

    public function viewDetailDataJamaat($id_code)
    {
        $all_id_kegiatans = absensiJamaat::where('idjamaat', $id_code)->distinct('idkegiatan')->pluck('idkegiatan');
        
        $kegiatans = array();
        $tanggal_kegiatans = array();

        for ($i = 0; $i < count($all_id_kegiatans); $i++) { 
            array_push($kegiatans, Kegiatan::where('id', $all_id_kegiatans[$i])->value('nama'));
            array_push($tanggal_kegiatans, Kegiatan::where('id', $all_id_kegiatans[$i])->value('tanggal_mulai'));
        }

        $data_donasi_paketdana = Transaksi::orderBy('tanggal_transaksi', 'desc')->where('id_jamaat', $id_code)->get();
        $data_donasi_foto = TransaksiFoto::orderBy('tanggal_transaksi', 'desc')->where('id_pemesan', $id_code)->get();

        $total_harga_paketdana = "Rp. " . number_format($data_donasi_paketdana->sum('total_harga'), 2, ',', '.');
        $total_harga_foto = "Rp. " . number_format($data_donasi_foto->sum('total_harga'), 2, ',', '.');

        $data = [
            'jamaat' => UserJamaat::where('id_code', $id_code)->first(),
            'kegiatans' => $kegiatans,
            'tanggal_kegiatans' => $tanggal_kegiatans,
            'data_donasi_paketdana' => $data_donasi_paketdana,
            'data_donasi_foto' => $data_donasi_foto,
            'total_harga_paketdana' => $total_harga_paketdana,
            'total_harga_foto' => $total_harga_foto
        ];

        return view('admins.manage_jamaat.detail_data_jamaat', $data);
    }

    public function deleteDataJamaat($id_code)
    {
        UserJamaat::where('id_code', $id_code)->delete();

        $newActivity['user_id'] = Auth::guard('admin')->user()->id;
        $newActivity['kegiatan'] = "Hapus data umat"." ". $id_code;
        UserHistory::create($newActivity);

        return redirect()->route('daftar_jamaat');
    }

    // Daftar Umat Tidak Terdaftar
    public function viewDataJamaatUnregisterd()
    {
        $jamaats_unreg = UserJamaat::whereNull('id_code')->get();
        return view('admins.manage_jamaat.list_jamaat_unreg', compact('jamaats_unreg'));
    }

    public function viewAddJamaatUnreg()
    {
        return view('admins.manage_jamaat.add_jamaat_unreg');
    }

    public function addJamaatUnreg()
    {
        Request()->validate([
            'id_code',
            'name' => 'required',
            'no_handphone_1'=> 'required',
            'no_handphone_2',
            'email',
            'gol_darah',
            'jenis_kelamin',
            'alamat',
            'kelurahan_kecamatan',
            'kabupaten_kota',
            'rt_rw',
            'tempat_lahir',
            'tanggal_lahir',
            'bidang_usaha',
            'pekerjaan',
            'nama_kerabat',
            'no_handphone_kerabat',
            'alamat_kerabat',
            'password',
        ]);

        $data = [
            'id_code' => Request()->id_code,
            'name' => Request()->name,
            'no_handphone_1' => Request()->no_handphone_1,
            'no_handphone_2' => Request()->no_handphone_2,
            'email' => Request()->email,
            'gol_darah' => Request()->gol_darah,
            'jenis_kelamin' => Request()->jenis_kelamin,
            'alamat' => Request()->alamat,
            'kelurahan_kecamatan' => Request()->kelurahan_kecamatan,
            'kabupaten_kota' => Request()->kabupaten_kota,
            'rt_rw' => Request()->rt_rw,
            'tempat_lahir' => Request()->tempat_lahir,
            'tanggal_lahir' => Request()->tanggal_lahir,
            'bidang_usaha' => Request()->bidang_usaha,
            'pekerjaan' => Request()->pekerjaan,
            'nama_kerabat' => Request()->nama_kerabat,
            'no_handphone_kerabat' => Request()->no_handphone_kerabat,
            'alamat_kerabat' => Request()->alamat_kerabat,
            'password' => bcrypt(Request()->password),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->UserJamaat->addDataJamaat($data);
        
        $newActivity['user_id'] = Auth::guard('admin')->user()->id;
        $newActivity['kegiatan'] = "Tambah umat tak terdaftar"." ".$data['name'];
        UserHistory::create($newActivity);

        return redirect()->route('tambah_jamaat_unreg')->with('success','Data Umat '.Request()->name.' berhasil ditambahkan!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\UserJamaat;
use Illuminate\Http\Request;

class IuranManageController extends Controller
{
    public function __construct()
    {
        $this->UserJamaat = new UserJamaat();
        $this->middleware('auth');
    }

    public function viewTagihIuran()
    {
        $jamaats = UserJamaat::all();
        return view('admins.iuran', compact('jamaats'));
    }
    public function kirimIuranWajib()
    {
        return view('admins.add_data_baptisan');
    }

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
            'alamat' => $jamaat->alamat,
            'kelurahan_kecamatan' => $jamaat->kelurahan_kecamatan,
            'kabupaten_kota' => $jamaat->kabupaten_kota,
            'rt_rw' => $jamaat->rt_rw,
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

    public function viewDataJamaat()
    {
        $jamaats = UserJamaat::all();
        return view('admins.iuran', compact('jamaats'));
    }
}

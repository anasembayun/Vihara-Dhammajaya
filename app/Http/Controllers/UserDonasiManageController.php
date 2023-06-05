<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserJamaat;
use App\Models\Donasi;
use App\Models\DetailDonasi;

class UserDonasiManageController extends Controller
{
    public function __construct()
    {
        $this->Donasi = new Donasi();
        $this->DetailDonasi = new DetailDonasi();
        $this->middleware('auth');
    }

    public function viewDonasi($id_kegiatan_donasi)
    {
        $data = [
            'donasi' => $this->Donasi->detailDataDonasi($id_kegiatan_donasi),
            'usrs_jamaat' => UserJamaat::all(),
        ];
        return view('jamaats.user_donasi', $data);
    }

    public function addDonasi()
    {
        Request()->validate([
            'id_data_donasi' => 'required',
            'id_usr_jamaat' => 'required',
            'jumlah_donasi' => 'required',
        ]);

        date_default_timezone_set('Asia/Jakarta');

        $data = [
            'id_data_donasi' => Request()->id_data_donasi,
            'id_usr_jamaat' => Request()->id_usr_jamaat,
            'jumlah_donasi' => Request()->jumlah_donasi,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // masih belom efisien
        $donasis = Donasi::all();

        foreach ($donasis as $donasi)
        {
            if ($donasi->id == Request()->id_data_donasi)
            {
                $total_donasi = $donasi->total_donasi;
                $total_donatur = $donasi->total_donatur;
            }
        }

        // $total_donasi = Donasi::where('id', Request()->id_data_donasi)->first();
        // $total_donatur = Donasi::where('id', Request()->id_data_donasi)->get('total_donatur');

        $jumlah_donasi = Request()->jumlah_donasi;
        
        $data_donasi = [
            'total_donasi' => $total_donasi + (float)$jumlah_donasi,
            'total_donatur' => $total_donatur + 1,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->DetailDonasi->addDataDetailDonasi($data);
        $this->Donasi->editDataDonasi(Request()->id_usr_jamaat, $data_donasi);
        return redirect()->route('info_donasi');
    }
}

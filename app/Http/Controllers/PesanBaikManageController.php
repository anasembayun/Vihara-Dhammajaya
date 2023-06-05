<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DataPesanBaik;

class PesanBaikManageController extends Controller
{
    public function __construct()
    {
        $this->DataPesanBaik = new DataPesanBaik();
        $this->middleware('auth');
    }

    public function viewAddPesanBaik()
    {
        $data = [
            'data_pesan_baik' => DataPesanBaik::all()       
        ];

        return view('admins.manage_good_message.add_good_message', $data);
    }

    public function viewEditPesanBaik($id)
    {
        $data = [
            'pesan_baik' => $this->DataPesanBaik->detailDataPesanBaik($id),
        ];
        return view('admins.manage_good_message.edit_good_message', $data);
    }

    public function addPesanBaik()
    {
        Request()->validate([
            'pesan_baik' => 'required'
        ]);

        $data = [
            'pesan_baik' => Request()->pesan_baik
        ];

        $this->DataPesanBaik->addDataPesanBaik($data);
        return redirect()->route('tambah_pesan_baik')->with('success','Data berhasil ditambahkan!');
    }

    public function updatePesanBaik($id)
    {
        Request()->validate([
            'pesan_baik' => 'required'
        ]);

        $data = [
            'pesan_baik' => Request()->pesan_baik
        ];

        $this->DataPesanBaik->editDataPesanBaik($id, $data);
        return redirect()->route('edit_pesan_baik', $id)->with('success','Data berhasil diperbarui!');
    }

    public function deletePesanBaik($id)
    {
        $this->DataPesanBaik->deleteDataPesanBaik($id);
        return redirect()->route('tambah_pesan_baik')->with('success','Data berhasil dihapus!');
    }
}

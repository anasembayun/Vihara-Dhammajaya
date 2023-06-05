<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\KasKeluar;

class PengeluaranController extends Controller
{
    public function __construct()
    {
        $this->KasKeluar = new KasKeluar();
        $this->middleware('auth');
    }

    public function viewCashOut()
    {
        return view('admins.manage_expenditure.cash_out');
    }

    public function addCashOut()
    {
        Request()->validate([
            'nomor_kas_keluar' => 'required',
            'id_admin' => 'required',
            'name' => 'required',
            'penerima' => 'required',
            'keterangan_keperluan' => 'required',
            'tanggal' => 'required',
            'nominal_pengeluaran' => 'required'
        ]);

        $data = [
            'nomor_kas_keluar' => Request()->nomor_kas_keluar,
            'id_admin' => Request()->id_admin,
            'nama_admin' => Request()->name,
            'penerima' => Request()->penerima,
            'keterangan_keperluan' => Request()->keterangan_keperluan,
            'tanggal' => Request()->tanggal,
            'nominal_pengeluaran' => Request()->nominal_pengeluaran
        ];

        $this->KasKeluar->addDataCashOut($data);
        return redirect()->route('tambah_kas_keluar')->with('success','Data berhasil ditambahkan!');;
    }

    public function deleteCashOut($id)
    {
        $this->KasKeluar->deleteDataCashOut($id);
        return redirect()->route('daftar_kas_keluar');
    }

    public function viewDataCashOut()
    {
        $data_kas_keluar = KasKeluar::all();
        return view('admins.manage_expenditure.list_cash_out', compact('data_kas_keluar'));
    }
}

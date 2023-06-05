<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donasi;

class DonasiManageController extends Controller
{
    public function __construct()
    {
        $this->Donasi = new Donasi();
        $this->middleware('auth');
    }

    public function viewAddKegiatanDonasi()
    {
        return view('admins.manage_donations.add_donation_program');
    }

    public function viewDataKegiatanDonasi()
    {
        $donasis = Donasi::all();
        return view('admins.manage_donations.list_donation_program', compact('donasis'));
    }

    public function viewEditDataKegiatanDonasi($id)
    {
        $data = [
            'donasi' => $this->Donasi->detailDataDonasi($id),
        ];
        return view('admins.manage_donations.edit_data_donation_program', $data);
    }

    public function viewDetailDataKegiatanDonasi($id)
    {
        $data = [
            'donasi' => $this->Donasi->detailDataDonasi($id),
        ];
        return view('admins.manage_donations.detail_donation_program', $data);
    }

    public function addKegiatanDonasi()
    {
        Request()->validate([
            'nama_kegiatan_donasi' => 'required',
            'tanggal_mulai_donasi' => 'required',
            'tanggal_selesai_donasi' => 'required',
            'keterangan_donasi' => 'required',
            'foto_kegiatan_donasi',
        ]);

        $filename = "";
        if (Request()->hasFile('foto_kegiatan_donasi')) {
            if (Request()->file('foto_kegiatan_donasi')) {
                $file = Request()->file('foto_kegiatan_donasi');
                $filename = date('YmdHi').'_'.$file->getClientOriginalName();
                $file->move(public_path('images/app_admin/kelola_donasi/foto_kegiatan_donasi'), $filename);
            }
        }

        $data = [
            'nama_kegiatan_donasi' => Request()->nama_kegiatan_donasi,
            'tanggal_mulai_donasi' => Request()->tanggal_mulai_donasi,
            'tanggal_selesai_donasi' => Request()->tanggal_selesai_donasi,
            'keterangan_donasi' => Request()->keterangan_donasi,
            'foto_kegiatan_donasi' => $filename,
            'total_donasi' => 0.00,
            'total_donatur' => 0,
            'status' => 'Dana terus dikumpul',
            'status_keaktifan' => 'Aktif',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->Donasi->addDataDonasi($data);
        return redirect()->route('tambah_kegiatan_donasi')->with('success', 'Kegiatan '.Request()->nama_kegiatan_donasi.' berhasil ditambahkan!');
    }

    public function updateDataKegiatanDonasi($id)
    {
        Request()->validate([
            'tanggal_mulai_donasi' => 'required',
            'tanggal_selesai_donasi' => 'required',
            'status' => 'required',
            'status_keaktifan' => 'required',
            'keterangan_donasi' => 'required',
            'foto_kegiatan_donasi',
        ]);

        if (Request()->foto_kegiatan_donasi <> "")
        {
            $donasi = $this->Donasi->detailDataDonasi($id);
            if ($donasi->foto_kegiatan_donasi <> "")
            {
                unlink(public_path('images/app_admin/kelola_donasi/foto_kegiatan_donasi').'/'.$donasi->foto_kegiatan_donasi);
            }

            $file = Request()->file('foto_kegiatan_donasi');
            $filename = date('YmdHi').'_'.$file->getClientOriginalName();
            $file->move(public_path('images/app_admin/kelola_donasi/foto_kegiatan_donasi'), $filename);

            $data = [
                'tanggal_mulai_donasi' => Request()->tanggal_mulai_donasi,
                'tanggal_selesai_donasi' => Request()->tanggal_selesai_donasi,
                'status' => Request()->status,
                'status_keaktifan' => Request()->status_keaktifan,
                'keterangan_donasi' => Request()->keterangan_donasi,
                'foto_kegiatan_donasi' => $filename,
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }
        else
        {
            $data = [
                'tanggal_mulai_donasi' => Request()->tanggal_mulai_donasi,
                'tanggal_selesai_donasi' => Request()->tanggal_selesai_donasi,
                'status' => Request()->status,
                'status_keaktifan' => Request()->status_keaktifan,
                'keterangan_donasi' => Request()->keterangan_donasi,
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        $nama_kegiatan_donasi = Donasi::where('id', $id)->value('nama_kegiatan_donasi');

        $this->Donasi->editDataDonasi($id, $data);
        return redirect()->route('edit_data_donasi', $id)->with('success','Edit data kegiatan donasi '.$nama_kegiatan_donasi.' berhasil!');
    }

    public function showDataDonasi($id)
    {
        $_donasi = Donasi::find($id);
        $file_path = url('images/app_admin/kelola_donasi/foto_kegiatan_donasi/'.$_donasi->foto_kegiatan_donasi);

        return response()->json([
            'nama_kegiatan_donasi' => $_donasi->nama_kegiatan_donasi,
            'tanggal_mulai_donasi' => $_donasi->tanggal_mulai_donasi,
            'tanggal_selesai_donasi' => $_donasi->tanggal_selesai_donasi,
            'total_donasi' => $_donasi->total_donasi,
            'total_donatur' => $_donasi->total_donatur,
            'keterangan_donasi' => $_donasi->keterangan_donasi,
            'foto_kegiatan_donasi' => $file_path,
        ]);
    }

    public function deleteDataKegiatanDonasi($id)
    {
        $donasi = $this->Donasi->detailDataDonasi($id);
        if ($donasi->foto_kegiatan_donasi <> "")
        {
            unlink(public_path('images/app_admin/kelola_donasi/foto_kegiatan_donasi').'/'.$donasi->foto_kegiatan_donasi);
        }

        $this->Donasi->deleteDataDonasi($id);
        return redirect()->route('daftar_kegiatan_donasi');
    }
}

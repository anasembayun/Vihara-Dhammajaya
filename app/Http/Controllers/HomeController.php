<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\News;
use App\Models\User;
use App\Models\Donasi;

class HomeController extends Controller
{
    public function __construct() 
    {
        $this->Donasi = new Donasi();
    }

    public function index()
    {
        $beritas = News::paginate(3);
        $donasis = Donasi::paginate(3);
        return view('jamaats.home_freeze', compact('beritas', 'donasis'));
    }

    // INFO TERKINI
    public function viewLatestInfoPage()
    {
        $beritas = News::paginate(6);
        return view('jamaats.latest_info', compact('beritas'));
    }

    // ABSENSI
    public function viewAttendanceFormPage()
    {
        return view('jamaats.attendance');
    }

    // INFO KEGIATAN
    public function viewProgramInfoPage()
    {
        $kegiatans = Kegiatan::paginate(6);
        return view('jamaats.programs_info', compact('kegiatans'));
    }

    // DONASI
    public function viewDonateInfoPage()
    {
        $donasis = Donasi::paginate(6);
        return view('jamaats.donate_list', compact('donasis'));
    }

    public function detailKegiatanDonasi($id_kegiatan_donasi)
    {
        $data = [
            'donasi' => $this->Donasi->detailDataDonasi($id_kegiatan_donasi),
        ];
        return view('jamaats.detail_donate', $data);
    }

    public function showThankyouPage()
    {
        return view('templates.terima_kasih_sudah_donasi');
    }
}

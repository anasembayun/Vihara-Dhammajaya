<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transaksi;
use App\Models\Goods;
use App\Models\Donasi;
use App\Models\TransaksiFoto;
use App\Models\TransaksiFotoUnreg;
use App\Models\UserJamaat;

use Carbon\Carbon;

class KelolaLaporanManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewLaporanTransaksi()
    {
        $total_dana = Transaksi::where('kategori_donasi', '=', 'Dana')->sum('total_harga');
        $total_paket = Transaksi::where('kategori_donasi', '=', 'Paket')->sum('total_harga');
        $total_semua = Transaksi::sum('total_harga');

        $total_dana = "Rp. " . number_format($total_dana, 2, ',', '.');
        $total_paket = "Rp. " . number_format($total_paket, 2, ',', '.');
        $total_semua = "Rp. " . number_format($total_semua, 2, ',', '.');

        $donasi = Donasi::all();
        $data_transaksi = Transaksi::orderBy('tanggal_transaksi', 'desc')->get();
        return view('admins.manage_report.report_transaction', compact('data_transaksi','donasi', 'total_dana', 'total_paket', 'total_semua'));
    }

    public function viewLaporanTransaksiFoto()
    {
        $data_transaksi = TransaksiFoto::orderBy('tanggal_transaksi', 'desc')->get();
        foreach ($data_transaksi as $q) {
            $q->total_harga = "Rp. " . number_format($q->total_harga, 2, ',', '.');
            $q->id_pemesan = UserJamaat::where('id_code', $q->id_pemesan)->value('name');
        }

        $data_transaksi_unreg = TransaksiFotoUnreg::all();
        foreach ($data_transaksi_unreg as $q) {
            $q->total_harga = "Rp. " . number_format($q->total_harga, 2, ',', '.');
        }
        $total = TransaksiFoto::sum('total_harga');
        $total_unreg = TransaksiFotoUnreg::sum('total_harga');

        $total = "Rp. " . number_format($total, 2, ',', '.');
        $total_unreg = "Rp. " . number_format($total_unreg, 2, ',', '.');
        return view('admins.manage_report.report_transaction_photo', compact('data_transaksi', 'data_transaksi_unreg', 'total', 'total_unreg'));
    }

    public function viewLaporanTransaksiTotal()
    {
        $data_transaksi = Transaksi::all();

        return view('admins.manage_report.report_transaction_total', compact('data_transaksi'));
    }

    public function viewLaporanPenjualanPaket()
    {
        $data_paket = Goods::withTrashed()->get();
        $total = Goods::sum('harga_jual');
        return view('admins.manage_report.report_goods', compact('data_paket', 'total'));
    }

    public function FilterLaporanTransaksi($date_awal, $date_akhir, $kategori, $kegiatan)
    {
        $donasi = Donasi::all();
        if ($date_awal == $date_akhir)
        $data_transaksi = Transaksi::orderBy('tanggal_transaksi', 'desc')->whereBetween('tanggal_transaksi', [$date_awal . ' 00:00:00', $date_akhir . ' 23:59:59'])->get();
        else
        $data_transaksi = Transaksi::orderBy('tanggal_transaksi', 'desc')->whereBetween('tanggal_transaksi', [$date_awal . ' 00:00:00', $date_akhir . ' 23:59:59'])->get();

        // $data_sort = $data_trs;
        // $total = 0;
        // $total_dana = 0;
        // $total_paket = 0;

        if ($kategori != "all" && $kegiatan != "all"){
            $data_transaksi = Transaksi::select('*')->where('kategori_donasi', $kategori)->where('id_kegiatan_donasi', $kegiatan)
                                ->orderBy('tanggal_transaksi', 'desc')
                                ->whereBetween('tanggal_transaksi', [$date_awal . ' 00:00:00', $date_akhir . ' 23:59:59'])->get();
            $total_semua = $data_transaksi->sum('total_harga');

        } else if ($kategori != "all" && $kegiatan == "all"){
            $data_transaksi = Transaksi::select('*')->where('kategori_donasi', $kategori)
                                ->orderBy('tanggal_transaksi', 'desc')
                                ->whereBetween('tanggal_transaksi', [$date_awal . ' 00:00:00', $date_akhir . ' 23:59:59'])->get();
            $total_semua = $data_transaksi->sum('total_harga');
        } else if ($kategori == "all" && $kegiatan != "all"){
            $data_transaksi = Transaksi::select('*')->where('id_kegiatan_donasi', $kegiatan)
                                ->orderBy('tanggal_transaksi', 'desc')
                                ->whereBetween('tanggal_transaksi', [$date_awal . ' 00:00:00', $date_akhir . ' 23:59:59'])->get();
            $total_semua = $data_transaksi->sum('total_harga');
        }
        else{
            $data_transaksi = Transaksi::orderBy('tanggal_transaksi', 'desc')->whereBetween('tanggal_transaksi', [$date_awal . ' 00:00:00', $date_akhir . ' 23:59:59'])->get();
            $total_semua = $data_transaksi->sum('total_harga');
        }

        // foreach ($data_sort as $q) {
        //     $total = $total + $q->total_harga;
        //     if ($q->kategori_donasi == "Dana") {
        //         $total_dana += $q->total_harga;
        //     } else {
        //         $total_paket += $q->total_harga;
        //     }
        //     $q->tanggal_transaksi = Carbon::createFromFormat('Y-m-d H:i:s', $q->tanggal_transaksi)->format('d-m-Y | H:i:s');
        //     $q->total_harga = "Rp. " . number_format($q->total_harga, 2, ',', '.');
        //     $q->id_kegiatan_donasi = Donasi::where('id', $q->id_kegiatan_donasi)->value('nama_kegiatan_donasi');
        // }

        $total_semua = "Rp. " . number_format($total_semua, 2, ',', '.');
        $data = [
            'data_transaksi' => $data_transaksi,
            'total_semua' => $total_semua,
            'date_awal' => $date_awal,
            'date_akhir' => $date_akhir,
            'donasi' => $donasi,
        ];

        return view('admins.manage_report.report_transaction', $data);
        // $total_dana = "Rp. " . number_format($total_dana, 2, ',', '.');
        // $total_paket = "Rp. " . number_format($total_paket, 2, ',', '.');
        // return response()->json([
        //     'data_trs' => $data_sort,
        //     'total' => $total,
        //     'total_dana' => $total_dana,
        //     'total_paket' => $total_paket
        // ]);
        // return $data_trs;
    }

    public function generateReportTransaksiPDF($date_awal = 0, $date_akhir = 0, $kategori, $kegiatan)
    {
        $today = Carbon::now()->format('Y-m');
        if ($date_awal == 0 || $date_akhir == 0) {
            $date_awal = date($today . '-01');
            $date_akhir = date($today . '-31');
        }

        if ($kategori != "all" && $kegiatan != "all"){
            $data_transaksi = Transaksi::select('*')->where('kategori_donasi', $kategori)->where('id_kegiatan_donasi', $kegiatan)
                                ->orderBy('tanggal_transaksi', 'asc')
                                ->whereBetween('tanggal_transaksi', [$date_awal . ' 00:00:00', $date_akhir . ' 23:59:59'])->get();
            $total_semua = $data_transaksi->sum('total_harga');

        } else if ($kategori != "all" && $kegiatan == "all"){
            $data_transaksi = Transaksi::select('*')->where('kategori_donasi', $kategori)
                                ->orderBy('tanggal_transaksi', 'asc')
                                ->whereBetween('tanggal_transaksi', [$date_awal . ' 00:00:00', $date_akhir . ' 23:59:59'])->get();
            $total_semua = $data_transaksi->sum('total_harga');
        } else if ($kategori == "all" && $kegiatan != "all"){
            $data_transaksi = Transaksi::select('*')->where('id_kegiatan_donasi', $kegiatan)
                                ->orderBy('tanggal_transaksi', 'asc')
                                ->whereBetween('tanggal_transaksi', [$date_awal . ' 00:00:00', $date_akhir . ' 23:59:59'])->get();
            $total_semua = $data_transaksi->sum('total_harga');
        }
        else{
            $data_transaksi = Transaksi::orderBy('tanggal_transaksi', 'asc')->whereBetween('tanggal_transaksi', [$date_awal . ' 00:00:00', $date_akhir . ' 23:59:59'])->get();
            $total_semua = $data_transaksi->sum('total_harga');
        }

        $data = [
            'data_transaksi' => $data_transaksi,
            'total_semua' => $total_semua,
            'kegiatan' => $kegiatan,
            'date_awal' => Carbon::createFromFormat('Y-m-d', $date_awal)->translatedFormat('d F Y'),
            'date_akhir' => Carbon::createFromFormat('Y-m-d', $date_akhir)->translatedFormat('d F Y'),
        ];

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);

        $pdf->loadView('templates.transaction_report_pdf', $data);
        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('laporanTransaksi.pdf', array("Attachment" => false));
    }

    public function FilterLaporanTransaksiFoto($date_awal, $date_akhir)
    {
        // filter transaksi foto
        if ($date_awal == $date_akhir)
            $data_trs = TransaksiFoto::orderBy('tanggal_transaksi', 'desc')->whereDate('tanggal_transaksi', $date_akhir)->get();
        else
            $data_trs = TransaksiFoto::orderBy('tanggal_transaksi', 'desc')->whereBetween('tanggal_transaksi', [$date_awal . ' 00:00:00', $date_akhir . ' 23:59:59'])->get();
        $data_sort = $data_trs;
        $total = 0;

        foreach ($data_sort as $q) {
            $total = $total + $q->total_harga;
            //$q->tanggal_transaksi = Carbon::createFromFormat('Y-m-d H:i:s', $q->tanggal_transaksi)->format('d-m-Y | H:i:s');
            $q->total_harga = "Rp. " . number_format($q->total_harga, 2, ',', '.');
            $q->id_pemesan = UserJamaat::where('id_code', $q->id_pemesan)->value('name');
        }

        // filter transaksi foto unregistered
        if ($date_awal == $date_akhir)
            $data_unreg = TransaksiFotoUnreg::orderBy('tanggal_transaksi', 'desc')->whereDate('tanggal_transaksi', $date_akhir)->get();
        else
            $data_unreg = TransaksiFotoUnreg::orderBy('tanggal_transaksi', 'desc')->whereBetween('tanggal_transaksi', [$date_awal . ' 00:00:00', $date_akhir . ' 23:59:59'])->get();
        $data_sort_unreg = $data_unreg;
        $total_unreg = 0;

        foreach ($data_sort_unreg as $q) {
            $total_unreg = $total_unreg + $q->total_harga;
            // $q->tanggal_transaksi = Carbon::createFromFormat('Y-m-d H:i:s', $q->tanggal_transaksi)->format('d-m-Y | H:i:s');
            $q->total_harga = "Rp. " . number_format($q->total_harga, 2, ',', '.');
        }

        $total = "Rp. " . number_format($total, 2, ',', '.');
        $total_unreg = "Rp. " . number_format($total_unreg, 2, ',', '.');

        return response()->json([
            'data_trs' => $data_sort,
            'data_unreg' => $data_sort_unreg,
            'total' => $total,
            'total_unreg' => $total_unreg
        ]);
    }

    // public function FilterLaporanTransaksiFotoUnreg($date_awal, $date_akhir)
    // {
    //     if ($date_awal == $date_akhir)
    //         $data_unreg = TransaksiFotoUnreg::whereDate('tanggal_transaksi', $date_akhir)->get();
    //     else
    //         $data_unreg = TransaksiFotoUnreg::whereBetween('tanggal_transaksi', [$date_awal . ' 00:00:00', $date_akhir . ' 23:59:59'])->get();


    //     $data_sort_unreg = $data_unreg->sortBy('tanggal_transaksi');

    //     foreach ($data_sort_unreg as $q) {
    //         $q->total_harga = "Rp. " . number_format($q->total_harga, 2, ',', '.');
    //     }
    //     return response()->json([
    //         'data_unreg' => $data_sort_unreg
    //     ]);
    // }


    public function showDataTransaksi(Request $request)
    {
        dd($request);
        if ($request->ajax()) {

            if ($request->input('start_date') && $request->input('end_date')) {

                $start_date = Carbon::parse($request->input('start_date'));
                $end_date = Carbon::parse($request->input('end_date'));

                if ($end_date->greaterThan($start_date)) {
                    $data_transaksi = Transaksi::whereBetween('tanggal_transaksi', [$start_date, $end_date])->get();
                } else {
                    $data_transaksi = Transaksi::latest()->get();
                }
            } else {
                $data_transaksi = Transaksi::latest()->get();
            }

            return response()->json([
                'data_transaksi' => $data_transaksi
            ]);
        } else {
            abort(403);
        }
    }
}

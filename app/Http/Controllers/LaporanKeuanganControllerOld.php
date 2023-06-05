<?php

namespace App\Http\Controllers;

use PDF;
use Excel;

use Carbon\Carbon;

use App\Models\KasMasuk;
use App\Models\KasKeluar;
use App\Models\Transaksi;
use Illuminate\Http\Request;

use App\Models\TransaksiFoto;

use App\Exports\TransaksiExport;
use App\Models\TransaksiFotoUnreg;
use App\Http\Controllers\Controller;

class LaporanKeuanganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewLaporanKeuangan()
    {
        $data_transaksi = Transaksi::all();
        return view('admins.financial_statements.report_finance', compact('data_transaksi'));
    }

    public function showDataTransaksi_($year_month = 0)
    {
        $today = Carbon::now()->format('Y-m');
        if ($year_month == 0 || $year_month == null) {
            $year_month = $today;
        }

        $min_YM = date($year_month . '-01');
        $max_YM = date($year_month . '-31');
        $date = date('M, Y', strtotime($min_YM));

        //============ Transaksi Dana ================//
        $transaksi_dana_tunai = Transaksi::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where([['kategori_donasi', '=', 'Dana'], ['metode_pembayaran', '=', 'Tunai']])
            ->sum('total_harga');
        $transaksi_dana_transfer = Transaksi::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where([['kategori_donasi', '=', 'Dana'], ['metode_pembayaran', '=', 'Transfer']])
            ->sum('total_harga');
        $transaksi_dana_QRIS = Transaksi::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where([['kategori_donasi', '=', 'Dana'], ['metode_pembayaran', '=', 'QRIS']])
            ->sum('total_harga');
        $transaksi_dana_debit = Transaksi::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where([['kategori_donasi', '=', 'Dana'], ['metode_pembayaran', '=', 'Debit']])
            ->sum('total_harga');
        $total_transaksi_dana = $transaksi_dana_tunai + $transaksi_dana_transfer + $transaksi_dana_QRIS + $transaksi_dana_debit;

        //============ Transaksi Paket ================//
        $transaksi_paket_tunai = Transaksi::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where([['kategori_donasi', '=', 'Paket'], ['metode_pembayaran', '=', 'Tunai']])
            ->sum('total_harga');
        $transaksi_paket_transfer = Transaksi::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where([['kategori_donasi', '=', 'Paket'], ['metode_pembayaran', '=', 'Transfer']])
            ->sum('total_harga');
        $transaksi_paket_QRIS = Transaksi::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where([['kategori_donasi', '=', 'Paket'], ['metode_pembayaran', '=', 'QRIS']])
            ->sum('total_harga');
        $transaksi_paket_debit = Transaksi::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where([['kategori_donasi', '=', 'Paket'], ['metode_pembayaran', '=', 'Debit']])
            ->sum('total_harga');
        $total_transaksi_paket = $transaksi_paket_tunai + $transaksi_paket_transfer + $transaksi_paket_QRIS + $transaksi_paket_debit;

        //============ Transaksi Foto ================//
        $transaksi_foto_tunai = TransaksiFoto::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where('metode_pembayaran', '=', 'Tunai')
            ->sum('total_harga');
        $transaksi_foto_transfer = TransaksiFoto::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where('metode_pembayaran', '=', 'Transfer')
            ->sum('total_harga');
        $transaksi_foto_QRIS = TransaksiFoto::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where('metode_pembayaran', '=', 'QRIS')
            ->sum('total_harga');
        $transaksi_foto_debit = TransaksiFoto::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where('metode_pembayaran', '=', 'Debit')
            ->sum('total_harga');

        //============ Transaksi Foto Unreg ================//
        $transaksi_foto_unreg_tunai = TransaksiFotoUnreg::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where('metode_pembayaran', '=', 'Tunai')
            ->sum('total_harga');
        $transaksi_foto_unreg_transfer = TransaksiFotoUnreg::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where('metode_pembayaran', '=', 'Transfer')
            ->sum('total_harga');
        $transaksi_foto_unreg_QRIS = TransaksiFotoUnreg::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where('metode_pembayaran', '=', 'QRIS')
            ->sum('total_harga');
        $transaksi_foto_unreg_debit = TransaksiFotoUnreg::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where('metode_pembayaran', '=', 'Debit')
            ->sum('total_harga');

        $total_transaksi_foto = $transaksi_foto_tunai + $transaksi_foto_transfer + $transaksi_foto_QRIS + $transaksi_foto_debit;
        $total_transaksi_foto_unreg = $transaksi_foto_unreg_tunai + $transaksi_foto_unreg_transfer + $transaksi_foto_unreg_QRIS + $transaksi_foto_unreg_debit;
        $total_pengeluaran = KasKeluar::whereBetween('tanggal', [$min_YM, $max_YM])->sum('nominal_pengeluaran');

        // ============ Kas Masuk ===========//
        $km_1 = KasMasuk::whereBetween('tanggal', [$min_YM, $max_YM])
            ->where('keterangan_keperluan', '=', 'Dana dari Yayasan')->sum('nominal_pemasukan');
        $km_2 = KasMasuk::whereBetween('tanggal', [$min_YM, $max_YM])
            ->where('keterangan_keperluan', '=', 'Dana Paramita Umum')->sum('nominal_pemasukan');
        $km_3 = KasMasuk::whereBetween('tanggal', [$min_YM, $max_YM])
            ->where('keterangan_keperluan', '=', 'Dana Paramita Anak-Anak')->sum('nominal_pemasukan');
        $km_4 = KasMasuk::whereBetween('tanggal', [$min_YM, $max_YM])
            ->where('keterangan_keperluan', '=', 'Dana Paramita Remaja')->sum('nominal_pemasukan');
        $km_5 = KasMasuk::whereBetween('tanggal', [$min_YM, $max_YM])
            ->where('keterangan_keperluan', '=', 'Dana Muda Mudi')->sum('nominal_pemasukan');
        $kas_masuk = KasMasuk::whereBetween('tanggal', [$min_YM, $max_YM])->sum('nominal_pemasukan');


        $total_pendapatan = $total_transaksi_foto + $total_transaksi_foto_unreg + $kas_masuk + $total_transaksi_dana + $total_transaksi_paket;
        $laba_bersih = $kas_masuk - $total_pengeluaran;
        if ($laba_bersih >= 0)
            $laba_class = 'plus';
        else
            $laba_class = 'minus';

        $transaksi_foto_tunai = number_format($transaksi_foto_tunai, 0, ',', '.');
        $transaksi_foto_transfer = number_format($transaksi_foto_transfer, 0, ',', '.');
        $transaksi_foto_QRIS = number_format($transaksi_foto_QRIS, 0, ',', '.');
        $transaksi_foto_debit = number_format($transaksi_foto_debit, 0, ',', '.');
        $total_transaksi_foto = number_format($total_transaksi_foto, 0, ',', '.');

        $transaksi_foto_unreg_tunai = number_format($transaksi_foto_unreg_tunai, 0, ',', '.');
        $transaksi_foto_unreg_transfer = number_format($transaksi_foto_unreg_transfer, 0, ',', '.');
        $transaksi_foto_unreg_QRIS = number_format($transaksi_foto_unreg_QRIS, 0, ',', '.');
        $transaksi_foto_unreg_debit = number_format($transaksi_foto_unreg_debit, 0, ',', '.');
        $total_transaksi_foto_unreg = number_format($total_transaksi_foto_unreg, 0, ',', '.');

        $total_pengeluaran = number_format($total_pengeluaran, 0, ',', '.');
        $total_pendapatan = number_format($total_pendapatan, 0, ',', '.');
        $laba_bersih = number_format($laba_bersih, 0, ',', '.');

        $km_1 = number_format($km_1, 0, ',', '.');
        $km_2 = number_format($km_2, 0, ',', '.');
        $km_3 = number_format($km_3, 0, ',', '.');
        $km_4 = number_format($km_4, 0, ',', '.');
        $km_5 = number_format($km_5, 0, ',', '.');
        $kas_masuk = number_format($kas_masuk, 0, ',', '.');

        $transaksi_dana_tunai = number_format($transaksi_dana_tunai, 0, ',', '.');
        $transaksi_dana_transfer = number_format($transaksi_dana_transfer, 0, ',', '.');
        $transaksi_dana_QRIS = number_format($transaksi_dana_QRIS, 0, ',', '.');
        $transaksi_dana_debit = number_format($transaksi_dana_debit, 0, ',', '.');
        $total_transaksi_dana = number_format($total_transaksi_dana, 0, ',', '.');

        $transaksi_paket_tunai = number_format($transaksi_paket_tunai, 0, ',', '.');
        $transaksi_paket_transfer = number_format($transaksi_paket_transfer, 0, ',', '.');
        $transaksi_paket_QRIS = number_format($transaksi_paket_QRIS, 0, ',', '.');
        $transaksi_paket_debit = number_format($transaksi_paket_debit, 0, ',', '.');
        $total_transaksi_paket = number_format($total_transaksi_paket, 0, ',', '.');

        return response()->json([
            'km_1' => $km_1,
            'km_2' => $km_2,
            'km_3' =>  $km_3,
            'km_4' => $km_4,
            'km_5' => $km_5,
            'total_kas_masuk' => $kas_masuk,

            'transaksi_foto_tunai' => $transaksi_foto_tunai,
            'transaksi_foto_transfer' => $transaksi_foto_transfer,
            'transaksi_foto_QRIS' => $transaksi_foto_QRIS,
            'transaksi_foto_debit' => $transaksi_foto_debit,
            'total_transaksi_foto' => $total_transaksi_foto,

            'transaksi_foto_unreg_tunai' => $transaksi_foto_unreg_tunai,
            'transaksi_foto_unreg_transfer' => $transaksi_foto_unreg_transfer,
            'transaksi_foto_unreg_QRIS' => $transaksi_foto_unreg_QRIS,
            'transaksi_foto_unreg_debit' => $transaksi_foto_unreg_debit,
            'total_transaksi_foto_unreg' => $total_transaksi_foto_unreg,

            'total_pendapatan' => $total_pendapatan,
            'total_pengeluaran' => $total_pengeluaran,
            'laba_bersih' => $laba_bersih,
            'date' => $date,
            'transaksi_dana_tunai' => $transaksi_dana_tunai,
            'transaksi_dana_transfer' => $transaksi_dana_transfer,
            'transaksi_dana_QRIS' => $transaksi_dana_QRIS,
            'transaksi_dana_debit' => $transaksi_dana_debit,
            'total_transaksi_dana' => $total_transaksi_dana,
            'transaksi_paket_tunai' => $transaksi_paket_tunai,
            'transaksi_paket_transfer' => $transaksi_paket_transfer,
            'transaksi_paket_QRIS' => $transaksi_paket_QRIS,
            'transaksi_paket_debit' => $transaksi_paket_debit,
            'total_transaksi_paket' => $total_transaksi_paket,
            'laba_class' => $laba_class,
        ]);
    }


    public function exportexcel($year_month = 0)
    {
        // $year = 0, $month = 0
        // $year_now = Carbon::now()->format('Y');
        // if ($year == 0 || $year == null) {
        //     $year = $year_now;
        // }

        // $month_now = Carbon::now()->format('m');
        // if ($month == 0 || $month == null) {
        //     $month = $month_now;
        // }
        // return Excel::download(new TransaksiExport($year, $month), 'Laporan-' . $year . '-' . $month . '.xlsx');

        $today = Carbon::now()->format('Y-m');
        if ($year_month == 0 || $year_month == null) {
            $year_month = $today;
        }

        // $min_YM = date($year_month . '-01');
        // $max_YM = date($year_month . '-31');
        $sheet = Excel::download(new TransaksiExport($year_month), 'Laporan-' . $year_month . '.xlsx');
        return $sheet;
    }

    public function exportpdf($year_month = 0)
    {
        $today = Carbon::now()->format('Y-m');
        if ($year_month == 0 || $year_month == null) {
            $year_month = $today;
        }

        $min_YM = date($year_month . '-01');
        $max_YM = date($year_month . '-31');
        $date = date('M, Y', strtotime($min_YM));

        //============ Transaksi Dana ================//
        $transaksi_dana_tunai = Transaksi::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where([['kategori_donasi', '=', 'Dana'], ['metode_pembayaran', '=', 'Tunai']])
            ->sum('total_harga');
        $transaksi_dana_transfer = Transaksi::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where([['kategori_donasi', '=', 'Dana'], ['metode_pembayaran', '=', 'Transfer']])
            ->sum('total_harga');
        $transaksi_dana_QRIS = Transaksi::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where([['kategori_donasi', '=', 'Dana'], ['metode_pembayaran', '=', 'QRIS']])
            ->sum('total_harga');
        $transaksi_dana_debit = Transaksi::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where([['kategori_donasi', '=', 'Dana'], ['metode_pembayaran', '=', 'Debit']])
            ->sum('total_harga');
        $total_transaksi_dana = $transaksi_dana_tunai + $transaksi_dana_transfer + $transaksi_dana_QRIS + $transaksi_dana_debit;

        //============ Transaksi Paket ================//
        $transaksi_paket_tunai = Transaksi::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where([['kategori_donasi', '=', 'Paket'], ['metode_pembayaran', '=', 'Tunai']])
            ->sum('total_harga');
        $transaksi_paket_transfer = Transaksi::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where([['kategori_donasi', '=', 'Paket'], ['metode_pembayaran', '=', 'Transfer']])
            ->sum('total_harga');
        $transaksi_paket_QRIS = Transaksi::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where([['kategori_donasi', '=', 'Paket'], ['metode_pembayaran', '=', 'QRIS']])
            ->sum('total_harga');
        $transaksi_paket_debit = Transaksi::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where([['kategori_donasi', '=', 'Paket'], ['metode_pembayaran', '=', 'Debit']])
            ->sum('total_harga');
        $total_transaksi_paket = $transaksi_paket_tunai + $transaksi_paket_transfer + $transaksi_paket_QRIS + $transaksi_paket_debit;

        //============ Transaksi Foto ================//
        $transaksi_foto_tunai = TransaksiFoto::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where('metode_pembayaran', '=', 'Tunai')
            ->sum('total_harga');
        $transaksi_foto_transfer = TransaksiFoto::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where('metode_pembayaran', '=', 'Transfer')
            ->sum('total_harga');
        $transaksi_foto_QRIS = TransaksiFoto::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where('metode_pembayaran', '=', 'QRIS')
            ->sum('total_harga');
        $transaksi_foto_debit = TransaksiFoto::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where('metode_pembayaran', '=', 'Debit')
            ->sum('total_harga');

        //============ Transaksi Foto Unreg ================//
        $transaksi_foto_unreg_tunai = TransaksiFotoUnreg::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where('metode_pembayaran', '=', 'Tunai')
            ->sum('total_harga');
        $transaksi_foto_unreg_transfer = TransaksiFotoUnreg::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where('metode_pembayaran', '=', 'Transfer')
            ->sum('total_harga');
        $transaksi_foto_unreg_QRIS = TransaksiFotoUnreg::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where('metode_pembayaran', '=', 'QRIS')
            ->sum('total_harga');
        $transaksi_foto_unreg_debit = TransaksiFotoUnreg::whereBetween('tanggal_transaksi', [$min_YM, $max_YM])
            ->where('metode_pembayaran', '=', 'Debit')
            ->sum('total_harga');

        $total_transaksi_foto = $transaksi_foto_tunai + $transaksi_foto_transfer + $transaksi_foto_QRIS + $transaksi_foto_debit;
        $total_transaksi_foto_unreg = $transaksi_foto_unreg_tunai + $transaksi_foto_unreg_transfer + $transaksi_foto_unreg_QRIS + $transaksi_foto_unreg_debit;

        $total_pengeluaran = KasKeluar::whereBetween('tanggal', [$min_YM, $max_YM])->sum('nominal_pengeluaran');

        // ============ Kas Masuk ===========//
        $km_1 = KasMasuk::whereBetween('tanggal', [$min_YM, $max_YM])
            ->where('keterangan_keperluan', '=', 'Kas dari Yayasan')->sum('nominal_pemasukan');
        $km_2 = KasMasuk::whereBetween('tanggal', [$min_YM, $max_YM])
            ->where('keterangan_keperluan', '=', 'Dana Paramita Umum')->sum('nominal_pemasukan');
        $km_3 = KasMasuk::whereBetween('tanggal', [$min_YM, $max_YM])
            ->where('keterangan_keperluan', '=', 'Dana Paramita Sekolah Minggu')->sum('nominal_pemasukan');
        $km_4 = KasMasuk::whereBetween('tanggal', [$min_YM, $max_YM])
            ->where('keterangan_keperluan', '=', 'Dana Paramita Remaja')->sum('nominal_pemasukan');
        $km_5 = KasMasuk::whereBetween('tanggal', [$min_YM, $max_YM])
            ->where('keterangan_keperluan', '=', 'Dana Paramita Remaja')->sum('nominal_pemasukan');
        $kas_masuk = KasMasuk::whereBetween('tanggal', [$min_YM, $max_YM])->sum('nominal_pemasukan');


        $total_pendapatan = $total_transaksi_foto + $total_transaksi_foto_unreg + $kas_masuk + $total_transaksi_dana + $total_transaksi_paket;
        $laba_bersih = $total_pendapatan - $total_pengeluaran;

        $transaksi_foto_tunai = number_format($transaksi_foto_tunai, 0, ',', '.');
        $transaksi_foto_transfer = number_format($transaksi_foto_transfer, 0, ',', '.');
        $transaksi_foto_QRIS = number_format($transaksi_foto_QRIS, 0, ',', '.');
        $transaksi_foto_debit = number_format($transaksi_foto_debit, 0, ',', '.');
        $total_transaksi_foto = number_format($total_transaksi_foto, 0, ',', '.');

        $transaksi_foto_unreg_tunai = number_format($transaksi_foto_unreg_tunai, 0, ',', '.');
        $transaksi_foto_unreg_transfer = number_format($transaksi_foto_unreg_transfer, 0, ',', '.');
        $transaksi_foto_unreg_QRIS = number_format($transaksi_foto_unreg_QRIS, 0, ',', '.');
        $transaksi_foto_unreg_debit = number_format($transaksi_foto_unreg_debit, 0, ',', '.');
        $total_transaksi_foto_unreg = number_format($total_transaksi_foto_unreg, 0, ',', '.');

        $total_pengeluaran = number_format($total_pengeluaran, 0, ',', '.');
        $total_pendapatan = number_format($total_pendapatan, 0, ',', '.');
        $laba_bersih = number_format($laba_bersih, 0, ',', '.');

        $km_1 = number_format($km_1, 0, ',', '.');
        $km_2 = number_format($km_2, 0, ',', '.');
        $km_3 = number_format($km_3, 0, ',', '.');
        $km_4 = number_format($km_4, 0, ',', '.');
        $km_5 = number_format($km_5, 0, ',', '.');
        $kas_masuk = number_format($kas_masuk, 0, ',', '.');

        $transaksi_dana_tunai = number_format($transaksi_dana_tunai, 0, ',', '.');
        $transaksi_dana_transfer = number_format($transaksi_dana_transfer, 0, ',', '.');
        $transaksi_dana_QRIS = number_format($transaksi_dana_QRIS, 0, ',', '.');
        $transaksi_dana_debit = number_format($transaksi_dana_debit, 0, ',', '.');
        $total_transaksi_dana = number_format($total_transaksi_dana, 0, ',', '.');

        $transaksi_paket_tunai = number_format($transaksi_paket_tunai, 0, ',', '.');
        $transaksi_paket_transfer = number_format($transaksi_paket_transfer, 0, ',', '.');
        $transaksi_paket_QRIS = number_format($transaksi_paket_QRIS, 0, ',', '.');
        $transaksi_paket_debit = number_format($transaksi_paket_debit, 0, ',', '.');
        $total_transaksi_paket = number_format($total_transaksi_paket, 0, ',', '.');

        view()->share('transaksi_dana_tunai',  $transaksi_dana_tunai);
        view()->share('transaksi_dana_transfer',  $transaksi_dana_transfer);
        view()->share('transaksi_dana_QRIS',  $transaksi_dana_QRIS);
        view()->share('transaksi_dana_debit',  $transaksi_dana_debit);
        view()->share('total_transaksi_dana',  "Rp. " . $total_transaksi_dana);

        view()->share('transaksi_paket_tunai',  $transaksi_paket_tunai);
        view()->share('transaksi_paket_transfer',  $transaksi_paket_transfer);
        view()->share('transaksi_paket_QRIS',  $transaksi_paket_QRIS);
        view()->share('transaksi_paket_debit',  $transaksi_paket_debit);
        view()->share('total_transaksi_paket',  "Rp. " . $total_transaksi_paket);

        view()->share('transaksi_foto_tunai', $transaksi_foto_tunai);
        view()->share('transaksi_foto_transfer', $transaksi_foto_transfer);
        view()->share('transaksi_foto_QRIS', $transaksi_foto_QRIS);
        view()->share('transaksi_foto_debit', $transaksi_foto_debit);
        view()->share('total_transaksi_foto', $total_transaksi_foto);

        view()->share('transaksi_foto_unreg_tunai', $transaksi_foto_unreg_tunai);
        view()->share('transaksi_foto_unreg_transfer', $transaksi_foto_unreg_transfer);
        view()->share('transaksi_foto_unreg_QRIS', $transaksi_foto_unreg_QRIS);
        view()->share('transaksi_foto_unreg_debit', $transaksi_foto_unreg_debit);
        view()->share('total_transaksi_foto_unreg', $total_transaksi_foto_unreg);

        view()->share('km_1', $km_1);
        view()->share('km_2', $km_2);
        view()->share('km_3', $km_3);
        view()->share('km_4', $km_4);
        view()->share('km_5', $km_5);
        view()->share('kas_masuk', $kas_masuk);
        view()->share('total_pendapatan', "Rp. " . $total_pendapatan);

        view()->share('total_kas_keluar', $total_pengeluaran);
        view()->share('total_pengeluaran', "Rp. " . $total_pengeluaran);

        view()->share('laba_bersih', "Rp. " . $laba_bersih);
        view()->share('date', "( Periode pada Bulan " . $date . " )");

        $pdf = PDF::loadView('admins.financial_statements.datalaporan-pdf');
        return $pdf->stream('Laporan - ' . $date . '.pdf');
    }
}

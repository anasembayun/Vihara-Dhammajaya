<?php

namespace App\Exports;

use App\Models\Transaksi;
use App\Models\TransaksiFoto;
use App\Models\TransaksiFotoUnreg;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TransaksiExport implements FromView
{
    public function __construct($year_month)
    {
        // $year, $month
        // $this->year = $year;
        // $this->month = $month;
        // $this->tahun_bulan = $year . '-' . $month;
        $this->tahun_bulan = $year_month;
    }

    public function view(): View
    {
        $a = date($this->tahun_bulan . '-01');
        $b = date($this->tahun_bulan . '-31');
        // $transaksi = Transaksi::query()->whereYear('tanggal_transaksi', $this->year)->whereMonth('tanggal_transaksi', $this->month);
        $transaksi = Transaksi::query()->whereBetween('tanggal_transaksi', [$a, $b])->get();
        $transaksi_foto = TransaksiFoto::query()->whereBetween('tanggal_transaksi', [$a, $b])->get();
        $transaksi_foto_unreg = TransaksiFotoUnreg::query()->whereBetween('tanggal_transaksi', [$a, $b])->get();


        return view('admins.financial_statements.datalaporan-excel', [
            'data_transaksi' => $transaksi,
            'data_transaksi_foto' => $transaksi_foto,
            'data_transaksi_foto_unreg' => $transaksi_foto_unreg
        ]);
    }
}
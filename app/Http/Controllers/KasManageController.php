<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\KasKeluar;
use App\Models\KasMasuk;
use App\Models\UserHistory;

use Carbon\Carbon;

use PDF;

class KasManageController extends Controller
{
    public function __construct()
    {
        $this->KasKeluar = new KasKeluar();
        $this->KasMasuk = new KasMasuk();
        $this->middleware('auth');
    }

    // KAS MASUK
    public function viewCashIn()
    {
        $last_cash_code = KasMasuk::orderBy('id', 'desc')->first()->nomor_kas_masuk ?? 0;
        $last_digit = substr($last_cash_code, -10);

        if (ctype_digit($last_digit)) {
            $check_date = substr($last_cash_code , 2, 6);
            $last_increament = substr($last_cash_code, -4);
            
            if($check_date === date('ymd')) {
                $new_cash_code = 'KM' . date('ymd') . str_pad($last_increament + 1, 4, 0, STR_PAD_LEFT);
            }
            else 
            {
                $last_increament = 0;
                $new_cash_code = 'KM' . date('ymd') . str_pad($last_increament + 1, 4, 0, STR_PAD_LEFT);
            }
            
        } else {
            $last_increament = 0;
            $new_cash_code = 'KM' . date('ymd') . str_pad($last_increament + 1, 4, 0, STR_PAD_LEFT);
        }

        return view('admins.cash.cash_in', compact('new_cash_code'));
    }

    public function addCashIn()
    {
        Request()->validate([
            'nomor_kas_masuk' => 'required',
            'id_admin' => 'required',
            'name' => 'required',
            'keterangan_keperluan' => 'required',
            'tanggal' => 'required',
            'nominal_pemasukan' => 'required'
        ]);

        $data = [
            'nomor_kas_masuk' => Request()->nomor_kas_masuk,
            'id_admin' => Request()->id_admin,
            'nama_admin' => Request()->name,
            'keterangan_keperluan' => Request()->keterangan_keperluan,
            'tanggal' => Request()->tanggal,
            'nominal_pemasukan' => Request()->nominal_pemasukan
        ];
        $this->KasMasuk->addDataCashIn($data);
        $data2 = [
            'data_kas_masuk' => KasMasuk::where('nomor_kas_masuk', Request()->nomor_kas_masuk)->first(),
        ];
        
        $newActivity['user_id'] = Auth::guard('admin')->user()->id;
        $newActivity['kegiatan'] = "Tambah kas masuk"." ".$data['nomor_kas_masuk'];
        UserHistory::create($newActivity);

        return view('templates.surat_kas_masuk', $data2);

        // return redirect()->route('tambah_kas_masuk')
        //     ->with('success','Data berhasil ditambahkan!')
        //     ->with('nomor_kas_masuk_print', $nomor_kas_masuk_print);
    }

    public function deleteCashIn($id)
    {
        $no_kas = KasMasuk::where('id',$id)->first()->nomor_kas_masuk;
        $this->KasMasuk->deleteDataCashIn($id);

        $newActivity['user_id'] = Auth::guard('admin')->user()->id;
        $newActivity['kegiatan'] = "Hapus kas masuk"." ".$no_kas;
        UserHistory::create($newActivity);
        return redirect()->route('laporan_kas_masuk');
    }

    public function viewCashInReport()
    {
        $today = Carbon::now()->format('Y-m');
        $date_awal = date($today . '-01');
        $date_akhir = date($today . '-31');

        $data_kas_masuk = KasMasuk::select('*')
                                ->whereDate('tanggal', '>=', $date_awal)
                                ->whereDate('tanggal', '<=', $date_akhir)
                                ->orderBy('tanggal', 'desc')
                                ->get();
        
        $total_yayasan = KasMasuk::where('keterangan_keperluan', '=', 'Dana dari Yayasan')->where('id_admin',Auth::guard('admin')->user()->id)->sum('nominal_pemasukan');
        $total_umum = KasMasuk::where('keterangan_keperluan', '=', 'Dana Paramita Umum')->where('id_admin',Auth::guard('admin')->user()->id)->sum('nominal_pemasukan');
        $total_remaja = KasMasuk::where('keterangan_keperluan', '=', 'Dana Paramita Remaja')->where('id_admin',Auth::guard('admin')->user()->id)->sum('nominal_pemasukan');
        $total_anak = KasMasuk::where('keterangan_keperluan', '=', 'Dana Paramita Anak-Anak')->where('id_admin',Auth::guard('admin')->user()->id)->sum('nominal_pemasukan');
        $total_muda_mudi = KasMasuk::where('keterangan_keperluan', '=', 'Dana Paramita Muda Mudi')->where('id_admin',Auth::guard('admin')->user()->id)->sum('nominal_pemasukan');

        $data = [
            'data_kas_masuk' => $data_kas_masuk,
            'total_kas_masuk' => $data_kas_masuk->sum('nominal_pemasukan'),
            'date_awal' => $date_awal,
            'date_akhir' => $date_akhir,
            'total_yayasan' => $total_yayasan,
            'total_umum' => $total_umum,
            'total_remaja' => $total_remaja,
            'total_anak' => $total_anak,
            'total_muda_mudi' => $total_muda_mudi
        ];
        return view('admins.cash.cash_in_report', $data);
    }

    public function filterCashInReport($date_awal, $date_akhir, $kategori) 
    {
        if ($kategori != "Kategori Keperluan" && $kategori != "Semua Dana"){
            $data_kas_masuk = KasMasuk::where('keterangan_keperluan',$kategori)
                                ->whereDate('tanggal', '>=', $date_awal)
                                ->whereDate('tanggal', '<=', $date_akhir)
                                ->where('id_admin',Auth::guard('admin')->user()->id)
                                ->orderBy('tanggal', 'desc')
                                ->get();
        }
        else{
            $data_kas_masuk = KasMasuk::select('*')
                                ->whereDate('tanggal', '>=', $date_awal)
                                ->whereDate('tanggal', '<=', $date_akhir)
                                ->where('id_admin',Auth::guard('admin')->user()->id)
                                ->orderBy('tanggal', 'desc')
                                ->get();
        }

        $total_yayasan = KasMasuk::select('*')->whereDate('tanggal', '>=', $date_awal)->whereDate('tanggal', '<=', $date_akhir)
                                ->where('keterangan_keperluan', '=', 'Dana dari Yayasan')->where('id_admin',Auth::guard('admin')->user()->id)->sum('nominal_pemasukan');
        $total_umum = KasMasuk::select('*')->whereDate('tanggal', '>=', $date_awal)->whereDate('tanggal', '<=', $date_akhir)
                                ->where('keterangan_keperluan', '=', 'Dana Paramita Umum')->where('id_admin',Auth::guard('admin')->user()->id)->sum('nominal_pemasukan');
        $total_remaja = KasMasuk::select('*')->whereDate('tanggal', '>=', $date_awal)->whereDate('tanggal', '<=', $date_akhir)
                                ->where('keterangan_keperluan', '=', 'Dana Paramita Remaja')->where('id_admin',Auth::guard('admin')->user()->id)->sum('nominal_pemasukan');
        $total_anak = KasMasuk::select('*')->whereDate('tanggal', '>=', $date_awal)->whereDate('tanggal', '<=', $date_akhir)
                                ->where('keterangan_keperluan', '=', 'Dana Paramita Anak-Anak')->where('id_admin',Auth::guard('admin')->user()->id)->sum('nominal_pemasukan');
        $total_muda_mudi = KasMasuk::select('*')->whereDate('tanggal', '>=', $date_awal)->whereDate('tanggal', '<=', $date_akhir)
                                ->where('keterangan_keperluan', '=', 'Dana Paramita Muda Mudi')->where('id_admin',Auth::guard('admin')->user()->id)->sum('nominal_pemasukan');

        $data = [
            'data_kas_masuk' => $data_kas_masuk,
            'total_kas_masuk' => $data_kas_masuk->sum('nominal_pemasukan'),
            'date_awal' => $date_awal,
            'date_akhir' => $date_akhir,
            'total_yayasan' => $total_yayasan,
            'total_umum' => $total_umum,
            'total_remaja' => $total_remaja,
            'total_anak' => $total_anak,
            'total_muda_mudi' => $total_muda_mudi
        ];

        return view('admins.cash.cash_in_report', $data);
    }

    public function generateCashInReportPDF($date_awal = 0, $date_akhir = 0, $keperluan)
    {
        $today = Carbon::now()->format('Y-m');
        if ($date_awal == 0 || $date_akhir == 0) {
            $date_awal = date($today . '-01');
            $date_akhir = date($today . '-31');
        }

        if ($keperluan != "Semua Dana"){
            $data_kas_masuk = KasMasuk::select('*')
            ->where('keterangan_keperluan', $keperluan)
            ->whereDate('tanggal', '>=', $date_awal)
            ->whereDate('tanggal', '<=', $date_akhir)
            ->get();
        }
        else{
            $data_kas_masuk = KasMasuk::select('*')
            ->whereDate('tanggal', '>=', $date_awal)
            ->whereDate('tanggal', '<=', $date_akhir)
            ->get();
        }

        $data = [
            'data_kas_masuk' => $data_kas_masuk,
            'date_awal' => Carbon::createFromFormat('Y-m-d', $date_awal)->translatedFormat('d F Y'),
            'date_akhir' => Carbon::createFromFormat('Y-m-d', $date_akhir)->translatedFormat('d F Y'),
            'keperluan' => $keperluan,
        ];

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);

        $pdf->loadView('templates.cash_in_report_pdf', $data);
        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('laporanKasMasuk.pdf', array("Attachment" => false));
    }

    // KAS KELUAR
    public function viewCashOut()
    {
        $last_cash_code =  KasKeluar::orderBy('id', 'desc')->first()->nomor_kas_keluar ?? 0;
        $last_digit = substr($last_cash_code, -10);

        if (ctype_digit($last_digit)) {
            $check_date = substr($last_cash_code , 2, 6);
            $last_increament = substr($last_cash_code, -4);
            
            if($check_date === date('ymd')) {
                $new_cash_code = 'KK' . date('ymd') . str_pad($last_increament + 1, 4, 0, STR_PAD_LEFT);
            }
            else 
            {
                $last_increament = 0;
                $new_cash_code = 'KK' . date('ymd') . str_pad($last_increament + 1, 4, 0, STR_PAD_LEFT);
            }
            
        } else {
            $last_increament = 0;
            $new_cash_code = 'KK' . date('ymd') . str_pad($last_increament + 1, 4, 0, STR_PAD_LEFT);
        }

        return view('admins.cash.cash_out', compact('new_cash_code'));
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
            'nominal_pengeluaran' => 'required',
            'diberikan_secara'
        ]);

        $data = [
            'nomor_kas_keluar' => Request()->nomor_kas_keluar,
            'id_admin' => Request()->id_admin,
            'nama_admin' => Request()->name,
            'penerima' => Request()->penerima,
            'keterangan_keperluan' => Request()->keterangan_keperluan,
            'tanggal' => Request()->tanggal,
            'nominal_pengeluaran' => Request()->nominal_pengeluaran,
            'diberikan_secara' => Request()->diberikan_secara
        ];

        $this->KasKeluar->addDataCashOut($data);

        $data2 = [
            'data_kas_keluar' => KasKeluar::where('nomor_kas_keluar', Request()->nomor_kas_keluar)->first(),
        ];

        $newActivity['user_id'] = Auth::guard('admin')->user()->id;
        $newActivity['kegiatan'] = "Tambah kas keluar"." ".$data['nomor_kas_keluar'];
        UserHistory::create($newActivity);

        return view('templates.surat_kas_keluar', $data2);

        // return redirect()->route('tambah_kas_keluar')->with('success','Data berhasil ditambahkan!');
    }

    public function deleteCashOut($id)
    {
        $no_kas = KasKeluar::where('id',$id)->first()->nomor_kas_keluar;
        $this->KasKeluar->deleteDataCashOut($id);
        
        $newActivity['user_id'] = Auth::guard('admin')->user()->id;
        $newActivity['kegiatan'] = "Hapus kas keluar"." ".$no_kas;
        UserHistory::create($newActivity);

        return redirect()->route('laporan_kas_keluar');
    }

    public function viewCashOutReport()
    {
        $today = Carbon::now()->format('Y-m');
        $date_awal = date($today . '-01');
        $date_akhir = date($today . '-31');

        $data_kas_keluar = KasKeluar::select('*')
                                ->where('id_admin', Auth::id())
                                ->whereDate('tanggal', '>=', $date_awal)
                                ->whereDate('tanggal', '<=', $date_akhir)
                                ->orderBy('tanggal', 'desc')
                                ->get();

        $data = [
            'data_kas_keluar' => $data_kas_keluar,
            'total_kas_keluar' => $data_kas_keluar->sum('nominal_pengeluaran'),
            'date_awal' => $date_awal,
            'date_akhir' => $date_akhir
        ];
        return view('admins.cash.cash_out_report', $data);
    }

    public function filterCashOutReport($date_awal, $date_akhir) 
    {
        $data_kas_keluar = KasKeluar::select('*')
                                ->where('id_admin', Auth::id())
                                ->whereDate('tanggal', '>=', $date_awal)
                                ->whereDate('tanggal', '<=', $date_akhir)
                                ->orderBy('tanggal', 'desc')
                                ->get();

        $data = [
            'data_kas_keluar' => $data_kas_keluar,
            'total_kas_keluar' => $data_kas_keluar->sum('nominal_pengeluaran'),
            'date_awal' => $date_awal,
            'date_akhir' => $date_akhir
        ];

        return view('admins.cash.cash_out_report', $data);
    }
    
    public function generateCashOutReportPDF($date_awal = 0, $date_akhir = 0)
    {
        $today = Carbon::now()->format('Y-m');
        if ($date_awal == 0 || $date_akhir == 0) {
            $date_awal = date($today . '-01');
            $date_akhir = date($today . '-31');
        }

        $data = [
            'data_kas_keluar' => KasKeluar::select('*')
                                    ->where('id_admin', Auth::id())
                                    ->whereDate('tanggal', '>=', $date_awal)
                                    ->whereDate('tanggal', '<=', $date_akhir)
                                    ->get(),
            'date_awal' => Carbon::createFromFormat('Y-m-d', $date_awal)->translatedFormat('d F Y'),
            'date_akhir' => Carbon::createFromFormat('Y-m-d', $date_akhir)->translatedFormat('d F Y'),
        ];

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        
        $pdf->loadView('templates.cash_out_report_pdf', $data);
        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('laporanKasKeluar.pdf');
    }

    // BUKTI KWITANSI/RESI
    public function generateCashOutReceipt($nomor_kas_keluar)
    {
        $data = [
            'data_kas_keluar' => KasKeluar::where('nomor_kas_keluar', $nomor_kas_keluar)->first(),
        ];

        $pdf = PDF::loadView('templates.surat_kas_keluar', $data);
        $pdf->setPaper('A4', 'landscape');

        // return $pdf->stream('Surat_KasKeluar_'.$nomor_kas_keluar.'.pdf');
        return view('templates.surat_kas_keluar', $data);
    }

    public function generateCashInReceipt($nomor_kas_masuk)
    {
        $data = [
            'data_kas_masuk' => KasMasuk::where('nomor_kas_masuk', $nomor_kas_masuk)->first(),
        ];

        $pdf = PDF::loadView('templates.surat_kas_masuk', $data);
        $pdf->setPaper('A4', 'landscape');

        // return $pdf->stream('Surat_KasMasuk_'.$nomor_kas_masuk.'.pdf');
        return view('templates.surat_kas_masuk', $data);
    }
}

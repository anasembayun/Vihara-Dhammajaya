<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Goods;
use App\Models\UserJamaat;
use App\Models\Transaksi;
use App\Models\TransaksiFoto;
use App\Models\TransaksiFotoUnreg;
use App\Models\DetailTransaksi;
use App\Models\DetailTransaksiFoto;
use App\Models\DetailTransaksiFotoUnreg;
use App\Models\Leluhur;
use App\Models\Donasi;
use App\Models\DataPesanBaik;
use Input;
use PDF;
use Carbon\Carbon;

class TransactionManageController extends Controller
{
    public function __construct()
    {
        $this->Goods = new Goods();
        $this->Leluhur = new Leluhur();
        $this->UserJamaat = new UserJamaat();
        $this->Transaksi = new Transaksi();
        $this->TransaksiFoto = new TransaksiFoto();
        $this->TransaksiFotoUnreg = new TransaksiFotoUnreg();
        $this->DetailTransaksi = new DetailTransaksi();
        $this->DetailTransaksiFoto = new DetailTransaksiFoto();
        $this->DetailTransaksiFotoUnreg = new DetailTransaksiFotoUnreg();
        $this->middleware('auth');
    }

    // TRANSAKSI PAKET DONASI
    public function viewAddGoodsDonationTransaction()
    {
        $goods = Goods::where('keterangan', 'Tersedia')->where('status_keaktifan','Aktif')->get();
        $jamaats = UserJamaat::all();
        $donasis = Donasi::where('status_keaktifan','Aktif')->get();
        return view('admins.manage_transactions.add_transaction', compact('goods', 'jamaats', 'donasis'));
    }

    public function validationGoodsTransaction($id, Request $req){
        Request()->validate([
            'id_jamaat' => 'required',
            'id_admin' => 'required',
            'id_kegiatan_donasi' => 'required',
            'nama_jamaat' => 'required',
            'alamat_pemesan' => 'required',
            'kode_transaksi' => 'required',
            'kategori_donasi' => 'required',
            'metode_pembayaran' => 'required',
            'total_harga' => 'required',
        ]);

        $data = [
            'id_jamaat' => Request()->id_jamaat,
            'id_admin' => Request()->id_admin,
            'id_kegiatan_donasi' => Request()->id_kegiatan_donasi,
            'nama' => Request()->nama_jamaat,
            'alamat' => Request()->alamat_pemesan,
            'kode_transaksi' => Request()->kode_transaksi,
            'kategori_donasi' => Request()->kategori_donasi,
            'metode_pembayaran' => Request()->metode_pembayaran,
            'tanggal_transaksi' => date('Y-m-d H:i:s'),
            'total_harga' => Request()->total_harga,
        ];
        
        if (Request()->id_barang == null) { return redirect()->route('tambah_transaksi_barang')->with('error','Data Barang tidak ada!'); }

        for ($i = 0; $i < count(Request()->id_barang); $i++) {
            for ($j = 0; $j < Request()->qty_item[$i]; $j++) {
                $data2 = [
                    'kode_transaksi' => Request()->kode_transaksi,
                    'id_barang' => Request()->id_barang[$i],
                ];
                $this->DetailTransaksi->addDataDetailTransaction($data2);
            }
        }

        $this->Transaksi->addDataTransaction($data);

        $total_donatur = Transaksi::where('id_kegiatan_donasi', Request()->id_kegiatan_donasi)->distinct('id_jamaat')->pluck('id_jamaat');
        
        $kegiatan_donasi = Donasi::find(Request()->id_kegiatan_donasi);
        $kegiatan_donasi->update(['total_donasi', $kegiatan_donasi->total_donasi += (int)Request()->total_harga]);
        $kegiatan_donasi->update(['total_donasi', $kegiatan_donasi->total_donatur = count($total_donatur)]);
        
        $data2 = [
            'data_transaksi' => Transaksi::where('kode_transaksi', Request()->kode_transaksi)->first(),
            'random_pesan_baik' => DataPesanBaik::inRandomOrder()->limit(1)->first()
        ];

        return view('templates.struk_donasi_html', $data2);

        // return redirect()->route('tambah_transaksi_barang')->with('success','Transaksi berhasil ditambahkan!');
    }

    public function viewListTransaction()
    {
        $tanggal = Carbon::parse(Request()->tgl)->format('Y-m-d');
        $tgl = Carbon::parse(Request()->tgl)->isoFormat('D MMMM Y');

        $data_transaksi = Transaksi::orderBy('tanggal_transaksi', 'desc')->get();
        
        return view('admins.manage_transactions.list_transactions', compact('data_transaksi', 'tgl'));
    }

    // TRANSAKSI UANG DONASI
    public function viewAddMoneyDonationTransaction()
    {
        $jamaats = UserJamaat::all();
        $donasis = Donasi::where('status_keaktifan','Aktif')->get();
        return view('admins.manage_transactions.add_transaction_uang', compact('jamaats', 'donasis'));
    }

    public function validationMoneyTransaction(Request $req){
        Request()->validate([
            'id_jamaat' => 'required',
            'id_admin' => 'required',
            'id_kegiatan_donasi' => 'required',
            'nama_jamaat' => 'required',
            'alamat_pemesan' => 'required',
            'kode_transaksi' => 'required',
            'kategori_donasi' => 'required',
            'metode_pembayaran' => 'required',
            'total_harga' => 'required',
        ]);

        $data = [
            'id_jamaat' => Request()->id_jamaat,
            'id_admin' => Request()->id_admin,
            'id_kegiatan_donasi' => Request()->id_kegiatan_donasi,
            'nama' => Request()->nama_jamaat,
            'alamat' => Request()->alamat_pemesan,
            'kode_transaksi' => Request()->kode_transaksi,
            'kategori_donasi' => Request()->kategori_donasi,
            'metode_pembayaran' => Request()->metode_pembayaran,
            'tanggal_transaksi' => date('Y-m-d H:i:s'),
            'total_harga' => Request()->total_harga,
        ];

        if (Request()->total_harga == 0) { return redirect()->route('tambah_transaksi_foto_2')->with('error','Jumlah Donasi tidak boleh 0 Rupiah!'); }

        $this->Transaksi->addDataTransaction($data);
        
        $total_donatur = Transaksi::where('id_kegiatan_donasi', Request()->id_kegiatan_donasi)->distinct('id_jamaat')->pluck('id_jamaat');
        
        $kegiatan_donasi = Donasi::find(Request()->id_kegiatan_donasi);
        $kegiatan_donasi->update(['total_donasi', $kegiatan_donasi->total_donasi += (int)Request()->total_harga]);
        $kegiatan_donasi->update(['total_donasi', $kegiatan_donasi->total_donatur = count($total_donatur)]);
        
        $data2 = [
            'data_transaksi' => Transaksi::where('kode_transaksi', Request()->kode_transaksi)->first(),
            'random_pesan_baik' => DataPesanBaik::inRandomOrder()->limit(1)->first()
        ];

        return view('templates.struk_donasi_html', $data2);

        // return redirect()->route('tambah_transaksi_uang')->with('success','Transaksi berhasil ditambahkan!');
    }

    // TRANSAKSI FOTO (PESAN PAS FOTO)
    public function viewAddPhotoTransaction()
    {
        // $goods = Goods::where('keterangan', 'Tersedia')->get();
        $jamaats = Leluhur::select('id_pemesan')->distinct()->get();
        return view('admins.manage_transactions.add_photo_transaction', compact('jamaats'));
    }

    public function showDataMendiangByID($id)
    {
        $mendiangs_by_id_pemesan = Leluhur::select('*')->where('id_pemesan', '=', $id)->get();
        $mendiangs_by_id = Leluhur::select('*')->where('id', '=', $id)->get();
        
        foreach($mendiangs_by_id as $mendiang){
            $mendiang->transaksi_terakhir = date('Y-m', strtotime($mendiang->transaksi_terakhir));
        }

        // dd($mendiangs);
        return response()->json([
            'mendiangs_by_id_pemesan' => $mendiangs_by_id_pemesan,
            'mendiangs_by_id' => $mendiangs_by_id
        ]);
    }

    public function validationPhotoTransaction(){
        Request()->validate([
            'id_pemesan' => 'required',
            'id_admin' => 'required',
            'alamat_pemesan' => 'required',
            'kode_transaksi' => 'required',
            'metode_pembayaran' => 'required',
            'total_harga_keseluruhan' => 'required',
        ]);

        $data = [
            'id_pemesan' => Request()->id_pemesan,
            'id_admin' => Request()->id_admin,
            'alamat_pemesan' => Request()->alamat_pemesan,
            'kode_transaksi' => Request()->kode_transaksi,
            'metode_pembayaran' => Request()->metode_pembayaran,
            'tanggal_transaksi' => date('Y-m-d H:i:s'),
            'total_harga' => Request()->total_harga_keseluruhan,
        ];
        
        if (Request()->id_mendiang == null) { return redirect()->route('tambah_transaksi_foto')->with('error','Data Foto tidak ada!'); }

        for ($i = 0; $i < count(Request()->id_mendiang); $i++) {
            if (Request()->pembayaran_bulan_terakhir[$i] != null) {
                $data2 = [
                    'kode_transaksi' => Request()->kode_transaksi,
                    'id_leluhur' => Request()->id_mendiang[$i],
                    'total_periode' => Request()->total_periode[$i],
                    'bayar_bulan_terakhir' => Carbon::createFromFormat('Y-m', Request()->pembayaran_bulan_terakhir[$i]),
                    'bayar_sampai_bulan' => Carbon::createFromFormat('Y-m', Request()->pembayaran_sampai_bulan[$i]),
                    'total_harga' => Request()->total_harga[$i],
                ];
            }
            else {
                $data2 = [
                    'kode_transaksi' => Request()->kode_transaksi,
                    'id_leluhur' => Request()->id_mendiang[$i],
                    'total_periode' => Request()->total_periode[$i],
                    'bayar_sampai_bulan' => Carbon::createFromFormat('Y-m', Request()->pembayaran_sampai_bulan[$i]),
                    'total_harga' => Request()->total_harga[$i],
                ];
            }

            $data_update = [
                'periode_pemesanan' => Carbon::createFromFormat('Y-m', Request()->pembayaran_sampai_bulan[$i]),
                'transaksi_terakhir' => Request()->pembayaran_sampai_bulan[$i]
            ];
            
            $this->Leluhur->editDataLeluhur(Request()->id_mendiang[$i], $data_update);
            $this->DetailTransaksiFoto->addDataDetailTransactionPhoto($data2);
        }

        $this->TransaksiFoto->addDataTransactionPhoto($data);
        return redirect()->route('tambah_transaksi_foto')->with('success','Transaksi berhasil ditambahkan!');
    }

    public function viewListPhotoTransaction()
    {
        $tanggal = Carbon::parse(Request()->tgl)->format('Y-m-d');
        $tgl = Carbon::parse(Request()->tgl)->isoFormat('D MMMM Y');

        $data_transaksi = TransaksiFoto::orderBy('tanggal_transaksi', 'desc')->get();

        return view('admins.manage_transactions.list_photo_transactions', compact('data_transaksi', 'tgl'));
    }

    public function generatePhotoReceipt($kode_transaksi)
    {
        $data = [
            'data_transaksi' => TransaksiFoto::where('kode_transaksi', $kode_transaksi)->first()
        ];

        $pdf = PDF::loadView('templates.struk_foto', $data);
        $pdf->setPaper('A5', 'landscape');

        return $pdf->download('strukFoto_'.$kode_transaksi.'.pdf');
        // return view('templates.struk_foto', $data);
    }

    public function generatePhotoReceiptHtml($kode_transaksi)
    { 
        $data_transaksi= TransaksiFoto::where('kode_transaksi', $kode_transaksi)->first();
        
        dd($kode_transaksi);
         return  view('templates.struk_foto', compact("data_transaksi"));

        // return view('templates.struk_foto', $data);
    }
    

    public function generatePhotoUnregReceipt($kode_transaksi)
    {
        $data = [
            'data_transaksi' => TransaksiFotoUnreg::where('kode_transaksi', $kode_transaksi)->first()
        ];

        $pdf = PDF::loadView('templates.struk_foto', $data);
        $pdf->setPaper('A5', 'landscape');

        return $pdf->download('strukFoto_'.$kode_transaksi.'.pdf');
        // return view('templates.struk_foto', $data);
    }

    public function generateDonationReceipt($kode_transaksi)
    {
        $data = [
            'data_transaksi' => Transaksi::where('kode_transaksi', $kode_transaksi)->first(),
            'random_pesan_baik' => DataPesanBaik::inRandomOrder()->limit(1)->first()
        ];

        $pdf = PDF::loadView('templates.struk_donasi', $data);
        $pdf->setPaper('A5', 'landscape');

        return $pdf->download('strukDonasi_'.$kode_transaksi.'.pdf');
        // return view('templates.struk_donasi', $data);
    }
    
    public function generateDonationReceiptHtml($kode_transaksi)
    {
        $data = [
            'data_transaksi' => Transaksi::where('kode_transaksi', $kode_transaksi)->first(),
            'random_pesan_baik' => DataPesanBaik::inRandomOrder()->limit(1)->first()
        ];

  
        return view('templates.struk_donasi_html', $data);
    }

    // TRANSAKSI FOTO UNREGISTERED UMAT (PESAN PAS FOTO)
    public function viewAddPhotoTransaction_2()
    {
        $jamaats = Leluhur::select('id_pemesan')->distinct()->get();
        $donasis = Donasi::all();
        return view('admins.manage_transactions.add_photo_transaction_unregistered', compact('jamaats', 'donasis'));
    }

    public function validationPhotoTransaction_2(){
        Request()->validate([
            'nama_pemesan' => 'required',
            'id_admin' => 'required',
            'alamat_pemesan' => 'required',
            'no_telepon_pemesan' => 'required',
            'id_kegiatan' => 'required',
            'kode_transaksi' => 'required',
            'metode_pembayaran' => 'required',
            'total_harga_keseluruhan' => 'required',
        ]);

        $data = [
            'nama_pemesan' => Request()->nama_pemesan,
            'id_admin' => Request()->id_admin,
            'alamat_pemesan' => Request()->alamat_pemesan,
            'no_telepon_pemesan' => Request()->no_telepon_pemesan,
            'id_kegiatan' => Request()->id_kegiatan,
            'kode_transaksi' => Request()->kode_transaksi,
            'metode_pembayaran' => Request()->metode_pembayaran,
            'tanggal_transaksi' => date('Y-m-d H:i:s'),
            'total_harga' => Request()->total_harga_keseluruhan,
        ];

        $dataJamaat = [
            'name' => Request()->nama_pemesan,
            'alamat' => Request()->alamat_pemesan,
            'no_handphone_1' => Request()->no_telepon_pemesan,
            'password'=>123,
            'status_register' =>1,
        ];

        if (Request()->nama_mendiang == null) { return redirect()->route('tambah_transaksi_foto_2')->with('error','Data Foto tidak ada!'); }

        for ($i = 0; $i < count(Request()->nama_mendiang); $i++) {
            $data2 = [
                'kode_transaksi' => Request()->kode_transaksi,
                'nama_leluhur' => Request()->nama_mendiang[$i],
                'total_harga' => Request()->total_harga[$i],
            ];
            
            $this->DetailTransaksiFotoUnreg->addDataDetailTransactionPhotUnreg($data2);
        }

        $this->TransaksiFotoUnreg->addDataTransactionPhotoUnreg($data);
        $this->UserJamaat->addDataJamaat($dataJamaat);
        return redirect()->route('tambah_transaksi_foto_2')->with('success','Transaksi berhasil ditambahkan!');
    }

    public function viewListPhotoTransaction_2()
    {
        $tanggal = Carbon::parse(Request()->tgl)->format('Y-m-d');
        $tgl = Carbon::parse(Request()->tgl)->isoFormat('D MMMM Y');

        $data_transaksi = TransaksiFotoUnreg::orderBy('tanggal_transaksi', 'desc')->get();

        return view('admins.manage_transactions.list_photo_transactions_unregistered', compact('data_transaksi', 'tgl'));
    }

    
}

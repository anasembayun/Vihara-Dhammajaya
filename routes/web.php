<?php

// ADMIN
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\KasManageController;
use App\Http\Controllers\AkunManageController;
use App\Http\Controllers\AuthManageController;
use App\Http\Controllers\NewsManageController;
use App\Http\Controllers\AdminManageController;
use App\Http\Controllers\GoodsManageController;
use App\Http\Controllers\IuranManageController;
use App\Http\Controllers\AccessManageController;
use App\Http\Controllers\DonasiManageController;
use App\Http\Controllers\JamaatManageController;
use App\Http\Controllers\KegiatanManageController;  
use App\Http\Controllers\LaporanKeuanganController;
use App\Http\Controllers\UserDonasiManageController;
use App\Http\Controllers\UserJamaatManageController;
use App\Http\Controllers\PesanBaikManageController;

// USER
use App\Http\Controllers\DataLeluhurManageController;
use App\Http\Controllers\TransactionManageController;
use App\Http\Controllers\KelolaLaporanManageController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/info-terkini', [HomeController::class, 'viewLatestInfoPage'])->name('info_terkini');
Route::get('/absensi', [HomeController::class, 'viewAttendanceFormPage'])->name('absensi');
Route::get('/info-donasi', [HomeController::class, 'viewDonateInfoPage'])->name('info_donasi');
Route::get('/daftar-donasi/detail/{id_kegiatan_donasi}', [HomeController::class, 'detailKegiatanDonasi']);
Route::get('/info-kegiatan', [HomeController::class, 'viewProgramInfoPage']);
Route::get('/terima-kasih', [HomeController::class, 'showThankyouPage']);

Route::get('/login-admin', [AuthManageController::class, 'viewLogin'])->name('login_admin');
Route::get('/login-jamaat', [AuthManageController::class, 'viewLoginJamaat'])->name('login_jamaat');

Route::post('/admin-dashboard', [AuthManageController::class, 'postLoginAdmin'])->name('post_login_admin');
Route::post('/jamaat-login', [AuthManageController::class, 'postLoginJamaat'])->name('post_login_jamaat');
Route::get('/admin-dashboard', [AuthManageController::class, 'checkSession'])->name('post_login');

Route::get('/logout', [AuthManageController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth:admin']], function () {
    // ------------------------- Profile Admin -------------------------
    Route::get('/profile/{username}', [AdminManageController::class, 'showProfileAdmin'])->name('profile_admin');
    Route::post('/profile/update/{username}', [AdminManageController::class, 'updateProfileAdmin']);
    Route::get('/profile/ganti-password/{username}', [AdminManageController::class, 'showChangePasswordAdmin'])->name('ganti_password_admin');
    Route::post('/profile/ganti-password/change/{username}', [AdminManageController::class, 'changePasswordAdmin']);

    // ------------------------- URL Menampilkan Data -------------------------
    Route::get('/tampil-data-jamaat/{id}', [JamaatManageController::class, 'showDataJamaat']);
    Route::get('/tampil-data-jamaat-by-id_code/{id}', [JamaatManageController::class, 'showDataJamaatByIdCode']);
    Route::get('/tampil-data-leluhur/{id}', [DataLeluhurManageController::class, 'showDataLeluhur']);
    Route::get('/tampil-data-barang/{id}', [GoodsManageController::class, 'showDataBarang']);
    Route::get('/tampil-data-kegiatan-donasi/{id}', [DonasiManageController::class, 'showDataDonasi']);
    
    Route::get('/jumlah-jamaat', [JamaatManageController::class, 'getSumJamaatData']);

    // Route::get('/home', [AuthManageController::class, 'users'])->name('home');
    // ------------------------- Kelola Admin -------------------------
    Route::get('/kelola-admin/tambah-admin', [AdminManageController::class, 'viewAddAdmin'])->name('tambah_admin');
    Route::post('/kelola-admin/i-tambah-admin', [AdminManageController::class, 'addAdmin']);
    Route::get('/kelola-admin/daftar-admin', [AdminManageController::class, 'viewDataAdmin'])->name('daftar_admin');
    Route::get('/kelola-admin/detail-admin/{username}', [AdminManageController::class, 'viewDetailDataAdmin'])->name('detail_data_admin');
    Route::post('/kelola-admin/detail-admin/update/{username}', [AdminManageController::class, 'updateAdmin']);
    Route::post('/kelola-admin/daftar-admin/delete/{username}', [AdminManageController::class, 'deleteAdmin']);

    Route::get('/kelola-admin/hak-akses', [AccessManageController::class, 'viewAccessModAdmin']);
    Route::put('/kelola-admin/hak-akses/ubah', [AccessManageController::class, 'changeAccessAdmin']);
    // Route::get('/kelola-admin/hak-akses/cek/{username}', [AccessManageController::class, 'checkAccessAdmin']);

    // ------------------------- Kelola Jamaat -------------------------
    Route::get('/kelola-jamaat/tambah-jamaat', [JamaatManageController::class, 'viewAddJamaat'])->name('tambah_jamaat');
    Route::post('/kelola-jamaat/i-tambah-jamaat', [JamaatManageController::class, 'addJamaat']);
    Route::get('/kelola-jamaat/tambah-jamaat-unreg', [JamaatManageController::class, 'viewAddJamaatUnreg'])->name('tambah_jamaat_unreg');
    Route::post('/kelola-jamaat/i-tambah-jamaat-unreg', [JamaatManageController::class, 'addJamaatUnreg']);
    Route::get('/kelola-jamaat/daftar-jamaat', [JamaatManageController::class, 'viewDataJamaat'])->name('daftar_jamaat');
    Route::post('/kelola-jamaat/daftar-jamaat-filter', [JamaatManageController::class, 'filterDataJamaat']);
    Route::get('/kelola-jamaat/daftar-jamaat-tidak-terdaftar', [JamaatManageController::class, 'viewDataJamaatUnregisterd'])->name('daftar_jamaat_tidak_terdaftar');
    Route::post('/kelola-jamaat/daftar-jamaat/delete/{id}', [JamaatManageController::class, 'deleteDataJamaat']);
    Route::get('/kelola-jamaat/edit-jamaat/{id}', [JamaatManageController::class, 'viewEditDataJamaat'])->name('edit_data_jamaat');
    Route::post('/kelola-jamaat/edit-jamaat/update/{id}', [JamaatManageController::class, 'updateDataJamaat']);
    Route::get('/kelola-jamaat/detail-jamaat/{id}', [JamaatManageController::class, 'viewDetailDataJamaat'])->name('detail_data_jamaat');

    Route::get('/kelola-jamaat/tambah-data-baptisan', [JamaatManageController::class, 'viewAddDataBaptisan'])->name('tambah_baptisan');
    Route::post('/kelola-jamaat/i-tambah-data-baptisan', [JamaatManageController::class, 'addDataBaptisanJamaat']);
    Route::get('/kelola-jamaat/daftar-baptisan', [JamaatManageController::class, 'viewDataBaptisan'])->name('daftar_baptisan');
    Route::post('/kelola-jamaat/daftar-baptisan/delete/{id}', [JamaatManageController::class, 'deleteDataBaptisan']);
    Route::get('/kelola-jamaat/tampil-data-baptisan/{id}', [JamaatManageController::class, 'showDataJamaat']);
    Route::get('/kelola-jamaat/sertifikat-baptis/{id}', [JamaatManageController::class, 'generateCertificateBaptis']);

    Route::get('/kelola-jamaat/tambah-data-pernikahan', [JamaatManageController::class, 'viewAddDataPernikahan'])->name('tambah_pernikahan');
    Route::post('/kelola-jamaat/i-tambah-data-pernikahan', [JamaatManageController::class, 'addDataPernikahanJamaat']);
    Route::get('/kelola-jamaat/daftar-pernikahan', [JamaatManageController::class, 'viewDataPernikahan'])->name('daftar_pernikahan');
    Route::post('/kelola-jamaat/daftar-pernikahan/delete/{id}', [JamaatManageController::class, 'deleteDataPernikahan']);
    Route::get('/kelola-jamaat/sertifikat-pernikahan/{id}', [JamaatManageController::class, 'generateCertificatePernikahan']);

    // ------------------------- Kelola Berita -------------------------
    Route::get('/kelola-berita/tambah-berita', [NewsManageController::class, 'viewAddNews'])->name('tambah_berita');
    Route::post('/kelola-berita/i-tambah-berita', [NewsManageController::class, 'addNews']);
    Route::get('/kelola-berita/daftar-berita', [NewsManageController::class, 'viewDataNews'])->name('daftar_berita');
    Route::get('/kelola-berita/detail-berita/{id}', [NewsManageController::class, 'viewDetailDataNews'])->name('detail_data_berita');
    Route::post('/kelola-berita/daftar-berita/update/{id}', [NewsManageController::class, 'updateNews']);
    Route::post('/kelola-berita/daftar-berita/delete/{id}', [NewsManageController::class, 'deleteNews']);

    // ------------------------- Galeri/Dokumentasi (Coming Soon) -------------------------
    

    // ------------------------- Presensi Kegiatan ------------------
    Route::get('/kelola-kegiatan/tambah-jadwal-kegiatan', [KegiatanManageController::class, 'viewAddJadwalKegiatan'])->name('addJadwal_kegiatan');
    Route::post('/kelola-kegiatan/i-tambah-jadwal-kegiatan', [KegiatanManageController::class, 'addJadwalKegiatan']);
    Route::get('/kelola-kegiatan/showAll', [KegiatanManageController::class, 'showAllKegiatan']);
    Route::get('/kelola-kegiatan/showLastVisit', [KegiatanManageController::class, 'showLastVisit']);

    // ------------------------- Presensi Acara / Absen Page ------------------
    // Route::get('/kelola-kegiatan/absen',[KegiatanManageController::class,'goToAbsenPage']);
    Route::get('/kelola-kegiatan/absen/{id}', function ($id) {
        return view('admins.kelola_absen', ["idj" => $id]);
    })->name('absen_per_kegiatan');
    Route::post('/kelola-kegiatan/absen/change-status-kegiatan/{id}', [KegiatanManageController::class, 'updateStatusByButton']);
    Route::get('/kelola-kegiatan/edit-kegiatan/{id}', [KegiatanManageController::class, 'viewEditDataKegiatan'])->name('edit_data_kegiatan');
    Route::post('/kelola-kegiatan/edit-kegiatan/update/{id}', [KegiatanManageController::class, 'updateDataKegiatan']);
    Route::get('/kelola-kegiatan/kegiatan', [KegiatanManageController::class, 'getKegiatanbyId']);
    Route::get('/kelola-kegiatan/kegiatan/delete/{id}', [KegiatanManageController::class, 'deleteDataKegiatan']);
    Route::get('/kelola-kegiatan/getStatusKegiatan', [KegiatanManageController::class, 'getStatusKegiatan']);
    Route::get('/kelola-kegiatan/generateQR', [KegiatanManageController::class, 'getQR']);
    Route::get('/kelola-kegiatan/generateBarcode', [KegiatanManageController::class, 'getBarcode']);
    Route::get('/kelola-kegiatan/addAbsensiKegiatan', [KegiatanManageController::class, 'addAbsensiKegiatan']);
    Route::get('/kelola-kegiatan/detail-kegiatan', [KegiatanManageController::class, 'viewDetailKegiatan']);
    // Route::get('/kelola-kegiatan/get-detail-kegiatan/{id}', [KegiatanManageController::class, 'showDataKegiatan']);

    // ------------------------- Kelola Renungan / Pesan Baik ------------------
    Route::get('/kelola-pesan-baik/tambah-pesan-baik', [PesanBaikManageController::class, 'viewAddPesanBaik'])->name('tambah_pesan_baik');
    Route::post('/kelola-pesan-baik/i-tambah-pesan-baik', [PesanBaikManageController::class, 'addPesanBaik']);
    Route::post('/kelola-pesan-baik/tambah-pesan-baik/delete/{id}', [PesanBaikManageController::class, 'deletePesanBaik']);
    Route::get('/kelola-pesan-baik/edit-pesan-baik/{id}', [PesanBaikManageController::class, 'viewEditPesanBaik'])->name('edit_pesan_baik');
    Route::post('/kelola-pesan-baik/edit-pesan-baik/update/{id}', [PesanBaikManageController::class, 'updatePesanBaik']);

    // ------------------------- Kelola Donasi ------------------
    Route::get('/kelola-donasi/tambah-kegiatan-donasi', [DonasiManageController::class, 'viewAddKegiatanDonasi'])->name('tambah_kegiatan_donasi');
    Route::post('/kelola-donasi/i-tambah-kegiatan-donasi', [DonasiManageController::class, 'addKegiatanDonasi']);
    Route::get('/kelola-donasi/daftar-kegiatan-donasi', [DonasiManageController::class, 'viewDataKegiatanDonasi'])->name('daftar_kegiatan_donasi');
    Route::get('/kelola-donasi/edit-kegiatan-donasi/{id}', [DonasiManageController::class, 'viewEditDataKegiatanDonasi'])->name('edit_data_donasi');
    Route::post('/kelola-donasi/edit-kegiatan-donasi/update/{id}', [DonasiManageController::class, 'updateDataKegiatanDonasi']);
    Route::get('/kelola-donasi/detail-kegiatan-donasi/{id}', [DonasiManageController::class, 'viewDetailDataKegiatanDonasi']);
    Route::post('/kelola-donasi/daftar-kegiatan-donasi/delete/{id}', [DonasiManageController::class, 'deleteDataKegiatanDonasi']);

    // ------------------------- Kelola Barang -------------------------
    Route::get('/kelola-barang/daftar-barang', [GoodsManageController::class, 'viewListGoods'])->name('daftar_barang');
    Route::get('/kelola-barang/tambah-barang', [GoodsManageController::class, 'viewAddGoods'])->name('tambah_data_barang');
    Route::post('/kelola-barang/i-tambah-barang', [GoodsManageController::class, 'addGoods']);
    Route::get('/kelola-barang/edit-barang/{id}', [GoodsManageController::class, 'viewEditDataGoods'])->name('edit_data_barang');
    Route::post('/kelola-barang/daftar-barang/update/{id}', [GoodsManageController::class, 'updateGoods']);
    Route::post('/kelola-barang/daftar-barang/delete/{id}', [GoodsManageController::class, 'deleteGoods']);

    // ------------------------- Data Leluhur -------------------------
    // Route::get('/data-leluhur/tambah-data', [DataLeluhurManageController::class, 'viewAddLeluhur'])->name('tambah_data_leluhur');
    // Route::post('/data-leluhur/i-tambah-data', [DataLeluhurManageController::class, 'addLeluhur']);
    Route::get('/data-leluhur/pesan-pas-foto', [DataLeluhurManageController::class, 'viewOrderPhoto']);
    Route::get('/data-leluhur/data-umat', [DataLeluhurManageController::class, 'getDataUmat']);
    Route::get('/data-leluhur/getNamabyId', [DataLeluhurManageController::class, 'getNamabyId']);
    Route::get('/data-leluhur/pesan-lokasi/{data}', function ($data) {
        return view('admins.data_leluhur.order_tempat', ["data" => $data]);
    });
    Route::get('/data-leluhur/getLokasiFoto', [DataLeluhurManageController::class, 'getLokasiFoto']);
    Route::post('/data-leluhur/PESANFOTOLOKASI', [DataLeluhurManageController::class, 'PESANFOTOLOKASI']);
    Route::get('/data-leluhur/edit-leluhur/{id}', [DataLeluhurManageController::class, 'viewEditLeluhur']);
    Route::post('/data-leluhur/update-leluhur/{id}', [DataLeluhurManageController::class, 'editLeluhur']);
    Route::get('/data-leluhur/daftar-leluhur', [DataLeluhurManageController::class, 'viewDataLeluhur'])->name('daftar_leluhur');
    Route::post('/data-leluhur/daftar-leluhur/delete/{id}', [DataLeluhurManageController::class, 'deleteDataLeluhur']);
    Route::get('/data-leluhur/edit-lokasi-foto/{data}', [DataLeluhurManageController::class, 'viewEditLokasiFoto']);
    Route::post('/data-leluhur/UBAHFOTOLOKASI', [DataLeluhurManageController::class, 'UBAHFOTOLOKASI']);
    // Route::get('/data-leluhur/pesan-lokasi1/{data}', function($data){
    //     return view('admins.data_leluhur.temp',["idj"=>$data]);
    // });

    // ------------------------- Tagih Iuran -------------------------
    Route::get('/tagih-iuran', [IuranManageController::class, 'viewTagihIuran']);
    // Route::get('/tagih-iuran/tampil-data-umat', [IuranManageController::class, 'getDataUmat']);
    // Route::get('/tagih-iuran/iuran-wajib', [IuranManageController::class, 'kirimIuranWajib']);
    Route::get('/tagih-iuran/kirim-email/{nama}/{email}/{nominal_tagihan}/{bulan_tagihan}', [MailController::class, 'index']);

    // ------------------------- Kelola Transaksi -------------------------
    Route::get('/kelola-transaksi/tambah-transaksi-barang', [TransactionManageController::class, 'viewAddGoodsDonationTransaction'])->name('tambah_transaksi_barang');
    Route::post('/kelola-transaksi/validasi-pembayaran-barang/{id}', [TransactionManageController::class, 'validationGoodsTransaction']);
    Route::get('/kelola-transaksi/tambah-transaksi-uang', [TransactionManageController::class, 'viewAddMoneyDonationTransaction'])->name('tambah_transaksi_uang');
    Route::post('/kelola-transaksi/validasi-pembayaran-uang', [TransactionManageController::class, 'validationMoneyTransaction']);
    Route::get('/kelola-transaksi/daftar-transaksi', [TransactionManageController::class, 'viewListTransaction'])->name('daftar_transaksi');
    Route::get('/kelola-transaksi/struk-transaksi-donasi/{kode_transaksi}', [TransactionManageController::class, 'generateDonationReceipt']);
    
    Route::get('/kelola-transaksi/struk-transaksi-donasi-html/{kode_transaksi}', [TransactionManageController::class, 'generateDonationReceiptHtml'])->name('daftar_transaksi_print_html');

    Route::get('/kelola-transaksi/tambah-transaksi-foto', [TransactionManageController::class, 'viewAddPhotoTransaction'])->name('tambah_transaksi_foto');
    Route::get('/kelola-transaksi/tambah-transaksi-foto-2', [TransactionManageController::class, 'viewAddPhotoTransaction_2'])->name('tambah_transaksi_foto_2');
    Route::get('/kelola-transaksi/tampil-mendiang-by-id/{id}', [TransactionManageController::class, 'showDataMendiangByID']);
    Route::post('/kelola-transaksi/validasi-pembayaran-foto', [TransactionManageController::class, 'validationPhotoTransaction']);
    Route::post('/kelola-transaksi/validasi-pembayaran-foto-2', [TransactionManageController::class, 'validationPhotoTransaction_2']);
    Route::get('/kelola-transaksi/daftar-transaksi-foto', [TransactionManageController::class, 'viewListPhotoTransaction'])->name('daftar_transaksi_foto');
    Route::get('/kelola-transaksi/daftar-transaksi-foto-2', [TransactionManageController::class, 'viewListPhotoTransaction_2'])->name('daftar_transaksi_foto_2');
    Route::get('/kelola-transaksi/struk-transaksi-foto/{kode_transaksi}', [TransactionManageController::class, 'generatePhotoReceipt']);
    Route::get('/kelola-transaksi/struk-transaksi-foto-2/{kode_transaksi}', [TransactionManageController::class, 'generatePhotoUnregReceipt']);

    // ------------------------- Kelola Laporan -------------------------
    Route::get('/kelola-laporan/laporan-transaksi', [KelolaLaporanManageController::class, 'viewLaporanTransaksi']);
    Route::get('/kelola-laporan/laporan-transaksi-filter/{date_awal}/{date_akhir}', [KelolaLaporanManageController::class, 'FilterLaporanTransaksi']);
    Route::get('/kelola-laporan/laporan-transaksi-foto', [KelolaLaporanManageController::class, 'viewLaporanTransaksiFoto']);
    Route::get('/kelola-laporan/laporan-transaksi-foto-filter/{date_awal}/{date_akhir}', [KelolaLaporanManageController::class, 'FilterLaporanTransaksiFoto']);
    Route::get('/kelola-laporan/laporan-transaksi-total', [KelolaLaporanManageController::class, 'viewLaporanTransaksiTotal']);
    Route::get('/kelola-laporan/laporan-penjualan-paket', [KelolaLaporanManageController::class, 'viewLaporanPenjualanPaket']);
    Route::get('/kelola-laporan/tampil-data-transaksi', [KelolaLaporanManageController::class, 'showDataTransaksi'])->name('tampil_data_transaksi_laporan');
    Route::get('/kelola-laporan/report-transaksi', [KelolaLaporanManageController::class, 'generateReportTransaksi']);
    
    // ------------------------- Kas -------------------------
    Route::get('/kas/kas-masuk', [KasManageController::class, 'viewCashIn'])->name('tambah_kas_masuk');
    Route::post('/kas/kas-masuk/tambah-kas-masuk', [KasManageController::class, 'addCashIn']);
    Route::get('/kas/laporan-kas-masuk', [KasManageController::class, 'viewCashInReport'])->name('laporan_kas_masuk');
    Route::get('/kas/laporan-kas-masuk-filter/{date_awal}/{date_akhir}', [KasManageController::class, 'filterCashInReport']);
    Route::post('/kas/laporan-kas-masuk/delete/{id}', [KasManageController::class, 'deleteCashIn']);
    Route::get('/kas/struk-kas-masuk/{nomor_kas_masuk}', [KasManageController::class, 'generateCashInReceipt'])->name('cetak_struk_kas_masuk');
    Route::get('kas/laporan-kas-masuk/report-kas-masuk/{date_awal}/{date_akhir}', [KasManageController::class, 'generateCashInReportPDF']);
    
    Route::get('/kas/kas-keluar', [KasManageController::class, 'viewCashOut'])->name('tambah_kas_keluar');
    Route::post('/kas/kas-keluar/tambah-kas-keluar', [KasManageController::class, 'addCashOut']);
    Route::get('/kas/laporan-kas-keluar', [KasManageController::class, 'viewCashOutReport'])->name('laporan_kas_keluar');
    Route::get('/kas/laporan-kas-keluar-filter/{date_awal}/{date_akhir}', [KasManageController::class, 'filterCashOutReport']);
    Route::post('/kas/laporan-kas-keluar/delete/{id}', [KasManageController::class, 'deleteCashOut']);
    Route::get('/kas/struk-kas-keluar/{nomor_kas_keluar}', [KasManageController::class, 'generateCashOutReceipt']);
    Route::get('kas/laporan-kas-keluar/report-kas-keluar/{date_awal}/{date_akhir}', [KasManageController::class, 'generateCashOutReportPDF']);

    // ------------------------- Laporan Keuangan -------------------------
    Route::get('/laporan-keuangan', [LaporanKeuanganController::class, 'viewLaporanKeuangan']);
    Route::get('/laporan-keuangan/data-transaksi/{year_month}', [LaporanKeuanganController::class, 'showDataTransaksi_']);
    Route::get('/laporan-keuangan/exportpdf/{year_month}', [LaporanKeuanganController::class, 'exportpdf'])->name('exportpdf');
    Route::get('/laporan-keuangan/exportpdf/', [LaporanKeuanganController::class, 'exportpdf'])->name('exportpdf');

    Route::get('/laporan-keuangan/exportexcel/', [LaporanKeuanganController::class, 'exportexcel'])->name('exportexcel');
    Route::get('/laporan-keuangan/exportexcel/{year_month}', [LaporanKeuanganController::class, 'exportexcel'])->name('exportexcel');
});

Route::group(['middleware' => ['auth:admin,user']], function () {
    // ------------------------- User -------------------------
    Route::get('/tampil-barcode/{id}', [UserJamaatManageController::class, 'showBarcodeAfterLogin'])->name('tampil_barcode');
    Route::get('/update-profile/{id}', [UserJamaatManageController::class, 'viewUpdateProfile'])->name('profile_user_jamaat');
    Route::post('/update-profile/update/{id}', [UserJamaatManageController::class, 'updateProfile']);
    Route::get('/ganti-password/{id}', [UserJamaatManageController::class, 'showChangePasswordJamaat'])->name('ganti_password_jamaat');
    Route::post('/ganti-password/change/{id}', [UserJamaatManageController::class, 'changePasswordJamaat']);

    // ------------------------- Donasi -------------------------
    Route::get('/donasi/{id_kegiatan_donasi}', [UserDonasiManageController::class, 'viewDonasi']);
    Route::post('/i-donasi', [UserDonasiManageController::class, 'addDonasi']);
});

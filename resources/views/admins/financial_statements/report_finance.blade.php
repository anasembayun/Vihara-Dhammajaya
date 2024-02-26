@extends('templates.admin_main')
@section('top-header')
    <header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
        <p class="w3-left">Laporan Saldo Vihara Dhamma Jaya</p>
        <p class="w3-right">Role
            <span>: {{ Auth::guard('admin')->user()->role }} </span>
        </p>
        <style>
            .tab {
                display: inline-block;
                margin-left: 17%;
            }

            .plus {
                color: green;
            }

            .minus {
                color: red;
            }

            .border-top {
                border-top: 1pt solid black;
            }
        </style>
    </header>
@endsection
@section('css')
    <!-- Datepicker asset -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

    <!-- Add-on Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- Select2 Plugin for search in select -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
@section('content')
    <div class="w3-main container-main" style="margin-left:250px;padding-top: 0;">
        <!-- isi halaman -->
        <div class="content-wrapper" id="content-web-page">
            <div class="container-fluid">
                <div class="row">
                    {{-- ============================ BATAS ====================================== --}}
                    <div class="col-md-14">
                        <div class="card card-noborder b-radius">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h4 id="periode"></h4>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="row">
                                            <div class="col">
                                                <input type="month" name="date" id="tahun_bulan"
                                                    class="form-control form-control-md" required>
                                            </div>
                                            <div class="col-sm">
                                                <button type="submit" class="btn btn-primary btn-md"
                                                    id="filter_btn">Filter</button>
                                                <button class="btn btn-danger btn-md" id="exportpdf" type="submit">
                                                    <i class="mdi mdi-file-pdf"></i> PDF
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-1">
                                        <div class="row">
                                            {{-- <div class="col-md-2">
                                                <button class="btn btn-danger btn-sm" id="exportpdf" type="submit">
                                                    <i class="mdi mdi-file-pdf"></i> PDF
                                                </button>
                                            </div> --}}
                                            {{-- <div class="col-md-4">
                                                <button class="btn btn-success btn-sm" id="exportexcel" type="submit">
                                                    <i class="mdi mdi-file-excel"></i> Excel
                                                </button>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="reportTable">
                                        <thead>
                                        </thead>
                                        <tbody id="bodytable">
                                            <tr>
                                                <th colspan="6" style="font-size:26px; color:red;">Pendapatan</th>
                                            </tr>

                                            {{-- ---------- Transaksi Dana ----------- --}}
                                            <tr>
                                                <td style="width:20%">
                                                    <h6><b>Transaksi Dana</b></h6>
                                                </td>
                                                <td style="width:15%"></td>
                                                <td style="width:15%"></td>
                                                <td style="width:15%"></td>
                                                <td style="width:15%"></td>
                                                <td style="width:20%"></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td style="border-bottom: 1px solid black;"> <b> Tunai </b></td>
                                                <td style="border-bottom: 1px solid black;"> <b> Transfer </b></td>
                                                <td style="border-bottom: 1px solid black;"> <b> QRIS </b></td>
                                                <td style="border-bottom: 1px solid black;"> <b> Debit </b> </td>
                                                <td style="border-bottom: 1px solid black;"><b>Total Transaksi Dana</b></td>
                                            </tr>

                                            @foreach ($kegiatans as $item)
                                            <tr id="tr_transaksi_dana{{$item->id}}">
                                                <td>{{$item->nama_kegiatan_donasi}}</td>
                                            </tr> 
                                            @endforeach
                                            
                                            
                                            <tr>
                                                <td style="height:40px"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>

                                            {{-- ---------- Transaksi Paket ----------- --}}
                                            <tr>
                                                <td style="width:20%">
                                                    <h6><b>Transaksi Paket</b></h6>
                                                </td>
                                                <td style="width:15%"></td>
                                                <td style="width:15%"></td>
                                                <td style="width:15%"></td>
                                                <td style="width:15%"></td>
                                                <td style="width:20%"></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td style="border-bottom: 1px solid black;"> <b> Tunai </b></td>
                                                <td style="border-bottom: 1px solid black;"> <b> Transfer </b></td>
                                                <td style="border-bottom: 1px solid black;"> <b> QRIS </b></td>
                                                <td style="border-bottom: 1px solid black;"> <b> Debit </b> </td>
                                                <td style="border-bottom: 1px solid black;"><b>Total Transaksi Paket</b></td>
                                            </tr>

                                            @foreach ($kegiatans as $item)
                                            <tr id="tr_transaksi_paket{{$item->id}}">
                                                <td>{{$item->nama_kegiatan_donasi}}</td>
                                            </tr> 
                                            @endforeach
                                            
                                            <tr>
                                                <td style="height:40px"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>

                                            <tr>
                                                <td style="width:20%">
                                                    <h6><b>Transaksi Samanagara</b></h6>
                                                </td>
                                                <td style="width:15%"></td>
                                                <td style="width:15%"></td>
                                                <td style="width:15%"></td>
                                                <td style="width:15%"></td>
                                                <td style="width:20%"></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td> <b> Tunai </b></td>
                                                <td> <b> Transfer </b></td>
                                                <td> <b> QRIS </b></td>
                                                <td> <b> Debit </b> </td>
                                                <td><b>Total Transaksi Samanagara</b></td>
                                            </tr>
                                            <tr>
                                                <td>Umat yang Terdaftar</td>
                                                <td id="transaksi-foto-tunai"
                                                    style="text-align: right;  border-top: 1px solid black;"></td>
                                                <td id="transaksi-foto-transfer"
                                                    style="text-align: right; border-top: 1px solid black;"></td>
                                                <td id="transaksi-foto-QRIS"
                                                    style="text-align: right; border-top: 1px solid black;"></td>
                                                <td id="transaksi-foto-debit"
                                                    style="text-align: right; border-top: 1px solid black;"></td>
                                                <td id="total-transaksi-foto"
                                                    style="text-align: right;  border-top: 1px solid black;"></td>
                                            </tr>
                                            <tr>
                                                <td>Umat yang tidak Terdaftar</td>
                                                <td id="transaksi-foto-unreg-tunai" style="text-align: right;"></td>
                                                <td id="transaksi-foto-unreg-transfer" style="text-align: right;"></td>
                                                <td id="transaksi-foto-unreg-QRIS" style="text-align: right;"></td>
                                                <td id="transaksi-foto-unreg-debit" style="text-align: right;"></td>
                                                <td id="total-transaksi-foto-unreg" style="text-align: right;"></td>
                                            </tr>
                                            <tr>
                                                <td style="height:40px"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>

                                            <tr>
                                                <td style="width:20%">
                                                    <h6><b>Kas Masuk</b> </h6>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td> <b> Tunai </b> </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                {{-- <td> <b> Transfer </b></td>
                                                <td> <b> QRIS </b></td>
                                                <td> <b> Debit </b> </td> --}}
                                                <td><b>Total Kas Masuk</b></td>
                                            </tr>
                                            <tr>
                                                <td>Dana dari Yayasan</td>
                                                <td id="km_1"
                                                    style="text-align: right; border-top: 1px solid black;"></td>
                                                <td>
                                                </td>
                                                <td></td>
                                                <td></td>

                                                <td id="total_km_1"
                                                    style="text-align: right; border-top: 1px solid black;"></td>
                                            </tr>
                                            <tr>
                                                <td>Dana Paramita Umum</td>
                                                <td id="km_2" style="text-align: right;"></td>
                                                <td style="text-align: right;"></td>
                                                <td style="text-align: right;"></td>
                                                <td style="text-align: right;"></td>

                                                <td id="total_km_2" style="text-align: right;"></td>
                                            </tr>
                                            <tr>
                                                <td>Dana Paramita Anak-Anak</td>
                                                <td id="km_3" style="text-align: right;"></td>

                                                <td style="text-align: right;"></td>
                                                <td style="text-align: right;"></td>
                                                <td style="text-align: right;"></td>
                                                <td id="total_km_3" style="text-align: right;"></td>
                                            </tr>
                                            <tr>
                                                <td>Dana Paramita Remaja</td>
                                                <td id="km_4" style="text-align: right;"></td>

                                                <td style="text-align: right;"></td>
                                                <td style="text-align: right;"></td>
                                                <td style="text-align: right;"></td>
                                                <td id="total_km_4" style="text-align: right;"></td>
                                            </tr>
                                            <tr>
                                                <td>Dana Muda Mudi</td>
                                                <td id="km_5" style="text-align: right;"></td>

                                                <td style="text-align: right;"></td>
                                                <td style="text-align: right;"></td>
                                                <td style="text-align: right;"></td>
                                                <td id="total_km_5" style="text-align: right;"></td>
                                            </tr>

                                            <tr>
                                                <td style="height:40px"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <h6><b> Total Pendapatan Tunai</b></h6>
                                                </td>
                                                <th id="total-pendapatan-kas" style=" text-align: right;">
                                                </th>
                                                <td></td>
                                                <td></td>
                                                <td><h6><b> Total Pendapatan</b></h6></td>
                                                <th id="total-pendapatan" style="text-align: right;">
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="6" style="font-size:26px; color:red;">Pengeluaran</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6><b> Kas Keluar </b></h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><b> Tunai </b></td>
                                                <td><b> Transfer </b></td>
                                                <td></td>
                                                <td></td>
                                                <td><b>Total Transaksi Kas Keluar</b></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td style="text-align: right;border-top: 1px solid black;"
                                                    id="kas-keluar"></td>
                                                <td style="text-align: right;border-top: 1px solid black;"
                                                    id="kas-keluar-tf"></td>
                                                <td></td>
                                                <td></td>
                                                <td id="total-kas-keluar"
                                                    style="text-align: right;border-top: 1px solid black;"></td>
                                            </tr>

                                            <tr>
                                                <td style="height:40px"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>

                                            {{-- <tr>
                                                <td>
                                                    <h6><b> Total Pendapatan</b></h6>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <th id="total-pendapatan" style="color:green; text-align: right;">
                                                </th>
                                            </tr> --}}
                                            <tr>
                                                <td>
                                                    <h6><b>Total Pengeluaran Tunai</b></h6>
                                                </td>
                                                <td id="total-pengeluaran-tunai" style=" text-align: right;"></td>
                                                <td></td>
                                                <td></td>
                                                <td><h6><b>Total Pengeluaran</b></h6></td>
                                                <th id="total-pengeluaran" style=" text-align: right;"></th>
                                            </tr>
                                            {{-- <tr>
                                                <th colspan="4">Laba</th>
                                            </tr> --}}
                                            <tr>
                                                <td>
                                                    <h6><b>Saldo Kas Tunai</b></h6>
                                                </td>
                                                <td id="saldo-tunai" style="text-align: right;"></td>
                                                <td></td>
                                                <td></td>
                                                <td><h6><b>Total Saldo</b></h6></td>
                                                <th id="laba-bersih" style="text-align: right;"></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- ============================ BATAS ====================================== --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var tahun_bulan = document.getElementById('tahun_bulan').value;
            console.log(tahun_bulan);
            if (tahun_bulan == null) {
                tahun_bulan = 0;
            }
            if ($('#tahun_bulan').is(':empty')) {
                tahun_bulan = 0;
            }
            $.ajax({
                url: "{{ url('/laporan-keuangan/data-transaksi') }}/" + tahun_bulan,
                method: "GET",
                success: function(response) {
                    // Pemasukan
                    var transaksi = response.all_data.total_transaksi;
                    var total_pendapatan = response.all_data.total_pendapatan;
                    var total_pendapatan_kas = response.all_data.total_pendapatan_kas;
                    var date = response.all_data.date;

                    // Kas Masuk
                    var kasMasuk = response.all_data.total_kas_masuk;
                    var km_1 = response.all_data.km_1;
                    var km_2 = response.all_data.km_2;
                    var km_3 = response.all_data.km_3;
                    var km_4 = response.all_data.km_4;
                    var km_5 = response.all_data.km_5;
                    var total_km_1 = km_1;
                    var total_km_2 = km_2;
                    var total_km_3 = km_3;
                    var total_km_4 = km_4;
                    var total_km_5 = km_5;

                    // ===== Transaksi Dana ===== //
                    var data_transaksi_dana = response.transaksi_dana;
                    $.each(data_transaksi_dana,function(i,e) {
                        var tr = $('#tr_transaksi_dana'+ e.id).append(
                            $('<td>').html(e.transaksi_dana_tunai).css({'text-align':'right'}),
                            $('<td>').html(e.transaksi_dana_transfer).css({'text-align':'right'}),
                            $('<td>').html(e.transaksi_dana_QRIS).css({'text-align':'right'}),
                            $('<td>').html(e.transaksi_dana_debit).css({'text-align':'right'}),
                            $('<td>').html(e.total_transaksi_dana).css({'text-align':'right'}),
                        );
                    });
                    console.log(data_transaksi_dana);

                    // ===== Transaksi Paket ===== //
                    var data_transaksi_paket = response.transaksi_paket;
                    $.each(data_transaksi_paket,function(i,e) {
                        var tr = $('#tr_transaksi_paket'+ e.id).append(
                            $('<td>').html(e.transaksi_paket_tunai).css({'text-align':'right'}),
                            $('<td>').html(e.transaksi_paket_transfer).css({'text-align':'right'}),
                            $('<td>').html(e.transaksi_paket_QRIS).css({'text-align':'right'}),
                            $('<td>').html(e.transaksi_paket_debit).css({'text-align':'right'}),
                            $('<td>').html(e.total_transaksi_paket).css({'text-align':'right'}),
                        );
                    });
                    console.log(data_transaksi_paket);

                    // ===== Transaksi Foto ===== //
                    var transaksi_foto_tunai = response.all_data.transaksi_foto_tunai;
                    var transaksi_foto_transfer = response.all_data.transaksi_foto_transfer;
                    var transaksi_foto_QRIS = response.all_data.transaksi_foto_QRIS;
                    var transaksi_foto_debit = response.all_data.transaksi_foto_debit;
                    var total_transaksi_foto = response.all_data.total_transaksi_foto;

                    // ===== Transaksi Foto Unreg ===== //
                    var transaksi_foto_unreg_tunai = response.all_data.transaksi_foto_unreg_tunai;
                    var transaksi_foto_unreg_transfer = response.all_data.transaksi_foto_unreg_transfer;
                    var transaksi_foto_unreg_QRIS = response.all_data.transaksi_foto_unreg_QRIS;
                    var transaksi_foto_unreg_debit = response.all_data.transaksi_foto_unreg_debit;
                    var total_transaksi_foto_unreg = response.all_data.total_transaksi_foto_unreg;

                    // Pengeluaran
                    var total_pengeluaran = response.all_data.total_pengeluaran;
                    var total_pengeluaranTu = response.all_data.total_pengeluaran_tu;
                    var total_pengeluaranTf = response.all_data.total_pengeluaran_tf;

                    // Laba
                    var saldo_tunai = response.all_data.saldo_tunai;
                    var laba_bersih = response.all_data.laba_bersih;

                    $('#periode').html("Periode : Bulan " + date);

                    // Kas Masuk
                    $('#km_1').html(km_1);
                    $('#km_2').html(km_2);
                    $('#km_3').html(km_3);
                    $('#km_4').html(km_4);
                    $('#km_5').html(km_5);
                    $('#total_km_1').html(total_km_1);
                    $('#total_km_2').html(total_km_2);
                    $('#total_km_3').html(total_km_3);
                    $('#total_km_4').html(total_km_4);
                    $('#total_km_5').html(total_km_5);
                    $('#kas_masuk').html(kasMasuk);
                    $('#total_kas_masuk').html(kasMasuk);

                    // Foto
                    $('#transaksi-foto-tunai').html(transaksi_foto_tunai);
                    $('#transaksi-foto-transfer').html(transaksi_foto_transfer);
                    $('#transaksi-foto-QRIS').html(transaksi_foto_QRIS);
                    $('#transaksi-foto-debit').html(transaksi_foto_debit);
                    $('#total-transaksi-foto').html(total_transaksi_foto);
                    // Foto Unreg
                    $('#transaksi-foto-unreg-tunai').html(transaksi_foto_unreg_tunai);
                    $('#transaksi-foto-unreg-transfer').html(transaksi_foto_unreg_transfer);
                    $('#transaksi-foto-unreg-QRIS').html(transaksi_foto_unreg_QRIS);
                    $('#transaksi-foto-unreg-debit').html(transaksi_foto_unreg_debit);
                    $('#total-transaksi-foto-unreg').html(total_transaksi_foto_unreg);

                    $('#total-pendapatan-kas').html("<h6><b> Rp. " + total_pendapatan_kas +
                        "</b></h6>");
                    $('#total-pendapatan').html("<h6><b> Rp. " + total_pendapatan + "</b></h6>");

                    $('#kas-keluar').html(total_pengeluaranTu);
                    $('#kas-keluar-tf').html(total_pengeluaranTf);
                    $('#total-kas-keluar').html(total_pengeluaran);
                    $('#total-pengeluaran-tunai').html("<h6><b> Rp. " + total_pengeluaranTu + "</b></h6>");
                    $('#total-pengeluaran').html("<h6><b> Rp. " + total_pengeluaran + "</b></h6>");
                    $('#saldo-tunai').html("<h6><b> Rp. " + saldo_tunai + "</b></h6>");
                    $('#laba-bersih').html("<h6><b> Rp. " + laba_bersih + "</b></h6>");
                    // $('#laba-bersih').addClass(response.laba_class);
                    
                }
            });
        });

        $(document).on('click', '#filter_btn', function(e) {
            e.preventDefault();
            var tahun_bulan = document.getElementById('tahun_bulan').value;

            console.log(tahun_bulan);
            $.ajax({
                url: "{{ url('/laporan-keuangan/data-transaksi') }}/" + tahun_bulan,
                method: "GET",
                success: function(response) {
                    
                    // Pemasukan
                    var transaksi = response.all_data.total_transaksi;
                    var total_pendapatan = response.all_data.total_pendapatan;
                    var total_pendapatan_kas = response.all_data.total_pendapatan_kas;
                    var date = response.all_data.date;

                    // Kas Masuk
                    var kasMasuk = response.all_data.total_kas_masuk;
                    var km_1 = response.all_data.km_1;
                    var km_2 = response.all_data.km_2;
                    var km_3 = response.all_data.km_3;
                    var km_4 = response.all_data.km_4;
                    var km_5 = response.all_data.km_5;
                    var total_km_1 = km_1;
                    var total_km_2 = km_2;
                    var total_km_3 = km_3;
                    var total_km_4 = km_4;
                    var total_km_5 = km_5;

                    // ===== Transaksi Dana ===== //
                    var data_transaksi_dana = response.transaksi_dana;
                    $.each(data_transaksi_dana,function(i,e) {
                        $('#tr_transaksi_dana'+ e.id).empty();
                        var tr = $('#tr_transaksi_dana'+ e.id).append(
                            $('<td>').html(e.nama_kegiatan).css({'text-align':'right'}),
                            $('<td>').html(e.transaksi_dana_tunai).css({'text-align':'right'}),
                            $('<td>').html(e.transaksi_dana_transfer).css({'text-align':'right'}),
                            $('<td>').html(e.transaksi_dana_QRIS).css({'text-align':'right'}),
                            $('<td>').html(e.transaksi_dana_debit).css({'text-align':'right'}),
                            $('<td>').html(e.total_transaksi_dana).css({'text-align':'right'}),
                        );
                    });
                    console.log(data_transaksi_dana);

                    // ===== Transaksi Paket ===== //
                    var data_transaksi_paket = response.transaksi_paket;
                    $.each(data_transaksi_paket,function(i,e) {
                        $('#tr_transaksi_paket'+ e.id).empty();
                        var tr = $('#tr_transaksi_paket'+ e.id).append(
                            $('<td>').html(e.nama_kegiatan).css({'text-align':'right'}),
                            $('<td>').html(e.transaksi_paket_tunai).css({'text-align':'right'}),
                            $('<td>').html(e.transaksi_paket_transfer).css({'text-align':'right'}),
                            $('<td>').html(e.transaksi_paket_QRIS).css({'text-align':'right'}),
                            $('<td>').html(e.transaksi_paket_debit).css({'text-align':'right'}),
                            $('<td>').html(e.total_transaksi_paket).css({'text-align':'right'}),
                        );
                    });
                    console.log(data_transaksi_paket);

                    // ===== Transaksi Foto ===== //
                    var transaksi_foto_tunai = response.all_data.transaksi_foto_tunai;
                    var transaksi_foto_transfer = response.all_data.transaksi_foto_transfer;
                    var transaksi_foto_QRIS = response.all_data.transaksi_foto_QRIS;
                    var transaksi_foto_debit = response.all_data.transaksi_foto_debit;
                    var total_transaksi_foto = response.all_data.total_transaksi_foto;

                    // ===== Transaksi Foto Unreg ===== //
                    var transaksi_foto_unreg_tunai = response.all_data.transaksi_foto_unreg_tunai;
                    var transaksi_foto_unreg_transfer = response.all_data.transaksi_foto_unreg_transfer;
                    var transaksi_foto_unreg_QRIS = response.all_data.transaksi_foto_unreg_QRIS;
                    var transaksi_foto_unreg_debit = response.all_data.transaksi_foto_unreg_debit;
                    var total_transaksi_foto_unreg = response.all_data.total_transaksi_foto_unreg;

                    // Pengeluaran
                    var total_pengeluaran = response.all_data.total_pengeluaran;
                    var total_pengeluaranTu = response.all_data.total_pengeluaran_tu;
                    var total_pengeluaranTf = response.all_data.total_pengeluaran_tf;

                    // Laba
                    var saldo_tunai = response.all_data.saldo_tunai;
                    var laba_bersih = response.all_data.laba_bersih;

                    $('#periode').html("Periode : Bulan " + date);

                    // Kas Masuk
                    $('#km_1').html(km_1);
                    $('#km_2').html(km_2);
                    $('#km_3').html(km_3);
                    $('#km_4').html(km_4);
                    $('#km_5').html(km_5);
                    $('#total_km_1').html(total_km_1);
                    $('#total_km_2').html(total_km_2);
                    $('#total_km_3').html(total_km_3);
                    $('#total_km_4').html(total_km_4);
                    $('#total_km_5').html(total_km_5);
                    $('#kas_masuk').html(kasMasuk);
                    $('#total_kas_masuk').html(kasMasuk);

                    // Foto
                    $('#transaksi-foto-tunai').html(transaksi_foto_tunai);
                    $('#transaksi-foto-transfer').html(transaksi_foto_transfer);
                    $('#transaksi-foto-QRIS').html(transaksi_foto_QRIS);
                    $('#transaksi-foto-debit').html(transaksi_foto_debit);
                    $('#total-transaksi-foto').html(total_transaksi_foto);
                    // Foto Unreg
                    $('#transaksi-foto-unreg-tunai').html(transaksi_foto_unreg_tunai);
                    $('#transaksi-foto-unreg-transfer').html(transaksi_foto_unreg_transfer);
                    $('#transaksi-foto-unreg-QRIS').html(transaksi_foto_unreg_QRIS);
                    $('#transaksi-foto-unreg-debit').html(transaksi_foto_unreg_debit);
                    $('#total-transaksi-foto-unreg').html(total_transaksi_foto_unreg);

                    $('#total-pendapatan-kas').html("<h6><b> Rp. " + total_pendapatan_kas +
                        "</b></h6>");
                    $('#total-pendapatan').html("<h6><b> Rp. " + total_pendapatan + "</b></h6>");

                    $('#kas-keluar').html(total_pengeluaranTu);
                    $('#kas-keluar-tf').html(total_pengeluaranTf);
                    $('#total-kas-keluar').html(total_pengeluaran);
                    $('#total-pengeluaran-tunai').html("<h6><b> Rp. " + total_pengeluaranTu + "</b></h6>");
                    $('#total-pengeluaran').html("<h6><b> Rp. " + total_pengeluaran + "</b></h6>");
                    $('#saldo-tunai').html("<h6><b> Rp. " + saldo_tunai + "</b></h6>");
                    $('#laba-bersih').html("<h6><b> Rp. " + laba_bersih + "</b></h6>");
                    // $('#laba-bersih').addClass(response.laba_class);
                    
                }
            });
        });

        $(document).on('click', '#exportpdf', function(e) {
            var tahun_bulan = document.getElementById('tahun_bulan').value;
            console.log(tahun_bulan);
            if (tahun_bulan == null) {
                tahun_bulan = 0;
            }

            console.log(tahun_bulan);
            window.open("{{ url('/laporan-keuangan/exportpdf') }}/" + tahun_bulan);
        });

        $(document).on('click', '#exportexcel', function(e) {
            var tahun_bulan = document.getElementById('tahun_bulan').value;
            console.log(tahun_bulan);
            if (tahun_bulan == null) {
                tahun_bulan = 0;
            }
            // if ($('#tahun_bulan').is(':empty')) {
            //     tahun_bulan = 0;
            // }

            console.log(tahun_bulan);
            window.open("{{ url('/laporan-keuangan/exportexcel') }}/" + tahun_bulan);
        });

        $("tr.item").each(function() {
            var tmp = $(this).find("td.test").val();
            if (tmp = '0.00')
                $(this).hide;
        });
    </script>
@endsection

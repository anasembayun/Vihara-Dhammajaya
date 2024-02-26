<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Vihara Dhammajaya</title>

    <!-- favico -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/app_admin/dashboard/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('images/app_admin/dashboard/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('images/app_admin/dashboard/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/app_admin/dashboard/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('images/app_admin/dashboard/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <style>
        @page {
            margin: 100px 25px;
        }

        header {
            position: fixed;
            top: -85px;
            left: 0px;
            right: 0px;
            height: 50px;
            text-align: center;
        }

        td{
            width: auto;
            padding: 5px;
            border-right: #2d4154 0.3px solid;
        }

        #title th{
            width: auto;
            text-align: center;
            border: none;
        }
    </style>
</head>

<body>
    <header>
        <h3>
                Laporan Transaksi Dana Masuk
            <br>
                Periode {{ $date_awal }} - {{ $date_akhir }}
            <br>
                @php
                if($kegiatan != "all"){
                    $donasi = \App\Models\Donasi::where('id', $kegiatan)->first()->nama_kegiatan_donasi;
                }else{
                    $donasi = "Semua Kegiatan";
                }
                @endphp
                Untuk Dana {{$donasi}}
        </h3>
    </header>
    <main>
        <h4>{{ Auth::guard('admin')->user()->role }} : {{ Auth::guard('admin')->user()->name }}</h4>
        <h4 style="text-align: left;">Dana  : {{$donasi}}</h4>
        <table style="width:100%;">
            <thead>
                <tr style="background-color:#2d4154;color:#fafffe;border-top:#2d4154 0.3px solid;">
                    <th colspan="4" style="border-left:#2d4154 0.3px solid;border-right:none"></th>
                    <th colspan="4" style="text-align: center">Jumlah Donasi dan Cara Berdana</th>
                    <th style="border-right:none"></th>
                </tr>
                <tr style="background-color:#2d4154;color:#fafffe; text-align:center">
                    <th id="title" style="border-left:#2d4154 0.3px solid;">No.</th>
                    <th id="title" style="width: 10%">Tanggal & Jam</th>
                    <th id="title">Kode Transaksi</th>
                    <th id="title">Nama Umat</th>
                    <th id="title">Tunai</th>
                    <th id="title">Debit</th>
                    <th id="title">QRIS</th>
                    <th id="title">Transfer</th>
                    <th id="title">Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 0;
                    $total_nominal_pemasukan = 0;
                    $tunai = 0;
                    $debit = 0;
                    $qris = 0;
                    $transfer = 0;
                @endphp
                @foreach ($data_transaksi as $data)
                    <tr style="background-color:#f3f3f3;">
                        <td style="text-align: center; border-left:#2d4154 0.3px solid;">{{ ++$no }}</td>
                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->tanggal_transaksi)->format('d-m-Y | H:i:s') }}</td>
                        <td>{{ $data->kode_transaksi }}</td>
                        <td>{{ $data->nama }}</td>
                        <td style="text-align: center; ">
                            @php
                                $total_tunai = 0;
                                if($data->metode_pembayaran == "Tunai"){
                                    if ($data->kategori_donasi != 'Dana') {
                                    $id_barangs = \App\Models\DetailTransaksi::where('kode_transaksi', $data->kode_transaksi)->pluck('id_barang');
                                        for ($i = 0; $i < $id_barangs->count(); $i++) {
                                            $total_tunai += \App\Models\Goods::where('id', $id_barangs[$i])->value('harga_jual');
                                        }
                                    } else {
                                        $total_tunai = $data->total_harga;
                                    }
                                }else{
                                    $total_tunai = 0;
                                }
                                
                            @endphp

                            @if($total_tunai != 0)
                            <p>{{number_format($total_tunai, 0, ',', '.');}}</p>
                            @else
                            <p></p>
                            @endif
                        </td>
                        <td style="text-align: center; ">
                            @php
                                $total_debit = 0;
                                if($data->metode_pembayaran == "Debit"){
                                    if ($data->kategori_donasi != 'Dana') {
                                    $id_barangs = \App\Models\DetailTransaksi::where('kode_transaksi', $data->kode_transaksi)->pluck('id_barang');
                                        for ($i = 0; $i < $id_barangs->count(); $i++) {
                                            $total_debit += \App\Models\Goods::where('id', $id_barangs[$i])->value('harga_jual');
                                        }
                                    } else {
                                        $total_debit = $data->total_harga;
                                    }
                                }else{
                                    $total_debit = 0;
                                }
                                
                            @endphp

                            @if($total_debit != 0)
                            <p>{{number_format($total_debit, 0, ',', '.');}}</p>
                            @else
                            <p></p>
                            @endif
                        </td>
                        <td style="text-align: center; ">
                            @php
                                $total_QRIS = 0;
                                if($data->metode_pembayaran == "QRIS"){
                                    if ($data->kategori_donasi != 'Dana') {
                                    $id_barangs = \App\Models\DetailTransaksi::where('kode_transaksi', $data->kode_transaksi)->pluck('id_barang');
                                        for ($i = 0; $i < $id_barangs->count(); $i++) {
                                            $total_QRIS += \App\Models\Goods::where('id', $id_barangs[$i])->value('harga_jual');
                                        }
                                    } else {
                                        $total_QRIS = $data->total_harga;
                                    }
                                    // $total_QRIS = number_format($total_QRIS, 2, ',', '.');
                                }else{
                                    $total_QRIS = 0;
                                }
                                
                            @endphp

                            @if($total_QRIS != 0)
                            <p>{{number_format($total_QRIS, 0, ',', '.');}}</p>
                            @else
                            <p></p>
                            @endif
                        </td>
                        <td style="text-align: center; ">
                            @php
                                $total_tf = 0;
                                if($data->metode_pembayaran == "Transfer"){
                                    if ($data->kategori_donasi != 'Dana') {
                                    $id_barangs = \App\Models\DetailTransaksi::where('kode_transaksi', $data->kode_transaksi)->pluck('id_barang');
                                        for ($i = 0; $i < $id_barangs->count(); $i++) {
                                            $total_tf += \App\Models\Goods::where('id', $id_barangs[$i])->value('harga_jual');
                                        }
                                    } else {
                                        $total_tf = $data->total_harga;
                                    }
                                    // $total_tf = number_format($total_tf, 2, ',', '.');
                                }else{
                                    $total_tf = 0;
                                }
                                
                            @endphp

                            @if($total_tf != 0)
                            <p>{{number_format($total_tf, 0, ',', '.');}}</p>
                            @else
                            <p></p>
                            @endif
                        </td>
                        <td></td>
                    </tr>
                    @php 
                    $total_nominal_pemasukan += $data->total_harga;
                    $tunai += $total_tunai;
                    $debit += $total_debit;
                    $qris += $total_QRIS;
                    $transfer += $total_tf;
                    @endphp
                @endforeach
                    <tr style="background-color:#ffffff;border-top:#2d4154 0.3px solid;border-bottom:#2d4154 0.3px solid;">
                        <td colspan="4" style="text-align: center; border-left:#2d4154 0.3px solid;"><b>Total</b></td>
                        <td><b>Rp. {{ number_format($tunai, 2, ',', '.') }}</b></td>
                        <td><b>Rp. {{ number_format($debit, 2, ',', '.') }}</b></td>
                        <td><b>Rp. {{ number_format($qris, 2, ',', '.') }}</b></td>
                        <td><b>Rp. {{ number_format($transfer, 2, ',', '.') }}</b></td>
                        <td><b>Rp. {{ number_format($total_nominal_pemasukan, 2, ',', '.') }}</b></td>
                    </tr>
            </tbody>
        </table>
    </main>
    <script type="text/php">
        if (isset($pdf)) {
            $x = 425;
            $y = 550;
            $text = "{PAGE_NUM}";
            $font = null;
            $size = 14;
            $color = array(0,0,0);
            $word_space = 0.0;  //  default
            $char_space = 0.0;  //  default
            $angle = 0.0;   //  default
            $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        }
    </script>

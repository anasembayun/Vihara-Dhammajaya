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
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/app_admin/dashboard/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/app_admin/dashboard/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/app_admin/dashboard/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('images/app_admin/dashboard/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    
    <style>
        .box {
            background-image: repeating-linear-gradient(0deg, #333333, #333333 16px, transparent 16px, transparent 30px, #333333 30px), repeating-linear-gradient(90deg, #333333, #333333 16px, transparent 16px, transparent 30px, #333333 30px), repeating-linear-gradient(180deg, #333333, #333333 16px, transparent 16px, transparent 30px, #333333 30px), repeating-linear-gradient(270deg, #333333, #333333 16px, transparent 16px, transparent 30px, #333333 30px);
            background-size: 2px 100%, 100% 2px, 2px 100% , 100% 2px;
            background-position: 0 0, 0 0, 100% 0, 0 100%;
            background-repeat: no-repeat;
        }

        #dotted
        {
            border:0;
            border-bottom: 1px dotted;
        }
        input{
            text-align: center;
        }
        .rapi{
            margin-top: 10px;
        }
        .jalan{
            font-size: 10px;
        }
        .txt{ 
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="container-xl box">
        <div class="column">
            <img src="{{ asset('images/app_admin/dashboard/atas-bawah.png') }}" class="rounded" style="height: auto; width: 32%">
            <div class="float-end txt" style="width: 50%">
                @php
                    $nama_admin = \App\Models\User::where('id', $data_transaksi->id_admin)->value('name');
                @endphp
                <table style="width:100%">
                    <tr>
                        <td style="width: 20%;">
                            Tanggal
                        </td>
                        <td style="width: 2%">:</td>
                        <td>{{ $data_transaksi->tanggal_transaksi }}</td>
                    </tr>
                    <tr>
                        <td>
                            # Kwitansi
                        </td>
                        <td>:</td>
                        <td>{{ $data_transaksi->kode_transaksi }}</td>
                    </tr>
                    <tr>
                        <td>
                            # Admin
                        </td>
                        <td>:</td>
                        <td>{{ $nama_admin }}</td>
                    </tr>
                    <tr>
                        <td>
                            # ID Umat
                        </td>
                        <td>:</td>
                        <td>{{ $data_transaksi->id_jamaat}}</td>
                    </tr>
                </table>
            </div>
            <div class="rapi jalan">
                <p style="text-align: left; width: 40%;"><i>Jl. Bulu Jaya V no.19; Surabaya - 60216; Kel. Lontar - Kec. Sambikerep; Telp 031 - 7349600 / WA : 083 84 555 2000</i></p>
            </div>
        </div>
        <div class="rapi txt">
            <h1 class="d-inline" style="font-size: 20px;">Penghargaan Dana </h1>    
            <i class="d-inline">diberikan kepada Bp / Ibu / Sdr / i :</i>    
        </div>
        <div class="rapi txt">
            <input type="text" id="dotted" style="width:100%;" value="{{ $data_transaksi->nama }}">
        </div>
        <div class="rapi txt">
            <table style="width:100%"> 
                <tr>
                    <td style="width:8%">
                        <p style="margin:0px;">Alamat :</p>
                    </td>
                    <td>
                        <p id="dotted" style="width:100%; margin:0px;">{{ $data_transaksi->alamat }}</p>
                    </td>
                </tr>
            </table>
        </div>
        <div class="rapi txt">
            <table style="width:100%"> 
                <tr>
                    <td style="width: 15%">
                        Atas donasi Rp. <b>{{ number_format($data_transaksi->total_harga,2,',','.') }}</b>
                    </td>
                </tr>
            </table>
        </div>
        <div class="rapi txt">
            @php
                $nama_kegiatan_donasi = \App\Models\Donasi::where('id', $data_transaksi->id_kegiatan_donasi)->value('nama_kegiatan_donasi');
            @endphp
            <p>Untuk donasi: {{ $nama_kegiatan_donasi }}</p>
        </div>
        <div class="rapi txt" style="border-bottom: 1px solid;">
            <table style="width: 100%;">
                <tr>
                    <td rowspan="2" style="width:80%;height:20mm;background:white; text-align:left; vertical-align:bottom; padding:1px;">
                        {{ $random_pesan_baik->pesan_baik }}
                    </td>
                    <td rowspan="2" style="width: 5%"></td>
                </tr>
                <tr>
                    <td><img src="{{ asset('images/qrcode_terima_kasih.png') }}" alt="" style="height: 75px; width: 75px; margin-left: 50px;"></td>
                </tr>
                <br>
            </table>
        </div>
        <div class="rapi txt">
            <p style="text-align: center;"><i>Semoga dengan perbuatan baik yang telah dilakukan, berbuah sesuai dengan yang diharapkan</i></p>
        </div>
    </div>
</body>
<script>
    window.print();

    if (document.referrer == "{{ url('kelola-transaksi/daftar-transaksi') }}") {
        window.onafterprint = window.close;
    }
    else if (document.referrer == "{{ url('kelola-transaksi/tambah-transaksi-uang') }}") {
        window.onafterprint = backToAddTransactionMoney;
    }
    else if (document.referrer == "{{ url('kelola-transaksi/tambah-transaksi-barang') }}") {
        window.onafterprint = backToAddTransactionPacket;
    }

    function backToAddTransactionMoney() {
        window.location.replace("{{ url('kelola-transaksi/tambah-transaksi-uang') }}");
    }

    function backToAddTransactionPacket() {
        window.location.replace("{{ url('kelola-transaksi/tambah-transaksi-barang') }}");
    }
</script>
</html>
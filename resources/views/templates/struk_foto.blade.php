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
        <table>
            <tr>
                <td style="width: 30%">
                    <img src="{{ public_path('images/app_admin/dashboard/atas-bawah.png') }}" class="rounded" style="height: 10%;">
                </td>
                <td rowspan="2" style="width: 15%; padding-left: 10px">
                    <img src="{{ public_path('images/qrcode_terima_kasih.png') }}" alt="" style="height: 75px; width: 75px;">
                </td>
                <td rowspan="2" style="width: 50%">
                    @php
                        $nama_admin = \App\Models\User::where('id', $data_transaksi->id_admin)->value('name');
                    @endphp
                    <p class="txt">
                        Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $data_transaksi->tanggal_transaksi }}
                        <br>
                        #Kwitansi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $data_transaksi->kode_transaksi }}
                        <br>
                        @if ($data_transaksi->id_pemesan != null)
                            #ID Umat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $data_transaksi->id_pemesan }}
                        @else
                        #Nama Umat &nbsp; : {{ $data_transaksi->nama_pemesan }}
                        @endif
                        <br>
                        #Admin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $nama_admin}}
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="jalan" style="text-align: left;"><i>Jl. Bulu Jaya V no.19; Surabaya - 60216; Kel. Lontar - Kec. Sambikerep; Telp 031 - 7349600 / WA : 083 84 555 2000</i></p>   
                </td>
            </tr>
        </table>
        {{-- <div class="column">
            <div class="float-start" style="width: 30%">
                <img src="{{ public_path('images/app_admin/dashboard/atas-bawah.png') }}" class="rounded" style="height: 10%;">
                <p class="jalan" style="text-align: left;"><i>Jl. Bulu Jaya V no.19; Surabaya - 60216; Kel. Lontar - Kec. Sambikerep; Telp 031 - 7349600 / WA : 083 84 555 2000</i></p>
            </div>
            <div class="float-end txt" style="width: 50%">
                @php
                    $nama_admin = \App\Models\User::where('id', $data_transaksi->id_admin)->value('name');
                @endphp
                <p>
                    Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $data_transaksi->tanggal_transaksi }}
                    <br>
                    #Kwitansi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $data_transaksi->kode_transaksi }}
                    <br>
                    @if ($data_transaksi->id_pemesan != null)
                        #ID Umat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $data_transaksi->id_pemesan }}
                    @else
                    #Nama Umat &nbsp; : {{ $data_transaksi->nama_pemesan }}
                    @endif
                    <br>
                    #Admin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $nama_admin}}
                </p>
            </div>
            <div class="float-end" style="width: 10%">
                <img src="{{ public_path('images/qrcode_terima_kasih.png') }}" alt="" style="height: 50px; width: 50px; margin-left: 50px;">
            </div>
        </div> --}}
        <div class="txt" style="margin-top: -15px">
            <h1 class="d-inline">Penghargaan Dana </h1>    
            <i class="d-inline">diberikan kepada Bp / Ibu / Sdr / i :</i>    
        </div>
        <div class="rapi txt">
            @if ($data_transaksi->id_pemesan != null)
                @php
                    $nama_pemesan = \App\Models\UserJamaat::where('id_code', $data_transaksi->id_pemesan)->value('name');
                @endphp
                <input type="text" id="dotted" style="width:100%;" value="{{ $nama_pemesan }}">
            @else
                <input type="text" id="dotted" style="width:100%;" value="{{ $data_transaksi->nama_pemesan }}">
            @endif
        </div>
        <div class="rapi txt">
            <table style="width:100%"> 
                <tr>
                    <td style="width:7%">
                        <p style="margin:0px;">Alamat : </p>
                    </td>
                    <td>
                        <p id="dotted" style="width:100%; margin:0px;">{{ $data_transaksi->alamat_pemesan }}</p>
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
            <p>Untuk donasi penitipan foto leluhur, dengan perincian sebagai berikut :</p>
        </div>
        <div class="txt" style="margin-top: -10px">
            <table style="border-collapse: collapse; width: 100%;">
                @if ($data_transaksi->id_pemesan != null)
                    <tr>
                        <th style="border: 1px solid #dddddd; text-align: left; padding: 8px; width: 15%;">
                            Nomor Foto
                        </th>
                        <th style="border: 1px solid #dddddd; text-align: left; padding: 8px; width: 25%;">
                            Nama Mendiang
                        </th>
                        <th style="border: 1px solid #dddddd; text-align: left; padding: 8px; width: 15%;">
                            Jumlah Bulan
                        </th>
                        <th style="border: 1px solid #dddddd; text-align: left; padding: 8px; width: 25%;">
                            Pembayaran sampai bulan
                        </th>
                        <th style="border: 1px solid #dddddd; text-align: left; padding: 8px; width: 20%;">
                            Total
                        </th>
                    </tr>
                    @php
                        $no = 0;
                        $_detail_transaksi = \App\Models\DetailTransaksiFoto::where('kode_transaksi', $data_transaksi->kode_transaksi)->get();
                    @endphp
                    @for ($i = 0; $i < 5; $i++)
                        @if ($i < count($_detail_transaksi))
                            <tr>
                                <td style="border: 1px solid #dddddd; text-align: left; padding: 3px 1px 3px 8px;">
                                    {{ ++$no; }}
                                </td>
                                <td style="border: 1px solid #dddddd; text-align: left; padding: 3px 1px 3px 8px;">
                                    @php
                                        $nama_leluhur = \App\Models\Leluhur::where('id', $_detail_transaksi[$i]->id_leluhur)->value('nama_mendiang');
                                    @endphp
                                    {{ $nama_leluhur }}
                                </td>
                                <td style="border: 1px solid #dddddd; text-align: left; padding: 3px 1px 3px 8px;">
                                    {{ $_detail_transaksi[$i]->total_periode; }}
                                </td>
                                <td style="border: 1px solid #dddddd; text-align: left; padding: 3px 1px 3px 8px;">
                                    {{ $_detail_transaksi[$i]->bayar_sampai_bulan; }}
                                </td>
                                <td style="border: 1px solid #dddddd; text-align: left; padding: 3px 1px 3px 8px;">
                                    Rp. {{ number_format($_detail_transaksi[$i]->total_harga,2,',','.') }}
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td style="border: 1px solid #dddddd; text-align: left; padding: 3px 1px 3px 8px;">
                                    {{ ++$no; }}
                                </td>
                                <td style="border: 1px solid #dddddd; text-align: left; padding: 3px 1px 3px 8px;">

                                </td>
                                <td style="border: 1px solid #dddddd; text-align: left; padding: 3px 1px 3px 8px;">
                                
                                </td>
                                <td style="border: 1px solid #dddddd; text-align: left; padding: 3px 1px 3px 8px;">
                                
                                </td>
                                <td style="border: 1px solid #dddddd; text-align: left; padding: 3px 1px 3px 8px;">
                                
                                </td>
                            </tr>
                        @endif
                    @endfor
                @else
                    <tr>
                        <th style="border: 1px solid #dddddd; text-align: left; padding: 8px; width: 15%;">
                            Nomor Foto
                        </th>
                        <th style="border: 1px solid #dddddd; text-align: left; padding: 8px; width: 25%;">
                            Nama Mendiang
                        </th>
                        <th style="border: 1px solid #dddddd; text-align: left; padding: 8px; width: 20%;">
                            Sub Total
                        </th>
                    </tr>
                    @php
                        $no = 0;
                        $_detail_transaksi = \App\Models\DetailTransaksiFotoUnreg::where('kode_transaksi', $data_transaksi->kode_transaksi)->get();
                    @endphp
                    @for ($i = 0; $i < 5; $i++)
                        @if ($i < count($_detail_transaksi))
                            <tr>
                                <td style="border: 1px solid #dddddd; text-align: left; padding: 3px 1px 3px 8px;">
                                    {{ ++$no; }}
                                </td>
                                <td style="border: 1px solid #dddddd; text-align: left; padding: 3px 1px 3px 8px;">
                                    {{ $_detail_transaksi[$i]->nama_leluhur }}
                                </td>
                                <td style="border: 1px solid #dddddd; text-align: left; padding: 3px 1px 3px 8px;">
                                    Rp. {{ number_format($_detail_transaksi[$i]->total_harga,2,',','.') }}
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td style="border: 1px solid #dddddd; text-align: left; padding: 3px 1px 3px 8px;">
                                    {{ ++$no; }}
                                </td>
                                <td style="border: 1px solid #dddddd; text-align: left; padding: 3px 1px 3px 8px;">

                                </td>
                                <td style="border: 1px solid #dddddd; text-align: left; padding: 3px 1px 3px 8px;">
                                
                                </td>
                            </tr>
                        @endif
                    @endfor
                @endif
                
                {{-- @foreach ($_detail_transaksi as $item)
                @endforeach --}}
            </table>
        </div>
        <div class="txt">
            <p style="text-align: center;"><i>Semoga dengan perbuatan baik yang telah dilakukan, berbuah sesuai dengan yang diharapkan</i></p>
        </div>
    </div>
</body>
</html>
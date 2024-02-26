<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 14px;
        }

        td,
        th {
            border: 0.1px solid #a6a6a6;
            text-align: left;
            padding: 2px;
            border-left: 0.1px solid black;
            border-right: 0.1px solid black;
        }

        .right {
            text-align: right;
        }

        .center {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            margin-top: 20px;
            margin-bottom: 10px;
            /* width: 50%; */
        }

        .mrgntop {
            margin-top: -15px;
        }

        .jalan {
            font-size: 10px;
        }

        .logo {
            margin-left: auto;
            margin-right: 100px;
        }

        .tab {
            display: inline-block;
            margin-left: 17%;
        }

        .total {
            font-size: 15px;
        }

        /* tr:nth-child(even) {
            background-color: #dddddd;
        } */
    </style>
</head>

<body>
    <input type="month" value="0" id="tahun_bulan" hidden>

    <div class="center">
        <div class="logo" style="width: 13%; margin-left : 50px; margin-right:auto;">
            <img src="{{ public_path('images/app_admin/dashboard/atas-bawah.png') }}" class="rounded" style="height: 4%;">
        </div>
        <h3 style="margin-top:-45px;">Laporan Saldo </h3>
        <h6 id="periode" class="mrgntop"> {{ $date }}</h6>
    </div>

    <div class="center" style="margin-top:-5%">
        <p class="jalan"><i>Jl. Bulu Jaya V no.19; Surabaya - 60216; Kel. Lontar - Kec.
                Sambikerep <br> Telp 031 - 7349600 / WA : 083 84 555 2000</i></p>
    </div>

    <div class="card-body">
        <div class="">
            <table class="table table-bordered">
                <thead>
                    {{-- <tr>
                        <th style="Background-Color:#cf8c40; width:33%; text-align:center;"> Keterangan</th>
                        <th style="Background-Color:#cf8c40; width:33%; text-align:center;">Total</th>
                        <th style="Background-Color:#cf8c40; width:33%; text-align:center;">Jumlah</th>
                    </tr> --}}
                </thead>
                <tbody>
                    <tr>
                        <th colspan="6"
                            style="border-top: 1px solid black; border-bottom: 0.1px solid black; color: red; font-size:20px;">
                            Pendapatan
                        </th>
                    </tr>
                    {{-- ---------- Transaksi Dana ----------- --}}
                    <tr>
                        <td style="width:25%">
                            <b>Transaksi Dana</b>
                        </td>
                        <td style="width:15%"></td>
                        <td style="width:15%"></td>
                        <td style="width:15%"></td>
                        <td style="width:15%"></td>
                        <td style="width:25%"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="border-bottom: 1pt solid black;"> <b> Tunai </b></td>
                        <td style="border-bottom: 1pt solid black;"> <b> Transfer </b></td>
                        <td style="border-bottom: 1pt solid black;"> <b> QRIS </b></td>
                        <td style="border-bottom: 1pt solid black;"> <b> Debit </b> </td>
                        <td style="border-bottom: 1pt solid black;"><b>Total Transaksi Dana</b></td>
                    </tr>
                    @foreach ($kegiatan_dana as $item)
                        <tr> 
                            <td> {{ $item->nama_kegiatan_donasi }} </td>
                            <td> {{ number_format($item->transaksi_dana_tunai,0,',','.') }} </td>
                            <td> {{ number_format($item->transaksi_dana_transfer,0,',','.') }}</td>
                            <td> {{ number_format($item->transaksi_dana_QRIS,0,',','.') }}</td>
                            <td> {{ number_format($item->transaksi_dana_debit,0,',','.') }}</td>
                            <td>{{ number_format($item->total_transaksi_dn,0,',','.') }}</td>
                        </tr>
                    @endforeach
                    {{-- <tr>
                        <td></td>
                        <td id="transaksi_dana_tunai" class="right">{{ $transaksi_dana_tunai }}</td>
                        <td id="transaksi_dana_transfer" class="right">{{ $transaksi_dana_transfer }}</td>
                        <td id="transaksi_dana_QRIS" class="right">{{ $transaksi_dana_QRIS }}</td>
                        <td id="transaksi_dana_debit" class="right">{{ $transaksi_dana_debit }}</td>
                        <td id="total_transaksi_dana" class="right">{{ $total_transaksi_dana }}</td>
                    </tr> --}}

                    <tr>
                        <td style="height:2%"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    {{-- ---------- Transaksi Paket ----------- --}}
                    <tr>
                        <td>
                            <b>Transaksi Paket</b>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="border-bottom: 1pt solid black;"> <b> Tunai </b></td>
                        <td style="border-bottom: 1pt solid black;"> <b> Transfer </b></td>
                        <td style="border-bottom: 1pt solid black;"> <b> QRIS </b></td>
                        <td style="border-bottom: 1pt solid black;"> <b> Debit </b> </td>
                        <td style="border-bottom: 1pt solid black;"><b>Total Transaksi Paket</b></td>
                    </tr>
                    @foreach ($kegiatan_paket as $item)
                    <tr> 
                        <td> {{ $item->nama_kegiatan_donasi }} </td>
                        <td> {{ number_format($item->transaksi_paket_tunai,0,',','.') }} </td>
                        <td> {{ number_format($item->transaksi_paket_transfer,0,',','.') }}</td>
                        <td> {{ number_format($item->transaksi_paket_QRIS,0,',','.') }}</td>
                        <td> {{ number_format($item->transaksi_paket_debit,0,',','.') }}</td>
                        <td>{{ number_format($item->total_transaksi_pkt,0,',','.') }}</td>
                    </tr>
                    @endforeach
                    {{-- <tr>
                        <td></td>
                        <td id="transaksi_paket_tunai" class="right">{{ $transaksi_paket_tunai }}</td>
                        <td id="transaksi_paket_transfer" class="right">{{ $transaksi_paket_transfer }}</td>
                        <td id="transaksi_paket_QRIS" class="right">{{ $transaksi_paket_QRIS }}</td>
                        <td id="transaksi_paket_debit" class="right">{{ $transaksi_paket_debit }}</td>
                        <td id="total_transaksi_paket" class="right">{{ $total_transaksi_paket }}</td>
                    </tr> --}}

                    <tr>
                        <td style="height:2%"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>
                            <b>Transaksi Samanagara</b>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="border-bottom: 1pt solid black;"> <b> Tunai </b></td>
                        <td style="border-bottom: 1pt solid black;"> <b> Transfer </b></td>
                        <td style="border-bottom: 1pt solid black;"> <b> QRIS </b></td>
                        <td style="border-bottom: 1pt solid black;"> <b> Debit </b> </td>
                        <td style="border-bottom: 1pt solid black;"><b>Total Transaksi Samanagara</b></td>
                    </tr>
                    <tr>
                        <td>Umat yang Terdaftar</td>
                        <td class="right">{{ $transaksi_foto_tunai }}</td>
                        <td class="right">{{ $transaksi_foto_transfer }}</td>
                        <td class="right">{{ $transaksi_foto_QRIS }}</td>
                        <td class="right">{{ $transaksi_foto_debit }}</td>
                        <td class="right">{{ $total_transaksi_foto }}</td>
                    </tr>
                    <tr>
                        <td>Umat yang tidak Terdaftar</td>
                        <td class="right">{{ $transaksi_foto_unreg_tunai }}</td>
                        <td class="right">{{ $transaksi_foto_unreg_transfer }}</td>
                        <td class="right">{{ $transaksi_foto_unreg_QRIS }}</td>
                        <td class="right">{{ $transaksi_foto_unreg_debit }}</td>
                        <td class="right">{{ $total_transaksi_foto_unreg }}</td>
                    </tr>

                    <tr>
                        <td style="height:2%"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>
                            <b>Kas Masuk</b>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="border-bottom: 1pt solid black;"> <b> Tunai </b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        {{-- <td style="border-bottom: 1pt solid black;"> <b> Transfer </b></td>
                        <td style="border-bottom: 1pt solid black;"> <b> QRIS </b></td>
                        <td style="border-bottom: 1pt solid black;"> <b> Debit </b> </td> --}}
                        <td style="border-bottom: 1pt solid black;"><b>Total Kas Masuk</b></td>
                    </tr>

                    <tr>
                        <td>Dana dari Yayasan</td>
                        <td class="right">{{ $km_1 }}</td>
                        <td id="km_1" class="right">
                        </td>
                        <td class="right"></td>
                        <td class="right"></td>
                        <td id="total_km_1" class="right">{{ $km_1 }}</td>
                    </tr>
                    <tr>
                        <td>Dana Paramita Umum</td>
                        <td class="right">{{ $km_2 }}</td>
                        <td id="km_2" class="right"></td>
                        <td class="right"></td>
                        <td class="right"></td>
                        <td id="total_km_2" class="right">{{ $km_2 }}</td>
                    </tr>
                    <tr>
                        <td>Dana Paramita Anak-Anak</td>
                        <td class="right">{{ $km_3 }}</td>
                        <td id="km_3" class="right"></td>
                        <td class="right"></td>
                        <td class="right"></td>
                        <td id="total_km_3" class="right">{{ $km_3 }}</td>
                    </tr>
                    <tr>
                        <td>Dana Paramita Remaja</td>
                        <td class="right">{{ $km_4 }}</td>
                        <td id="km_4" class="right"></td>
                        <td class="right"></td>
                        <td class="right"></td>
                        <td id="total_km_4" class="right">{{ $km_4 }}</td>
                    </tr>
                    <tr>
                        <td>Dana Muda Mudi</td>
                        <td class="right">{{ $km_5 }}</td>
                        <td id="km_5" class="right"></td>
                        <td class="right"></td>
                        <td class="right"></td>
                        <td id="total_km_5" class="right">{{ $km_5 }}</td>
                    </tr>

                    <tr>
                        <td style="height:2%"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr class="total">
                        <td><b>Total Pendapatan Tunai</b></td>
                        <th class="right">{{ $total_pendapatan_kas }}</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th class="right" id="total-pendapatan">
                            {{ $total_pendapatan }}</th>

                    </tr>
                    <tr>
                        <td style="height:2%"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th colspan="6"
                            style="border-top: 1px solid black; border-bottom: 0.1px solid black; color: red; font-size:20px;">
                            Pengeluaran</th>
                        {{-- <td></td>
                        <td></td> --}}
                    </tr>

                    <tr>
                        <td>
                            <b>Kas Kas Keluar</b>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="border-bottom: 1pt solid black;"> <b> Tunai </b></td>
                        <td style="border-bottom: 1pt solid black;"> <b> Transfer </b></td>
                        <td></td>
                        <td></td>
                        {{-- <td style="border-bottom: 1pt solid black;"> <b> Transfer </b></td>
                        <td style="border-bottom: 1pt solid black;"> <b> QRIS </b></td>
                        <td style="border-bottom: 1pt solid black;"> <b> Debit </b> </td> --}}
                        <td style="border-bottom: 1pt solid black;"><b>Total Kas Keluar</b></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="right">{{ $total_pengeluaranTu }}</td>
                        <td class="right">{{ $total_pengeluaranTf }}</td>
                        <td class="right" id="kas-keluar"></td>
                        <td></td>
                        <td class="right" id="total-kas-keluar"> {{ $total_kas_keluar }}</td>
                    </tr>
                    <tr>
                        <td style="height:2%"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="total">
                        <td><b>Total Pengeluaran Tunai</b></td>
                        <th class="right" id="total-pengeluaran">
                            {{ $total_pengeluaranTu }} </th>
                        <td></td>
                        <td></td>
                        <td><b>Total Pengeluaran</b></td>
                        <td>{{$total_pengeluaran}}</td>

                    </tr>

                    <tr>
                        <td style="height:2%"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr class="total">
                        <td><b>Saldo Kas Tunai</b></td>
                        <th class="right" id="laba-bersih">
                            {{$saldo_tunai}} 
                        </th>
                        <td></td>
                        <td></td>
                        <td>Total Saldo</td>
                        <td>{{ $laba_bersih }}</td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>

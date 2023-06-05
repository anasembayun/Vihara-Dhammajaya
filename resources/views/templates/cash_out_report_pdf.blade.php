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
            top: -80px;
            left: 0px;
            right: 0px;
            height: 50px;
        }
    </style>
</head>

<body>
    <header>
        <h3 style="text-align:center;">
            Laporan Kas Keluar
            <br>
            Periode {{ $date_awal }} - {{ $date_akhir }}
            <br>
            {{ Auth::guard('admin')->user()->name }}
        </h3>
    </header>
    <main>
        <table style="width:100%;">
            <thead>
                <tr style="background-color:#2d4154;color:#fafffe;">
                    <th style="width: 5%;text-align:center; border-right: 0.5px solid;">No.</th>
                    <th style="width: 28%; padding-left: 10px;">Nomor Kas Keluar</th>
                    <th style="width: 10%;">Tanggal</th>
                    <th style="width: 15%;">Nama Penerima</th>
                    <th style="width: 22%;">Untuk Keperluan</th>
                    <th style="width: 20%;">Nominal</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 0;
                    $total_nominal_pengeluaran = 0;
                @endphp
                @foreach ($data_kas_keluar as $data)
                    <tr style="background-color:#f3f3f3;">
                        <td style="text-align: center; border-right: 0.5px solid;">{{ ++$no }}</td>
                        <td style="padding-left: 10px;">{{ $data->nomor_kas_keluar }}</td>
                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ $data->penerima }}</td>
                        <td style="padding-right: 20px;">{{ $data->keterangan_keperluan }}</td>
                        <td>Rp. {{ number_format($data->nominal_pengeluaran, 2, ',', '.') }}</td>
                        @php $total_nominal_pengeluaran += $data->nominal_pengeluaran; @endphp
                    </tr>
                @endforeach
                <tr style="background-color:#ffffff;">
                    <td colspan="4" style="padding-top: 10px;"></td>
                    <td style="text-align: right; padding-right: 15px; padding-top: 10px;"><b>Total</b></td>
                    <td style="padding-top: 10px;"><b>Rp.{{ number_format($total_nominal_pengeluaran, 2, ',', '.') }}</b></td>
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

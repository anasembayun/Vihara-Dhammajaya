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
        .txt{ 
            font-size: 14px;
        }
        .txt{ 
            font-size: 14px;
        }
        .txt-list{ 
            font-size: 14px;
            height: 10px;
        }
        td {
            padding: -20px;
        }
    </style>
</head>
<body>
<div class="container-xl">
        <table style="width:100%;">
            <tr>
                <td style="width: 60%; text-align:left;">
                    <strong>Bukti Kas Masuk</strong>
                </td>
                <td style="width: 5%; text-align: left; vertical-align:top;" class="txt">Tanggal</td>
                <td style="width: 35%; text-align: left; vertical-align:top;" class="txt">
                    : {{ \Carbon\Carbon::createFromFormat('Y-m-d', $data_kas_masuk->tanggal)->format('d-m-Y') }}
                </td>
            </tr>
            <tr>
                <td style="text-align:left;">
                    <strong>Vihara Dhamma Jaya</strong>
                </td>
                <td style="text-align: left; vertical-align:top;" class="txt">Admin</td>
                <td style="text-align: left; vertical-align:top;" class="txt">: {{ $data_kas_masuk->nama_admin }}</td>
            </tr>
            <tr>
                <td rowspan="2" style="text-align:left; vertical-align:top;">
                    <strong>Surabaya</strong>
                </td>        
                <td style="text-align: left; vertical-align:top;" class="txt">Nomer</td>
                <td colspan="2" style="text-align: left; vertical-align:top; justify-content:flex-start" class="txt">
                    : {{ $data_kas_masuk->nomor_kas_masuk }}
                </td>
            </tr>
            <tr>
                <td style="text-align: left; vertical-align:top;" class="txt">Kepada</td>
                <td style="text-align: left; vertical-align:top;" class="txt">: -</td>
            </tr>
        </table>
        <br>
        <table style="width: 100%;" >
            <tr class="txt-list">
                <td style="width: 10%; text-align:center;border: solid 1px #333333">No.</td>
                <td colspan="2" style="width: 65%; text-align:center;border: solid 1px #333333">Uraian</td>
                <td style="width: 20%; text-align:center;border: solid 1px #333333">Jumlah</td>
            </tr>
            <tr class="txt-list">
                <td style="text-align:center;border: solid 1px #333333">1</td>
                <td colspan="2" style="text-align:center;border: solid 1px #333333">{{ $data_kas_masuk->keterangan_keperluan }}</td>
                <td style="text-align:center;border: solid 1px #333333">Rp. {{ number_format($data_kas_masuk->nominal_pemasukan,2,',','.') }}</td>
            </tr>
            <tr class="txt-list">
                <td style="text-align:center;border: solid 1px #333333">2</td>
                <td colspan="2" style="text-align:center;border: solid 1px #333333"></td>
                <td style="text-align:center;border: solid 1px #333333"></td>
            </tr>
            <tr class="txt-list">
                <td style="text-align:center;border: solid 1px #333333">3</td>
                <td colspan="2" style="text-align:center;border: solid 1px #333333"></td>
                <td style="text-align:center;border: solid 1px #333333"></td>
            </tr>
            <tr class="txt-list">
                <td style="text-align:center;border: solid 1px #333333">4</td>
                <td colspan="2" style="text-align:center;border: solid 1px #333333"></td>
                <td style="text-align:center;border: solid 1px #333333"></td>
            </tr>
            <tr class="txt-list">
                <td style="text-align:center;border: solid 1px #333333">5</td>
                <td colspan="2" style="text-align:center;border: solid 1px #333333"></td>
                <td style="text-align:center;border: solid 1px #333333"></td>
            </tr>
            {{-- <tr style="height: 27px;">
                <td style="text-align:center;border: solid 1px #333333">6</td>
                <td colspan="2" style="text-align:center;border: solid 1px #333333"></td>
                <td style="text-align:center;border: solid 1px #333333"></td>
            </tr>
            <tr style="height: 27px;">
                <td style="text-align:center;border: solid 1px #333333">7</td>
                <td colspan="2" style="text-align:center;border: solid 1px #333333"></td>
                <td style="text-align:center;border: solid 1px #333333"></td>
            </tr>
            <tr style="height: 27px;">
                <td style="text-align:center;border: solid 1px #333333">8</td>
                <td colspan="2" style="text-align:center;border: solid 1px #333333"></td>
                <td style="text-align:center;border: solid 1px #333333"></td>
            </tr>
            <tr style="height: 27px;">
                <td style="text-align:center;border: solid 1px #333333">9</td>
                <td colspan="2" style="text-align:center;border: solid 1px #333333"></td>
                <td style="text-align:center;border: solid 1px #333333"></td>
            </tr> --}}
            <tr class="txt-list">
                <td colspan="2" style="text-align:left;border: solid 1px #333333">Terbilang</td>
                <td style="width: 10%; text-align:right;border: solid 1px #333333">Total : &nbsp;</td>
                <td style="text-align:center;border: solid 1px #333333">Rp. {{ number_format($data_kas_masuk->nominal_pemasukan,2,',','.') }}</td>
            </tr>
        </table>
        <br>
        <table style="width: 100%;">
            <tr>
                <td colspan="4">Keterangan : </td>
            </tr>
            <tr style="text-align: center">
                <td rowspan="2" style="border: 1px solid #111111;width: 40%;"></td>
                <td style=" border: 1px solid #111111;width: 20%;">Mengetahui</td>
                <td style=" border: 1px solid #111111;width: 20%;">Kasir</td>
                <td style=" border: 1px solid #111111;width: 20%;">Penerima</td>
            </tr>
            <tr style="text-align: center; height: 80px;">
                <td style=" border: 1px solid #111111;"></td>
                <td style=" border: 1px solid #111111;"></td>
                <td style=" border: 1px solid #111111;"></td>
            </tr>
        </table>
    </div>
</body>
<script>
    window.print();

    window.onafterprint = window.close;
    // if (document.referrer == "{{ url('kas/laporan-kas-masuk') }}") {
    // }
    // else if (document.referrer == "{{ url('kas/kas-masuk') }}") {
    //     window.onafterprint = back;
    // }

    function back() {
        window.location.replace("{{ url('kas/kas-masuk') }}");
    }
</script>
</html>
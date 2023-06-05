<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <title>Vihara Dhammajaya</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SWEET ALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
    <script src="sweetalert2/dist/sweetalert2.min.js"></script>

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- favico -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/app_admin/dashboard/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/app_admin/dashboard/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/app_admin/dashboard/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/app_admin/dashboard/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('images/app_admin/dashboard/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    
    <!-- w3school -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>

    <!-- data table -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/fixedcolumns/4.1.0/js/dataTables.fixedColumns.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>

    <!-- css -->
    <link rel="stylesheet" href="aset/style.css">

</head>
<body>
    <div class="d-flex justify-content-start" style="width:210mm; height:297mm; padding:10px; text-align:center; border: 8px solid #a3752a;background-color:#f5ebec ;">
        <div style="width:198mm; height:285mm; padding:20px; text-align:center; border: 3px solid #a3752a">
            <div class="row d-flex justify-content-start">
                <p style="font-size:25px; font-weight:bold; font-family: sans-serif; letter-spacing: 0px; line-height: 1px; padding-top:30px ;">SERTIFIKAT WISUDA</p>
                <p style="font-size:25px; font-weight:bold;font-family: sans-serif;">UPÂSAKA / UPÂSIKÂ</p>
                <p style="font-size:18px; font-weight:bold; color: red;font-family: sans-serif;font-size: 15px;">No. {{$jamaat->no_sertifikat}}</p>
                <p style="font-size:16px; font-weight:bold;font-family: sans-serif;">NAMO TASSA BHAGAVATO ARAHATO SAMMASAMBUDDHASSA</p>
                <span style="font-size:14px; font-weight:bold;font-family: sans-serif;">BUDDHAM SARANAM GACCHAMI</span><br>
                <span style="font-size:14px; font-weight:bold;font-family: sans-serif;">DHAMMAM SARANAM GACCHAMI</span><br>
                <span style="font-size:14px; font-weight:bold;font-family: sans-serif;">SANGHAM SARANAM GACCHAMI</span><br>
                <span style="font-size:14px; font-weight:bold;font-family: sans-serif;">PANATIPATA VERAMANI SIKKHAPADAM SAMADIYAMI</span><br>
                <span style="font-size:14px; font-weight:bold;font-family: sans-serif;">ADINNADANA VERAMANI SIKKHAPADAM SAMADIYAMI</span><br>
                <span style="font-size:14px; font-weight:bold;font-family: sans-serif;">KAMESU MICCHACARA VERAMANI SIKKHAPADAM SAMADIYAMI</span><br>
                <span style="font-size:14px; font-weight:bold;font-family: sans-serif;">MUSAVADA VERAMANI SIKKHAPADAM SAMADIYAMI</span><br>
                <span style="font-size:14px; font-weight:bold;font-family: sans-serif;">SURA-MERAYA-MAJJA-PAMADATTHANA VERAMANI SIKKHAPADAM SAMADIYAMI</span><br>
                <br>
                <span style="font-size:20px; font-weight:bold;font-family: sans-serif;color: #f69849;">S A N G H A T H E R A V Â D A  I N D O N E S I A</span> <br>
                <span style="font-size:16px; font-family: sans-serif;font-size: 15px;">Dengan ini menerangkan bahwa :</span> <br>

                <div class="row d-flex justify-content-center mt-3" style="padding:0px">
                    <table class="col-lg-2" style="width: 90%; height: fit-content; padding-left:30px; padding-right:30px;">
                        <tr>
                            <td rowspan="5" style="width:28mm;height:30mm;background:white;border-style:solid; border-width: 1px;" class="box1"></td>
                            <td style="width: 5%;"></td>
                            <td style="text-align:left; width: 40%;">Nama</td>
                            <td style="text-align:left;">: {{$jamaat->name}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align:left;">Tempat/Tanggal Lahir</td>
                            @php
                                $_tanggal_lahir = \Carbon\Carbon::parse($jamaat->tanggal_lahir)->locale('id');
                                $_tanggal_lahir->settings(['formatFunction' => 'translatedFormat']);
                            @endphp
                            <td style="text-align:left;">: {{ $jamaat->tempat_lahir }}, {{ $_tanggal_lahir->format('j F Y') }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align:left; vertical-align: top;">Alamat</td>
                            <td style="text-align:left;">: {{$jamaat->alamat}}, RT/RW {{$jamaat->rt_rw}}, {{$jamaat->kelurahan_kecamatan}}, {{$jamaat->kabupaten_kota}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align:left;">Telah di Wisuda sebagai Upâsikâ di :</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align:left;">Tempat</td>
                            <td style="text-align:left;">: {{$jamaat->tempat_wisuda}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td style="text-align:left;">Tanggal</td>
                            @php
                                $_tanggal_wisuda = \Carbon\Carbon::parse($jamaat->tanggal_wisuda)->locale('id');
                                $_tanggal_wisuda->settings(['formatFunction' => 'translatedFormat']);
                            @endphp
                            <td style="text-align:left;">: {{ $_tanggal_wisuda->format('l, j F Y') }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td style="text-align:left;">Nama Buddhis</td>
                            <td style="text-align:left;">: <b>{{$jamaat->nama_baptis}}</b></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="text-align:left;"><b>( {{$jamaat->arti_nama_baptis}} )</b></td>
                        </tr>
                    </table>
                </div>
                <p style="font-size:16px;font-family: sans-serif;">Sebagai seorang Upâsikâ selayaknya ia senantiasa melaksanakan <i><b>Dhamma</b></i> dengan penuh bakti dan tanggung jawab.</p>
                <p style="font-size:16px;font-family: sans-serif;">Sertifikat ini berlaku selama yang bersangkutan tetap berlindung pada Buddha, Dhamma dan Saõgha.</p>
                <p style="font-size:16px;font-family: sans-serif;">Semoga <i><b>Sang Tiratana</b></i> selalu melindungi kita semua</p>
                <p style="font-size:16px;font-weight:bold;font-family: sans-serif;">Surabaya, {{ $_tanggal_wisuda->format('j F Y') }}</p>
                <br>
                <div class="row d-flex justify-content-center mt-3" style="padding:0px">
                    <table class="col-lg-2" style="width: 100%; height: fit-content;">
                        <tr>
                            <td rowspan="3" style="text-align:center; vertical-align: top; width: 50%;"><b>Yang Memberi Wisuda</b></td>
                            <td style="text-align:center; width: 50%;"><b>Majelis Agama Buddha Theravada</b></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"><b>Indonesia</b></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"><b>Kota Surabaya</b></td>
                        </tr>
                        <br>
                        <br>
                        <br>
                        <br>
                        <tr>
                            <td style="text-align:center;text-decoration:overline;"><b>{{$jamaat->bhikhu_pemberi_wisuda}}</b></td>
                            <td style="text-align:center;text-decoration:overline;"><b>Pmd. Aurellia Yenny Sivali Sinawati</b></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
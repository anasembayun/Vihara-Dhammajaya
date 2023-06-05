<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <title>Vihara Dhammajaya</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <!-- data table -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/fixedcolumns/4.1.0/js/dataTables.fixedColumns.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>

    <!-- css -->
    <link rel="stylesheet" href="aset/style.css">

</head>
<body>
    <div class="d-flex justify-content-start" style="width:210mm; height:297mm; padding:10px; text-align:center; border: 8px solid red;background-color:#f5ebec ;">
        <div style="width:198mm; height:285mm; padding:20px; text-align:center; border: 3px solid red; border-style: dotted;">
            <div class="row d-flex justify-content-start">
                <p style="font-weight:bold; font-family: sans-serif; letter-spacing: 0px; line-height: 1px; padding:10px;">NAMO TASSA BHAGAVATO ARAHATO SAMMA SAMBUDDHASSA</p>
                <p style="font-weight:bold; letter-spacing: 0px; line-height: 1px; font-family: sans-serif;">SURAT KETERANGAN PERKAWINAN</p>
                <p style="letter-spacing: 0px; line-height: 1px; font-family: sans-serif;font-size: 15px;">No. {{ $data_nikah->no_sertifikat }}</p><br>
                <span style="font-size:14px; font-family: sans-serif;">DALAM PERLINDUNGAN BUDDHA, DHAMMA DAN SANGHA</span><br>
                <span style="font-size:14px; font-weight:bold;font-family: sans-serif;">MAJELIS AGAMA BUDDHA THERAVADA INDONESIA</span><br>
                <span style="font-size:14px; font-family: sans-serif;">CABANG SURABAYA</span><br>
                <br>
                <table style="width:100%;">
                    <thead>
                        <tr>
                            @php
                                $_tanggal_nikah = \Carbon\Carbon::parse($data_nikah->tanggal_pernikahan)->locale('id');
                                $_tanggal_nikah->settings(['formatFunction' => 'translatedFormat']);
                            @endphp
                            <td scope="col" style="width:22%; font-size:14px; font-family: sans-serif;">Menerangkan bahwa pada hari</td>
                            <td scope="col" style="width:8%; border-bottom:1px solid black; text-align:center; font-size:14px; font-family: sans-serif;">{{$_tanggal_nikah->format('l')}}</td>
                            <td scope="col" style="width:8%; text-align:center; font-size:14px; font-family: sans-serif;">tanggal</td>
                            <td scope="col" style="width:8%; border-bottom:1px solid black; text-align:center; font-size:14px; font-family: sans-serif;">{{$_tanggal_nikah->format('j')}}</td>
                            <td scope="col" style="width:8%; text-align:center; font-size:14px; font-family: sans-serif;">bulan</td>
                            <td scope="col" style="width:8%; border-bottom:1px solid black; text-align:center; font-size:14px; font-family: sans-serif;">{{$_tanggal_nikah->format('F')}}</td>
                            <td scope="col" style="width:8%; text-align:center; font-size:14px; font-family: sans-serif;">tahun</td>
                            <td scope="col" style="width:8%; border-bottom:1px solid black; text-align:center; font-size:14px; font-family: sans-serif;">{{$_tanggal_nikah->format('Y')}}</td>
                        </tr>
                    </thead>
                </table>
                <table style="width:100%;">
                    <thead>
                        <tr>
                            <td scope="col" style="width:12%; font-size:14px; font-family: sans-serif;">bertempat di</td>
                            <td scope="col" style="width:88%; border-bottom:1px solid black; text-align:left; font-size:14px; font-family: sans-serif;">{{$data_nikah->tempat_pernikahan}}</td>
                        </tr>
                    </thead>
                </table>
                <table style="width:100%;">
                    <thead>
                        <tr>
                            <td scope="col" style="width:5%; font-size:14px; font-family: sans-serif;">RT/RW</td>
                            <td scope="col" style="width:8%; border-bottom:1px solid black; text-align:center; font-size:14px; font-family: sans-serif;">{{$data_nikah->rt_rw}}</td>
                            <td scope="col" style="width:8%; text-align:center; font-size:14px; font-family: sans-serif;">Kelurahan</td>
                            <td scope="col" style="width:8%; border-bottom:1px solid black; text-align:center; font-size:14px; font-family: sans-serif;">{{$data_nikah->kelurahan}}</td>
                            <td scope="col" style="width:8%; text-align:center; font-size:14px; font-family: sans-serif;">Kecamatan</td>
                            <td scope="col" style="width:8%; border-bottom:1px solid black; text-align:center; font-size:14px; font-family: sans-serif;">{{$data_nikah->kecamatan}}</td>
                        </tr>
                    </thead>
                </table>
                <table style="width:100%;">
                    <thead>
                        <tr>
                            <td scope="col" style="width:12%; font-size:14px; font-family: sans-serif;">Kabupaten/Kota</td>
                            <td scope="col" style="width:88%; border-bottom:1px solid black; text-align:left; font-size:14px; font-family: sans-serif;">{{$data_nikah->kabupaten_kota}}</td>
                        </tr>
                    </thead>
                </table>
                <table style="width:100%;">
                    <thead>
                        <tr>
                            <td scope="col" style="width:100%; font-size:14px; font-family: sans-serif;">telah diberlangsungkan<b> Upacara Perkawinan secara agama Buddha antara : </b></td>
                        </tr>
                    </thead>
                </table>
                <br>
                <table style="width:100%;">
                    <thead>
                        <tr>
                            <td scope="col" style="width:25%;"></td>
                            <td scope="col" style="width:50%; text-align:center; border-bottom:1px solid black; font-size:14px; font-family: sans-serif;">{{$data_nikah->p_nama}}</td>
                            <td scope="col" style="width:25%;"></td>
                        </tr>
                    </thead>
                </table>
                <table style="width:100%;">
                    <thead>
                        <tr>
                            <td scope="col" style="width:5%; font-size:14px; font-family: sans-serif;">putera dari Bapak</td>
                            <td scope="col" style="width:8%; border-bottom:1px solid black; text-align:center; font-size:14px; font-family: sans-serif;">{{$data_nikah->p_ayah}}</td>
                            <td scope="col" style="width:5%;  text-align:center; font-size:14px; font-family: sans-serif;">dan Ibu</td>
                            <td scope="col" style="width:8%; border-bottom:1px solid black; text-align:center; font-size:14px; font-family: sans-serif;">{{$data_nikah->p_ibu}}</td>
                        </tr>
                    </thead>
                </table>
                <table style="width:100%;">
                    <thead>
                        <tr>
                            @php
                                $_tanggal_lahir_p = \Carbon\Carbon::parse($data_nikah->p_tanggal_lahir)->locale('id');
                                $_tanggal_lahir_p->settings(['formatFunction' => 'translatedFormat']);
                            @endphp
                            <td scope="col" style="width:5%; font-size:14px; font-family: sans-serif;">lahir di</td>
                            <td scope="col" style="width:8%; border-bottom:1px solid black; text-align:center; font-size:14px; font-family: sans-serif;">{{$data_nikah->p_tempat_lahir}}</td>
                            <td scope="col" style="width:10%;  text-align:center; font-size:14px; font-family: sans-serif;">pada tanggal</td>
                            <td scope="col" style="width:8%; border-bottom:1px solid black; text-align:center; font-size:14px; font-family: sans-serif;">{{$_tanggal_lahir_p->format('j')}}</td>
                            <td scope="col" style="width:5%;  text-align:center; font-size:14px; font-family: sans-serif;">bulan</td>
                            <td scope="col" style="width:8%; border-bottom:1px solid black; text-align:center; font-size:14px; font-family: sans-serif;">{{$_tanggal_lahir_p->format('F')}}</td>
                            <td scope="col" style="width:5%;  text-align:center; font-size:14px; font-family: sans-serif;">tahun</td>
                            <td scope="col" style="width:8%; border-bottom:1px solid black; text-align:center; font-size:14px; font-family: sans-serif;">{{$_tanggal_lahir_p->format('Y')}}</td>
                        </tr>
                    </thead>
                </table>
                <table style="width:100%;">
                    <thead>
                        <tr>
                            <td scope="col" style="width:10%; font-size:14px; font-family: sans-serif;">beralamat di</td>
                            <td scope="col" style="width:45%; border-bottom:1px solid black; text-align:center; font-size:14px; font-family: sans-serif;">{{$data_nikah->p_alamat}}</td>
                            <td scope="col" style="width:10%;  text-align:center; font-size:14px; font-family: sans-serif;">RT/RW</td>
                            <td scope="col" style="width:10%; border-bottom:1px solid black; text-align:center; font-size:14px; font-family: sans-serif;">{{$data_nikah->p_rt_rw}}</td>
                        </tr>
                    </thead>
                </table>
                <table style="width:100%;">
                    <thead>
                        <tr>
                            <td scope="col" style="width:8%; font-size:14px; font-family: sans-serif;">Kelurahan</td>
                            <td scope="col" style="width:30%; border-bottom:1px solid black; text-align:center; font-size:14px; font-family: sans-serif;">{{$data_nikah->p_kelurahan}}</td>
                            <td scope="col" style="width:10%;  text-align:center; font-size:14px; font-family: sans-serif;">Kecamatan</td>
                            <td scope="col" style="width:25%; border-bottom:1px solid black; text-align:center; font-size:14px; font-family: sans-serif;">{{$data_nikah->p_kecamatan}}</td>
                        </tr>
                    </thead>
                </table>
                <table style="width:100%;">
                    <thead>
                        <tr>
                            <td scope="col" style="width:12%; font-size:14px; font-family: sans-serif;">Kabupaten/Kota</td>
                            <td scope="col" style="width:88%; border-bottom:1px solid black; text-align:left; font-size:14px; font-family: sans-serif;">{{$data_nikah->p_kabupaten_kota}}</td>
                        </tr>
                    </thead>
                </table>
                <table style="width:100%;">
                    <thead>
                        <tr>
                            <td scope="col" style="width:25%;"></td>
                            <td scope="col" style="width:50%; text-align:center; font-size:14px; font-family: sans-serif;">dengan</td>
                            <td scope="col" style="width:25%;"></td>
                        </tr>
                    </thead>
                </table>
                <table style="width:100%;">
                    <thead>
                        <tr>
                            <td scope="col" style="width:25%;"></td>
                            <td scope="col" style="width:50%; text-align:center; border-bottom:1px solid black; font-size:14px; font-family: sans-serif;">{{$data_nikah->w_nama}}</td>
                            <td scope="col" style="width:25%;"></td>
                        </tr>
                    </thead>
                </table>
                <table style="width:100%;">
                    <thead>
                        <tr>
                            <td scope="col" style="width:5%; font-size:14px; font-family: sans-serif;">puteri dari Bapak</td>
                            <td scope="col" style="width:8%; border-bottom:1px solid black; text-align:center; font-size:14px; font-family: sans-serif;">{{$data_nikah->w_ayah}}</td>
                            <td scope="col" style="width:5%;  text-align:center; font-size:14px; font-family: sans-serif;">dan Ibu</td>
                            <td scope="col" style="width:8%; border-bottom:1px solid black; text-align:center; font-size:14px; font-family: sans-serif;">{{$data_nikah->w_ibu}}</td>
                        </tr>
                    </thead>
                </table>
                <table style="width:100%;">
                    <thead>
                        <tr>
                            @php
                                $_tanggal_lahir_w = \Carbon\Carbon::parse($data_nikah->w_tanggal_lahir)->locale('id');
                                $_tanggal_lahir_w->settings(['formatFunction' => 'translatedFormat']);
                            @endphp
                            <td scope="col" style="width:5%; font-size:14px; font-family: sans-serif;">lahir di</td>
                            <td scope="col" style="width:8%; border-bottom:1px solid black; text-align:center; font-size:14px; font-family: sans-serif;">{{$data_nikah->w_tempat_lahir}}</td>
                            <td scope="col" style="width:10%;  text-align:center; font-size:14px; font-family: sans-serif;">pada tanggal</td>
                            <td scope="col" style="width:8%; border-bottom:1px solid black; text-align:center; font-size:14px; font-family: sans-serif;">{{$_tanggal_lahir_w->format('j')}}</td>
                            <td scope="col" style="width:5%;  text-align:center; font-size:14px; font-family: sans-serif;">bulan</td>
                            <td scope="col" style="width:8%; border-bottom:1px solid black; text-align:center; font-size:14px; font-family: sans-serif;">{{$_tanggal_lahir_w->format('F')}}</td>
                            <td scope="col" style="width:5%;  text-align:center; font-size:14px; font-family: sans-serif;">tahun</td>
                            <td scope="col" style="width:8%; border-bottom:1px solid black; text-align:center; font-size:14px; font-family: sans-serif;">{{$_tanggal_lahir_w->format('Y')}}</td>
                        </tr>
                    </thead>
                </table>
                <table style="width:100%;">
                    <thead>
                        <tr>
                            <td scope="col" style="width:10%; font-size:14px; font-family: sans-serif;">beralamat di</td>
                            <td scope="col" style="width:45%; border-bottom:1px solid black; text-align:center; font-size:14px; font-family: sans-serif;">{{$data_nikah->w_alamat}}</td>
                            <td scope="col" style="width:10%;  text-align:center; font-size:14px; font-family: sans-serif;">RT/RW</td>
                            <td scope="col" style="width:10%; border-bottom:1px solid black; text-align:center; font-size:14px; font-family: sans-serif;">{{$data_nikah->w_rt_rw}}</td>
                        </tr>
                    </thead>
                </table>
                <table style="width:100%;">
                    <thead>
                        <tr>
                            <td scope="col" style="width:8%; font-size:14px; font-family: sans-serif;">Kelurahan</td>
                            <td scope="col" style="width:30%; border-bottom:1px solid black; text-align:center; font-size:14px; font-family: sans-serif;">{{$data_nikah->w_kelurahan}}</td>
                            <td scope="col" style="width:10%;  text-align:center; font-size:14px; font-family: sans-serif;">Kecamatan</td>
                            <td scope="col" style="width:25%; border-bottom:1px solid black; text-align:center; font-size:14px; font-family: sans-serif;">{{$data_nikah->w_kecamatan}}</td>
                        </tr>
                    </thead>
                </table>
                <table style="width:100%;">
                    <thead>
                        <tr>
                            <td scope="col" style="width:12%; font-size:14px; font-family: sans-serif;">Kabupaten/Kota</td>
                            <td scope="col" style="width:88%; border-bottom:1px solid black; text-align:left; font-size:14px; font-family: sans-serif;">{{$data_nikah->w_kabupaten_kota}}</td>
                        </tr>
                    </thead>
                </table>
                <div class="row d-flex justify-content-center mt-3" style="padding:0px">
                    <table class="col-lg-2" style="width: 90%; height: fit-content; padding-left:30px; padding-right:30px;">
                        <tr>
                            <td style="text-align:left; width: 39%;">yang dipimpin oleh Pandita</td>
                            <td style="text-align:left; width: 1%;">:</td>
                            <td style="text-align:left; width: 60%;">{{$data_nikah->pandita}}</td>
                        </tr>
                        <tr>
                            <td rowspan="2" style="text-align:left; vertical-align: top;">dan disaksikan oleh</td>
                            <td rowspan="2" style="text-align:left; vertical-align: top;">:</td>
                            <td style="text-align:left;">1.{{$data_nikah->saksi_1}}</td>
                        </tr>
                        <tr>
                            <td style="text-align:left;">2.{{$data_nikah->saksi_2}}</td>
                        </tr>
                    </table>
                </div>
                <br>
                <div class="row d-flex justify-content-center mt-3" style="padding:0px">
                    <table class="col-lg-2" style="width: 90%; height: fit-content; margin-left:5%; margin-right:5%;">
                        <tr>
                            <td></td>
                            <td style="text-align:center;">Surabaya, {{$_tanggal_nikah->format('j F Y')}} </td>
                        </tr>
                        <tr>
                            <td rowspan="2" style="width:80mm;height:40mm;background:white;border-style:solid; border-width: 1px;" class="box1"></td>
                            <td style="text-align:center; vertical-align: top;">Pandita Pemimpin Upacara Perkawinan</td>
                        </tr>
                        <tr>
                            <td style="text-align:center; height: 150px; vertical-align: bottom;">{{$data_nikah->pandita}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align:center;">Pandita</td>
                        </tr>
                    </table>
                    <br>
                    <br>
                    <span style="font-size: 12px">Surat Keterangan Perkawinan ini diterbitkan untuk keperluan pencatatan oleh Pegawai Pencatat Perkawinan pada kantor Catatan</span><br>
                    <span style="font-size: 12px">Sipil sesuai dengan isi dan maksud UU No. 1 tahun 1974 serta PP No. 9 Tahun 1975.</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php

$dataFix = json_decode($data, true);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <title>Vihara Dhammajaya</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <!-- SWEET ALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
    <script src="sweetalert2/dist/sweetalert2.min.js"></script>

    <!-- AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- datatable -->
    <link href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css" rel="stylesheet" crossorigin="anonymous">
    {{-- <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js" crossorigin="anonymous" defer></script> --}}
    <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js" crossorigin="anonymous"></script>
    {{-- <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css" rel="stylesheet">
    {{-- <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script> --}}
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">



    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>

    {{-- <script src="https://datatables.net/extensions/buttons/"></script> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/datatables.min.css" />

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/datatables.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.js">
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/r-2.3.0/datatables.min.css" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/r-2.3.0/datatables.min.js"></script>

    {{-- https://datatables.net/extensions/buttons/ --}}

    {{-- DATATABLLESS TEST --}}

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
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous">
    </script> --}}

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>

    <!-- CSS -->
    <link href="{{ asset('css/app_admin/style2.css') }}" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            width: 100%;
            padding: 0;
            margin: 0;
        }

        p {
            font-family: 'Merriweather', serif;
            font-size: 15px;
        }

        .form-label {
            font-size: 15px !important;
        }

        .tersedia:hover {
            background-color: #F8C400 !important;
            border-color: #F8C400 !important;
        }
    </style>
</head>

<body>
    <div class="container p-0 m-0" style="height: 100%;max-width:none !important">
        <div class="row m-0" style="width:100%;height:100%;">
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 px-4 py-2">
                <h4 class="judulDenah">Pilih Lokasi Foto</h4>
                <div class="px-3">
                    <div class="row mt-2">
                        <div class="col-12">
                            <div class="row mt-2 ">
                                <div class="col-2  d-flex justify-content-end">
                                    <div class="indicator mb-2" style="height:18px;width:18px;background-color:#D9D9D9">
                                    </div>
                                </div>
                                <div class="col-9 ps-0 ">
                                    <p class="merri-sans mb-2">Tidak Tersedia</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row mt-2 ">
                                <div class="col-2  d-flex justify-content-end">
                                    <div class="indicator mb-2" style="height:18px;width:18px;background-color:#340068">
                                    </div>
                                </div>
                                <div class="col-9 ps-0 py-auto">
                                    <p class="merri-sans mb-2">Tersedia</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row mt-2 ">
                                <div class="col-2  d-flex justify-content-end">
                                    <div class="indicator mb-2" style="height:18px;width:18px;background-color:#C66B1B">
                                    </div>
                                </div>
                                <div class="col-9 ps-0 py-auto">
                                    <p class="merri-sans mb-2">Sudah Dipesan</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 ">
                            <div class="row mt-2 ">
                                <div class="col-2  d-flex justify-content-end">
                                    <div class="indicator mb-2" style="height:18px;width:18px;background-color:#F8C400">
                                    </div>
                                </div>
                                <div class="col-9 ps-0 py-auto">
                                    <p class="merri-sans mb-2">Lokasi Anda</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row px-lg-1 px-0 mt-3">
                        <h6 class="subJudulDenah ms-0">Lokasi Foto</h6>
                        <div class="row " style="width:100%">
                            <div class="col-12  ">
                                <div class="row ps-2 ">
                                    <div class="col-5 col-lg-5">
                                        <p class="mb-2">Kode Lokasi</p>
                                    </div>
                                    <div class="col-1">
                                        <p class="mb-2">:</p>
                                    </div>
                                    <div class="col-5 ps-0 ">
                                        <p class="kodeLokasi mb-2" id="selectedLoc" style="color: #D09222;">
                                            <select class="form-select" aria-label="Default select example" id="selectKode">
                                                <option selected value="">kode</option>
                                                {{-- <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                                <option value="E">E</option>
                                                <option value="F">F</option>
                                                <option value="G">G</option>
                                                <option value="H">H</option> --}}
                                                @php
                                                $id=DB::table('detail_pesan_foto')->distinct()->get('kode')->sort();
                                                @endphp
                                                @foreach($id as $i)
                                                <option value='{{ $i->kode }}'>{{ $i->kode }}</option>
                                                @endforeach
                                                {{-- <option value='test'>{{ $id }}</option> --}}
                                            </select>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <div class="row ps-2 ">
                                    <div class="col-5">
                                        <p class="mb-1">Status</p>
                                    </div>
                                    <div class="col-1">
                                        <p class="kodeLokasi mb-1">:</p>
                                    </div>
                                    <div class="col-5 ps-0 ">
                                        <p class="kodeLokasi mb-1" id="selectedStatus" style="color: #D09222;"><b id="statusLoC"></b></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12  ">
                                <div class="row ps-2 ">
                                    <div class="col-5 col-lg-5">
                                        <p class="mb-2">Lokasi: </p>
                                    </div>
                                    <div class="col-1">
                                        <p class="mb-2">:</p>
                                    </div>
                                    <div class="col-5 ps-0 ">
                                        <p class="kodeLokasi mb-2" id="selectedLocRigth" style="color: #D09222;">
                                            <b id="selectedLocRigtht"></b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row  mt-3 pe-lg-3 ">
                        <h6 class="subJudulDenah ms-0">Data Diri Pemesan</h6>
                        <div class="row d-flex justify-content-center mb-1 mx-0">
                            <div class="col-12">
                                <div class="mb-2">
                                    <label for="exampleInputEmail1" class="form-label">Id Pemesan</label>
                                    <input type="text" class="form-control" id="ordinary" aria-describedby="emailHelp" style="height: 27px;" value="{{ $dataFix['idUmat'] }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center mb-1 mx-0">
                            <div class="col-12">
                                <div class="mb-2">
                                    <label for="exampleInputEmail1" class="form-label">Nama Pemesan </label>
                                    <input type="text" class="form-control" id="ordinary" aria-describedby="emailHelp" style="height: 27px;" value="{{ $dataFix['namaUmat'] }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center mb-1 mx-0">
                            <div class="col-12">
                                <div class="mb-2">
                                    <label for="exampleInputEmail1" class="form-label">Relasi Leluhur dengan Penanggung Jawab </label>
                                    <input type="text" class="form-control" id="ordinary" aria-describedby="emailHelp" style="height: 27px;" value="{{ $dataFix['relasi'] }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center mb-1 mx-0">
                            <div class="col-12">
                                <div class="mb-2">
                                    <label for="exampleInputEmail1" class="form-label">Nama yang Ingin Didoakan </label>
                                    <input type="text" class="form-control" id="ordinary" aria-describedby="emailHelp" style="height: 27px;" value="{{ $dataFix['namaleluhur'] }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center mb-1 mx-0">
                            <div class="col-12">
                                <div class="mb-2">
                                    <label for="exampleInputEmail1" class="form-label">Tanggal Meninggal</label>
                                    <input type="text" class="form-control" id="ordinary" aria-describedby="emailHelp" style="height: 27px;" value="{{ $dataFix['tanggalmeninggal'] == '' ? '-' : $dataFix['tanggalmeninggal'] }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center mb-1 mx-0">
                            <div class="col-12">
                                <div class="mb-2">
                                    <label for="exampleInputEmail1" class="form-label">Transaksi Terakhir</label>
                                    <input type="text" class="form-control" id="ordinary" aria-describedby="emailHelp" style="height: 27px;" value="{{ date('Y-m' , strtotime($dataFix['transaksiterakhir'])) }}" readonly>
                                </div>
                            </div>
                        </div>
                        {{-- peridoe GK D PAKE --}}
                        {{-- <div class="row d-flex justify-content-center mb-1 mx-0">
                            <div class="col-12">
                                <div class="mb-2">
                                    <label for="exampleInputEmail1" class="form-label">Periode Pemesanan</label>
                                    <input type="text" class=" bulan form-control" id="ordinary"
                                        aria-describedby="emailHelp" style="height: 27px;" value="{{ $dataFix['periode'] }}" readonly>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="row d-flex justify-content-center mb-1 mt-4 mx-0 pe-lg-3">
            <div class="col-12">
                <div class="mb-2">
                    <button type="button" class="btn btn-secondary btn-sm btn-7" style="width:100%;" id="PESANFOTO">SIMPAN PERUBAHAN</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- KANAN -->
    <div class="col-12 col-sm-12 col-md-12 col-lg-8 d-flex justify-content-center p-3 " style=" background-color: #F4F2F2">
        <div class="kanan container-fluid mt-lg-3 px-0 px-lg-auto" style="width:95% ;">
            {{-- <div class="row ">
                        <div class="col-1"></div>
                        <div class="col-11">
                            <div class="row rows-col-2">
                                <div class="col d-flex justify-content-center">
                                    <h6 class="merri-sans"><b>1</b></h6>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <h6 class="merri-sans"><b>2</b></h6>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <h6 class="merri-sans"><b>3</b></h6>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <h6 class="merri-sans"><b>4</b></h6>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <h6 class="merri-sans"><b>5</b></h6>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <h6 class="merri-sans"><b>6</b></h6>
                                </div>
                            </div>
                        </div>
                    </div> --}}
            <section id='buttonLokasi'>

            </section>
            {{-- <div class="baris row py-3 mt-1  ">
                        <div class="col-1 d-flex justify-content-end align-items-center px-0">
                            <h6 class="merri-sans"><b>A</b></h6>
                        </div>
                        <div class="col-11">
                            <div class="row rows-col-2">
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnA1"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi sudahDipesan btn btn-outline " id="btnA2"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnA3"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnA4"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnA5"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnA6"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="baris row py-2 my-3 ">
                        <div class="col-1 d-flex justify-content-end align-items-center px-0">
                            <h6 class="merri-sans"><b>B</b></h6>
                        </div>
                        <div class="col-11">
                            <div class="row rows-col-2">
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnB1"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnB2"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnB3"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnB4"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnB5"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnB6"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="baris row py-2 my-3 ">
                        <div class="col-1 d-flex justify-content-end align-items-center px-0">
                            <h6 class="merri-sans"><b>C</b></h6>
                        </div>
                        <div class="col-11">
                            <div class="row rows-col-2">
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnC1"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnC2"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnC3"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnC4"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnC5"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnC6"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="baris row py-2 my-3  ">
                        <div class="col-1 d-flex justify-content-end align-items-center px-0">
                            <h6 class="merri-sans"><b>D</b></h6>
                        </div>
                        <div class="col-11">
                            <div class="row rows-col-2">
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnD1"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnD2"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnD3"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnD4"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnD5"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnD6"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="baris row py-2 my-3 ">
                        <div class="col-1 d-flex justify-content-end align-items-center px-0">
                            <h6 class="merri-sans"><b>E</b></h6>
                        </div>
                        <div class="col-11">
                            <div class="row rows-col-2">
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnE1"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnE2"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnE3"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnE4"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnE5"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnE6"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="baris row  py-2 my-3 ">
                        <div class="col-1 d-flex justify-content-end align-items-center px-0">
                            <h6 class="merri-sans"><b>F</b></h6>
                        </div>
                        <div class="col-11">
                            <div class="row rows-col-2">
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnF1"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnF2"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnF3"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnF4"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnF5"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnF6"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="baris row py-2 my-3 ">
                        <div class="col-1 d-flex justify-content-end align-items-center px-0">
                            <h6 class="merri-sans"><b>G</b></h6>
                        </div>
                        <div class="col-11">
                            <div class="row rows-col-2">
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnG1"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnG2"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnG3"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnG4"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnG5"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnG6"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="baris row py-2 my-3 ">
                        <div class="col-1 d-flex justify-content-end align-items-center px-0">
                            <h6 class="merri-sans"><b>H</b></h6>
                        </div>
                        <div class="col-11">
                            <div class="row rows-col-2">
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnH1"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnH2"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnH3"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnH4"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnH5"></button>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnH6"></button>
                                </div>
                            </div>
                        </div>
                    </div>  --}}
            {{-- //buton terakhir --}}
        </div>
    </div>
    </div>
    </div>

    <script>
        var CODELOKASI = "";
        var STAT = 0;
        var kodekode = "";
        $.ajax({
            type: 'GET',
            url: '/data-leluhur/getLokasiFoto',
            data: {
                "_token": "{{ csrf_token() }}",
                kode: get = document.getElementById("selectKode").value
            },
            success: function(data) {
                // console.log(data);
                document.getElementById('buttonLokasi').innerHTML = data;
                kodekode = document.getElementById("selectKode").value;
                console.log('AAAA ' + kodekode)
            },
            error: function(data) {
                alert("Server Dalam Gangguan!");
            }
        });

        function refreshButton() {
            $.ajax({
                type: 'GET',
                url: '/data-leluhur/getLokasiFoto',
                data: {
                    "_token": "{{ csrf_token() }}",
                    kode: get = document.getElementById("selectKode").value
                },
                success: function(data) {
                    // console.log(data);
                    document.getElementById('buttonLokasi').innerHTML = data;
                },
                error: function(data) {
                    alert("Server Dalam Gangguan!");
                }
            });
        }

        function getLokasiClick(elemq) {
            const lokasi = document.getElementsByClassName("codeLOC");
            for (let i = 0; i < lokasi.length; i++) {
                if (!$(lokasi[i]).hasClass('sudahDipesan')) {


                    $(lokasi[i]).removeClass('lokasiAnda').addClass('tersedia');
                }

            }
            if (!$(elemq).hasClass('sudahDipesan')) {
                $(elemq).addClass('lokasiAnda');
                document.getElementById("selectedLocRigtht").innerHTML = elemq.id;
                document.getElementById("statusLoC").innerHTML = "Tersedia";
                CODELOKASI = elemq.id;
                STAT = 0;
            } else {
                document.getElementById("selectedLocRigtht").innerHTML = elemq.id;
                document.getElementById("statusLoC").innerHTML = "Sudah dipesan";
                CODELOKASI = "";
                STAT = 1;
            }
            console.log(elemq.id);

            //   $( "p" ).removeClass( "myClass noClass" ).addClass( "yourClass" );

            // CODELOKASI=varr;
            // alert(this);
        }

        const seats = document.querySelectorAll(".btn-lokasi tersedia");
        var status = [];

        // generate awal (dr database)
        for (let i = 0; i < 48; i++) {
            if (i % 5 == 0) {
                status[i] == 'tersedia';
            } else if (i % 3 == 0) {
                status[i] == 'sudahDipesan';
            } else if (i % 7 == 0) {
                status[i] == 'lokasiAnda';
            } else {
                status[i] = 'tidakTersedia';
            }

        }

        populateUI();

        function populateUI() {
            if (status != null && status.length > 0) {
                seats.forEach((seat, index) => {
                    if (status[index] == 'tersedia') {
                        console.log(seat.classList.add("tersedia"));
                    } else if (status[index] == 'tidakTersedia') {
                        console.log(seat.classList.add("tidakTersedia"));
                    } else if (status[index] == 'sudahDipesan') {
                        console.log(seat.classList.add("sudahDipesan"));
                    }
                });
            }
        }

        populateUI();
        console.log(status);

        $(document).ready(function() {

            $('#selectKode').on('change', function() {
                var get = document.getElementById("selectKode").value;
                // alert(CODELOKASI);

                $.ajax({
                    type: 'GET',
                    url: '/data-leluhur/getLokasiFoto',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        kode: get
                    },
                    success: function(data) {
                        //console.log(data);
                        document.getElementById('buttonLokasi').innerHTML = data;
                        document.getElementById("selectedLocRigtht").innerHTML = "";
                        document.getElementById("statusLoC").innerHTML = "";
                        CODELOKASI = "";
                        STAT = 0;
                    },
                    error: function(data) {
                        alert("Server Dalam Gangguan!");
                    }
                });
            });

            $('#selectKode').val("{{$dataFix['kode_lokasi']}}").change();

            $('#PESANFOTO').on('click', function() {

                var idUmat = "{{ $dataFix['idUmat'] }}";
                var namaleluhur = "{{ $dataFix['namaleluhur'] }}";
                var relasi = "{{ $dataFix['relasi'] }}";
                var tempatlahir = "{{ $dataFix['tempatlahir'] ?? NULL }}";
                var tempatmeninggal = "{{ $dataFix['tempatmeninggal'] ?? NULL }}";
                var tanggallahir = "{{ $dataFix['tanggallahir'] ?? NULL }}";
                var tanggalmeninggal = "{{ $dataFix['tanggalmeninggal'] ?? NULL }}";
                var transaksiterakhir = "{{ $dataFix['transaksiterakhir'] }}";

                kodekode = document.getElementById("selectKode").value;
                let text = '{"idUmat":"' + idUmat + '", "namaleluhur":"' + namaleluhur + '", "relasi":"' + relasi + '", "tempatlahir":"' + tempatlahir + '", "tempatmeninggal":"' + tempatmeninggal + '", "tanggallahir":"' + tanggallahir + '", "tanggalmeninggal":"' + tanggalmeninggal + '", "transaksiterakhir":"' + transaksiterakhir + '", "kodeLokasi":"' + CODELOKASI + '","code":"' + kodekode + '"}';
                const obj = JSON.parse(text);
                if (STAT == 0 && CODELOKASI != "") {
                    $.ajax({
                        type: 'post',
                        url: '/data-leluhur/UBAHFOTOLOKASI',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            kode: obj,
                            id : "{{ $dataFix['id'] }}"
                        },
                        success: function(data) {
                            refreshButton()
                            Swal.fire({
                                title: 'LOKASI ' + data['kodeLoc'],
                                text: data['nama_mendiang'] + ' berhasil di ubah.',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false,
                                allowOutsideClick: false
                            });
                            console.log(data);
                            window.location.replace('/data-leluhur/daftar-leluhur');

                        },
                        error: function(data) {
                            alert("Server Dalam Gangguan!");
                        }
                    });
                } else if (STAT == 1 && CODELOKASI == "") {
                    Swal.fire({
                        title: 'LOKASI SUDAH DI PESAN!',
                        text: 'Silahkan pilih lokasi yang tersedia.',
                        icon: 'error',
                        showConfirmButton: true,
                        allowOutsideClick: false
                    });
                    document.getElementById("selectedLocRigtht").innerHTML = '';
                    document.getElementById("statusLoC").innerHTML = "";
                    CODELOKASI = "";
                    STAT = 0;
                } else if (STAT == 0 && CODELOKASI == "") {
                    Swal.fire({
                        title: 'LOKASI NOT FOUND!',
                        text: 'Silahkan pilih lokasi yang tersedia.',
                        icon: 'error',
                        showConfirmButton: true,
                        allowOutsideClick: false
                    });
                    document.getElementById("selectedLocRigtht").innerHTML = '';
                    document.getElementById("statusLoC").innerHTML = "";
                    CODELOKASI = "";
                }

            });

        });
    </script>
    <!-- <script type="module" src="aset/denah-foto.js"></script> -->
</body>

</html>
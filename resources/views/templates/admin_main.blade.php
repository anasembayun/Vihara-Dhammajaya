<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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
    {{-- <link href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script> --}}

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    
    {{-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>

    {{-- <script src="https://datatables.net/extensions/buttons/"></script> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/datatables.min.css"/>
 
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/datatables.min.js"></script>

    
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script  src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/r-2.3.0/datatables.min.css"/>
 
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>

    <!-- CSS -->
    <link href="{{ asset('css/app_admin/style.css') }}" rel="stylesheet">
    
    <style>
        /* .user-profile a.user-link {
            padding: 1.2rem 1rem;
            line-height: 23px;
        }
        .mr-1 {
            margin-right: 1rem!important;
        }
        .text-bold-700 {
            font-weight: 700;
        }

        .avatar {
            position: relative;
            width: 36px;
            height: 36px;
        }
        .avatar img {
            width: 100%;
            max-width: 100%;
            height: auto;
            border: 0;
            border-radius: 50%;
            z-index: 1;
        }
        .avatar-online i {
            background-color: greenyellow;
        } */

        .parent a {
            margin-top: 20px;
            margin-right: 30px;
            margin-left: 30px;
            padding: 10px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(2, 1fr);
            grid-column-gap: 0px;
            grid-row-gap: 0px;
        }

        .div1 {
            grid-area: 1 / 1 / 3 / 2;
        }
        .div2 {
            grid-area: 1 / 2 / 2 / 4;
        }
        .div3 {
            grid-area: 2 / 2 / 3 / 4;
        }
    </style>
    @yield('css')
</head>
<body class="w3-content" style="max-width:100%">
    <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3" id="mySidebar">
        <div class="w3-container w3-display-container w3-padding-16 d-flex justify-content-center">
            <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
            <img src="{{ asset('images/app_admin/dashboard/atas-bawah.png') }}" alt="Logo" style="width:210px;margin-top: 18px;">
        </div>
        <div class="parent">
            <a href="{{ url('profile/'.Auth::guard('admin')->user()->username) }}" style="text-decoration: none;">
                <div class="div1">
                    <img src="{{ asset('images/app_admin/default_foto_profile.jpg') }}" alt="default_foto_profile" style="width: 45px; heigth: 100%;">
                </div>
                <div class="div2">
                    <span class="">{{ Auth::guard('admin')->user()->name }}</span>
                </div>
                <div class="div3">
                    <span class="">{{ Auth::guard('admin')->user()->role }}</span>
                </div>
            </a>
        </div>
        {{-- <div class="container">
            <a href="">
                <div class="foto-profile">
                    <img src="{{ asset('images/app_admin/default_foto_profile.jpg') }}" alt="default_foto_profile" style="width: 36px; heigth: 36px;">
                </div>
                <div class="role">
                    <span class="">Deuscode</span>
                </div>
                <div class="nama">
                    <span class="">Ketua</span>
                </div>
            </a>
            
        </div>
        <div class="user-profile">
            <a href="" class="user-link">
                <span class="mr-1 user-name text-bold-700">Deuscode</span>
                <span class="avatar avatar-online">
                    <img src="{{ asset('images/app_admin/default_foto_profile.jpg') }}" alt="default_foto_profile" style="width: 36px; heigth: 36px;">
                    <i></i>
                </span>
                <div class="profile-image">
                    <img class="img-xs rounded-circle" src="{{ asset('images/app_admin/default_foto_profile.jpg') }}" alt="profile image" style="width: 20px; height: 20px;">
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name">Deuscode</p>
                    <p class="designation">super_admin</p>
                </div>
            </a>
        </div> --}}
        <hr class="line-hr mt-3 mb-0">
        <div class="w3-padding-64 w3-medium w3-text-grey ps-1 pt-2">
            @php
                $access_list = \App\Models\DetailRole::join('data_access', 'data_access.id', 'detail_role.id_access')->where('detail_role.id_role', Auth::guard('admin')->user()->id_role )->pluck('data_access.nama')->toArray();
            @endphp
            
            <div class="accordion" id="accordionPanelsStayOpenExample">
                @if (in_array('Kelola Admin', $access_list))
                    <!-- KELOLA ADMIN -->
                    <div class="accordion-item" style="background-color: #100700">
                        <h2 class="accordion-header" id="panelsStayOpen-headingKelolaAdmin">
                            <button style="background-color: #100700; color: white;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseKelolaAdmin" aria-expanded="true" aria-controls="panelsStayOpen-collapseKelolaAdmin">
                                Kelola Admin
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseKelolaAdmin" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingKelolaAdmin">
                            <div><a class="accordion-body w3-bar-item w3-button" href="{{ url('kelola-admin/tambah-admin') }}">Tambah Admin</a></div>
                            <div><a class="accordion-body w3-bar-item w3-button" href="{{ url('kelola-admin/daftar-admin') }}">Daftar Admin</a></div>
                            <div><a class="accordion-body w3-bar-item w3-button" href="{{ url('kelola-admin/hak-akses') }}">Hak Akses</a></div>
                        </div>
                    </div>
                @endif

                <!-- KELOLA UMAT -->
                @if(!empty(array_intersect(["Tambah Umat", "Daftar Data Upa - Upi", "Tambah Data Pernikahan", "Daftar Data Umat", "Daftar Data Umat Tidak Terdaftar", "Tambah Data Upa - Upi", "Daftar Data Pernikahan" ], $access_list)))
                <div class="accordion-item" style="background-color: #100700">
                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button style="background-color: #100700; color: white;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">
                            Kelola Umat
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                        @if (in_array("Tambah Umat", $access_list))
                        <div><a class="accordion-body w3-bar-item w3-button" href="{{ url('kelola-jamaat/tambah-jamaat') }}" class="w3-bar-item w3-button">Tambah Umat</a></div>
                        @endif
                        @if (in_array("Daftar Data Upa - Upi", $access_list))
                        <div><a class="accordion-body w3-bar-item w3-button" href="{{ url('kelola-jamaat/tambah-data-baptisan') }}" class="w3-bar-item w3-button">Tambah Data Baptisan</a></div>
                        @endif
                        @if (in_array("Tambah Data Pernikahan", $access_list))
                        <div><a class="accordion-body w3-bar-item w3-button" href="{{ url('kelola-jamaat/tambah-data-pernikahan') }}" class="w3-bar-item w3-button">Tambah Data Pernikahan</a></div>
                        @endif
                        @if (in_array("Daftar Data Umat", $access_list))
                        <div><a class="accordion-body w3-bar-item w3-button" href="{{ url('kelola-jamaat/daftar-jamaat') }}" class="w3-bar-item w3-button">Daftar Data Umat</a></div>
                        @endif
                        @if (in_array("Daftar Data Umat Tidak Terdaftar", $access_list))
                        <div><a class="accordion-body w3-bar-item w3-button" href="{{ url('kelola-jamaat/daftar-jamaat-tidak-terdaftar') }}" class="w3-bar-item w3-button">Daftar Data Umat Tidak Terdaftar</a></div>
                        @endif
                        @if (in_array("Tambah Data Upa - Upi", $access_list))
                        <div><a class="accordion-body w3-bar-item w3-button" href="{{ url('kelola-jamaat/daftar-baptisan') }}" class="w3-bar-item w3-button">Daftar Data Baptisan</a></div>
                        @endif
                        @if (in_array("Daftar Data Pernikahan", $access_list))
                        <div><a class="accordion-body w3-bar-item w3-button" href="{{ url('kelola-jamaat/daftar-pernikahan') }}" class="w3-bar-item w3-button">Daftar Data Pernikahan</a></div>
                        @endif
                    </div>
                </div>
                @endif

                <!-- KELOLA BERITA -->
                @if(!empty(array_intersect(["Tambah Berita", "Daftar Berita" ], $access_list)))
                <div class="accordion-item" style="background-color: #100700">
                    <h2 class="accordion-header" id="panelsStayOpen-headingKelolaBerita">
                        <button style="background-color: #100700; color: white;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseKelolaBerita" aria-expanded="true" aria-controls="panelsStayOpen-collapseKelolaBerita">
                            Kelola Berita
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseKelolaBerita" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingKelolaBerita">
                        @if (in_array("Tambah Berita", $access_list))
                        <div><a class="accordion-body w3-bar-item w3-button" href="{{ url('kelola-berita/tambah-berita') }}" class="w3-bar-item w3-button">Tambah Berita</a></div>
                        @endif
                        @if (in_array("Daftar Berita", $access_list))
                        <div><a class="accordion-body w3-bar-item w3-button" href="{{ url('kelola-berita/daftar-berita') }}" class="w3-bar-item w3-button">Daftar Berita</a></div>
                        @endif
                    </div>
                </div>
                @endif

                @if (in_array("Presensi Kegiatan", $access_list))
                    <!-- PRESENSI KEGIATAN -->
                    <div class="accordion-item" style="background-color: #100700">
                        <h2 class="accordion-header">
                            <a role="button" href="{{ url('kelola-kegiatan/tambah-jadwal-kegiatan') }}" class="accordion-button accordion-no-arrow" style="background-color: #100700; color: white; text-decoration: none;">Presensi Kegiatan</a>
                        </h2>
                    </div>
                @endif

                <!-- KELOLA INFORMASI KEGIATAN -->
                @if(!empty(array_intersect(["Jadwalkan Kegiatan", "Daftar Kegiatan" ], $access_list)))
                <div class="accordion-item" style="background-color: #100700">
                    <h2 class="accordion-header" id="panelsStayOpen-headingKelolaDonasi">
                        <button style="background-color: #100700; color: white;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseKelolaDonasi" aria-expanded="true" aria-controls="panelsStayOpen-collapseKelolaDonasi">
                            Kelola Informasi Kegiatan
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseKelolaDonasi" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingKelolaDonasi">
                        @if(in_array("Jadwalkan Kegiatan", $access_list))
                        <div><a class="accordion-body w3-bar-item w3-button" href="{{ url('kelola-donasi/tambah-kegiatan-donasi') }}" class="w3-bar-item w3-button">Jadwalkan Kegiatan</a></div>
                        @endif
                        @if(in_array("Daftar Kegiatan", $access_list))
                        <div><a class="accordion-body w3-bar-item w3-button" href="{{ url('kelola-donasi/daftar-kegiatan-donasi') }}" class="w3-bar-item w3-button">Daftar Kegiatan</a></div>
                        @endif
                    </div>
                </div>
                @endif

                <!-- KELOLA PAKET -->
                @if(in_array("Kelola Paket", $access_list))
                <div class="accordion-item" style="background-color: #100700">
                    <h2 class="accordion-header">
                        <a role="button" href="{{ url('kelola-barang/daftar-barang') }}" class="accordion-button accordion-no-arrow" style="background-color: #100700; color: white; text-decoration: none;">Kelola Paket</a>
                    </h2>
                </div>
                @endif

                <!-- KELOLA RENUNGAN / PESAN BAIK -->
                @if(in_array("Kelola Pesan Baik", $access_list))
                <div class="accordion-item" style="background-color: #100700">
                    <h2 class="accordion-header">
                        <a role="button" href="{{ url('kelola-pesan-baik/tambah-pesan-baik') }}" class="accordion-button accordion-no-arrow" style="background-color: #100700; color: white; text-decoration: none;">Kelola Pesan Baik</a>
                    </h2>
                </div>
                @endif

                <!-- DATA LELUHUR -->
                <div class="accordion-item" style="background-color: #100700">
                    {{-- <h2 class="accordion-header" id="panelsStayOpen-headingDataLeluhur">
                        <button style="background-color: #100700; color: white;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseDataLeluhur" aria-expanded="true" aria-controls="panelsStayOpen-collapseDataLeluhur">
                            Data Leluhur
                        </button>
                    </h2> --}}
                    @if(in_array("Kelola Leluhur", $access_list))
                    <h2 class="accordion-header">
                        <a role="button" href="{{ url('data-leluhur/pesan-pas-foto') }}" class="accordion-button accordion-no-arrow" style="background-color: #100700; color: white; text-decoration: none;">Kelola Leluhur</a>
                    </h2>
                    @endif
                    @if(in_array("Daftar Data Leluhur", $access_list))
                    <h2 class="accordion-header">
                        <a role="button" href="{{ url('data-leluhur/daftar-leluhur') }}" class="accordion-button accordion-no-arrow" style="background-color: #100700; color: white; text-decoration: none;">Daftar Data Leluhur</a>
                    </h2>
                    @endif
                    {{-- <div id="panelsStayOpen-collapseDataLeluhur" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingDataLeluhur">
                        <div><a class="accordion-body w3-bar-item w3-button" href="{{ url('data-leluhur/tambah-data') }}" class="w3-bar-item w3-button">Tambah Data</a></div>
                        <div><a class="accordion-body w3-bar-item w3-button" href="{{ url('data-leluhur/pesan-pas-foto') }}" class="w3-bar-item w3-button">Pesan Pas Foto</a></div>
                    </div> --}}
                </div>

                @if(in_array("Tagih Iuran", $access_list))
                <!-- TAGIH IURAN -->
                <div class="accordion-item" style="background-color: #100700">
                    <h2 class="accordion-header">
                        <a role="button" href="{{ url('tagih-iuran') }}" class="accordion-button accordion-no-arrow" style="background-color: #100700; color: white; text-decoration: none;">Tagih Iuran</a>
                    </h2>
                </div>
                @endif

                <!-- KELOLA TRANSAKSI -->
                @if(!empty(array_intersect(["Transaksi", "Transaksi Foto", "Riwayat Transaksi", "Riwayat Transaksi Foto"], $access_list)))
                <div class="accordion-item" style="background-color: #100700">
                    <h2 class="accordion-header" id="panelsStayOpen-headingKelolaTransaksi">
                        <button style="background-color: #100700; color: white;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseKelolaTransaksi" aria-expanded="true" aria-controls="panelsStayOpen-collapseKelolaTransaksi">
                            Kelola Transaksi
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseKelolaTransaksi" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingKelolaTransaksi">
                        @if(in_array("Transaksi", $access_list))
                        <div><a class="accordion-body w3-bar-item w3-button" href="{{ url('kelola-transaksi/tambah-transaksi-uang') }}" class="w3-bar-item w3-button">Transaksi</a></div>
                        @endif
                        @if(in_array("Transaksi Foto", $access_list))
                        <div><a class="accordion-body w3-bar-item w3-button" href="{{ url('kelola-transaksi/tambah-transaksi-foto') }}" class="w3-bar-item w3-button">Transaksi Foto</a></div>
                        @endif
                        @if(in_array("Riwayat Transaksi", $access_list))
                        <div><a class="accordion-body w3-bar-item w3-button" href="{{ url('kelola-transaksi/daftar-transaksi') }}" class="w3-bar-item w3-button">Riwayat Transaksi</a></div>
                        @endif
                        @if(in_array("Riwayat Transaksi Foto", $access_list))
                        <div><a class="accordion-body w3-bar-item w3-button" href="{{ url('kelola-transaksi/daftar-transaksi-foto') }}" class="w3-bar-item w3-button">Riwayat Transaksi Foto</a></div>
                        @endif
                        {{-- <div><a class="accordion-body w3-bar-item w3-button" class="w3-bar-item w3-button">Riwayat Transaksi Foto</a></div> --}}
                    </div>
                </div>
                @endif

            
                <!-- KELOLA LAPORAN (ON PROGRESS) -->
                @if(in_array("Kelola Laporan", $access_list))
                <div class="accordion-item" style="background-color: #100700">  
                    <h2 class="accordion-header">
                        <a role="button" href="{{ url('kelola-laporan/laporan-transaksi') }}" class="accordion-button accordion-no-arrow" style="background-color: #100700; color: white; text-decoration: none;">Kelola Laporan</a>
                    </h2>
                </div>
                @endif

                @if (!empty(array_intersect(["Kas Masuk", "Kas Keluar", "Laporan Kas"], $access_list)))
                <!-- KAS (ON PROGRESS) -->
                <div class="accordion-item" style="background-color: #100700">
                    <h2 class="accordion-header" id="panelsStayOpen-headingKas">
                        <button style="background-color: #100700; color: white;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseKas" aria-expanded="true" aria-controls="panelsStayOpen-collapseKas">
                            Kas
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseKas" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingKas">
                        @if(in_array("Kas Masuk", $access_list))
                        <div><a class="accordion-body w3-bar-item w3-button" href="{{ url('kas/kas-masuk') }}" class="w3-bar-item w3-button">Kas Masuk</a></div>
                        @endif
                        @if(in_array("Kas Keluar", $access_list))
                        <div><a class="accordion-body w3-bar-item w3-button" href="{{ url('kas/kas-keluar') }}" class="w3-bar-item w3-button">Kas Keluar</a></div>
                        @endif
                        @if(in_array("Laporan Kas", $access_list))
                        <div><a class="accordion-body w3-bar-item w3-button" href="{{ url('kas/laporan-kas-masuk') }}" class="w3-bar-item w3-button">Laporan Kas</a></div>
                        @endif
                    </div>
                </div>
                @endif

                @if (in_array("Laporan Keuangan", $access_list))
                <!-- LAPORAN KEUANGAN (ON PROGRESS) -->
                <div class="accordion-item" style="background-color: #100700">
                    <h2 class="accordion-header">
                        <a role="button" href="{{ url('laporan-keuangan') }}" class="accordion-button accordion-no-arrow" style="background-color: #100700; color: white; text-decoration: none;">Laporan Keuangan</a>
                    </h2>
                </div>
                @endif
            </div>

            <!-- KELOLA ADMIN -->
            {{-- <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align">
                Kelola Admin

                <snap id="arrow-d-01"><i class="bi bi-arrow-right" style="float:right;"></i></snap>
                <snap id="arrow-n-01" class="arrow-miss"><i class="bi bi-arrow-down" style="float:right;"></i></snap>

            </a>
            <div id="demoAcc" class="dropdown-items w3-bar-block w3-hide w3-padding-large">
                <a href="{{ url('kelola-admin/tambah-admin') }}" class="w3-bar-item w3-button">Tambah Admin</a>
                <a href="{{ url('kelola-admin/daftar-admin') }}" class="w3-bar-item w3-button">Daftar Admin</a>
                <a href="{{ url('kelola-admin/hak-akses') }}" class="w3-bar-item w3-button">Hak Akses</a>
            </div> --}}

            <!-- KELOLA ADMIN -->
            {{-- <a onclick="dropShow()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align">
                Kelola Jemaat

                <snap id="arrow-d-02"><i class="bi bi-arrow-right" style="float:right;"></i></snap>
                <snap id="arrow-n-02" class="arrow-miss"><i class="bi bi-arrow-down" style="float:right;"></i></snap>

            </a>
            <div id="drop-show-02" class="dropdown-items w3-bar-block w3-hide w3-padding-large">
                <a href="{{ url('kelola-jamaat/tambah-jamaat') }}" class="w3-bar-item w3-button">Tambah Jemaat</a>
                <a href="{{ url('kelola-jamaat/tambah-data-baptisan') }}" class="w3-bar-item w3-button">Tambah Data Baptisan</a>
                <a href="{{ url('kelola-jamaat/tambah-data-pernikahan') }}" class="w3-bar-item w3-button">Tambah Data Pernikahan</a>
                <a href="{{ url('kelola-jamaat/daftar-baptisan') }}" class="w3-bar-item w3-button">Daftar Data Baptisan</a>
            </div> --}}

            <!-- KELOLA BERITA -->
            {{-- <a onclick="dropShow10()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align">
                Kelola Berita

                <snap id="arrow-d-10"><i class="bi bi-arrow-right" style="float:right;"></i></snap>
                <snap id="arrow-n-10" class="arrow-miss"><i class="bi bi-arrow-down" style="float:right;"></i></snap>

            </a>
            <div id="drop-show-10" class="dropdown-items w3-bar-block w3-hide w3-padding-large">
                <a href="{{ url('kelola-berita/tambah-berita') }}" class="w3-bar-item w3-button">Tambah Berita</a>
                <a href="{{ url('kelola-berita/daftar-berita') }}" class="w3-bar-item w3-button">Daftar Berita</a>
            </div> --}}

            <!-- IURAN -->
            {{-- <a href="iuran.html" class="w3-bar-item w3-button">Iuran</a> --}}
            
            <!-- JADWAL & DETAIL KEGIATAN -->
            {{-- <a href="{{ url('kelola-kegiatan/tambah-jadwal-kegiatan') }}" class="w3-bar-item w3-button">Jadwal dan Detail Kegiatan</a> --}}
            {{-- <a href="{{ url('kelola-kegiatan/detail-kegiatan') }}" class="w3-bar-item w3-button">Detail Kegiatan</a> --}}
            
            <!-- DONASI -->
            {{-- <a href="{{ url('kelola-donasi/tambah-kegiatan-donasi') }}" class="w3-bar-item w3-button">Jadwalkan Donasi</a>
            <a href="{{ url('kelola-donasi/detail-kegiatan-donasi') }}" class="w3-bar-item w3-button">Detail Kegiatan Donasi</a> --}}

            <!-- KELOLA BARANG -->
            {{-- <a onclick="dropShow03()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align">
                Kelola Barang

                <snap id="arrow-d-03"><i class="bi bi-arrow-right" style="float:right;"></i></snap>
                <snap id="arrow-n-03" class="arrow-miss"><i class="bi bi-arrow-down" style="float:right;"></i></snap>

            </a>
            <div id="drop-show-03" class="dropdown-items w3-bar-block w3-hide w3-padding-large ">
                <a href="{{ url('kelola-barang/daftar-barang') }}" class="w3-bar-item w3-button">Daftar Barang</a>
                <a href="pasokBarang.html" class="w3-bar-item w3-button">Pasok Barang</a>
            </div> --}}

            <!-- KELOLA TRANSAKSI -->
            {{-- <a onclick="dropShow04()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align">
                Kelola Transaksi

                <snap id="arrow-d-04"><i class="bi bi-arrow-right" style="float:right;"></i></snap>
                <snap id="arrow-n-04" class="arrow-miss"><i class="bi bi-arrow-down" style="float:right;"></i></snap>

            </a>
            <div id="drop-show-04" class="dropdown-items w3-bar-block w3-hide w3-padding-large ">
                <a href="transaksi.html" class="w3-bar-item w3-button">Transaksi</a>
                <a href="riwayatTransaksi.html" class="w3-bar-item w3-button">Riwayat Transaksi</a>
            </div> --}}

            <!-- KELOLA LAPORAN -->
            {{-- <a onclick="dropShow05()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align">
                Kelola laporan

                <snap id="arrow-d-05"><i class="bi bi-arrow-right" style="float:right;"></i></snap>
                <snap id="arrow-n-05" class="arrow-miss"><i class="bi bi-arrow-down" style="float:right;"></i></snap>

            </a>
            <div id="drop-show-05" class="dropdown-items w3-bar-block w3-hide w3-padding-large">
                <a href="laporanTransaksi.html" class="w3-bar-item w3-button">Laporan Transaksi</a>
                <a href="laporanPegawai.html" class="w3-bar-item w3-button">Laporan Pegawai</a>
                <a href="laporanStok.html" class="w3-bar-item w3-button">Laporan Stok</a>
            </div> --}}

            <!-- AKUN -->
            {{-- <a onclick="dropShow06()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align">
                Akun

                <snap id="arrow-d-06"><i class="bi bi-arrow-right" style="float:right;"></i></snap>
                <snap id="arrow-n-06" class="arrow-miss"><i class="bi bi-arrow-down" style="float:right;"></i></snap>

            </a>
            <div id="drop-show-06" class="dropdown-items w3-bar-block w3-hide w3-padding-large">
                <a href="manageAkun.html" class="w3-bar-item w3-button">Manage Akun</a>
                <a href="dataAkun.html" class="w3-bar-item w3-button">Data Akun</a>
            </div> --}}

            <!-- AKTIVA -->
            {{-- <a onclick="dropShow07()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align">
                Aktiva

                <snap id="arrow-d-07"><i class="bi bi-arrow-right" style="float:right;"></i></snap>
                <snap id="arrow-n-07" class="arrow-miss"><i class="bi bi-arrow-down" style="float:right;"></i></snap>

            </a>
            <div id="drop-show-07" class="dropdown-items w3-bar-block w3-hide w3-padding-large">
                <a href="aktivaTetap.html" class="w3-bar-item w3-button">Aktiva Tetap</a>
                <a href="aktivaLancar.html" class="w3-bar-item w3-button">Aktiva Lancar</a>
                <a href="laporanAktiva.html" class="w3-bar-item w3-button">Laporan Aktiva</a>
            </div> --}}

            <!-- KAS -->
            {{-- <a onclick="dropShow08()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align">
                Kas

                <snap id="arrow-d-08"><i class="bi bi-arrow-right" style="float:right;"></i></snap>
                <snap id="arrow-n-08" class="arrow-miss"><i class="bi bi-arrow-down" style="float:right;"></i></snap>

            </a>
            <div id="drop-show-08" class="dropdown-items w3-bar-block w3-hide w3-padding-large">
                <a href="kasIn.html" class="w3-bar-item w3-button">Kas In</a>
                <a href="kasOut.html" class="w3-bar-item w3-button">Kas Out</a>
            </div> --}}

            <!-- BANK -->
            {{-- <a href="bank.html" class="w3-bar-item w3-button">Bank</a> --}}

            <!-- LAPORAN KEUANGAN -->
            {{-- <a onclick="dropShow09()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align">
                Laporan Keuangan

                <snap id="arrow-d-09"><i class="bi bi-arrow-right" style="float:right;"></i></snap>
                <snap id="arrow-n-09" class="arrow-miss"><i class="bi bi-arrow-down" style="float:right;"></i></snap>

            </a>
            <div id="drop-show-09" class="dropdown-items w3-bar-block w3-hide w3-padding-large">
                <a href="jurnalHarian.html" class="w3-bar-item w3-button">Jurnal Harian</a>
                <a href="bukuBesar.html" class="w3-bar-item w3-button">Buku Besar</a>
                <a href="neraca.html" class="w3-bar-item w3-button">Neraca</a>
                <a href="laporanLabaRugi.html" class="w3-bar-item w3-button">Laporan Laba Rugi</a>
            </div> --}}

            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="w3-bar-item w3-button" style="color:#E57616">Log Out</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>

    </nav>

    <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! / default-->
    <div class="w3-main" style="margin-left:250px">
        <script src="aset/header.js"></script>

        <!-- Push down content on small screens / default-->
        <div class="w3-hide-large" style="margin-top:83px"></div>

        <!-- Top header / default-->
        @yield('top-header')

        <!-- Top menu small screen / default-->
        <!-- Top menu on small screens -->
        <header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
            <div class="w3-bar-item w3-padding-24 w3-wide">
                <img src="{{ asset('images/app_admin/dashboard/atas-bawah.png') }}" alt="Logo">
            </div>
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i
                    class="fa fa-bars"></i></a>
        </header>
    </div>

    @yield('comingsoon')
    @yield('content')

    <!-- for javascript sidebar function -->
    <script src="{{ asset('js/app_admin/function-js.js') }}"></script>

    <!-- open and close sidebar -->
    <script>
        // Click on the "Jeans" link on page load to open the accordion for demo purposes
        // document.getElementById("myBtn").click();


        // Open and close sidebar
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }
    </script>
    @yield('script')
</body>
</html>

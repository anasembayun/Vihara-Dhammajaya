document.write(`
<!-- side bar -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3" id="mySidebar">
        <div class="w3-container w3-display-container w3-padding-16 d-flex justify-content-center">
            <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
            <img src="aset/img/atas-bawah.png" alt="Logo" style="width:210px;margin-top: 18px;">
        </div>
        <hr class="line-hr mt-3 mb-0">
        <div class="w3-padding-64 w3-medium w3-text-grey ps-1 pt-2">
            <!-- sub menu 01 -->
            <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align">
                Kelola Admin

                <snap id="arrow-d-01"><i class="bi bi-arrow-right" style="float:right;"></i></snap>
                <snap id="arrow-n-01" class="arrow-miss"><i class="bi bi-arrow-down" style="float:right;"></i></snap>

            </a>
            <div id="demoAcc" class="dropdown-items w3-bar-block w3-hide w3-padding-large">
                <a href="tambahAdmin.html" class="w3-bar-item w3-button">Tambah Admin</a>
                <a href="daftarAdmin.html" class="w3-bar-item w3-button">Daftar Admin</a>
                <a href="hakAkses.html" class="w3-bar-item w3-button">Hak Akses</a>
            </div>

            <!-- sub menu 02 -->
            <a onclick="dropShow()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align">
                Kelola Jemaat

                <snap id="arrow-d-02"><i class="bi bi-arrow-right" style="float:right;"></i></snap>
                <snap id="arrow-n-02" class="arrow-miss"><i class="bi bi-arrow-down" style="float:right;"></i></snap>

            </a>
            <div id="drop-show-02" class="dropdown-items w3-bar-block w3-hide w3-padding-large">
                <a href="tambahJemaat.html" class="w3-bar-item w3-button">Tambah Jemaat</a>
                <a href="tambahDataBaptisan.html" class="w3-bar-item w3-button">Tambah Data Baptisan</a>
                <a href="tambahDataPernikahan.html" class="w3-bar-item w3-button">Tambah Data Pernikahan</a>
            </div>

            <a href="iuran.html" class="w3-bar-item w3-button">Iuran</a>
            <a href="jadwalkanKegiatan.html" class="w3-bar-item w3-button">Jadwalkan Kegiatan</a>
            <a href="detailKegiatan.html" class="w3-bar-item w3-button">Detail Kegiatan</a>

            <!-- sub menu 03 -->
            <a onclick="dropShow03()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align">
                Kelola Barang

                <snap id="arrow-d-03"><i class="bi bi-arrow-right" style="float:right;"></i></snap>
                <snap id="arrow-n-03" class="arrow-miss"><i class="bi bi-arrow-down" style="float:right;"></i></snap>

            </a>
            <div id="drop-show-03" class="dropdown-items w3-bar-block w3-hide w3-padding-large ">
                <a href="daftarBarang.html" class="w3-bar-item w3-button">Daftar Barang</a>
                <a href="pasokBarang.html" class="w3-bar-item w3-button">Pasok Barang</a>
            </div>

            <!-- sub menu 04 -->
            <a onclick="dropShow04()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align">
                Kelola Transaksi

                <snap id="arrow-d-04"><i class="bi bi-arrow-right" style="float:right;"></i></snap>
                <snap id="arrow-n-04" class="arrow-miss"><i class="bi bi-arrow-down" style="float:right;"></i></snap>

            </a>
            <div id="drop-show-04" class="dropdown-items w3-bar-block w3-hide w3-padding-large ">
                <a href="transaksi.html" class="w3-bar-item w3-button">Transaksi</a>
                <a href="riwayatTransaksi.html" class="w3-bar-item w3-button">Riwayat Transaksi</a>

            </div>

            <!-- sub menu 05 -->
            <a onclick="dropShow05()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align">
                Kelola laporan

                <snap id="arrow-d-05"><i class="bi bi-arrow-right" style="float:right;"></i></snap>
                <snap id="arrow-n-05" class="arrow-miss"><i class="bi bi-arrow-down" style="float:right;"></i></snap>

            </a>
            <div id="drop-show-05" class="dropdown-items w3-bar-block w3-hide w3-padding-large">
                <a href="laporanTransaksi.html" class="w3-bar-item w3-button">Laporan Transaksi</a>
                <a href="laporanPegawai.html" class="w3-bar-item w3-button">Laporan Pegawai</a>
                <a href="laporanStok.html" class="w3-bar-item w3-button">Laporan Stok</a>
            </div>

            <!-- sub menu 06 -->
            <a onclick="dropShow06()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align">
                Akun

                <snap id="arrow-d-06"><i class="bi bi-arrow-right" style="float:right;"></i></snap>
                <snap id="arrow-n-06" class="arrow-miss"><i class="bi bi-arrow-down" style="float:right;"></i></snap>

            </a>
            <div id="drop-show-06" class="dropdown-items w3-bar-block w3-hide w3-padding-large">
                <a href="manageAkun.html" class="w3-bar-item w3-button">Manage Akun</a>
                <a href="dataAkun.html" class="w3-bar-item w3-button">Data Akun</a>

            </div>

            <!-- sub menu 07 -->
            <a onclick="dropShow07()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align">
                Aktiva

                <snap id="arrow-d-07"><i class="bi bi-arrow-right" style="float:right;"></i></snap>
                <snap id="arrow-n-07" class="arrow-miss"><i class="bi bi-arrow-down" style="float:right;"></i></snap>

            </a>
            <div id="drop-show-07" class="dropdown-items w3-bar-block w3-hide w3-padding-large">
                <a href="aktivaTetap.html" class="w3-bar-item w3-button">Aktiva Tetap</a>
                <a href="aktivaLancar.html" class="w3-bar-item w3-button">Aktiva Lancar</a>
                <a href="laporanAktiva.html" class="w3-bar-item w3-button">Laporan Aktiva</a>
            </div>


           

            <!-- sub menu 08 -->
            <a onclick="dropShow08()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align">
                Kas

                <snap id="arrow-d-08"><i class="bi bi-arrow-right" style="float:right;"></i></snap>
                <snap id="arrow-n-08" class="arrow-miss"><i class="bi bi-arrow-down" style="float:right;"></i></snap>

            </a>
            <div id="drop-show-08" class="dropdown-items w3-bar-block w3-hide w3-padding-large">
                <a href="kasIn.html" class="w3-bar-item w3-button">Kas In</a>
                <a href="kasOut.html" class="w3-bar-item w3-button">Kas Out</a>
            </div>

            <a href="bank.html" class="w3-bar-item w3-button">Bank</a>

            <!-- sub menu 09 -->
            <a onclick="dropShow09()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align">
            Laporan Keuangan

            <snap id="arrow-d-09"><i class="bi bi-arrow-right" style="float:right;"></i></snap>
            <snap id="arrow-n-09" class="arrow-miss"><i class="bi bi-arrow-down" style="float:right;"></i>
            </snap>

            </a>
            <div id="drop-show-09" class="dropdown-items w3-bar-block w3-hide w3-padding-large">
                <a href="jurnalHarian.html" class="w3-bar-item w3-button">Jurnal Harian</a>
                <a href="bukuBesar.html" class="w3-bar-item w3-button">Buku Besar</a>
                <a href="neraca.html" class="w3-bar-item w3-button">Neraca</a>
                <a href="laporanLabaRugi.html" class="w3-bar-item w3-button">Laporan Laba Rugi</a>
            </div>


        </div>

    </nav>

    <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu"
        id="myOverlay"></div>

    <!-- !PAGE CONTENT! / default-->
    <div class="w3-main" style="margin-left:250px">

        <script src="aset/header.js"></script>

        <!-- Push down content on small screens / default-->
        <div class="w3-hide-large" style="margin-top:83px"></div>

        <!-- Top header / default-->
        <header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
            <p class="w3-left">Tambah Admin</p>
            <p class="w3-right">
                Role <span>: Super Admin </span>
            </p>
        </header>

        <!-- Top menu small screen / default-->
        <!-- Top menu on small screens -->
        <header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
            <div class="w3-bar-item w3-padding-24 w3-wide">
                <img src="aset/img/atas-bawah.png" alt="Logo">
            </div>
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i
                    class="fa fa-bars"></i></a>
        </header>
    </div>
`)

// How to include Html to other Html file; https://stackoverflow.com/questions/8988855/include-another-html-file-in-a-html-file
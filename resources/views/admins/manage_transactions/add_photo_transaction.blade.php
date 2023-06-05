@extends('templates.admin_main')
@section('top-header')
    <header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
        <p class="w3-left">Transaksi Foto Umat (Terdaftar)</p>
        <p class="w3-right">Role
            <span>: {{ Auth::guard('admin')->user()->role }} </span>
        </p>
    </header>
@endsection
@section('css')
    <!-- Select2 Plugin for search in select -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>
        .select2 {
            width: 100% !important;
        }
    </style>
@endsection
@section('content')
    <div class="w3-main container-main" style="margin-left:250px;padding-top: 0;">
        <ul class="nav nav-tabs justify-content-center">
            <li class="nav-item">
                <a class="nav-link active disabled" aria-current="page" href="#">Umat Terdaftar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #000000;"
                    href="{{ url('kelola-transaksi/tambah-transaksi-foto-2') }}">Umat Tidak Terdaftar</a>
            </li>
        </ul>
        <!-- isi halaman -->
        <div class="container-fluid isi px-4 mt-3">
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="container-fluid detailTransaksi px-3 pt-4 py-1">
                <div class="row ">
                    <div class="col-6 col-sm-6 col-md-2 col-lg-2 mx-0 ">
                        <p>ID Pemesan : </p>
                    </div>
                    <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                        <div class="mb-3">
                            <form action="{{ $_SERVER['PHP_SELF'] }}" method="POST">
                                <select class="isi-form form-select id_jamaat" data-select2-id="_id_jamaat" id="id_jamaat"
                                    aria-label="Example select with button addon" name="id_jamaat">
                                    <option value="" selected disabled>-- ID Pemesan --</option>
                                    @foreach ($jamaats as $jamaat)
                                        @php
                                            $penanggung_jawab = \App\Models\UserJamaat::select('name', 'id_code')
                                                ->where('id_code', '=', $jamaat->id_pemesan)
                                                ->first();
                                        @endphp
                                        <option value="{{ $jamaat->id_pemesan }}">
                                            {{ $jamaat->id_pemesan }} - {{ $penanggung_jawab->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-7">
                        <div class="mb-3">
                            <input name="nama_pemesan" type="text" class="form-control nama-pemesan" id="ordinary"
                                aria-describedby="emailHelp" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="kiri col-12 col-sm-12 col-md-6 col-lg-6 mx-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-5 mt-2 mt-lg-0">
                                        <p>Kode Transaksi : </p>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-7">
                                        <p id="vkode_transaksi"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-5  mt-2 mt-lg-0">
                                        <p>Admin : </p>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-7">
                                        <p>{{ Auth::guard('admin')->user()->name }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-5 mt-2 mt-lg-0">
                                        <p>Alamat Pemesan : </p>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-7">
                                        <textarea name="alamat_pemesan" class="form-control alamat-pemesan" id="ordinary" aria-describedby="emailHelp"
                                            required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-5  mt-2 mt-lg-0">
                                        <p>Metode Pembayaran : </p>
                                    </div>
                                    <div class="col-12 col-sm-6col-md-6 col-lg-7">
                                        <select class="isi-form form-select metode_pembayaran" id="ordinary"
                                            aria-label="Example select with button addon" name="metode_pembayaran" required>
                                            <option value="" disabled selected>-- Metode Pembayaran --</option>
                                            <option value="Tunai">Tunai</option>
                                            <option value="Transfer">Transfer BCA</option>
                                            <option value="QRIS">QRIS</option>
                                            <option value="Debit">Debit BCA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kanan col-12 col-sm-12 col-md-6 col-lg-6 mx-0 ">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-5  mt-2 mt-lg-0">
                                        <p>Tanggal : </p>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-7">
                                        <p id="vtanggal"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-5  mt-2 mt-lg-0">
                                        <p>Waktu : </p>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-7">
                                        <p id="waktu"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <h2 id="prices">Rp 0,00</h2>
                            </div>
                            <div class="btn-container mb-0 mt-3 mb-3 d-flex justify-content-lg-end justify-content-center ">
                                <button class="btn btn-secondary btn-sm btn-2" id="validasi_transaksi" type="button"
                                    data-bs-toggle="modal" data-bs-target="#validasiModal"
                                    style="margin-top: 8%;width:150px" onclick="showdata()">
                                    Bayar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid detailTransaksi px-3 pt-3 mt-4">
                <p style="font-weight: 100;color: grey;">Tambah Transaksi</p>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Mendiang</label>
                            <select class="isi-form form-select id_mendiang" data-select2-id="_id_mendiang"
                                id="id_mendiang" aria-label="Example select with button addon" name="id_mendiang"
                                required>

                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Pembayaran sampai bulan</label>
                            <input name="pembayaran_sampai_bulan" type="month" min=""
                                class="form-control bayar-sampai-bulan" id="ordinary" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Pembayaran bulan terakhir</label>
                            <input name="pembayaran_bulan_terakhir" type="month" value=""
                                class="form-control bayar-bulan-terakhir" id="ordinary" aria-describedby="emailHelp"
                                readonly>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-6"></div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Biaya per bulan</label>
                            <p><b>Rp. 10.000,00</b></p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-6">
                        <div class="container-fluid mb-3 px-0" style="display: flex; justify-content: right;">
                            <button type="button" class="btn btn-secondary btn-sm btn-2"
                                style="margin-top:1%; margin-right: 1%" id="button_add_cart">Tambah</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid detailTransaksi px-3 pt-2 mt-4" style="height:auto">
                <img src="{{ asset('images/app_admin/kelola_transaksi/shopping-cart.png') }}" class="d-inline-block"
                    style="width:15px;">
                <p style="color:grey" class="d-inline-block"> Daftar Transaksi Foto </p>
                <table class="table" style="width: 100%; margin-bottom: 20px;">
                    <thead style="background-color: white; color: black;">
                        <tr>
                            <th scope="col" style="width: 10%; text-align: center;">Nomer Item</th>
                            <th scope="col" style="width: 20%;">Nama Mendiang</th>
                            <th scope="col" style="width: 10%;">Total Periode</th>
                            <th scope="col" style="width: 15%;">Pembayaran bulan terakhir</th>
                            <th scope="col" style="width: 15%;">Pembayaran sampai bulan</th>
                            <th scope="col" style="width: 15%;">Total Harga</th>
                            <th scope="col" style="width: 5%; text-align: center;"></th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider" id="cart-table">

                    </tbody>
                </table>
            </div>

            <!-- Modal Validasi -->
            <div class="modal fade" id="validasiModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Validasi Data</h5>
                        </div>
                        <form action="{{ url('kelola-transaksi/validasi-pembayaran-foto/') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row mt-2">
                                        <div class="col-md-4">
                                            Nama Pemesan :
                                        </div>
                                        <div class="col-md-8 ms-auto">
                                            <input type="text" id="nama_pemesan" name="nama_pemesan" value=""
                                                class="form-control" aria-describedby="emailHelp" readonly>
                                            <input type="hidden" id="id_pemesan" name="id_pemesan" value=""
                                                class="form-control" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4">
                                            Alamat Pemesan:
                                        </div>
                                        <div class="col-md-8 ms-auto">
                                            <input type="text" id="alamat_pemesan" name="alamat_pemesan"
                                                value="" class="form-control" aria-describedby="emailHelp"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4">
                                            Admin :
                                        </div>
                                        <div class="col-md-8 ms-auto">
                                            <input type="text" id="name_admin" name="name_admin"
                                                value="{{ Auth::guard('admin')->user()->name }}" class="form-control"
                                                aria-describedby="emailHelp" readonly>
                                            <input type="hidden" id="id_admin" name="id_admin"
                                                value="{{ Auth::guard('admin')->user()->id }}" class="form-control"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4">
                                            Kode Transaksi :
                                        </div>
                                        <div class="col-md-8 ms-auto">
                                            <input type="text" id="kode_transaksi" name="kode_transaksi"
                                                value="" class="form-control" aria-describedby="emailHelp"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4">
                                            Metode Pembayaran :
                                        </div>
                                        <div class="col-md-8 ms-auto">
                                            <input type="text" id="metode_pembayaran" name="metode_pembayaran"
                                                value="" class="form-control" aria-describedby="emailHelp"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4">
                                            Tanggal :
                                        </div>
                                        <div class="col-md-8 ms-auto">
                                            <input type="text" id="tanggal_transaksi" name="tanggal_transaksi"
                                                value="" class="form-control" aria-describedby="emailHelp"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4">
                                            Total Harga :
                                        </div>
                                        <div class="col-md-8 ms-auto">
                                            <input type="text" id="_total_harga_keseluruhan" value=""
                                                class="form-control" aria-describedby="emailHelp" readonly>
                                            <input type="hidden" id="total_harga_keseluruhan"
                                                name="total_harga_keseluruhan" value="" class="form-control"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4">
                                            Data Foto :
                                        </div>
                                        <div class="col-md-8 ms-auto" id="items">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary" onclick="sendData()">Validasi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- isi tiap halaman sampai sini -->
        </div>
    </div>
@endsection
@section('script')
    <script>
        // Real-Time Clock
        const currentTime = () => {
            const el = document.querySelector('#waktu');

            let date = new Date();
            let hh = date.getHours();
            let mm = date.getMinutes();
            let ss = date.getSeconds();

            hh = hh < 10 ? `0${hh}` : hh;
            mm = mm < 10 ? `0${mm}` : mm;
            ss = ss < 10 ? `0${ss}` : ss;

            let time = `${hh}:${mm}:${ss}`;
            el.innerText = time;
        };

        currentTime();
        setInterval(currentTime, 1000);
        // ===========================================================

        $(".id_jamaat").select2();
        $(".id_mendiang").select2();

        // Variable
        var date = new Date();
        var today = date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear();

        let cart = [];
        let check_cart = [];
        let total_bayar_transaksi = 0;
        let total_periode = 0;
        let jumlahBarang = 0;

        // Set minimum bulan pembayaran
        var d = date.getDate();
        var m = date.getMonth() + 2;
        var y = date.getFullYear();
        if (d < 10) {
            d = '0' + d;
        }
        if (m < 10) {
            m = '0' + m;
        }
        var min_month = y + '-' + m;
        document.getElementsByClassName("bayar-sampai-bulan")[0].setAttribute("min", min_month);

        $("#vtanggal").html(today);
        var transactionCode = randomCodeTransaction()
        $("#vkode_transaksi").html(transactionCode);

        // Generate Random Code Transaction
        function randomCodeTransaction() {
            return ([1e7] + -1e3 + -4e3 + -8e3 + -1e11).replace(/[018]/g, c =>
                (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
            );
        }

        // Convertion Decimal to Rupiah
        function convertDecimalToRupiah(conv) {
            var x = parseInt(conv);
            const format = x.toString().split('').reverse().join('');
            const convert = format.match(/\d{1,3}/g);
            const harga_item = 'Rp ' + convert.join('.').split('').reverse().join('') + ',00';

            return harga_item;
        }

        // Get Data Mendiang by ID Penanggung Jawab
        $("#id_mendiang").append($('<option value="0" disabled selected>-- Nama Mendiang --</option>'));
        $(document).on('change', '.id_jamaat', function(e) {
            $.ajax({
                url: "{{ url('/kelola-transaksi/tampil-mendiang-by-id') }}/" + this.value,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    $("#id_mendiang").empty();
                    $("#id_mendiang").append($(
                        '<option value="0" disabled selected>-- Nama Mendiang --</option>'));
                    $.each(data.mendiangs_by_id_pemesan, function(nama, key) {
                        if (check_cart.includes(key.id) == false) {
                            $('#id_mendiang').append($('<option></option>').attr('value', key
                                .id).text(key.nama_mendiang));
                        }
                    })
                }
            });
        });

        // Get Data Jamaat by ID Penanggung Jawab
        $('.id_jamaat').change(function() {
            $.ajax({
                url: "{{ url('/tampil-data-jamaat-by-id_code') }}/" + $(this).val(),
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    $.each(data.jamaat, function(nama, key) {
                        $("input[name^='nama_pemesan']").val(key.name);
                        $(".alamat-pemesan").val(key.alamat);
                    })
                }
            });
        });

        // Get Periode Pemesanan by selected ID Mendiang
        $('.id_mendiang').change(function() {
            $("input[name^='pembayaran_bulan_terakhir']").val("");
            $("input[name^='pembayaran_sampai_bulan']").val("");
            var id_mendiang = $('.id_mendiang option:selected').val();
            $.ajax({
                url: "{{ url('/kelola-transaksi/tampil-mendiang-by-id') }}/" + id_mendiang,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    $.each(data.mendiangs_by_id, function(nama, key) {
                        // console.log(nama,key);
                        var month = new Date(key.periode_pemesanan);
                        var m = month.getMonth() + 1;
                        var m2 = month.getMonth() + 2;
                        var y = month.getFullYear();
                        if (m < 10) {
                            m = '0' + m;
                        }
                        var periode_pemesanan = y + '-' + m;
                        if (m2 > 12) {
                            y += 1;
                            m2 -= 12;
                        }
                        if (m2 < 10) {
                            m2 = '0' + m2;
                        }
                        var periode_pemesanan2 = y + '-' + m2;

                        var _d = date.getDate();
                        var _m = date.getMonth() + 1;
                        if (_d < 10) {
                            _d = '0' + _d;
                        }
                        if (_m < 10) {
                            _m = '0' + _m;
                        }
                        var _today = date.getFullYear() + '-' + _m + '-' + _d;

                        if (key.transaksi_terakhir != null) {
                            
                            $("input[name^='pembayaran_bulan_terakhir']").val(
                                key.transaksi_terakhir);
                            if (new Date(key.transaksi_terakhir) < _today) {
                                document.getElementsByClassName("bayar-sampai-bulan")[0]
                                    .setAttribute("min", min_month);
                            } else if (new Date(key.transaksi_terakhir) > _today) {
                                document.getElementsByClassName("bayar-sampai-bulan")[0]
                                    .setAttribute("min", (key.transaksi_terakhir - _today));

                            } else {
                                document.getElementsByClassName("bayar-sampai-bulan")[0]
                                    .setAttribute("min", key.transaksi_terakhir);
                            }
                        } else {
                            document.getElementsByClassName("bayar-sampai-bulan")[0]
                                .setAttribute("min", min_month);
                        }
                    })
                }
            });
        });

        function showdata() {
            jumlahBarang = 0;
            total_bayar_transaksi = 0;
            x = 1;

            $("#cart-table").html("");
            $("#items").html("");

            for (let i = 0; i < cart.length; i++) {
                var data = '<tr id="' + cart[i]['id'] + '">' +
                    '<th scope="row" style="text-align: center;">' + x + '</th>' +
                    '<td>' + cart[i]['nama_mendiang'] + '</td>' +
                    '<td>' + cart[i]['total_periode'] + ' bulan</td>' +
                    '<td>' + cart[i]['pembayaran_bulan_terakhir'] + '</td>' +
                    '<td>' + cart[i]['pembayaran_sampai_bulan'] + '</td>' +
                    '<td>' + convertDecimalToRupiah(cart[i]['total_harga']) + '</td>' +
                    '<td>' +
                    '<button class="btn bg-white" type="button" onclick="delItem(' + jumlahBarang + ', ' + cart[i]['id'] +
                    ')" id="item' + jumlahBarang + '">' +
                    '<img src="{{ asset('images/app_admin/kelola_admin/trash-can.png') }}" style="width:20px">' +
                    '</button>' +
                    '</td>' +
                    '</tr>'

                x++;

                if (i == 0) {
                    var validate_item = '<input type="text" name="nama_mendiang[]" value="' + cart[i]['nama_mendiang'] +
                        '" class="form-control" aria-describedby="emailHelp" readonly>'
                } else {
                    var validate_item = '<input type="text" name="nama_mendiang[]" value="' + cart[i]['nama_mendiang'] +
                        '" class="form-control" aria-describedby="emailHelp" style="margin-top: 8px;" readonly>'
                }

                var id_validate_item = '<input type="hidden" name="id_mendiang[]" value="' + cart[i]['id'] +
                    '" class="form-control" aria-describedby="emailHelp">' +
                    '<input type="hidden" name="total_periode[]" value="' + cart[i]['total_periode'] +
                    '" class="form-control" aria-describedby="emailHelp">' +
                    '<input type="hidden" name="pembayaran_bulan_terakhir[]" value="' + cart[i][
                        'pembayaran_bulan_terakhir'
                    ] + '" class="form-control" aria-describedby="emailHelp">' +
                    '<input type="hidden" name="pembayaran_sampai_bulan[]" value="' + cart[i]['pembayaran_sampai_bulan'] +
                    '" class="form-control" aria-describedby="emailHelp">' +
                    '<input type="hidden" name="total_harga[]" value="' + cart[i]['total_harga'] +
                    '" class="form-control" aria-describedby="emailHelp">'

                $("#cart-table").append(data);
                $("#items").append(validate_item);
                $("#items").append(id_validate_item);

                jumlahBarang += 1;
                total_bayar_transaksi += parseInt(cart[i]['total_harga'])
            }

            var rupiah = convertDecimalToRupiah(total_bayar_transaksi);
            $("#prices").html(rupiah);
            document.getElementById("nama_pemesan").value = document.querySelector('.nama-pemesan').value;
            document.getElementById("id_pemesan").value = document.querySelector('#id_jamaat').value;
            document.getElementById("alamat_pemesan").value = document.querySelector('.alamat-pemesan').value;
            document.getElementById("kode_transaksi").value = transactionCode;
            document.getElementById("tanggal_transaksi").value = today;
            document.getElementById("_total_harga_keseluruhan").value = convertDecimalToRupiah(total_bayar_transaksi);
            document.getElementById("total_harga_keseluruhan").value = total_bayar_transaksi;
            document.getElementById("metode_pembayaran").value = document.querySelector('.metode_pembayaran').value;
        }

        function delItem(idx, id) {
            for (let i = 0; i < cart.length; i++) {
                if (cart[i]['id'] == id) {
                    $('#id_mendiang').append($('<option></option>').attr('value', cart[i]['id']).text(cart[i][
                        'nama_mendiang'
                    ]));
                }
            }
            cart.splice(idx, 1)
            for (let i = 0; i < check_cart.length; i++) {
                if (check_cart[i] === id) {
                    check_cart.splice(i, 1);
                }
            }
            showdata()
        }

        document.getElementById('button_add_cart').addEventListener('click', () => {
            if (cart.length > 4) {
                Swal.fire({
                    title: 'MAKSIMUM TRANSAKSI',
                    text: 'Maksimum transaksi hanya 5 leluhur!',
                    icon: 'error',
                    showConfirmButton: true,
                    allowOutsideClick: false
                });
            } else {
                if (document.querySelector('.id_mendiang').value == "") {
                    alert('id mendiang belum diisi!');
                } else if (document.querySelector('.bayar-sampai-bulan').value == "") {
                    alert('bulan bayar belum diisi!');
                } else {
                    $.ajax({
                        url: "{{ url('/tampil-data-leluhur') }}/" + document.querySelector('.id_mendiang')
                            .value,
                        method: "GET",
                        dataType: "JSON",
                        success: function(data) {
                            if (document.querySelector('.bayar-bulan-terakhir').value == "") {
                                var bulan_bayar = new Date(document.querySelector('.bayar-sampai-bulan')
                                    .value);
                                var difference = Math.abs(bulan_bayar - bulan_terakhir);
                                console.log(1);

                                var months = parseInt((difference / (1000 * 3600 * 24 * 30)));
                            } else {
                                var bulan_bayar = new Date(document.querySelector('.bayar-sampai-bulan')
                                    .value);
                                var bulan_terakhir = new Date(document.querySelector(
                                    '.bayar-bulan-terakhir').value);
                                if (bulan_terakhir < date) {
                                    var difference = Math.abs(bulan_bayar - bulan_terakhir);
                                    var months = parseInt((difference / (1000 * 3600 * 24 * 30)));
                                    // var months = Math.abs(bulan_terakhir.getMonth() - date.getMonth())
                                    // console.log(bulan_bayar.getMonth());
                                } else {
                                    var difference = Math.abs(bulan_bayar - bulan_terakhir);
                                    console.log(3);
                                    var months = parseInt(difference / (1000 * 3600 * 24 * 30));
                                }
                            }
                            cart.push({
                                'id': data.leluhur[0]['id'],
                                'id_pemesan': data.leluhur[0]['id_pemesan'],
                                'alamat_pemesan': document.querySelector('.alamat-pemesan')
                                    .value,
                                'nama_mendiang': data.leluhur[0]['nama_mendiang'],
                                'total_periode': months,
                                'pembayaran_bulan_terakhir': document.querySelector(
                                    '.bayar-bulan-terakhir').value,
                                'pembayaran_sampai_bulan': document.querySelector(
                                    '.bayar-sampai-bulan').value,
                                'total_harga': months * 10000,
                            })
                            check_cart.push(data.leluhur[0]['id']);

                            $("#id_mendiang option[value='" + data.leluhur[0]['id'] + "']").remove();
                            document.querySelector('#id_mendiang').querySelectorAll('option')[0]
                                .selected = 'selected';
                            $("input[name^='pembayaran_bulan_terakhir']").val("");
                            $("input[name^='pembayaran_sampai_bulan']").val("");

                            showdata()
                        }
                    });
                }
            }
        })

        function sendData() {
            if (document.querySelector('#id_jamaat').value == "") {
                alert('id pemesan belum diisi!');
            } else if (document.querySelector('#nama_pemesan').value == "") {
                alert('nama pemesan belum diisi!');
            } else if (document.querySelector('#alamat_pemesan').value == "") {
                alert('alamat pemesan belum diisi!');
            } else if (document.querySelector('#metode_pembayaran').value == "") {
                alert('metode pembayaran belum diisi!');
            } else {
                $.ajax({
                    url: "{{ url('/kelola-transaksi/validasi-pembayaran-foto') }}",
                    type: 'POST',
                    dataType: 'json',
                    contentType: 'json',
                    data: JSON.stringify(cart),
                    contentType: 'application/json; charset=utf-8',
                });
            }
        }
    </script>
@endsection

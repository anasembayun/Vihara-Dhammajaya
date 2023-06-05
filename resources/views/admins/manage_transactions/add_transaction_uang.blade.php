@extends('templates.admin_main')
@section('top-header')
    <header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
        <p class="w3-left">Transaksi Dana</p>
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
        /* Hide Arrow - Input Number */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .select2 {
            width: 100% !important;
        }
    </style>
@endsection
@section('content')
    <div class="w3-main container-main" style="margin-left:250px;padding-top: 0;">
        <ul class="nav nav-tabs justify-content-center">
            <li class="nav-item">
                <a class="nav-link active disabled" aria-current="page" href="#">Transaksi Dana</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #000000;"
                    href="{{ url('kelola-transaksi/tambah-transaksi-barang') }}">Transaksi Paket</a>
            </li>
        </ul>
        <!-- isi halaman -->
        <div class="container-fluid isi px-4 mt-4">
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
                        <p>ID Umat : </p>
                    </div>
                    <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                        <div class="mb-3">
                            <select class="isi-form form-select id_jamaat" data-select2-id="_id_jamaat" id="ordinary"
                                aria-label="Example select with button addon" name="id_jamaat" required>
                                <option value="" selected disabled>-- ID Umat --</option>
                                @foreach ($jamaats as $jamaat)
                                    <option value="{{ $jamaat->id_code }}">{{ $jamaat->id_code }} - {{ $jamaat->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-7">
                        <div class="mb-3">
                            <!-- <label for="exampleInputEmail1" class="form-label">Nama Jemaat</label> -->
                            <input name="nama_jamaat" type="tel" class="form-control nama-jamaat" id="ordinary"
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
                                        <p>Alamat : </p>
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
                                        <p>Tujuan Dana : </p>
                                    </div>
                                    <div class="col-12 col-sm-6col-md-6 col-lg-7">
                                        <select class="isi-form form-select id_kegiatan" data-select2-id="_id_kegiatan"
                                            id="ordinary" aria-label="Example select with button addon"
                                            name="nama_kegiatan" required>
                                            <option value="" disabled selected>-- Nama Kegiatan --</option>
                                            @foreach ($donasis as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_kegiatan_donasi }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-5  mt-2 mt-lg-0">
                                        <p>Kategori Donasi : </p>
                                    </div>
                                    <div class="col-12 col-sm-6col-md-6 col-lg-7">
                                        <p id="_kategori_donasi">Dana</p>
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
                            <div
                                class="btn-container mb-0 mt-3 mb-3 d-flex justify-content-lg-end justify-content-center ">
                                <button class="btn btn-secondary btn-sm btn-2" id="validasi_transaksi" type="button"
                                    data-bs-toggle="modal" data-bs-target="#validasiModal"
                                    style="margin-top: 8%;width:150px" onclick="showDataToValidate()">
                                    Bayar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid detailTransaksi px-3 pt-3 mt-4">
                <p style="font-weight: 100;color: grey;">Transaksi</p>
                <div class="row" id="inputan-transaksi">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jumlah Donasi</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white" id="ordinary">Rp</span>
                                <input name="jumlah_donasi" type="number" pattern="[0-9]+"
                                    class="form-control input_money" id="ordinary" aria-describedby="emailHelp"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="btn-container mt-3 mb-3 d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary btn-sm btn-2" id="button_add_donasi"
                                onclick="getDonation()">Tambah</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Validasi -->
            @foreach ($jamaats as $user)
                <div class="modal fade" id="validasiModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Validasi Data</h5>
                            </div>
                            <form action="{{ url('kelola-transaksi/validasi-pembayaran-uang') }}" target="_blank" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="row mt-2">
                                            <div class="col-md-4">
                                                Nama Kegiatan :
                                            </div>
                                            <div class="col-md-8 ms-auto">
                                                <input type="text" id="nama_acara" name="nama_acara" value=""
                                                    class="form-control" aria-describedby="emailHelp" required readonly>
                                                <input type="hidden" id="_idAcara" name="id_kegiatan_donasi"
                                                    value="" class="form-control" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-4">
                                                Nama :
                                            </div>
                                            <div class="col-md-8 ms-auto">
                                                <input type="text" id="_nameUser" name="nama_jamaat" value=""
                                                    class="form-control" aria-describedby="emailHelp" required readonly>
                                                <input type="hidden" id="_idUser" name="id_jamaat" value=""
                                                    class="form-control" aria-describedby="emailHelp" required>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-4">
                                                Alamat :
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
                                                <input type="text" id="_nameAdmin" name="name_admin"
                                                    value="{{ Auth::guard('admin')->user()->name }}" class="form-control"
                                                    aria-describedby="emailHelp" readonly>
                                                <input type="hidden" id="_idAdmin" name="id_admin"
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
                                                Kategori Donasi :
                                            </div>
                                            <div class="col-md-8 ms-auto">
                                                <input type="text" id="kategori_donasi" name="kategori_donasi"
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
                                                <input type="text" id="tanggal" name="tanggal_transaksi"
                                                    value="" class="form-control" aria-describedby="emailHelp"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-4">
                                                Total Harga :
                                            </div>
                                            <div class="col-md-8 ms-auto">
                                                <input type="text" id="_total_harga" name="_total_harga"
                                                    value="" class="form-control" aria-describedby="emailHelp"
                                                    required readonly>
                                                <input type="hidden" id="total_harga" name="total_harga" value=""
                                                    class="form-control" aria-describedby="emailHelp" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary" onclick="sendData()">Validasi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- isi tiap halaman sampai sini -->
        </div>
    </div>
    @php
        $Donasi = new \App\Models\Donasi();
    @endphp
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
        $(".id_kegiatan").select2();

        let price = 0
        var today = new Date();
        var date = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
        $("#vtanggal").html(date);
        var transactionCode = randomCodeTransaction()
        $("#vkode_transaksi").html(transactionCode);

        function randomCodeTransaction() {
            return ([1e7] + -1e3 + -4e3 + -8e3 + -1e11).replace(/[018]/g, c =>
                (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
            );
        }

        function convertDecimalToRupiah(conv) {
            var x = parseInt(conv);
            const format = x.toString().split('').reverse().join('');
            const convert = format.match(/\d{1,3}/g);
            const harga_item = 'Rp ' + convert.join('.').split('').reverse().join('') + ',00';

            return harga_item;
        }

        $('.id_jamaat').change(function() {
            $.ajax({
                url: "{{ url('/tampil-data-jamaat-by-id_code') }}/" + $(this).val(),
                method: 'GET',
                type: "JSON",
                success: function(data) {
                    $.each(data.jamaat, function(nama, key) {
                        $("input[name^='nama_jamaat']").val(key.name);
                        $(".alamat-pemesan").val(key.alamat);
                    })
                }
            });
        })

        // Get Data Kegiatan/Acara Donasi by ID
        $('.id_kegiatan').change(function() {
            $.ajax({
                url: "{{ url('/tampil-data-kegiatan-donasi') }}/" + $(this).val(),
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    $("input[name^='nama_acara']").val(data.nama_kegiatan_donasi);
                }
            });
        })

        function getDonation() {
            price = 0

            price += parseInt(document.querySelector('.input_money').value);
            if (isNaN(price)) {
                alert("Input jumlah donasi harus angka!");
                return false;
            }
            var rupiah = convertDecimalToRupiah(price);
            $("#prices").html(rupiah);
            document.getElementsByClassName('input_money')[0].value = "";
            console.log(rupiah);
        }

        function showDataToValidate() {
            document.getElementById("kode_transaksi").value = transactionCode;
            document.getElementById("tanggal").value = date;
            document.getElementById("_total_harga").value = convertDecimalToRupiah(price);
            document.getElementById("total_harga").value = price;
            document.getElementById("_idUser").value = document.querySelector('.id_jamaat').value;
            document.getElementById("_nameUser").value = document.querySelector('.nama-jamaat').value;
            document.getElementById("_idAcara").value = document.querySelector('.id_kegiatan').value;
            document.getElementById("alamat_pemesan").value = document.querySelector('.alamat-pemesan').value;
            document.getElementById("kategori_donasi").value = "Dana";
            document.getElementById("metode_pembayaran").value = document.querySelector('.metode_pembayaran').value;
        }

        function sendData() {
            if (document.querySelector('#_idUser').value == "") {
                alert('id umat belum diisi!');
            } else if (document.querySelector('#nama_acara').value == "") {
                alert('nama acara belum diisi!');
            } else if (document.querySelector('#_nameUser').value == "") {
                alert('nama umat belum diisi!');
            } else if (document.querySelector('#alamat_pemesan').value == "") {
                alert('alamat pemesan belum diisi!');
            } else if (document.querySelector('#metode_pembayaran').value == "") {
                alert('metode pembayaran belum diisi!');
            }
        }
    </script>
@endsection

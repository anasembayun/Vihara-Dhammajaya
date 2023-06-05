@extends('templates.admin_main')
@section('top-header')
<header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
    <p class="w3-left">Transaksi Foto Umat (Tidak Terdaftar)</p>
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
            <a class="nav-link" style="color: #000000;"
                href="{{ url('kelola-transaksi/tambah-transaksi-foto') }}">Umat Terdaftar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active disabled" aria-current="page" href="#">Umat Tidak Terdaftar</a>
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
                    <p>Nama Pemesan : </p>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-7">
                    <div class="mb-3">
                        <input name="nama_pemesan" type="text" class="form-control nama-pemesan" id="ordinary" aria-describedby="emailHelp" required>
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
                                    <textarea name="alamat_pemesan" class="form-control alamat-pemesan" id="ordinary" aria-describedby="emailHelp" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-6 col-lg-5 mt-2 mt-lg-0">
                                    <p>No Telepon Pemesan : </p>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-7">
                                    <input name="no_handphone_pemesan" type="number" class="form-control no-handphone-pemesan" id="ordinary" pattern="[0-9]+" aria-describedby="emailHelp" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-6 col-lg-5  mt-2 mt-lg-0">
                                    <p>Nama Kegiatan : </p>
                                </div>
                                <div class="col-12 col-sm-6col-md-6 col-lg-7">
                                    <select class="isi-form form-select id_kegiatan" data-select2-id="_id_kegiatan" id="ordinary" aria-label="Example select with button addon" name="nama_kegiatan" required>
                                        <option value="" disabled selected>-- Nama Kegiatan --</option>
                                        @foreach ($donasis as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_kegiatan_donasi }}</option>
                                            @php
                                                $nama_kegiatan = \App\Models\Donasi::where('id', $item->id)->value('nama_kegiatan_donasi');
                                            @endphp
                                        @endforeach
                                    </select>
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
                            <button class="btn btn-secondary btn-sm btn-2" id="validasi_transaksi" type="button" data-bs-toggle="modal" data-bs-target="#validasiModal" style="margin-top: 8%;width:150px" onclick="showdata()">
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
                        <input name="nama_leluhur" type="text" class="form-control nama_leluhur" id="ordinary" aria-describedby="emailHelp" required>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-6">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nominal bayar</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white" id="ordinary">Rp</span>
                            <input name="nominal_bayar" type="number" min="" class="form-control nominal-bayar" pattern="[0-9]+" id="ordinary" aria-describedby="emailHelp">
                        </div>
                    </div>
                </div>
                <div class="container-fluid mb-3 px-0" style="display: flex; justify-content: right;">
                    <button type="button" class="btn btn-secondary btn-sm btn-2" style="margin-top:1%; margin-right: 1%" id="button_add_cart">Tambah</button>
                </div>
            </div>
        </div>
        <div class="container-fluid detailTransaksi px-3 pt-2 mt-4" style="height:auto">
            <img src="{{ asset('images/app_admin/kelola_transaksi/shopping-cart.png') }}" class="d-inline-block" style="width:15px;">
            <p style="color:grey" class="d-inline-block"> Daftar Transaksi Foto </p>
            <table class="table" style="width: 100%; margin-bottom: 20px;">
                <thead style="background-color: white; color: black;">
                    <tr>
                        <th scope="col" style="width: 10%; text-align: center;">Nomer Item</th>
                        <th scope="col" style="width: 60%;">Nama Mendiang</th>
                        <th scope="col" style="width: 20%;">Nominal Bayar</th>
                        <th scope="col" style="width: 10%; text-align: center;"></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider" id="cart-table">
    
                </tbody>
            </table>
        </div>

        <!-- Modal Validasi -->
        <div class="modal fade" id="validasiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Validasi Data</h5>
                    </div>
                    <form action="{{ url('kelola-transaksi/validasi-pembayaran-foto-2') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        Nama Pemesan :
                                    </div>
                                    <div class="col-md-8 ms-auto">
                                        <input type="text" id="nama_pemesan" name="nama_pemesan" value="" class="form-control" aria-describedby="emailHelp" readonly>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        Alamat Pemesan:
                                    </div>
                                    <div class="col-md-8 ms-auto">
                                        <input type="text" id="alamat_pemesan" name="alamat_pemesan" value="" class="form-control" aria-describedby="emailHelp" readonly>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        No Telepon Pemesan:
                                    </div>
                                    <div class="col-md-8 ms-auto">
                                        <input type="text" id="no_telepon_pemesan" name="no_telepon_pemesan" value="" class="form-control" aria-describedby="emailHelp" readonly>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        Nama Kegiatan:
                                    </div>
                                    <div class="col-md-8 ms-auto">
                                        <input type="text" id="nama_kegiatan" name="nama_kegiatan" value="" class="form-control" aria-describedby="emailHelp" readonly>
                                        <input type="hidden" id="id_kegiatan" name="id_kegiatan" value="" class="form-control" aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        Admin :
                                    </div>
                                    <div class="col-md-8 ms-auto">
                                        <input type="text" id="name_admin" name="name_admin" value="{{ Auth::guard('admin')->user()->name }}" class="form-control" aria-describedby="emailHelp" readonly>
                                        <input type="hidden" id="id_admin" name="id_admin" value="{{ Auth::guard('admin')->user()->id }}" class="form-control" aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        Kode Transaksi :
                                    </div>
                                    <div class="col-md-8 ms-auto">
                                        <input type="text" id="kode_transaksi" name="kode_transaksi" value="" class="form-control" aria-describedby="emailHelp" readonly>
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
                                        <input type="text" id="tanggal_transaksi" name="tanggal_transaksi" value="" class="form-control" aria-describedby="emailHelp" readonly>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        Total Harga :
                                    </div>
                                    <div class="col-md-8 ms-auto">
                                        <input type="text" id="_total_harga_keseluruhan" value="" class="form-control" aria-describedby="emailHelp" readonly>
                                        <input type="hidden" id="total_harga_keseluruhan" name="total_harga_keseluruhan" value="" class="form-control" aria-describedby="emailHelp">
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

    $(".id_kegiatan").select2();

    // Variable
    var date = new Date();
    var today = date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear();
    
    let cart = [];
    let total_bayar_transaksi = 0;
    let total_periode = 0;
    let jumlahBarang = 0;

    $("#vtanggal").html(today);
    var transactionCode = randomCodeTransaction()
    $("#vkode_transaksi").html(transactionCode);

    // Generate Random Code Transaction
    function randomCodeTransaction() {
        return ([1e7]+-1e3+-4e3+-8e3+-1e11).replace(/[018]/g, c =>
            (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
        );
    }

    // Convertion Decimal to Rupiah
    function convertDecimalToRupiah(conv)
    {
        var x = parseInt(conv);
        const format = x.toString().split('').reverse().join('');
        const convert = format.match(/\d{1,3}/g);
        const harga_item = 'Rp ' + convert.join('.').split('').reverse().join('') +',00';

        return harga_item;
    }

    // Get Data Kegiatan Donasi by ID
    $('.id_kegiatan').change(function() {
        $.ajax({
            url: "{{ url('/tampil-data-kegiatan-donasi') }}/" + $(this).val(),
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                $("input[name^='nama_kegiatan']").val(data.nama_kegiatan_donasi);
            }
        });
    })

    function showdata() {
        jumlahBarang = 0;
        total_bayar_transaksi = 0;
        x = 1;
        
        $("#cart-table").html("");
        $("#items").html("");
        
        for (let i = 0; i < cart.length; i++) {
            var data = '<tr>' +
                '<th scope="row" style="text-align: center;">' + x + '</th>' +
                '<td>' + cart[i]['nama_mendiang'] + '</td>' +
                '<td>' + convertDecimalToRupiah(cart[i]['nominal_bayar']) + '</td>' +
                '<td>' +
                    '<button class="btn bg-white" type="button" onclick="delItem(' + jumlahBarang + ')" id="item' + jumlahBarang + '">' +
                        '<img src="{{ asset("images/app_admin/kelola_admin/trash-can.png") }}" style="width:20px">' +
                    '</button>' +
                '</td>' +
                '</tr>'
            x++;

            if (i == 0) { var validate_item = '<input type="text" name="nama_mendiang[]" value="' + cart[i]['nama_mendiang'] + '" class="form-control" aria-describedby="emailHelp" readonly>' }
            else { var validate_item = '<input type="text" name="nama_mendiang[]" value="' + cart[i]['nama_mendiang'] + '" class="form-control" aria-describedby="emailHelp" style="margin-top: 8px;" readonly>' }

            var id_validate_item = '<input type="hidden" name="total_harga[]" value="' + cart[i]['nominal_bayar'] + '" class="form-control" aria-describedby="emailHelp">'
            
            $("#cart-table").append(data);
            $("#items").append(validate_item);
            $("#items").append(id_validate_item);

            jumlahBarang += 1;
            total_bayar_transaksi += parseInt(cart[i]['nominal_bayar'])
        }

        var rupiah = convertDecimalToRupiah(total_bayar_transaksi);
        $("#prices").html(rupiah);
        document.getElementById("nama_pemesan").value = document.querySelector('.nama-pemesan').value;
        document.getElementById("alamat_pemesan").value = document.querySelector('.alamat-pemesan').value;
        document.getElementById("no_telepon_pemesan").value = document.querySelector('.no-handphone-pemesan').value;
        document.getElementById("id_kegiatan").value = document.querySelector('.id_kegiatan').value;
        document.getElementById("kode_transaksi").value = transactionCode;
        document.getElementById("tanggal_transaksi").value = today;
        document.getElementById("_total_harga_keseluruhan").value = convertDecimalToRupiah(total_bayar_transaksi);
        document.getElementById("total_harga_keseluruhan").value = total_bayar_transaksi;
        document.getElementById("metode_pembayaran").value = document.querySelector('.metode_pembayaran').value;
    }

    function delItem(idx) {
        cart.splice(idx, 1)
        showdata()
    }

    document.getElementById('button_add_cart').addEventListener('click', () => {
        if (cart.length > 4) {
            Swal.fire
            ({
                title: 'MAKSIMUM TRANSAKSI',
                text: 'Maksimum transaksi hanya 5 leluhur!',
                icon: 'error',
                showConfirmButton: true,
                allowOutsideClick: false
            });
        }
        else {
            if (document.querySelector('.nama_leluhur').value == "") { alert('nama mendiang belum diisi!'); }
            else if (document.querySelector('.nominal-bayar').value == "") { alert('nominal bayar belum diisi!'); }
            else {
                cart.push({
                    'nama_mendiang' : document.querySelector('.nama_leluhur').value,
                    'nominal_bayar' : document.querySelector('.nominal-bayar').value,
                });
                showdata()
            }
        }
    })

    function sendData() {
        if (document.querySelector('#nama_pemesan').value == "") { alert('nama pemesan belum diisi!'); }
        else if (document.querySelector('#alamat_pemesan').value == "") { alert('alamat pemesan belum diisi!'); }
        else if (document.querySelector('#no_telepon_pemesan').value == "") { alert('no telepon pemesan belum diisi!'); }
        else if (document.querySelector('#nama_kegiatan').value == "") { alert('nama kegiatan belum dipilih!'); }
        else if (document.querySelector('#metode_pembayaran').value == "") { alert('metode pembayaran belum diisi!'); }
        else
        {
            $.ajax({
                url:"{{url('/kelola-transaksi/validasi-pembayaran-foto-2')}}",
                type: 'POST',
                dataType:'json',
                contentType: 'json',
                data: JSON.stringify(cart),
                contentType: 'application/json; charset=utf-8',
            });
        }
    }

</script>
@endsection
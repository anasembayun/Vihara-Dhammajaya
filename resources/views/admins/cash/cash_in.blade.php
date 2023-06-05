@extends('templates.admin_main')
@section('top-header')
<header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
    <p class="w3-left">Tambah Kas Masuk</p>
    <p class="w3-right">Role
        <span>: {{ Auth::guard('admin')->user()->role }} </span>
    </p>
</header>
@endsection
@section('css')
<style>
    /* Hide Arrow - Input Number */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .form-label {
        font-family: 'Trebuchet MS', sans-serif;
        font-weight: bold;
        color: #2A363B;
    }
</style>
@endsection
@section('content')
<div class="w3-main container-main" style="margin-left:250px;padding-top: 0;">
    <div class="container-fluid isi px-4 mt-4 justify-content-center">
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
        <form id="cash-in-form" onsubmit="loadComponent()" action="{{ url('kas/kas-masuk/tambah-kas-masuk') }}" target="_blank" method="POST">
            @csrf
            <div class="row mb-4">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="card mb-5">
                        <div class="card-body mt-2">
                            <div class="container-fluid row g-3">
                                <div class="col-12">
                                    <label for="exampleInputEmail1" class="form-label">Nomor</label>
                                    <input name="nomor_kas_masuk" value="" type="text" class="form-control no-kas" id="ordinary" aria-describedby="emailHelp" readonly>
                                </div>
                                <div class="col-12">
                                    <label for="exampleInputEmail1" class="form-label">Tanggal <span class="text-danger">*</span></label>
                                    <input name="tanggal" value="{{ date('Y-m-d') }}" type="date" class="form-control" id="ordinary" aria-describedby="emailHelp">
                                </div>
                                <div class="col-12">
                                    <label for="exampleInputEmail1" class="form-label">ID Admin</label>
                                    <input name="id_admin" value="{{ Auth::guard('admin')->user()->id }}" type="text" class="form-control" id="ordinary" aria-describedby="emailHelp" readonly>
                                </div>
                                <div class="col-12">
                                    <label for="exampleInputEmail1" class="form-label">Nama Admin <span class="text-danger">*</span></label>
                                    <input name="name" value="{{ Auth::guard('admin')->user()->name }}" type="text" class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                                </div>
                                <div class="col-12">
                                    <label for="exampleInputEmail1" class="form-label">Untuk Keperluan <span class="text-danger">*</span></label>
                                    <select class="isi-form form-select keterangan-keperluan" id="ordinary" aria-label="Example select with button addon" name="keterangan_keperluan" required>
                                        <option value="" disabled selected>-- Untuk Keperluan --</option>
                                        <option value="Dana dari Yayasan">Dana dari Yayasan</option>
                                        <option value="Dana Paramita Umum">Dana Paramita Umum</option>
                                        <option value="Dana Paramita Remaja">Dana Paramita Remaja</option>
                                        <option value="Dana Paramita Anak-Anak">Dana Paramita Anak-Anak</option>
                                        <option value="Dana Paramita Muda Mudi">Dana Paramita Muda Mudi</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="exampleInputEmail1" class="form-label">Nominal Pemasukan <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-white" id="ordinary">Rp</span>
                                        <input name="nominal_pemasukan" type="number" class="form-control nominal-pemasukan" id="ordinary" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-muted text-center">
                            <div class="mb-2 mt-2">
                                <button type="submit" class="btn btn-1 btn-secondary btn-sm">TAMBAH</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script id="cash-in-script">
    document.querySelector('.keterangan-keperluan').value = "";
    $('.nominal-pemasukan').html("");

    function randomCodeTransaction() {
        return ([1e7] + -1e3 + -4e3 + -8e3 + -1e11).replace(/[018]/g, c =>
            (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
        );
    }

    console.log("called");

    var transactionCode = randomCodeTransaction()
    $(".no-kas").val(transactionCode);

    function loadComponent() {
        $(".container-main").load("{{ url('/kas/kas-masuk') }} .isi", function(data) {
            var transactionCode = randomCodeTransaction()
            $(".no-kas").val(transactionCode);
        });
    }
</script>
@endsection
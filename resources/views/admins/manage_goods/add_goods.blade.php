@extends('templates.admin_main')
@section('top-header')
    <header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
        <p class="w3-left">Tambah Paket Baru</p>
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
        <!-- isi halaman -->
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
        <div class="container-fluid isi px-4 mt-3">
            <form action="{{ url('kelola-barang/i-tambah-barang') }}" method="POST">
                @csrf
                <div class="row mb-4">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <div class="card mb-5">
                            <div class="card-header">
                                <div class="mb-2 mt-2">
                                    <a href="{{ url('kelola-barang/daftar-barang') }}" class="float-start" role="button"
                                        tabindex="-1" aria-disabled="true">
                                        <img src="{{ asset('images/app_admin/kelola_admin/back-icon.png') }}"
                                            style="width: 25px;">
                                    </a>
                                    <h5 class="sub-judul text-center"
                                        style="margin: 5px; margin-left: 25px; margin-right: 25px;">
                                        Data Paket</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="container-fluid row g-3">
                                    <div class="col-12">
                                        <label for="exampleInputEmail1" class="form-label">Kode Barang <span
                                                class="text-danger">*</span></label>
                                        <input name="kode_barang" type="text" value="" class="form-control"
                                            id="ordinary" aria-describedby="emailHelp" required>
                                        <div class="text-danger">
                                            @error('kode_barang')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="exampleInputEmail1" class="form-label">Nama Barang <span
                                                class="text-danger">*</span></label>
                                        <input name="nama_barang" type="text" value="" class="form-control"
                                            id="ordinary" aria-describedby="emailHelp" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="exampleInputEmail1" class="form-label">Harga Jual Barang <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-white" id="ordinary">Rp</span>
                                            <input name="harga_jual" type="number" value="" class="form-control"
                                                id="ordinary" aria-describedby="basic-addon1" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted text-center">
                                <div class="mb-2 mt-2">
                                    <button type="submit" class="btn btn-secondary btn-sm btn-1">SIMPAN</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </form>
            {{-- <div class="col-12 col-sm-12 col-md-4 col-lg-4  ">
                <div class="row">
                    <div class="col-12 detailTransaksi mt-2 mt-lg-0">
                        <h6 class="sub-judul ms-0 mt-3">Import File Excel</h6>
                        <div class="row mb-2 mt-5" >
                            <div class="col-12" style="font-size: 13px;">
                                <input type="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" ID="fileSelect" runat="server" style="width:90%" />  
                            </div>
                            <div class="col-12">
                                <div class="btn-container text-center mb-0  mb-1">
                                    <button type="button" class="btn btn-secondary btn-sm btn-2"
                                    style="margin-top: 7.55%;width:100%">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <!-- isi tiap halaman sampai sini -->
    </div>
@endsection

@extends('templates.admin_main')
@section('top-header')
<header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
    <p class="w3-left">Tambah Leluhur</p>
    <p class="w3-right">Role
        <span>: {{ Auth::guard('admin')->user()->role }} </span>
    </p>
</header>
@endsection
@section('content')
<div class="w3-main container-main" style="margin-left:250px;padding-top: 0;">
    <div class="container-fluid isi px-4 mt-3">
        <form action="{{ url('data-leluhur/i-tambah-data') }}" method="POST">
            @csrf
            <div class="row d-flex justify-content-center mb-1 ">
                <div class="col-12 col-xs-12 col-sm-12 col-lg-5">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Mendiang</label>
                        <input name="nama_mendiang" value="{{ old('nama_mendiang') }}" type="text" class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center mb-1 ">
                <div class="col-12 col-xs-12 col-sm-12 col-lg-5 ms-lg-3">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tempat Lahir</label>
                        <input name="tempat_lahir" value="{{ old('tempat_lahir') }}" type="text" class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                    </div>
                </div>
                <div class="col-12 col-xs-12 col-sm-12 col-lg-5">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                        <input name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" type="date" class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center mb-1 ">
                <div class="col-12 col-xs-12 col-sm-12 col-lg-5 ms-lg-3">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tempat Meninggal</label>
                        <input name="tempat_meninggal" value="{{ old('tempat_meninggal') }}" type="text" class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                    </div>
                </div>
                <div class="col-12 col-xs-12 col-sm-12 col-lg-5">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tanggal Meninggal</label>
                        <input name="tanggal_meninggal" value="{{ old('tanggal_meninggal') }}" type="date" class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                    </div>
                </div>
            </div>
            <div class="btn-container text-center mb-0 mt-3 mb-3">
                <button type="submit" class="btn btn-1 btn-secondary btn-sm ">SIMPAN</button>
            </div>
        </form>
    </div>
</div>
@endsection

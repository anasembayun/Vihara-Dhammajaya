@extends('layouts.app_jamaat')
@section('css')
@endsection
@section('content')
<div class="w3-main container-main" style="margin-left: 150px; margin-right: 150px; padding-top: 0;">
    <div class="container-fluid isi mt-3">
        <form action="{{ url('i-donasi') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid isi px-4 mt-3">
                <div class="mono row d-flex justify-content-center mb-1">
                    <div class="col-12 col-xs-12 col-sm-12 col-lg-5">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Kegiatan</label>
                            <input value="{{ $donasi->nama_kegiatan_donasi }}" type="text" class="form-control" id="ordinary" aria-describedby="emailHelp" readonly>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center mb-1 ">
                    <div class="col-12 col-xs-12 col-sm-12 col-lg-5">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Id Donatur</label>
                            <input name="id_usr_jamaat" value="{{ Auth::guard('user')->user()->id }}" type="text" class="form-control" id="ordinary" aria-describedby="emailHelp" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-xs-12 col-sm-12 col-lg-5 ms-lg-3">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Id Kegiatan</label>
                            <input name="id_data_donasi" value="{{ $donasi->id }}" type="text" class="form-control" id="ordinary" aria-describedby="emailHelp" readonly>
                        </div>
                    </div>
                </div>
                <div class="mono row d-flex justify-content-center mb-1">
                    <div class="col-12 col-xs-12 col-sm-12 col-lg-5">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jumlah Donasi</label>
                            <input name="jumlah_donasi" type="text" class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                        </div>
                    </div>
                </div>
                <div class="btn-container text-center mb-0 mt-5 mb-3">
                    <button type="submit" class="btn btn-sm border-0 btn-4 ">TAMBAH</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
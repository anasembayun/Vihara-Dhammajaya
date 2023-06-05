@extends('templates.admin_main')
@section('top-header')
<header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
    <p class="w3-left">Edit Leluhur</p>
    <p class="w3-right">Role
        <span>: {{ Auth::guard('admin')->user()->role }} </span>
    </p>
</header>
@endsection
@section('css')
<style>
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
        <div class="row mb-4">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <form action="{{ url('/data-leluhur/update-leluhur/' . $leluhur->id) }}" method="POST">
                    @csrf
                    <div class="card mb-5">
                        <div class="card-body">
                            <div class="container-fluid row g-3">
                                <div class="col-md-4">
                                    <label for="umat" class="form-label">ID Umat <span class="text-danger">*</span></label>
                                    <input class="form form-control" value="{{$leluhur->id_pemesan}}" readonly>
                                </div>
                                <div class="col-md-8">
                                    <label for="exampleInputEmail1" class="form-label mb-2">Nama Umat</label>
                                    <input name="nama_jamaat" type="text" class="form-control" value="{{$leluhur->pemesan->name}}" id="namaUmat" aria-describedby="emailHelp" readonly>
                                </div>
                                <div class="col-12">
                                    <label for="exampleInputEmail1" class="form-label">Nama Leluhur <span class="text-danger">*</span></label>
                                    <input name="nama_leluhur" type="text" class="form-control" id="nama_leluhur" value="{{$leluhur->nama_mendiang}}" aria-describedby="emailHelp">
                                </div>
                                <div class="col-12">
                                    <label for="exampleInputEmail1" class="form-label">Relasi Leluhur dengan Penanggung
                                        Jawab <span class="text-danger">*</span></label>
                                    <input name="relasi" type="text" class="form-control" id="relasi" value="{{$leluhur->relasi}}" aria-describedby="emailHelp">
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1" class="form-label">Tempat Lahir</label>
                                    <input name="tempat_lahir" type="f-name" class="form-control" id="tempat_lahir" value="{{$leluhur->tempat_lahir}}" aria-describedby="emailHelp">
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                                    <input name="tanggal_lahir" type="date" class="form-control" id="tanggal_lahir" value="{{$leluhur->tanggal_lahir}}" aria-describedby="emailHelp">
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1" class="form-label">Tempat Meninggal</label>
                                    <input name="tempat_meninggal" type="f-name" class="form-control" id="tempat_meninggal" value="{{$leluhur->tempat_meninggal}}" aria-describedby="emailHelp">
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1" class="form-label">Tanggal Meninggal</label>
                                    <input name="tanggal_meninggal" type="date" class="form-control" id="tanggal_meninggal" value="{{$leluhur->tanggal_meninggal}}" aria-describedby="emailHelp">
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1" class="form-label">Transaksi Terakhir <span class="text-danger">*</span></label>
                                    <input name="transaksi_terakhir" type="month" class="form-control" id="transaksi_terakhir" value="{{ date('Y-m', strtotime($leluhur->transaksi_terakhir)) }}" aria-describedby="emailHelp">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-muted text-center">
                            <div class="mb-2 mt-2">
                                <button type="submit" class="btn btn-sm btn-3">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>

</script>
@endsection
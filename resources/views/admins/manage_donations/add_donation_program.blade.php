@extends('templates.admin_main')
@section('top-header')
    <header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
        <p class="w3-left">Jadwalkan Kegiatan</p>
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
        <div class="container-fluid isi mt-4 mb-1">
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

            <form action="{{ url('kelola-donasi/i-tambah-kegiatan-donasi') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="container-fluid row g-3">
                            <div class="col-12">
                                <label for="exampleInputEmail1" class="form-label">Nama Kegiatan <span
                                        class="text-danger">*</span></label>
                                <input name="nama_kegiatan_donasi" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Tanggal Mulai Kegiatan <span
                                        class="text-danger">*</span></label>
                                <input name="tanggal_mulai_donasi" type="date" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Tanggal Selesai Kegiatan <span
                                        class="text-danger">*</span></label>
                                <input name="tanggal_selesai_donasi" type="date" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-12">
                                <label for="exampleFormControlTextarea1" class="form-label">Keterangan Kegiatan <span
                                        class="text-danger">*</span></label>
                                <textarea name="keterangan_donasi" class="form-control" id="ordinary" rows="3" required></textarea>
                            </div>
                            <div class="col-12">
                                <label for="Image" class="form-label">Pilih Gambar Kegiatan (512 x 512 pixel) |
                                    Opsional</label>
                                <input name="foto_kegiatan_donasi" class="form-control inp-img" type="file"
                                    id="ordinary" accept=".jpg,.jpeg,.png" onchange="preview()">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted text-center">
                        <div class="mb-2 mt-2">
                            <button type="submit" class="btn btn-sm border-0 btn-4 ">JADWALKAN</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var _URL = window.URL || window.webkitURL;
        $(".inp-img").change(function(e) {
            var file, img;
            if ((file = this.files[0])) {
                img = new Image();
                var objectUrl = _URL.createObjectURL(file);
                img.onload = function() {
                    if (this.width != 512 || this.height != 512) {
                        alert('Ukuran gambar harus 512x512px.');
                        $(".inp-img").val('');
                    }
                    _URL.revokeObjectURL(objectUrl);
                };
                img.src = objectUrl;
            }
        });
    </script>
@endsection

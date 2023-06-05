@extends('templates.admin_main')
@section('top-header')
    <header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
        <p class="w3-left">Tambah Berita</p>
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
        .form-label {
            font-family: 'Trebuchet MS', sans-serif;
            font-weight: bold;
            color: #2A363B;
        }

        .select2 {
            width: 100% !important;
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
        <div class="container-fluid isi mt-3 mb-2">
            <form action="{{ url('kelola-berita/i-tambah-berita') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="container-fluid row g-3">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Nama Penulis <span
                                        class="text-danger">*</span></label>
                                <input name="nama_penulis" value="{{ Auth::guard('admin')->user()->name }}" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Tanggal Berita Dimuat <span
                                        class="text-danger">*</span></label>
                                <input name="tanggal_berita_dibuat" type="date" max="{{ date('Y-m-d') }}"
                                    class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-12">
                                <label for="exampleInputEmail1" class="form-label">Judul Berita <span
                                        class="text-danger">*</span></label>
                                <input name="judul_berita" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-12">
                                <label for="exampleFormControlTextarea1" class="form-label">Isi Berita <span
                                        class="text-danger">*</span></label>
                                <textarea name="isi_berita" class="form-control" id="large" rows="3"></textarea>
                            </div>
                            <div class="col-12">
                                <label for="Image" class="form-label">Pilih Foto Berita (512 x 512 pixel)</label>
                                <input name="foto_berita" class="form-control inp-img" type="file" id="ordinary"
                                    accept=".jpg,.jpeg,.png" onchange="preview()">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted text-center">
                        <div class="mb-2 mt-2">
                            <button type="submit" class="btn  btn-sm border-0 btn-4 ">TAMBAH</button>
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

        $(".s_nama_kegiatan").select2();
    </script>
@endsection

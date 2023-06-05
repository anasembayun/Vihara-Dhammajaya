@extends('templates.admin_main')
@section('top-header')
    <header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
        <p class="w3-left">Edit Data Berita | {{ $berita->judul_berita }}</p>
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
        <div class="container-fluid isi mt-4 mb-2">
            <form action="{{ url('kelola-berita/daftar-berita/update/' . $berita->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="card mb-5">
                    <div class="card-header">
                        <div class="mb-2 mt-2">
                            <a href="{{ url('kelola-berita/daftar-berita') }}" class="float-start" role="button"
                                tabindex="-1" aria-disabled="true">
                                <img src="{{ asset('images/app_admin/kelola_admin/back-icon.png') }}" style="width: 25px;">
                            </a>
                            <h5 class="sub-judul text-center" style="margin: 5px; margin-left: 25px; margin-right: 25px;">
                                Data Berita</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid row g-3">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Nama Penulis <span
                                        class="text-danger">*</span></label>
                                <input name="nama_penulis" value="{{ $berita->nama_penulis }}" type="text"
                                    class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Tanggal Berita Dimuat <span
                                        class="text-danger">*</span></label>
                                <input name="tanggal_berita_dibuat" type="date" max="{{ date('Y-m-d') }}"
                                    value="{{ $berita->tanggal_berita_dibuat }}" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-12">
                                <label for="exampleInputEmail1" class="form-label">Judul Berita <span
                                        class="text-danger">*</span></label>
                                <input name="judul_berita" type="text" class="form-control" id="ordinary"
                                    value="{{ $berita->judul_berita }}" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-12">
                                <label for="exampleFormControlTextarea1" class="form-label">Isi Berita <span
                                        class="text-danger">*</span></label>
                                <textarea name="isi_berita" class="form-control" id="large" rows="3">{{ $berita->isi_berita }}</textarea>
                            </div>
                            <div class="col-12">
                                <br>
                                <img id="foto_kegiatan_donasi"
                                    src="{{ asset('images/app_admin/kelola_berita/foto_berita/' . $berita->foto_berita) }}"
                                    alt="" style="max-height: 250px; max-width: 250px;">
                            </div>
                            <div class="col-12">
                                <label for="Image" class="form-label">Pilih Foto Berita Baru (512 x 512 pixel) | Opsional</label>
                                <input name="foto_berita" class="form-control inp-img" type="file" id="ordinary"
                                    accept=".jpg,.jpeg,.png" onchange="preview()">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted text-center">
                        <div class="mb-2 mt-2">
                            <button type="submit" class="btn  btn-sm border-0 btn-4 ">SIMPAN</button>
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

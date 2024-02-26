@extends('templates.admin_main')
@section('top-header')
    <header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
        <p class="w3-left">Edit Data Kegiatan Donasi | {{ $donasi->nama_kegiatan_donasi }}</p>
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
        <div class="container-fluid isi mt-3 mb-1">
            <form action="{{ url('kelola-donasi/edit-kegiatan-donasi/update/' . $donasi->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="card mb-5">
                    <div class="card-header">
                        <div class="mb-2 mt-2">
                            <a href="{{ url('kelola-donasi/daftar-kegiatan-donasi') }}" class="float-start" role="button"
                                tabindex="-1" aria-disabled="true">
                                <img src="{{ asset('images/app_admin/kelola_admin/back-icon.png') }}" style="width: 25px;">
                            </a>
                            <h5 class="sub-judul text-center" style="margin: 5px; margin-left: 25px; margin-right: 25px;">
                                Data Kegiatan Donasi</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid row g-3">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Tanggal Mulai Kegiatan <span
                                        class="text-danger">*</span></label>
                                <input name="tanggal_mulai_donasi" value="{{ $donasi->tanggal_mulai_donasi }}"
                                    type="date" class="form-control" id="ordinary" aria-describedby="emailHelp"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Tanggal Selesai Kegiatan <span
                                        class="text-danger">*</span></label>
                                <input name="tanggal_selesai_donasi" value="{{ $donasi->tanggal_selesai_donasi }}"
                                    type="date" class="form-control" id="ordinary" aria-describedby="emailHelp"
                                    required>
                            </div>
                            <div class="col-12">
                                <label for="exampleInputEmail1" class="form-label">Status <span
                                        class="text-danger">*</span></label>
                                <select name="status" class="form-select" id="ordinary"
                                    aria-label="Example select with button addon" required>
                                    @php
                                        $status = ['Dana terus dikumpul', 'Pengumpulan dana selesai'];
                                    @endphp
                                    @foreach ($status as $st)
                                        @if ($st != $donasi->status)
                                            <option value="{{ $st }}">{{ $st }}</option>
                                        @else
                                            <option selected value="{{ $st }}">{{ $st }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="exampleInputEmail1" class="form-label">Keterangan Kegiatan <span
                                        class="text-danger">*</span></label>
                                <textarea name="keterangan_donasi" class="form-control" id="large" rows="3" required>{{ $donasi->keterangan_donasi }}</textarea>
                            </div>
                            <div class="col-12">
                                <label for="exampleInputEmail1" class="form-label">Foto Kegiatan (512 x 512 pixel)</label>
                                <input name="foto_kegiatan_donasi" class="form-control inp-img" type="file"
                                    id="ordinary" accept=".jpg,.jpeg,.png">
                            </div>
                            <div class="col-12">
                                <label for="exampleInputEmail1" class="form-label">Preview Gambar Kegiatan</label>
                                <br>
                                <img id="preview-image"
                                    src="{{ asset('images/app_admin/kelola_donasi/foto_kegiatan_donasi/' . $donasi->foto_kegiatan_donasi) }}"
                                    alt="" style="max-height: 150px; max-width: 150px;">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted text-center">
                        <div class="mb-2 mt-2">
                            <button type="submit" class="btn btn-secondary btn-sm btn-1">SIMPAN</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.inp-img').change(function() {
            let reader = new FileReader();

            reader.onload = (e) => {
                $('#preview-image').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        });
    </script>
@endsection

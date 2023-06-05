@extends('templates.admin_main')
@section('top-header')
    <header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
        <p class="w3-left">Edit Data Pesan Baik</p>
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
        <div class="container-fluid isi mt-3 mb-1">
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
            <form action="{{ url('kelola-pesan-baik/edit-pesan-baik/update/' . $pesan_baik->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="card mb-5">
                    <div class="card-header">
                        <div class="mb-2 mt-2">
                            <a href="{{ url('kelola-pesan-baik/tambah-pesan-baik') }}" class="float-start" role="button"
                                tabindex="-1" aria-disabled="true">
                                <img src="{{ asset('images/app_admin/kelola_admin/back-icon.png') }}" style="width: 25px;">
                            </a>
                            <h5 class="sub-judul text-center" style="margin: 5px; margin-left: 25px; margin-right: 25px;">
                                Data Pesan Baik</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid row g-3">
                            <div class="col-12">
                                <label for="exampleInputEmail1" class="form-label">Pesan Baik (Baru/Revisi) <span
                                        class="text-danger">*</span></label>
                                <textarea name="pesan_baik" class="form-control" id="large" rows="3" maxlength="287" required>{{ $pesan_baik->pesan_baik }}</textarea>
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
    <script></script>
@endsection

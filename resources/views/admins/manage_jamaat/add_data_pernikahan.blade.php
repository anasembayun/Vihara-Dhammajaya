@extends('templates.admin_main')
@section('top-header')
    <header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
        <p class="w3-left">Tambah Data Pernikahan</p>
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
        <div class="container-fluid isi mt-3 mb-2">
            <form action="{{ url('kelola-jamaat/i-tambah-data-pernikahan') }}" method="POST">
                @csrf
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="container-fluid row g-3">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Tanggal Pernikahan <span
                                        class="text-danger">*</span></label>
                                <input name="tanggal_pernikahan" type="date" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Tempat Pernikahan <span
                                        class="text-danger">*</span></label>
                                <input name="tempat_pernikahan" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-12">
                                <label for="exampleInputEmail1" class="form-label">Nomor Sertifikat <span
                                        class="text-danger">*</span></label>
                                <input name="no_sertifikat" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">RT/RW <span
                                        class="text-danger">*</span></label>
                                <input name="rt_rw" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Kelurahan <span
                                        class="text-danger">*</span></label>
                                <input name="kelurahan" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Kecamatan <span
                                        class="text-danger">*</span></label>
                                <input name="kecamatan" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Kabupaten/Kota <span
                                        class="text-danger">*</span></label>
                                <input name="kabupaten_kota" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="mb-2 mt-2">
                            <h5 class="sub-judul text-center" style="margin: 5px;">Data Mempelai Pria</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid row g-3">
                            <div class="col-12">
                                <label for="exampleInputEmail1" class="form-label">Nama <span
                                        class="text-danger">*</span></label>
                                <input name="p_nama" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Tempat Lahir <span
                                        class="text-danger">*</span></label>
                                <input name="p_tempat_lahir" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Tanggal Lahir <span
                                        class="text-danger">*</span></label>
                                <input name="p_tanggal_lahir" type="date" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-12">
                                <label for="exampleFormControlTextarea1" class="form-label">Alamat <span
                                        class="text-danger">*</span></label>
                                <input name="p_alamat" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">RT/RW <span
                                        class="text-danger">*</span></label>
                                <input name="p_rt_rw" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Kelurahan <span
                                        class="text-danger">*</span></label>
                                <input name="p_kelurahan" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Kecamatan <span
                                        class="text-danger">*</span></label>
                                <input name="p_kecamatan" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Kabupaten/Kota <span
                                        class="text-danger">*</span></label>
                                <input name="p_kabupaten_kota" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-12">
                                <label for="exampleInputEmail1" class="form-label">Nama Ayah <span
                                        class="text-danger">*</span></label>
                                <input name="p_ayah" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-12">
                                <label for="exampleInputEmail1" class="form-label">Nama Ibu <span
                                        class="text-danger">*</span></label>
                                <input name="p_ibu" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="mb-2 mt-2">
                            <h5 class="sub-judul text-center" style="margin: 5px;">Data Mempelai Wanita</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid row g-3">
                            <div class="col-12">
                                <label for="exampleInputEmail1" class="form-label">Nama <span
                                        class="text-danger">*</span></label>
                                <input name="w_nama" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Tempat Lahir <span
                                        class="text-danger">*</span></label>
                                <input name="w_tempat_lahir" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Tanggal Lahir <span
                                        class="text-danger">*</span></label>
                                <input name="w_tanggal_lahir" type="date" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-12">
                                <label for="exampleFormControlTextarea1" class="form-label">Alamat <span
                                        class="text-danger">*</span></label>
                                <input name="w_alamat" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">RT/RW <span
                                        class="text-danger">*</span></label>
                                <input name="w_rt_rw" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Kelurahan <span
                                        class="text-danger">*</span></label>
                                <input name="w_kelurahan" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Kecamatan <span
                                        class="text-danger">*</span></label>
                                <input name="w_kecamatan" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Kabupaten/Kota <span
                                        class="text-danger">*</span></label>
                                <input name="w_kabupaten_kota" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-12">
                                <label for="exampleInputEmail1" class="form-label">Nama Ayah <span
                                        class="text-danger">*</span></label>
                                <input name="w_ayah" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-12">
                                <label for="exampleInputEmail1" class="form-label">Nama Ibu <span
                                        class="text-danger">*</span></label>
                                <input name="w_ibu" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="mb-2 mt-2">
                            <h5 class="sub-judul text-center" style="margin: 5px;">Pemberkatan</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid row g-3">
                            <div class="col-12">
                                <label for="exampleInputEmail1" class="form-label">Pemberkatan dihadiri oleh (Pandita)
                                    <span class="text-danger">*</span></label>
                                <input name="pandita" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Saksi 1 <span
                                        class="text-danger">*</span></label>
                                <input name="saksi_1" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Saksi 2 <span
                                        class="text-danger">*</span></label>
                                <input name="saksi_2" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required>
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
            <!-- end -->
        </div>
    </div>
@endsection
@section('script')
    <script></script>
@endsection

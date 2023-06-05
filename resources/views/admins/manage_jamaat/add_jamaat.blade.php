@extends('templates.admin_main')
@section('top-header')
    <header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
        <p class="w3-left">Tambah Umat</p>
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
        <div class="container-fluid isi mt-3 mb-2">
            <ul class="nav nav-tabs justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active disabled" aria-current="page" href="#">Umat Terdaftar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #000000;"
                        href="{{ url('kelola-jamaat/tambah-jamaat-unreg') }}">Umat Tidak Terdaftar</a>
                </li>
            </ul><br>
            <form action="{{ url('kelola-jamaat/i-tambah-jamaat') }}" method="POST">
                @csrf
                <div class="card mb-5">
                    <div class="card-header">
                        <div class="mb-2 mt-2">
                            <h5 class="sub-judul text-center" style="margin: 5px;">Data Umat Baru</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid row g-3">
                            <div class="col-12">
                                <label for="exampleInputEmail1" class="form-label">Nama <span
                                        class="text-danger">*</span></label>
                                <input name="name" value="{{ old('name') }}" type="text" class="form-control"
                                    id="ordinary" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">No HP (1) <span
                                        class="text-danger">*</span></label>
                                <input name="no_handphone_1" value="{{ old('no_handphone_1') }}" type="number"
                                    class="form-control" id="ordinary" pattern="[0-9]+" title="Input harus angka 0-9!"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">No HP (2)</label>
                                <input name="no_handphone_2" value="{{ old('no_handphone_2') }}" type="number"
                                    class="form-control" id="ordinary" pattern="[0-9]+" title="Input harus angka 0-9!"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Email <span
                                        class="text-danger">*</span></label>
                                <input name="email" value="{{ old('email') }}" type="email"
                                    class="form-control email-input" id="ordinary" aria-describedby="emailHelp"
                                    style="text-transform: lowercase;" oninput="this.value = this.value.toLowerCase()"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Password <span
                                        class="text-danger">*</span></label>
                                <input name="password" type="text" class="form-control password" id="ordinary"
                                    aria-describedby="emailHelp" required readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Golongan Darah <span
                                        class="text-danger">*</span></label>
                                <select name="gol_darah" class="form-select" id="ordinary"
                                    aria-label="Example select with button addon">
                                    <option selected value="Belum tahu">Belum tahu</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Jenis Kelamin <span
                                        class="text-danger">*</span></label>
                                <select name="jenis_kelamin" class="form-select" id="ordinary"
                                    aria-label="Example select with button addon" required>
                                    <option selected value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="exampleFormControlTextarea1" class="form-label">Alamat <span
                                        class="text-danger">*</span></label>
                                <textarea name="alamat" value="{{ old('alamat') }}" class="form-control" id="ordinary" rows="3" required></textarea>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleFormControlTextarea1" class="form-label">Kelurahan/Kecamatan <span
                                        class="text-danger">*</span></label>
                                <input name="kelurahan_kecamatan" value="{{ old('kelurahan_kecamatan') }}" type="text"
                                    class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleFormControlTextarea1" class="form-label">Kabupaten/Kota <span
                                        class="text-danger">*</span></label>
                                <input name="kabupaten_kota" value="{{ old('kabupaten_kota') }}" type="text"
                                    class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleFormControlTextarea1" class="form-label">RT/RW <span
                                        class="text-danger">*</span></label>
                                <input name="rt_rw" value="{{ old('rt_rw') }}" type="text" class="form-control"
                                    id="ordinary" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Tempat Lahir <span
                                        class="text-danger">*</span></label>
                                <input name="tempat_lahir" value="{{ old('tempat_lahir') }}" type="text"
                                    class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Tanggal Lahir <span
                                        class="text-danger">*</span></label>
                                <input name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" type="date"
                                    class="form-control tanggal-lahir" id="ordinary" aria-describedby="emailHelp"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Bidang Usaha <span
                                        class="text-danger">*</span></label>
                                <input name="bidang_usaha" value="{{ old('bidang_usaha') }}" type="text"
                                    class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Pekerjaan <span
                                        class="text-danger">*</span></label>
                                <input name="pekerjaan" value="{{ old('pekerjaan') }}" type="text"
                                    class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="mb-2 mt-2">
                            <h5 class="sub-judul text-center" style="margin: 5px;">Generate ID Code Umat</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid row g-3">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">ID Code <span
                                        class="text-danger">*</span></label>
                                <input name="id_code" value="{{ old('id_code') }}" type="text"
                                    class="form-control id-code" id="ordinary" aria-describedby="emailHelp"
                                    minlength="13" maxlength="13" pattern="[0-9]+" title="Input harus angka 0-9!"
                                    required>
                            </div>
                            <div class="col-md-6 d-flex align-items-end">
                                <button type="button" class="btn btn-secondary btn-sm btn-1"
                                    id="btn_generate">GENERATE</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="mb-2 mt-2">
                            <h5 class="sub-judul text-center" style="margin: 5px;">Data Kerabat Dekat</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid row g-3">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Nama <span
                                        class="text-danger">*</span></label>
                                <input name="nama_kerabat" value="{{ old('nama_kerabat') }}" type="text"
                                    class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">No HP <span
                                        class="text-danger">*</span></label>
                                <input name="no_handphone_kerabat" value="{{ old('no_handphone_kerabat') }}"
                                    type="number" class="form-control" id="ordinary" pattern="[0-9]+"
                                    title="Input harus angka 0-9!" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-12">
                                <label for="exampleFormControlTextarea1" class="form-label">Alamat <span
                                        class="text-danger">*</span></label>
                                <textarea name="alamat_kerabat" value="{{ old('alamat_kerabat') }}" class="form-control" id="ordinary"
                                    rows="3" required></textarea>
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
        $(function() {
            $('.email-input').keypress(function(e) {
                if (e.which == 32) {
                    return false;
                }
            });
        });

        $(".tanggal-lahir").change(function() {
            let date = new Date(document.querySelector('.tanggal-lahir').value);
            let dd = date.getDate();
            let mm = date.getMonth() + 1;
            let yy = date.getFullYear();

            dd = dd < 10 ? `0${dd}` : dd;
            mm = mm < 10 ? `0${mm}` : mm;
            yy = yy.toString();

            document.querySelector('.password').value = `${dd}${mm}${yy}`;
        });

        $('#btn_generate').on("click", function() {
            if (document.querySelector('.tanggal-lahir').value == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Peringatan!',
                    text: 'Tanggal lahir belum diinput!'
                })
            } else {
                var last_number_of_jamaat = "";
                $.ajax({
                    url: "{{ url('/jumlah-jamaat') }}",
                    method: 'GET',
                    type: "JSON",
                    success: function(data) {
                        last_number_of_jamaat = (data.sum_jamaat + 1).toString();

                        while (last_number_of_jamaat.length != 5) {
                            last_number_of_jamaat = `0` + last_number_of_jamaat;
                        }

                        let date_now = new Date();
                        let mm_now = date_now.getMonth() + 1;
                        let yy_now = date_now.getFullYear();

                        mm_now = mm_now < 10 ? `0${mm_now}` : mm_now;
                        yy_now = yy_now.toString();

                        let date = new Date(document.querySelector('.tanggal-lahir').value);
                        let dd = date.getDate();
                        let mm = date.getMonth() + 1;

                        dd = dd < 10 ? `0${dd}` : dd;
                        mm = mm < 10 ? `0${mm}` : mm;

                        let id_code = `${yy_now.slice(-2)}${mm_now}${dd}${mm}${last_number_of_jamaat}`;

                        document.getElementsByClassName('id-code')[0].value = id_code;
                    }
                });
            }
        });
    </script>
@endsection

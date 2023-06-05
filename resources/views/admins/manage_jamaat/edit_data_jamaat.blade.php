@extends('templates.admin_main')
@section('top-header')
    <header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
        <p class="w3-left">Edit Data Umat | {{ $jamaat->name }}</p>
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
        <div class="container-fluid isi mt-3 mb-1">
            <form action="{{ url('kelola-jamaat/edit-jamaat/update/' . $jamaat->id_code) }}" method="POST">
                @csrf
                <div class="card mb-5">
                    <div class="card-header">
                        <div class="mb-2 mt-2">
                            <a href="{{ url('kelola-jamaat/daftar-jamaat') }}" class="float-start" role="button"
                                tabindex="-1" aria-disabled="true">
                                <img src="{{ asset('images/app_admin/kelola_admin/back-icon.png') }}" style="width: 25px;">
                            </a>
                            <h5 class="sub-judul text-center" style="margin: 5px; margin-left: 25px; margin-right: 25px;">
                                Data Umat</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid row g-3">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Nama <span
                                        class="text-danger">*</span></label>
                                <input name="name" value="{{ $jamaat->name }}" type="text" class="form-control"
                                    id="ordinary" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">ID Code <span
                                        class="text-danger">*</span></label>
                                <input name="id_code" value="{{ $jamaat->id_code }}" type="text" class="form-control"
                                    id="ordinary" aria-describedby="emailHelp" pattern="[0-9]+"
                                    title="Input harus angka 0-9!" required>
                                <div class="text-danger">
                                    @error('id_code')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">No HP (1) <span
                                        class="text-danger">*</span></label>
                                <input name="no_handphone_1" value="{{ $jamaat->no_handphone_1 }}" type="number"
                                    class="form-control" id="ordinary" pattern="[0-9]+" title="Input harus angka 0-9!"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">No HP (2)</label>
                                <input name="no_handphone_2" value="{{ $jamaat->no_handphone_2 }}" type="number"
                                    class="form-control" id="ordinary" pattern="[0-9]+" title="Input harus angka 0-9!"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="col-12">
                                <label for="exampleInputEmail1" class="form-label">Email <span
                                        class="text-danger">*</span></label>
                                <input name="email" value="{{ $jamaat->email }}" type="email"
                                    class="form-control email-input" id="ordinary" aria-describedby="emailHelp"
                                    style="text-transform: lowercase;" oninput="this.value = this.value.toLowerCase()"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Golongan Darah <span
                                        class="text-danger">*</span></label>
                                <select name="gol_darah" class="form-select" id="ordinary"
                                    aria-label="Example select with button addon">
                                    @php
                                        $status = ['Belum tahu', 'A', 'B', 'AB', 'O'];
                                    @endphp
                                    @foreach ($status as $st)
                                        @if ($st != $jamaat->gol_darah)
                                            <option value="{{ $st }}">{{ $st }}</option>
                                        @else
                                            <option selected value="{{ $st }}">{{ $st }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Jenis Kelamin <span
                                        class="text-danger">*</span></label>
                                <select name="jenis_kelamin" class="form-select" id="ordinary"
                                    aria-label="Example select with button addon">
                                    @php
                                        $status = ['Laki-laki', 'Perempuan'];
                                    @endphp
                                    @foreach ($status as $st)
                                        @if ($st != $jamaat->jenis_kelamin)
                                            <option value="{{ $st }}">{{ $st }}</option>
                                        @else
                                            <option selected value="{{ $st }}">{{ $st }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="exampleFormControlTextarea1" class="form-label">Alamat <span
                                        class="text-danger">*</span></label>
                                <textarea name="alamat" class="form-control" id="ordinary" rows="3" required>{{ $jamaat->alamat }}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleFormControlTextarea1" class="form-label">Kelurahan/Kecamatan <span
                                        class="text-danger">*</span></label></label>
                                <input name="kelurahan_kecamatan" value="{{ $jamaat->kelurahan_kecamatan }}"
                                    type="text" class="form-control" id="ordinary" aria-describedby="emailHelp"
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleFormControlTextarea1" class="form-label">Kabupaten/Kota <span
                                        class="text-danger">*</span></label>
                                <input name="kabupaten_kota" value="{{ $jamaat->kabupaten_kota }}" type="text"
                                    class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleFormControlTextarea1" class="form-label">RT/RW <span
                                        class="text-danger">*</span></label>
                                <input name="rt_rw" value="{{ $jamaat->rt_rw }}" type="text" class="form-control"
                                    id="ordinary" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Tempat Lahir <span
                                        class="text-danger">*</span></label>
                                <input name="tempat_lahir" value="{{ $jamaat->tempat_lahir }}" type="text"
                                    class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Tanggal Lahir <span
                                        class="text-danger">*</span></label>
                                <input name="tanggal_lahir" value="{{ $jamaat->tanggal_lahir }}" type="date"
                                    class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="exampleInputEmail1" class="form-label">Bidang Usaha <span
                                        class="text-danger">*</span></label>
                                <input name="bidang_usaha" value="{{ $jamaat->bidang_usaha }}" type="text"
                                    class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="exampleInputEmail1" class="form-label">Pekerjaan <span
                                        class="text-danger">*</span></label>
                                <input name="pekerjaan" value="{{ $jamaat->pekerjaan }}" type="text"
                                    class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted text-center">
                        <div class="mb-2 mt-2">
                            <h5 class="sub-judul" style="margin: 5px;">Data Kerabat Dekat</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid row g-3">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Nama <span
                                        class="text-danger">*</span></label>
                                <input name="nama_kerabat" value="{{ $jamaat->nama_kerabat }}" type="text"
                                    class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">No HP <span
                                        class="text-danger">*</span></label>
                                <input name="no_handphone_kerabat" value="{{ $jamaat->no_handphone_kerabat }}"
                                    type="number" class="form-control" id="ordinary" pattern="[0-9]+"
                                    title="Input harus angka 0-9!" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-12">
                                <label for="exampleFormControlTextarea1" class="form-label">Alamat <span
                                        class="text-danger">*</span></label>
                                <textarea name="alamat_kerabat" class="form-control" id="ordinary" rows="3" required>{{ $jamaat->alamat_kerabat }}</textarea>
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
    </script>
@endsection

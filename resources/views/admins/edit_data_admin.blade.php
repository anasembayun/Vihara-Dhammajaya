@extends('templates.admin_main')
@section('top-header')
    <header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
        <p class="w3-left">Edit Data Admin | {{ $admin->name }}</p>
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
            <form action="{{ url('kelola-admin/detail-admin/update/'.$admin->username) }}" method="POST">
                @csrf
                <div class="card mb-5">
                    <div class="card-header">
                        <div class="mb-2 mt-2">
                            <a href="{{ url('kelola-admin/daftar-admin') }}" class="float-start" role="button"
                                tabindex="-1" aria-disabled="true">
                                <img src="{{ asset('images/app_admin/kelola_admin/back-icon.png') }}" style="width: 25px;">
                            </a>
                            <h5 class="sub-judul text-center" style="margin: 5px; margin-left: 25px; margin-right: 25px;">
                                Data Admin</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid row g-3">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Nama <span
                                        class="text-danger">*</span></label>
                                <input name="name" value="{{ $admin->name }}" type="f-name" class="form-control"
                                    id="ordinary" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">No HP <span
                                        class="text-danger">*</span></label>
                                <input name="no_handphone" value="{{ $admin->no_handphone }}" type="number"
                                    class="form-control" pattern="[0-9]+" id="ordinary" pattern="[0-9]+"
                                    title="Input berupa angka!" aria-describedby="emailHelp" required>
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
                                        @if ($st != $admin->gol_darah)
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
                                        @if ($st != $admin->jenis_kelamin)
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
                                <textarea name="alamat" class="isi-form form-control" id="ordinary" rows="3"
                                    required>{{ $admin->alamat }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Tempat Lahir <span
                                        class="text-danger">*</span></label>
                                <input name="tempat_lahir" value="{{ $admin->tempat_lahir }}" type="text"
                                    class="isi-form form-control" id="ordinary" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Tanggal Lahir <span
                                        class="text-danger">*</span></label>
                                <input name="tanggal_lahir" value="{{ $admin->tanggal_lahir }}" type="date"
                                    class="isi-form form-control" id="ordinary" aria-describedby="emailHelp" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted text-center">
                        <div class="mb-2 mt-2">
                            <button type="submit" class="btn btn-1 btn-secondary btn-sm ">SIMPAN</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

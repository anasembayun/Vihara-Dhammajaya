@extends('templates.admin_main')
@section('top-header')
    <header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
        <p class="w3-left">Profile | {{ Auth::guard('admin')->user()->name }}</p>
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
        <ul class="nav nav-tabs justify-content-center">
            <li class="nav-item">
                <a class="nav-link active disabled" aria-current="page" href="#">Ubah Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #000000;"
                    href="{{ url('profile/ganti-password/' . Auth::guard('admin')->user()->username) }}">Ganti Password</a>
            </li>
        </ul>
        <div class="container-fluid isi px-4 mt-4 justify-content-center">
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
            <form action="{{ url('profile/update/' . Auth::guard('admin')->user()->username) }}" method="POST">
                @csrf
                <div class="row mb-4">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="card mb-5">
                            <div class="card-body mt-2">
                                <div class="container-fluid row g-3">
                                    <div class="col-md-3">
                                        <label for="exampleInputEmail1" class="form-label">Nama <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input name="name" value="{{ Auth::guard('admin')->user()->name }}"
                                            type="text" class="form-control" id="ordinary" aria-describedby="emailHelp"
                                            required>
                                        <input name="id_admin" value="{{ Auth::guard('admin')->user()->id }}"
                                            type="hidden" class="form-control" id="ordinary" aria-describedby="emailHelp"
                                            required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="exampleInputEmail1" class="form-label">No HP <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input name="no_handphone" value="{{ Auth::guard('admin')->user()->no_handphone }}"
                                            type="number" class="form-control" pattern="[0-9]+" id="ordinary"
                                            pattern="[0-9]+" title="Input berupa angka!" aria-describedby="emailHelp"
                                            required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="exampleInputEmail1" class="form-label">Golongan Darah <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="gol_darah" class="isi-form form-select" id="ordinary"
                                            aria-label="Example select with button addon" required>
                                            @php
                                                $status = ['A', 'B', 'AB', 'O'];
                                            @endphp
                                            @foreach ($status as $st)
                                                @if ($st != Auth::guard('admin')->user()->gol_darah)
                                                    <option value="{{ $st }}">{{ $st }}</option>
                                                @else
                                                    <option selected value="{{ $st }}">{{ $st }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="exampleInputEmail1" class="form-label">Jenis Kelamin <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="jenis_kelamin" class="isi-form form-select" id="ordinary"
                                            aria-label="Example select with button addon" required>
                                            @php
                                                $status = ['Laki-laki', 'Perempuan'];
                                            @endphp
                                            @foreach ($status as $st)
                                                @if ($st != Auth::guard('admin')->user()->jenis_kelamin)
                                                    <option value="{{ $st }}">{{ $st }}</option>
                                                @else
                                                    <option selected value="{{ $st }}">{{ $st }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="exampleInputEmail1" class="form-label">Username <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input name="username" value="{{ Auth::guard('admin')->user()->username }}"
                                            type="text" class="isi-form form-control username-input" id="ordinary"
                                            aria-describedby="emailHelp" required>
                                        <div class="text-danger">
                                            @error('username')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Alamat <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea name="alamat" class="isi-form form-control" id="ordinary" rows="3" required>{{ Auth::guard('admin')->user()->alamat }}</textarea>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="exampleInputEmail1" class="form-label">Tempat Lahir <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input name="tempat_lahir"
                                            value="{{ Auth::guard('admin')->user()->tempat_lahir }}" type="text"
                                            class="isi-form form-control" id="ordinary" aria-describedby="emailHelp"
                                            required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="exampleInputEmail1" class="form-label">Tanggal Lahir <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input name="tanggal_lahir"
                                            value="{{ Auth::guard('admin')->user()->tanggal_lahir }}" type="date"
                                            class="isi-form form-control" id="ordinary" aria-describedby="emailHelp"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted text-center">
                                <div class="mb-2 mt-2">
                                    <button type="submit" class="btn btn-1 btn-secondary btn-sm ">SIMPAN</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function() {
            $('.username-input').keypress(function(e) {
                if (e.which == 32) {
                    return false;
                }
            });
        });
    </script>
@endsection

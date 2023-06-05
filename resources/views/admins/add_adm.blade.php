@extends('templates.admin_main')
@section('top-header')
    <header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
        <p class="w3-left">Tambah Admin</p>
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
        <div class="container-fluid isi px-4 mt-3">
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
            <form action="{{ url('kelola-admin/i-tambah-admin') }}" method="POST">
                @csrf
                <div class="card mb-5">
                    <div class="card-header">
                        <div class="mb-2 mt-2">
                            <h5 class="sub-judul text-center" style="margin: 5px;">Data Admin Baru</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid row g-3">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Nama <span
                                        class="text-danger">*</span></label>
                                <input name="name" value="{{ old('name') }}" type="f-name" class="form-control"
                                    id="ordinary" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">No HP <span
                                        class="text-danger">*</span></label>
                                <input name="no_handphone" value="{{ old('no_handphone') }}" type="number"
                                    class="form-control" pattern="[0-9]+" id="ordinary" pattern="[0-9]+"
                                    title="Input berupa angka!" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Golongan Darah <span
                                        class="text-danger">*</span></label>
                                <select name="gol_darah" class="isi-form form-select" id="ordinary"
                                    aria-label="Example select with button addon" required>
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
                                <select name="jenis_kelamin" class="isi-form form-select" id="ordinary"
                                    aria-label="Example select with button addon" required>
                                    <option selected value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="exampleInputEmail1" class="form-label">Role <span
                                        class="text-danger">*</span></label>
                                <select name="role" class="isi-form form-select" id="ordinary"
                                    aria-label="Example select with button addon" required>
                                    @foreach($roles as $key => $role)
                                    @if($key == 0)
                                    <option selected value="{{$role->id}}">{{$role->nama}}</option>
                                    @else
                                    <option value="{{$role->id}}">{{$role->nama}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Username <span
                                        class="text-danger">*</span></label>
                                <input name="username" value="{{ old('username') }}" type="text"
                                    class="isi-form form-control username-input" id="ordinary" aria-describedby="emailHelp"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Password <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input name="password" type="password" minlength="5" class="isi-form form-control password"
                                        id="ordinary" aria-describedby="emailHelp" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="ordinary"
                                            style="border-radius: 0px 4px 4px 0px;">
                                            <i class="bi bi-eye-slash" id="togglePassword"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="exampleFormControlTextarea1" class="form-label">Alamat <span
                                        class="text-danger">*</span></label>
                                <textarea name="alamat" value="{{ old('alamat') }}" class="isi-form form-control" id="ordinary" rows="3"
                                    required></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Tempat Lahir <span
                                        class="text-danger">*</span></label>
                                <input name="tempat_lahir" value="{{ old('tempat_lahir') }}" type="text"
                                    class="isi-form form-control" id="ordinary" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Tanggal Lahir <span
                                        class="text-danger">*</span></label>
                                <input name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" type="date"
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
@section('script')
    <script>
        $(function() {
            $('.username-input').keypress(function(e) {
                if (e.which == 32) {
                    return false;
                }
            });
        });

        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector(".password");

        togglePassword.addEventListener("click", function() {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            this.classList.toggle("bi-eye");
        });
    </script>
@endsection

@extends('templates.admin_main')
@section('top-header')
    <header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
        <p class="w3-left">Ganti Password | {{ Auth::guard('admin')->user()->name }}</p>
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
                <a class="nav-link" style="color: #000000;"
                    href="{{ url('profile/' . Auth::guard('admin')->user()->username) }}">Ubah Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active disabled" aria-current="page" href="#">Ganti Password</a>
            </li>
        </ul>
        <div class="container-fluid isi px-4 mt-4 justify-content-center">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ url('profile/ganti-password/change/' . Auth::guard('admin')->user()->username) }}"
                method="POST">
                @csrf
                <div class="row mb-4">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="card mb-5">
                            <div class="card-body mt-2">
                                <div class="container-fluid row g-3">
                                    <div class="col-md-4">
                                        <label for="exampleInputEmail1" class="form-label">Password Lama <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input name="old_password" value="" type="password" class="form-control"
                                                id="password_lama">
                                            <div class="text-danger">
                                                @error('old_password')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" style="border-radius: 0px 4px 4px 0px;">
                                                    <i class="bi bi-eye-slash" id="togglePassword1"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="exampleInputEmail1" class="form-label">Password Baru <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input name="new_password" value="" type="password" class="form-control"
                                                id="password_baru">
                                            <div class="text-danger">
                                                @error('new_password')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" style="border-radius: 0px 4px 4px 0px;">
                                                    <i class="bi bi-eye-slash" id="togglePassword2"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="exampleInputEmail1" class="form-label">Konfirmasi Password Baru <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input name="new_password_confirmation" value="" type="password"
                                                class="form-control" id="konfirmasi_password_baru">
                                            <div class="text-danger">
                                                @error('new_password_confirmation')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" style="border-radius: 0px 4px 4px 0px;">
                                                    <i class="bi bi-eye-slash" id="togglePassword3"></i>
                                                </span>
                                            </div>
                                        </div>
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
        const togglePassword1 = document.querySelector("#togglePassword1");
        const togglePassword2 = document.querySelector("#togglePassword2");
        const togglePassword3 = document.querySelector("#togglePassword3");
        const password1 = document.querySelector("#password_lama");
        const password2 = document.querySelector("#password_baru");
        const password3 = document.querySelector("#konfirmasi_password_baru");

        togglePassword1.addEventListener("click", function() {
            const type = password1.getAttribute("type") === "password" ? "text" : "password";
            password1.setAttribute("type", type);

            this.classList.toggle("bi-eye");
        });

        togglePassword2.addEventListener("click", function() {
            const type = password2.getAttribute("type") === "password" ? "text" : "password";
            password2.setAttribute("type", type);

            this.classList.toggle("bi-eye");
        });

        togglePassword3.addEventListener("click", function() {
            const type = password3.getAttribute("type") === "password" ? "text" : "password";
            password3.setAttribute("type", type);

            this.classList.toggle("bi-eye");
        });
    </script>
@endsection

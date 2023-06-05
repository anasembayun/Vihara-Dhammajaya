@extends('layouts.app_jamaat')
@section('css')
    <style>
        form i {
            margin-left: -1px;
            cursor: pointer;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <form action="/ganti-password/change/{{ $id_code }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row d-flex justify-content-center mt-5">
                <div>
                    <div class="container text-center mt-3 mb-3">
                        <div class="row">
                            <div class="col"></div>
                            <div class="col">
                                @if ($jamaats->foto_profile == '')
                                    <img src="{{ asset('images/app_jamaat/profile-icon.jpg') }}" class="img-fluid mt-3 mb-3"
                                        style="border-radius:150px ;" width="256px" height="256px">
                                @else
                                    <img src="{{ asset('images/app_jamaat/foto_profile/' . $jamaats->foto_profile) }}"
                                        class="img-fluid mt-3 mb-3" style="border-radius:150px ;" width="256px"
                                        height="256px">
                                @endif
                            </div>
                            <div class="col"></div>
                        </div>
                        <div class="row">
                            <div class="col"></div>
                            <div class="col">
                                <h5 style="margin-top: 15px;">{{ $jamaats->name }}</h5>
                            </div>
                            <div class="col"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-2 mb-2">
                <div class="col-lg-6 col-md-6 col-xs-6 px-6">
                    <hr>
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-2 mb-2">
                <div class="col-lg-6 col-md-6 col-xs-6 px-6">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row d-flex justify-content-center mb-1 ">
                <div class="col-12 col-xs-12 col-sm-12 col-lg-5">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Password Lama <span
                                class="text-danger">*</span></label>
                        <div class="input-group">
                            <input name="old_password" value="" type="password" class="form-control"
                                id="password_lama">
                            <div class="text-danger">
                                @error('old_password')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" style="border-radius: 0px 7px 7px 0px;">
                                    <i class="bi bi-eye-slash" id="togglePassword1"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center mb-1 ">
                <div class="col-12 col-xs-12 col-sm-12 col-lg-5">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Password Baru <span
                                class="text-danger">*</span></label>
                        <div class="input-group">
                            <input name="new_password" value="" type="password" class="form-control"
                                id="password_baru">
                            <div class="text-danger">
                                @error('new_password')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" style="border-radius: 0px 7px 7px 0px;">
                                    <i class="bi bi-eye-slash" id="togglePassword2"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center mb-1 ">
                <div class="col-12 col-xs-12 col-sm-12 col-lg-5">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Konfirmasi Password Baru <span
                                class="text-danger">*</span></label>
                        <div class="input-group">
                            <input name="new_password_confirmation" value="" type="password" class="form-control"
                                id="konfirmasi_password_baru">
                            <div class="text-danger">
                                @error('new_password_confirmation')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" style="border-radius: 0px 7px 7px 0px;">
                                    <i class="bi bi-eye-slash" id="togglePassword3"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-5 mb-5">
                <button type="submit" class="btn btn-primary mt-2"
                    style="background-color:#D09222; border: #D09222; width: 20%;">Simpan Perubahan</button>
            </div>
        </form>
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

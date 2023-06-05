{{-- @extends('layouts.app_jamaat')
@section('content')
    <div class="row container-fluid d-flex justify-content-center mt-5 mb-5">
        <div class="col-lg-3">
            <form method="POST" action="{{ route('post_login_jamaat') }}">
                @csrf
                <div class="mb-3 mt-3">
                    <h5>{{ __('Login Jamaat') }}</h5>
                    <label for="no_handphone">{{ __('No HP') }}</label>
                    <input type="text" class="form-control @error('no_handphone') is-invalid @enderror"
                        value="{{ old('no_handphone') }}" id="no_handphone" name="no_handphone">
                    @error('no_handphone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password">{{ __('Password') }}</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-check mb-3">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember">{{ __('Remember Me') }}
                    </label>
                </div>
                <button type="submit" class="btn btn-primary"
                    style="background-color:#D09222; border: #D09222;">{{ __('Login') }}</button>
            </form>
        </div>
    </div>
@endsection --}}

@extends('layouts.app')
@section('css')
    <link href="{{ asset('css/app_admin/login.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid d-flex align-items-center justify-content-center" style="height:90vh">
        <div class="login container-fluid d-flex justify-content-center">
            <div class="login-card card p-2 px-4" style="width: 23rem;">
                <div class="card-header text-center">
                    <div class="mt-2">
                        <a href="{{ route('home') }}" class="float-start" role="button" tabindex="-1" aria-disabled="true">
                            <img src="{{ asset('images\app_admin\login\white-back-icon-24.jpg') }}" style="width: 25px;">
                        </a>
                    </div>
                </div>
                <div class="card-header text-center">
                    <img src="{{ asset('images/app_admin/login/logo-vihara.png') }}" class="card-img-top mx-auto my-1"
                        alt="Logo Vihara" style="width: 95px">
                </div>
                <div class="card-body">
                    <p class="sub-judul">Log in to your user account</p>
                    <form method="POST" action="{{ route('post_login_jamaat') }}">
                        @csrf
                        <p class="biasa-putih">No Handphone</p>
                        <input type="text" class="form-control @error('no_handphone') is-invalid @enderror"
                            placeholder="No Handphone" name="no_handphone" value="{{ old('no_handphone') }}"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                            style="margin-top:-10px;height:33px">
                        @error('no_handphone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <p class="biasa-putih mt-3">Password</p>
                        <div class="input-group">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                                name="password" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                                style="margin-top:-10px;height:33px">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="input-group-append">
                                <span class="input-group-text"
                                    style="margin-top:-10px;height:33px; border-radius: 0px 7px 7px 0px;">
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                </span>
                            </div>
                        </div>
                        {{-- <p class="sub-judul mt-3 d-flex justify-content-center">Tidak punya akun? &nbsp;
                            <a href=""
                                style="color: rgb(0, 149, 246); text-decoration: none; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Buat
                                akun</a>
                        </p> --}}
                        <div class="btn-container text-center mb-0 mt-4">
                            <button type="submit" class="btn btn-secondary btn-sm btn-1">LOG IN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function() {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            this.classList.toggle("bi-eye");
        });
    </script>
@endsection

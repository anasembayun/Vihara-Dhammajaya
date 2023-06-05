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
                    <p class="sub-judul">Log in to your admin account</p>
                    <form method="POST" action="{{ route('post_login_admin') }}">
                        @csrf
                        <p class="biasa-putih">Username</p>
                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                            placeholder="Username" name="username" value="{{ old('username') }}"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                            style="margin-top:-10px;height:33px">
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <p class="biasa-putih mt-3">Password</p>
                        <div class="input-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                placeholder="Password" name="password" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm" style="margin-top:-10px;height:33px">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="input-group-append">
                                <span class="input-group-text" style="margin-top:-10px;height:33px; border-radius: 0px 7px 7px 0px;">
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                </span>
                            </div>
                        </div>
                        <div class="btn-container text-center mb-0 mt-5">
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

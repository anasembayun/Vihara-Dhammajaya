@extends('layouts.app_jamaat')
@section('css')
@endsection
@section('content')
<div class="container-fluid py-5">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <h1 class="text-center">Absensi Jemaat</h1>
                <p class="text-center">Silahkan mengisi kolom dibawah ini untuk absensi</p>
            </div>
            <div class="col-4">
                <div class="container mt-3">
                    <form action="/action_page.php">
                        <div class="mb-3 mt-3">
                            <label for="no_handphone">No HP</label>
                            <input type="text" class="form-control" id="no_handphone" placeholder="Masukkan No HP" name="no_handphone">
                        </div>
                        <div class="mb-3">
                            <label for="pwd">Password</label>
                            <input type="password" class="form-control" id="pwd" placeholder="Masukkan password" name="pswd">
                        </div>
                        <div class="form-check mb-3">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="remember"> Ingat Saya
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary" style="background-color: #D09222;border: #D09222;justify-content: center;">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
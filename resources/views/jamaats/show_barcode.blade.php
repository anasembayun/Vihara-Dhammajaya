@extends('layouts.app_jamaat')
@section('css')
@endsection
@section('content')
<div class="container-fluid">
    <div class="row d-flex justify-content-center mt-5 mb-5">
        <center>
            <h1 style="margin-bottom: 50px;">QRCode & Barcode <br>{{ $jamaats->name }}</h1>
            <div class="col-12 d-flex justify-content-center pt-5 mb-5">
                <img id="qrCode" src="data:image/png;base64,{{ $qr_code }}" alt="">
            </div>
            <div class="col-12 d-flex justify-content-center pt-5">
                <img id="barCode" src="data:image/png;base64,{{ $barCode }}" alt="">
            </div>
            <div class="col-12 d-flex justify-content-center pt-3">
                <h4>{{ $jamaats->id_code }}</h4>
            </div>
        </center>
    </div>
</div>
@endsection
@extends('templates.admin_main')
@section('top-header')
    <header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
        <p class="w3-left">Laporan Transaksi Keseluruhan</p>
        <p class="w3-right">Role
            <span>: {{ Auth::guard('admin')->user()->role }} </span>
        </p>
    </header>
@endsection
@section('css')
@endsection
@section('content')
    <div class="w3-main container-main" style="margin-left:250px;padding-top: 0;">
        <!-- isi halaman -->
        <div class="container-fluid isi px-4 mt-3">
            <ul class="nav nav-tabs flex-column flex-sm-row justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" style="color: #000000;"
                        href="{{ url('kelola-laporan/laporan-transaksi') }}">Transaksi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #000000;"
                        href="{{ url('kelola-laporan/laporan-transaksi-foto') }}">Transaksi Foto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active disabled" aria-current="page" href="">Transaksi Keseluruhan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #000000;" href="{{ url('kelola-laporan/laporan-penjualan-paket') }}">Laporan Paket</a>
                </li>
            </ul>
        </div>
    </div>
@endsection
@section('script')
@endsection

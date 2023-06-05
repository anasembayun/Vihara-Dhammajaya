@extends('templates.admin_main')
@section('top-header')
    <header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
        <p class="w3-left">Detail Data Umat | {{ $jamaat->name }}</p>
        <p class="w3-right">Role
            <span>: {{ Auth::guard('admin')->user()->role }} </span>
        </p>
    </header>
@endsection
@section('css')
    <style>
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
        <div class="container-fluid isi mt-3 mb-1">
            <div class="card mb-5">
                <div class="card-header">
                    <div class="mb-2 mt-2">
                        <a href="{{ url('kelola-jamaat/daftar-jamaat') }}" class="float-start" role="button" tabindex="-1"
                            aria-disabled="true">
                            <img src="{{ asset('images/app_admin/kelola_admin/back-icon.png') }}" style="width: 25px;">
                        </a>
                        <h5 class="sub-judul text-center" style="margin: 5px; margin-left: 25px; margin-right: 25px;">
                            Riwayat Kegiatan</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive container">
                        <table id="daftarRiwayatKegiatanUmat" class="table display py-3" style="width:100%"">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 10%; text-align: center">No</th>
                                    <th scope="col" style="width: 50%">Nama Kegiatan</th>
                                    <th scope="col" style="width: 40%">Tanggal Kegiatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 0;
                                @endphp
                                @for ($i = 0; $i < count($kegiatans); $i++)
                                    <tr>
                                        <th scope="row" style="text-align: center">{{ ++$no }}</th>
                                        <td>{{ $kegiatans[$i] }}</td>
                                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $tanggal_kegiatans[$i])->format('d-m-Y') }}
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-muted text-center">
                    <div class="mb-2 mt-2">
                        <h5 class="sub-judul" style="margin: 5px;">Keterangan Donasi</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container-fluid px-4 mt-4 mb-4 text-center">
                        <div class="container-fluid detailKas px-5 pt-4 py-1">
                            <Strong>Total Nominal Donasi:</Strong>
                            <h2 class="txt-Kas" id="total-harga-paket-dana">{{ $total_harga_paketdana }}</h2>
                            <h2 class="txt-Kas" id="total-harga-foto">{{ $total_harga_foto }}</h2>
                        </div>
                    </div>

                    <div class="table-responsive container">
                        <div class="col-md-12 dropdown mb-3">
                            <button class="dt-button buttons-copy buttons-html5 btn btn-secondary btn-sm dropdown-toggle"
                                type="button" id="KategoriButton" data-bs-toggle="dropdown" aria-expanded="false"
                                style="width: 200px;">
                                Kategori Donasi
                            </button>
                            <ul id="ddTable" class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <a id="paket_danaID" class="dropdown-item" href="#" onclick="dropDownPaketDana()">Paket & Dana</a>
                                </li>
                                <li>
                                    <a id="paketID" class="dropdown-item" href="#" onclick="dropDownFoto()">Foto</a>
                                </li>
                            </ul>
                        </div>

                        {{-- Table daftar donasi Paket & Dana --}}
                        <div id="daftarDonasiPaketDana">
                            <table id="tableDonasiPaketDana" class="table display py-3" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 10%; text-align: center">No</th>
                                        <th scope="col" style="width: 15%">Tanggal Donasi</th>
                                        <th scope="col" style="width: 25%">Kategori Donasi</th>
                                        <th scope="col" style="width: 50%">Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 0;
                                    @endphp
                                    @foreach ($data_donasi_paketdana as $donasi)
                                        <tr>
                                            <th scope="row" style="text-align: center">{{ ++$no }}</th>
                                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $donasi->tanggal_transaksi)->format('d-m-Y | H:i:s') }}
                                            </td>
                                            <td>{{ $donasi->kategori_donasi }}</td>
                                            <td>Rp. {{ number_format($donasi->total_harga, 2, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        {{-- Table daftar donasi Foto --}}
                        <div id="daftarDonasiFoto">
                            <table id="tableDonasiFoto" class="table display py-3" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 10%; text-align: center">No</th>
                                        <th scope="col" style="width: 15%">Tanggal Donasi</th>
                                        <th scope="col" style="width: 25%">Kategori Donasi</th>
                                        <th scope="col" style="width: 50%">Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 0;
                                    @endphp
                                    @foreach ($data_donasi_foto as $donasi)
                                        <tr>
                                            <th scope="row" style="text-align: center">{{ ++$no }}</th>
                                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $donasi->tanggal_transaksi)->format('d-m-Y | H:i:s') }}
                                            </td>
                                            <td>Foto</td>
                                            <td>Rp. {{ number_format($donasi->total_harga, 2, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#daftarRiwayatKegiatanUmat').DataTable({ responsive: true });
            $('#tableDonasiPaketDana').DataTable({ responsive: true });
            $('#tableDonasiFoto').DataTable({ responsive: true });

            dropDownPaketDana();
        });

        function dropDownFoto() {
            var tableDaftarDonasiPaketDana = $('#daftarDonasiPaketDana');
            var totalHargaPaketDana = $('#total-harga-paket-dana');
            tableDaftarDonasiPaketDana.hide();
            totalHargaPaketDana.hide();

            var tableDaftarDonasiFoto = $('#daftarDonasiFoto');
            var totalHargaFoto = $('#total-harga-foto');
            tableDaftarDonasiFoto.show();
            totalHargaFoto.show();

            $('#KategoriButton').html("Foto");
        }

        function dropDownPaketDana() {
            var tableDaftarDonasiFoto = $('#daftarDonasiFoto');
            var totalHargaFoto = $('#total-harga-foto');
            tableDaftarDonasiFoto.hide();
            totalHargaFoto.hide();

            var tableDaftarDonasiPaketDana = $('#daftarDonasiPaketDana');
            var totalHargaPaketDana = $('#total-harga-paket-dana');
            tableDaftarDonasiPaketDana.show();
            totalHargaPaketDana.show();

            $('#KategoriButton').html("Paket & Dana");
        }
    </script>
@endsection

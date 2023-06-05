@extends('templates.admin_main')
@section('top-header')
    <header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
        <p class="w3-left">Riwayat Transaksi Foto Umat (Tidak Terdaftar)</p>
        <p class="w3-right">Role
            <span>: {{ Auth::guard('admin')->user()->role }} </span>
        </p>
    </header>
@endsection
@section('css')
    <style>

    </style>
@endsection
@section('content')
    <div class="w3-main container-main" style="margin-left:250px;padding-top: 0;">
        <div class="container-fluid isi px-4 mt-3">
            <ul class="nav nav-tabs justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" style="color: #000000;"
                        href="{{ url('kelola-transaksi/daftar-transaksi-foto') }}">Umat Terdaftar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active disabled" aria-current="page" href="#">Umat Tidak Terdaftar</a>
                </li>
            </ul>
            <!-- isi halaman -->
            <!-- tabel -->
            <div class="container mt-3 ">
                <div class="table-responsive container">
                    <table id="riwayatTransaksiFotoUnreg" class="display py-3 " style="width:100%;margin-top: 10%;">
                        <thead>
                            <tr>
                                <th scope="col" style="width:5%;">No</th>
                                <th scope="col" style="width:20%;">Kode Transaksi</th>
                                <th scope="col" style="width:15%;">Tanggal & Jam</th>
                                <th scope="col" style="width:25%;">Nama Pemesan</th>
                                <th scope="col" style="width:20%;">Total Harga</th>
                                <th scope="col" style="width:15%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="px-3">
                            @php
                                $no = 0;
                            @endphp
                            @foreach ($data_transaksi as $transaksi)
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>{{ $transaksi->kode_transaksi }}</td>
                                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaksi->tanggal_transaksi)->format('d-m-Y | H:i:s') }}
                                    </td>
                                    <td>{{ $transaksi->nama_pemesan }}</td>
                                    <td class="text-success font-weight-bold">
                                        <b>Rp. {{ number_format($transaksi->total_harga, 2, ',', '.') }}</b>
                                    </td>
                                    <td class="text-center">
                                        <button title="print" class="btn btn-outline-dark"
                                            onclick="openPrintPage('{{ $transaksi->kode_transaksi }}')">
                                            <i class="fa fa-print" aria-hidden="true"></i>
                                        </button>
                                        <button title="detail" class="btn btn-outline-dark" type="button"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalDetailTransaksiFotoUnreg{{ $transaksi->kode_transaksi }}">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Modal Show Data Foto -->
                    @foreach ($data_transaksi as $transaksi)
                        <div class="modal fade" id="modalDetailTransaksiFotoUnreg{{ $transaksi->kode_transaksi }}"
                            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi Foto
                                            &nbsp;&nbsp;<b>{{ $transaksi->kode_transaksi }}</b></h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="row mt-2 mb-4">
                                                <table>
                                                    <tr>
                                                        <td style="width: 15%;">No Telepon Pemesan</td>
                                                        <td style="width: 1%;">:</td>
                                                        <td style="width: 84%; text-align: left;">
                                                            {{ $transaksi->no_telepon_pemesan }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat Pemesan</td>
                                                        <td>:</td>
                                                        <td>{{ $transaksi->alamat_pemesan }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            @php
                                                $no = 0;
                                                $detail_transaksi = \App\Models\DetailTransaksiFotoUnreg::where('kode_transaksi', $transaksi->kode_transaksi)->get();
                                            @endphp
                                            <table class="table" style="width: 100%; margin-bottom: 20px;">
                                                <thead style="background-color: white; color: black;">
                                                    <tr>
                                                        <th scope="col" style="width: 10%; text-align: center;">No</th>
                                                        <th scope="col" style="width: 70%;">Nama Leluhur</th>
                                                        <th scope="col" style="width: 20%;">Sub Total Harga</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-group-divider" id="cart-table">
                                                    @foreach ($detail_transaksi as $item)
                                                        <tr>
                                                            <th scope="row" style="text-align: center;">
                                                                {{ ++$no }}</th>
                                                            <td>{{ $item->nama_leluhur }}</td>
                                                            <td>Rp. {{ number_format($item->total_harga, 2, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- isi tiap halaman sampai sini -->
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#riwayatTransaksiFotoUnreg').DataTable({
                responsive: true
            });
        });

        function openPrintPage(kode_transaksi) {
            var windowOpen = window.open("{{ url('kelola-transaksi/struk-transaksi-foto-2') }}/" + kode_transaksi);
            windowOpen.print();
        };
    </script>
@endsection

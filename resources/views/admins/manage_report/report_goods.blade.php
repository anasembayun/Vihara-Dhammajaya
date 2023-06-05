@extends('templates.admin_main')
@section('top-header')
    <header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
        <p class="w3-left">Laporan Penjualan Paket</p>
        <p class="w3-right">Role
            <span>: {{ Auth::guard('admin')->user()->role }} </span>
        </p>
    </header>
@endsection
@section('css')
    <!-- Extra Ext. Datatables -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/searchpanes/2.0.2/css/searchPanes.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css" />

    <script type="text/javascript" src="https://cdn.datatables.net/searchpanes/2.0.2/js/dataTables.searchPanes.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>

    <!-- Add-on Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- Select2 Plugin for search in select -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
                {{-- <li class="nav-item">
                    <a class="nav-link" style="color: #000000;"
                        href="{{ url('kelola-laporan/laporan-transaksi-total') }}">Transaksi Keseluruhan</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link active disabled" aria-current="page" href="">Laporan Paket</a>
                </li>
            </ul>

            <div class="container-fluid isi px-4 mt-4 justify-content-center">
                <div class="card mb-5">
                    <div class="card-body mt-2">
                        <div class="d-flex justify-content-center mb-4">
                            <div class="row border-bottom" style="width: 100%; padding-bottom:2%">
                                <div class="col-md-2 dropdown" style="margin-right: 0px;">
                                    <button
                                        class="dt-button buttons-copy buttons-html5 btn btn-secondary btn-sm dropdown-toggle"
                                        type="button" id="KategoriButton" data-bs-toggle="dropdown" aria-expanded="false"
                                        style="width: 160px;">
                                        Tampilkan Paket
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a id="paket_danaID" class="dropdown-item" href="#"
                                                onclick="dropDownPaketTerjual()">Terjual</a></li>
                                        <li><a id="paketID" class="dropdown-item" href="#"
                                                onclick="dropDownSemuaPaket()">Semua</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid px-4 mt-4 mb-4 text-center">
                            <div class="container-fluid detailKas px-5 pt-4 py-1">
                                <Strong>Total :</Strong>
                                <h2 class="txt-Kas" id="total-harga"> Rp.
                                    {{ number_format($total, 2, ',', '.') }}</h2>
                            </div>
                        </div>

                        <table id="laporanPenjualanPaket" class="display py-3" style="width:100%; margin-top: 10%;">
                            <thead>
                                <tr>
                                    <th scope="col" style="width:5%; text-align: center">No</th>
                                    <th scope="col" style="width:30%; text-align: center">Nama Paket</th>
                                    <th scope="col" style="width:20%; text-align: center">Kode Paket</th>
                                    <th scope="col" style="width:15%; text-align: center">Paket Terjual</th>
                                    <th scope="col" style="width:30%; text-align: center">Total Pendapatan</th>
                                </tr>
                            </thead>
                            <tbody class="px-3">
                                @php
                                    $no = 0;
                                @endphp
                                @foreach ($data_paket as $paket)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td>{{ $paket->nama_barang }}</td>
                                        <td>{{ $paket->kode_barang }}</td>
                                        <td>
                                            @php
                                                $detail_transaksi_paket = \App\Models\DetailTransaksi::where('id_barang', $paket->id)->get();
                                            @endphp
                                            @if (count($detail_transaksi_paket) != 0)
                                                {{ count($detail_transaksi_paket) }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        @php
                                            $total_harga = count($detail_transaksi_paket) * $paket->harga_jual;
                                        @endphp
                                        @if (count($detail_transaksi_paket) == 0)
                                            <td>
                                                Rp. {{ number_format($total_harga, 2, ',', '.') }}
                                            </td>
                                        @else
                                            <td class="text-success font-weight-bold">
                                                <b>Rp. {{ number_format($total_harga, 2, ',', '.') }}</b>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#laporanPenjualanPaket').DataTable({
                responsive: true,
                dom: 'lBfrtip',
                buttons: [
                    'spacer',
                    {
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },
                    {
                        extend: 'spacer',
                        style: 'bar'
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    'colvis'
                ]
            });
        });

        function dropDownPaketTerjual() {
            var table = $('#laporanPenjualanPaket').DataTable();
            table.columns(3)
                .search('^(?!.*(-)).*$', true, false)
                .draw();
            $('#KategoriButton').html("Terjual");
        }

        function dropDownSemuaPaket() {
            var table = $('#laporanPenjualanPaket').DataTable();
            table.columns(3)
                .search("")
                .draw();
            $('#KategoriButton').html("Semua");
        }
    </script>
@endsection

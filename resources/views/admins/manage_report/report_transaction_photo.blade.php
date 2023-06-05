@extends('templates.admin_main')
@section('top-header')
    <header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
        <p class="w3-left">Laporan Transaksi Foto</p>
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
                    <a class="nav-link active disabled" aria-current="page" href="">Transaksi Foto</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" style="color: #000000;"
                        href="{{ url('kelola-laporan/laporan-transaksi-total') }}">Transaksi Keseluruhan</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" style="color: #000000;"
                        href="{{ url('kelola-laporan/laporan-penjualan-paket') }}">Laporan Paket</a>
                </li>
            </ul>

            <div class="container-fluid isi px-4 mt-4 justify-content-center">
                <div class="card mb-5">
                    <div class="card-body mt-2">
                        <div class="d-flex justify-content-center mb-4">
                            <div class="row border-bottom" style="width: 100%; padding-bottom:2%">
                                {{-- <div class="col-md-1">
                                </div> --}}
                                {{-- Dropdown --}}
                                {{-- dt-button buttons-copy buttons-html5 btn btn-secondary btn-sm --}}
                                <div class="col-md-3 dropdown" style="margin-right: 0px;">
                                    <button
                                        class="dt-button buttons-copy buttons-html5 btn btn-secondary btn-sm dropdown-toggle"
                                        type="button" id="KategoriButton" data-bs-toggle="dropdown" aria-expanded="false"
                                        style="width: 200px;">
                                        Kategori Tabel
                                    </button>
                                    <ul id="ddTable" class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a id="paket_danaID" class="dropdown-item" href="#"
                                                onclick="ddjRegist()">Jemaat Terdaftar</a></li>
                                        <li><a id="paketID" class="dropdown-item" href="#"
                                                onclick="ddjUnregist()">Jemaat Belum Terdaftar</a></li>
                                    </ul>
                                </div>
                                {{-- Date Filter --}}
                                <div class="col-md-2">
                                    <input type="date" name="date" id="date_awal" class="form-control form-control-md"
                                        required>
                                </div>
                                -
                                <div class="col-md-2">
                                    <input type="date" name="date" id="date_akhir"
                                        class="form-control form-control-md" required>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary btn-md" id="filter_btn">Filter</button>
                                </div>
                                <div class="col-md-2">
                                    <div class="colvis"></div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid px-4 mt-4 mb-4 text-center">
                            <div class="container-fluid detailKas px-5 pt-4 py-1">
                                <Strong>Total Harga Keseluruhan:</Strong>
                                <h2 class="txt-Kas" id="total-harga">{{ $total }}</h2>
                                <h2 class="txt-Kas" id="total-harga-unreg">{{ $total_unreg }}</h2>
                            </div>
                        </div>

                        {{-- Table Transaksi Foto Regist --}}
                        <div id="tableRegist">
                            <table id="laporanTransaksi" class="display py-3" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width:5%;">No</th>
                                        <th scope="col" style="width:20%;">Kode Transaksi</th>
                                        <th scope="col" style="width:15%;">Tanggal & Jam</th>
                                        <th scope="col" style="width:15%;">Nama Umat</th>
                                        <th scope="col" style="width:25%;">Alamat</th>
                                        <th scope="col" style="width:15%;">Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody class="px-3" id="tbody_table">
                                    @php
                                        $no = 0;
                                    @endphp
                                    @foreach ($data_transaksi as $transaksi)
                                        <tr>
                                            <td>{{ ++$no }}</td>
                                            <td id="kode_transaksi">{{ $transaksi->kode_transaksi }}</td>
                                            <td id="tanggal_transaksi">
                                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaksi->tanggal_transaksi)->format('d-m-Y | H:i:s') }}
                                            </td>
                                            <td id="nama">{{ $transaksi->id_pemesan }}</td>
                                            <td id="alamat">{{ $transaksi->alamat_pemesan }}</td>
                                            <td id="total_harga" class="text-success font-weight-bold">
                                                <b>{{ $transaksi->total_harga }}</b>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        {{-- Table Transaksi Foto Unregist --}}
                        <div id="tableUnregist">
                            <table id="laporanTransaksiUnregist" class="display py-3" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width:5%;">No</th>
                                        <th scope="col" style="width:20%;">Kode Transaksi</th>
                                        <th scope="col" style="width:15%;">Tanggal & Jam</th>
                                        <th scope="col" style="width:12%;">Nama Pemesan</th>
                                        <th scope="col" style="width:13%;">No.Telphone</th>
                                        <th scope="col" style="width:20%;">Alamat Pemesan</th>
                                        <th scope="col" style="width:15%;">Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody class="px-3" id="tbody_table">
                                    @php
                                        $no = 0;
                                    @endphp
                                    @foreach ($data_transaksi_unreg as $transaksi)
                                        <tr>
                                            <td>{{ ++$no }}</td>
                                            <td id="kode_transaksi">{{ $transaksi->kode_transaksi }}</td>
                                            <td id="tanggal_transaksi">
                                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaksi->tanggal_transaksi)->format('d-m-Y | H:i:s') }}
                                            </td>
                                            <td id="nama">{{ $transaksi->nama_pemesan }}</td>
                                            <td id="no_tlp">{{ $transaksi->no_telepon_pemesan }}</td>
                                            <td id="alamat">{{ $transaksi->alamat_pemesan }}</td>
                                            <td id="total_harga" class="text-success font-weight-bold">
                                                <b>{{ $transaksi->total_harga }}</b>
                                            </td>
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
            $('#laporanTransaksi').DataTable({
                responsive: true,
                dom: 'lBfrtip',
                buttons: {
                    buttons: [
                        'spacer',
                        {
                            extend: 'copyHtml5',
                            className: 'btn btn-secondary btn-sm',
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
                            className: 'btn btn-success btn-sm',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            className: 'btn btn-danger btn-sm',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5]
                            }
                        },
                        'colvis'
                    ]
                }
            });
            $('#laporanTransaksiUnregist').DataTable({
                responsive: true,
                dom: 'lBfrtip',
                buttons: {
                    buttons: [
                        'spacer',
                        {
                            extend: 'copyHtml5',
                            className: 'btn btn-secondary btn-sm',
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
                            className: 'btn btn-success btn-sm',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            className: 'btn btn-danger btn-sm',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6]
                            }
                        },
                        'colvis'
                    ]
                }
            });
            // run ddjRegist saat doc.ready
            ddjRegist();
        });

        $(document).on('click', '#filter_btn', function(e) {
            e.preventDefault();
            var date_awal = document.getElementById('date_awal').value;
            var date_akhir = document.getElementById('date_akhir').value;

            // var temp = $('#KategoriButton').html;
            // console.log(temp);
            // console.log("tetete");
            var table = $('#laporanTransaksi').DataTable();
            var table2 = $('#laporanTransaksiUnregist').DataTable();
            $.ajax({
                url: "{{ url('kelola-laporan/laporan-transaksi-foto-filter/') }}/" + date_awal + "/" +
                    date_akhir,
                method: "GET",
                success: function(response) {
                    // console.log(response);
                    // $('#KategoriButton').html("Kategori Tabel");
                    var table = $('#laporanTransaksi').DataTable();
                    table.clear();
                    table2.clear();
                    var co = 1;
                    response.data_trs.forEach(element => {
                        // console.log(element);
                        table.row.add([co, element.kode_transaksi, element.tanggal_transaksi,
                            element.id_pemesan,
                            element.alamat_pemesan, "<b class='text-success'>" +
                            element
                            .total_harga + "</b>"
                        ]);
                        co++;
                    });
                    table.draw();
                    var co2 = 1;
                    response.data_unreg.forEach(element => {
                        // console.log(element);
                        table2.row.add([co2, element.kode_transaksi, element.tanggal_transaksi,
                            element.nama_pemesan, element.no_telepon_pemesan,
                            element.alamat_pemesan, "<b class='text-success'>" +
                            element
                            .total_harga + "</b>"
                        ]);
                        co2++;
                    });
                    table2.draw();
                    // console.log(response.total_unreg);
                    $('#total-harga-unreg').html(response.total_unreg);
                    $('#total-harga').html(response.total);
                }
            });
        });

        function ddjRegist() {
            var tableUnregist = $('#tableUnregist');
            var totalU = $('#total-harga-unreg');
            tableUnregist.hide();
            totalU.hide();

            var tableRegist = $('#tableRegist');
            var total = $('#total-harga');
            tableRegist.show();
            total.show();

            $('#KategoriButton').html("Jemaat Terdaftar");
        }

        function ddjUnregist() {
            var tableRegist = $('#tableRegist');
            var total = $('#total-harga');
            tableRegist.hide();
            total.hide();

            var tableUnregist = $('#tableUnregist');
            var totalU = $('#total-harga-unreg');
            tableUnregist.show();
            totalU.show();

            $('#KategoriButton').html("Jemaat Belum Terdaftar");
        }
    </script>
@endsection

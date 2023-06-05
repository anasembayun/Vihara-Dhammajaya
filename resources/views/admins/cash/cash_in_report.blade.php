@extends('templates.admin_main')
@section('top-header')
    <header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
        <p class="w3-left">Laporan Kas Masuk</p>
        <p class="w3-right">Role
            <span>: {{ Auth::guard('admin')->user()->role }} </span>
        </p>
    </header>
@endsection
@section('css')
    <style>
        .detailKas {
            border: 1px solid #100701;
            border-radius: 5px;
        }

        .txt-Kas {
            color: #D09222;
        }
    </style>
@endsection
@section('content')
    <div class="w3-main container-main" style="margin-left:250px; padding-top: 0;">
        <!-- isi halaman -->
        <div class="container-fluid isi px-4 mt-3">
            <ul class="nav nav-tabs justify-content-center">
                @php
                    $access_list = \App\Models\DetailRole::join('data_access', 'data_access.id', 'detail_role.id_access')->where('detail_role.id_role', Auth::guard('admin')->user()->id_role )->pluck('data_access.nama')->toArray();
                @endphp

                @if(in_array("Kas Masuk", $access_list))
                    <li class="nav-item">
                        <a class="nav-link active disabled" aria-current="page" href="">Kas Masuk</a>
                    </li>
                @endif
                @if(in_array("Kas Keluar", $access_list))
                    <li class="nav-item">
                        <a class="nav-link" style="color: #000000;" href="{{ url('kas/laporan-kas-keluar') }}">Kas Keluar</a>
                    </li>
                @endif
            </ul>
        </div>

        <div class="container-fluid isi px-4 mt-4 justify-content-center">
            <div class="card mb-5">
                <div class="card-body">
                    <div class="container justify-content-center">
                        <div class="row mb-3 text-center">

                            <div class="col-md-8">
                                <div class="d-flex" style="width: 100%;">
                                    <div class="col-md-3 text-start">
                                        <h4>Filter Periode</h4>
                                    </div>
                                    <div class="col-md-4 align-self-center">
                                        <input name="date_awal" type="date" value="{{ $date_awal }}"
                                            class="form-control form-control-md date-awal">
                                    </div>
                                    <div class="col-md-1 align-self-center">-</div>
                                    <div class="col-md-4 align-self-center">
                                        <input name="date_akhir" type="date" value="{{ $date_akhir }}"
                                            class="form-control form-control-md date-akhir">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 align-self-center text-end">
                                <button type="submit" class="btn btn-primary btn-md" id="filter_btn"
                                    onclick="filterDataKasMasuk()">Filter</button>
                                <button type="submit" class="btn btn-secondary btn-md" id="reset_btn"
                                    onclick="resetDataKasMasuk()">Reset</button>
                                <button class="btn btn-danger btn-md" id="exportpdf" type="submit">
                                    <i class="mdi mdi-file-pdf"></i> PDF
                                </button>
                            </div>

                        </div>
                    </div>

                    <div class="container-fluid px-4 mt-3 mb-4 text-center">
                        <div class="container-fluid detailKas px-5 pt-4 py-1">
                            <Strong>Total Kas Masuk:</Strong>
                            <h2 class="txt-Kas">Rp. {{ number_format($total_kas_masuk, 2, ',', '.') }}</h2>
                        </div>
                    </div>

                    <table id="daftarKasMasuk" class="display py-3 " style="width:100%;margin-top: 10%;">
                        <thead>
                            <tr>
                                <th scope="col" style="width:5%;">No</th>
                                <th scope="col" style="width:15%;">Nomor Kas Masuk</th>
                                <th scope="col" style="width:10%;">Tanggal</th>
                                <th scope="col" style="width:15%;">Nama Admin</th>
                                <th scope="col" style="width:25%;">Keterangan</th>
                                <th scope="col" style="width:15%;">Nominal</th>
                                <th scope="col" style="width:15%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="px-3">
                            @php
                                $no = 0;
                            @endphp
                            @foreach ($data_kas_masuk as $item)
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>{{ $item->nomor_kas_masuk }}</td>
                                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->tanggal)->format('d-m-Y') }}
                                    </td>
                                    <td>{{ $item->nama_admin }}</td>
                                    <td>{{ $item->keterangan_keperluan }}</td>
                                    <td>Rp. {{ number_format($item->nominal_pemasukan, 2, ',', '.') }}</td>
                                    <td class="text-center">
                                        <button title="print" class="btn btn-outline-dark"
                                            onclick="openPrintPage('{{ $item->nomor_kas_masuk }}')">
                                            <i class="fa fa-print" aria-hidden="true"></i>
                                        </button>
                                        <button title="delete" class="btn btn-outline-dark" id="btn-6" type="button"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteDataKasMasukModal{{ $item->id }}">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Modal Delete -->
                    @foreach ($data_kas_masuk as $item)
                        <div class="modal fade" id="deleteDataKasMasukModal{{ $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Data Kas Masuk
                                            {{ $item->id }}</h5>
                                    </div>
                                    <form action="{{ url('kas/laporan-kas-masuk/delete/' . $item->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <p>Apakah anda yakin ingin menghapus data kas
                                                "<b>{{ $item->nomor_kas_masuk }}</b>"?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tidak</button>
                                            <button type="submit" class="btn btn-primary">Ya</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- isi tiap halaman sampai sini -->
    </div>
@endsection
@section('script')
    <script>
        // var len=$("tr").length;

        // var sum=0;

        // for(var i=1;i<len;i++){
        // sum += parseFloat($("tr td").eq(2).html());
        // }

        // $("#daftarKasMasuk").createElement("<tr><td></td><td></td><td>"+sum+"</td></tr>");

        $(document).ready(function() {
            $('#daftarKasMasuk').DataTable({
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
                                columns: [0, 1, 2, 3, 4, 5]
                            }
                            // customize: function(xlsx) {
                            //     var sheet = xlsx.xl.worksheets["sheet1.xml"];

                            //     // Loop over the cells in column `E`
                            //     $("row c[r^="E"]", sheet).each(function() {
                            //         // Get the value
                            //         if ($("is t", this).text() == "отключен") {
                            //             $(this).attr("s", "20");
                            //         }
                            //     });
                            // }
                            // customize: function(xlsx) {
                            //     $('row c[r^="F"]', sheet).each(function(){
                            //         var value = $(this).text();
                            //         sum += Number(value.replace(/[^0-9\.-]+/g, ""));
                            //     });

                            //     var formatter = new Intl.NumberFormat('en-US', {
                            //     style: 'currency',
                            //     currency: 'IDR',

                            //     // the default value for minimumFractionDigits depends on the currency
                            //     // and is usually already 2
                            //     minimumFractionDigits: 2,
                            //     });

                            //     function addTotal(index, data) {
                            //         msg = '<row r="' + index + '">';
                            //         for (i = 0; i < data.length; i++) {
                            //             var key = data[i].k;
                            //             var value = data[i].v;
                            //             msg += '<c t="inlineStr" r="' + 'B' + '4' + '" s="42">';
                            //             msg += '<is>';
                            //             msg += '<t>' + formatter.format(sum) + '</t>';
                            //             msg += '</is>';
                            //             msg += '</c>';
                            //         }
                            //         msg += '</row>';
                            //         return msg;
                            //     }

                            //     var r1 = addTotal(1, [{
                            //         k: 'A',
                            //         v: 'ColA'
                            //     }]);

                            //     sheet.childNodes[0].childNodes[1].innerHTML = r1 + sheet.childNodes[0].childNodes[1].innerHTML;
                            // }
                        },
                        'colvis'
                    ]
                    // "footerCallback": function(row, data, start, end, display) {
                    //     var api = this.api(),
                    //         data;

                    //     // Remove the formatting to get integer data for summation
                    //     var intVal = function(i) {
                    //         return typeof i === "string" ?
                    //             i.replace(/[\$,]/g, "") * 1 :
                    //             typeof i === "number" ?
                    //             i : 0;
                    //     };

                    //     // Total over all pages
                    //     // total = api
                    //     //     .column(8)
                    //     //     .data()
                    //     //     .reduce(function(a, b) {
                    //     //         return intVal(a) + intVal(b);
                    //     //     }, 0);

                    //     // Total over this page
                    //     // pageTotal = api
                    //     //     .column(8, {
                    //     //         page: "current"
                    //     //     })
                    //     //     .data()
                    //     //     .reduce(function(a, b) {
                    //     //         return intVal(a) + intVal(b);
                    //     //     }, 0);

                    //     // Update footer
                    //     // Create our number formatter.
                    //     var formatter = new Intl.NumberFormat("en-US", {
                    //         style: "currency",
                    //         currency: "IDR",
                    //         minimumFractionDigits: 2,
                    //         // the default value for minimumFractionDigits
                    //         // depends on the currency
                    //     });

                    //     $(api.column(8).footer()).html(
                    //         formatter.format(pageTotal) + " ("
                    //         formatter.format(total) + " total)";
                    //     );
                    // }
                }
            });

        });

        $(document).on('click', '#exportpdf', function(e) {
            var date_awal = document.querySelector('.date-awal').value;
            var date_akhir = document.querySelector('.date-akhir').value;

            if (date_awal == "" || date_akhir == "") {
                date_awal = 0;
                date_akhir = 0;
            }

            var windowOpen = window.open("{{ url('kas/laporan-kas-masuk/report-kas-masuk') }}/" + date_awal + "/" +
                date_akhir);
            windowOpen.print();
        });

        function openPrintPage(nomor_kas_masuk) {
            var windowOpen = window.open("{{ url('kas/struk-kas-masuk') }}/" + nomor_kas_masuk);
            windowOpen.print();
        };

        function filterDataKasMasuk() {
            if (document.querySelector('.date-awal').value != "" && document.querySelector('.date-akhir').value != "") {
                open("{{ url('kas/laporan-kas-masuk-filter') }}/" + document.querySelector('.date-awal').value + "/" +
                    document
                    .querySelector('.date-akhir').value, "_self");
            }
        };

        function resetDataKasMasuk() {
            open("{{ url('kas/laporan-kas-masuk') }}", "_self");
        };
    </script>
@endsection

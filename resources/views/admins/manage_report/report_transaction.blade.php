@extends('templates.admin_main')
@section('top-header')
    <header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
        <p class="w3-left">Laporan Transaksi</p>
        <p class="w3-right">Role
            <span>: {{ Auth::guard('admin')->user()->role }} </span>
        </p>
    </header>
@endsection
@section('css')
    <!-- Extra Ext. Datatables -->
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.5.1.js">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

    <!-- Add-on Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- Select2 Plugin for search in select -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- test --}}
    <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
@endsection
@section('content')
    <div class="w3-main container-main" style="margin-left:250px;padding-top: 0;">
        <!-- isi halaman -->
        <div class="container-fluid isi px-4 mt-3">
            <ul class="nav nav-tabs flex-column flex-sm-row justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active disabled" aria-current="page" href="">Transaksi</a>
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
                    <a class="nav-link" style="color: #000000;"
                        href="{{ url('kelola-laporan/laporan-penjualan-paket') }}">Laporan Paket</a>
                </li>
            </ul>

            <div class="container-fluid isi px-4 mt-4 justify-content-center">
                <div class="card mb-5">
                    <div class="card-body mt-2">
                        <div class="d-flex justify-content-center mb-4">
                            <div class="row border-bottom" style="width: 100%; padding-bottom:2%">
                                {{-- Dropdown --}}
                                <div class="col-md-2 dropdown" style="margin-right: 5px;">
                                    {{-- <button
                                        class="dt-button buttons-copy buttons-html5 btn btn-secondary btn-sm dropdown-toggle"
                                        type="button" id="KategoriButton" data-bs-toggle="dropdown" aria-expanded="false"
                                        style="width: 200px;">Kategori Donasi
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a id="paket_danaID" class="dropdown-item" href="#"
                                                onclick="dropDownPaketDana()">Paket & Dana</a></li>
                                        <li><a id="paketID" class="dropdown-item" href="#"
                                                onclick="dropDownPaket()">Paket</a></li>
                                        <li><a id="danaID" class="dropdown-item" href="#"
                                                onclick="dropDownDana()">Dana</a></li>
                                    </ul> --}}
                                    <select style="text-align:center; width: 180px; height:35px; background-color: 
                                    #e9e9e9; background-image: linear-gradient(to bottom, white 0%, #e9e9e9 100%); 
                                    border: 1px solid #999;" id="custom-select-filter-1">
                                        <option value="">Kategori Donasi</option>
                                        <option value="Dana">Dana</option>
                                        <option value="Paket">Paket</option>
                                    </select>
                                </div>
                                <div class="col-md-2 dropdown" style="margin-right: 5rem;">
                                    <select style="text-align:center; width: 180px; height:35px; background-color: 
                                    #e9e9e9; background-image: linear-gradient(to bottom, white 0%, #e9e9e9 100%); 
                                    border: 1px solid #999;" id="custom-select-filter-2">
                                        <option value="">Nama Kegiatan</option>
                                        @foreach ($donasi as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_kegiatan_donasi }}</option>
                                        @endforeach
                                    </select>
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
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary btn-md" id="filter_btn" onclick="filterDateTransaksi()">Filter</button>
                                    <button type="submit" class="btn btn-secondary btn-md" id="reset_btn"
                                    onclick="resetDataTransaksi()">Reset</button>
                                    <button class="btn btn-danger btn-md" id="exportpdf" type="submit">
                                        <i class="mdi mdi-file-pdf"></i> PDF
                                    </button>
                                </div>
                                <div class="col-md-2">
                                    <div class="colvis"></div>
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid px-4 mt-4 mb-4 text-center">
                            <div class="container-fluid detailKas px-5 pt-4 py-1">
                                <Strong>Total Harga Keseluruhan:</Strong>
                                <h2 class="txt-Kas">Rp. <span id="tbltotal">{{$total_semua}}</span>,00</h2>
                            </div>
                        </div>

                        <table id="laporanTransaksi" class="display py-3" style="width:100%;">
                            <thead>
                                <tr>
                                    <th scope="col" style="width:5%;">No</th>
                                    <th scope="col" style="width:20%;">Kode Transaksi</th>
                                    <th scope="col" style="width:15%;">Tanggal & Jam</th>
                                    <th scope="col" style="width:15%;">Nama Umat</th>
                                    <th scope="col" style="width:15%;">Kategori Donasi</th>
                                    <th scope="col" style="width:15%;">Total Harga</th>
                                    <th scope="col" style="width:15%;">Nama Kegiatan</th>
                                </tr>
                            </thead>
                            <tbody class="px-3" id="tbody_table">
                                @php
                                    $no = 0;
                                @endphp
                                @foreach ($data_transaksi as $transaksi)
                                    <tr data-attribute1="{{$transaksi->kategori_donasi}}" data-attribute2="{{$transaksi->id_kegiatan_donasi}}">
                                        <td>{{ ++$no }}</td>
                                        <td id="kode_transaksi">{{ $transaksi->kode_transaksi }}</td>
                                        <td id="tanggal_transaksi">
                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaksi->tanggal_transaksi)->format('d-m-Y | H:i:s') }}
                                        </td>
                                        <td id="nama">{{ $transaksi->nama }}</td>
                                        <td id="kategori_donasi">{{ $transaksi->kategori_donasi }}</td>
                                        <td id="total_harga" class="text-success font-weight-bold">
                                            @php
                                                $total_harga = 0;
                                                if ($transaksi->kategori_donasi != 'Dana') {
                                                    $id_barangs = \App\Models\DetailTransaksi::where('kode_transaksi', $transaksi->kode_transaksi)->pluck('id_barang');
                                                    for ($i = 0; $i < $id_barangs->count(); $i++) {
                                                        $total_harga += \App\Models\Goods::where('id', $id_barangs[$i])->value('harga_jual');
                                                    }
                                                } else {
                                                    $total_harga = $transaksi->total_harga;
                                                }
                                            @endphp
                                            <b data-harga="{{$total_harga}}">Rp. {{ number_format($total_harga, 2, ',', '.') }}</b>
                                        </td>
                                        <td id="nama_kegiatan">
                                            @php
                                                $nama_kegiatan = \App\Models\Donasi::where('id', $transaksi->id_kegiatan_donasi)->value('nama_kegiatan_donasi');
                                            @endphp
                                            {{ $nama_kegiatan }}
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
        //dropdown 
        $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
        var trNode = settings.aoData[dataIndex].nTr;
        var attr1 = trNode.getAttribute("data-attribute1");
        var attr2 = trNode.getAttribute("data-attribute2");
        
        var val1 = $('#custom-select-filter-1').val();
        var val2 = $('#custom-select-filter-2').val();
        
        if ( (val1 === "" || val1 === attr1) 
            && (val2 === "" || val2 === attr2) ) {
            return true;
        }
        return false;
        });

        //sum
        jQuery.fn.dataTable.Api.register( 'sum()', function ( ) {
            return this.flatten().reduce( function ( a, b ) {
                var x = parseFloat(a) || 0;
                var y = parseFloat($(b).attr('data-harga')) || 0;
                return x + y
            }, 0 );
        } );

        $(document).ready(function() {
            // $('#laporanTransaksi').dataTable({
            //     "columnDefs": [{
            //         className: "text-success",
            //         "targets": [3]
            //     }]
            // });
            $('#total-dana').hide();
            $('#total-paket').hide();
            var table = $('#laporanTransaksi').DataTable({
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
                        'colvis'
                    ]
                },
            });
            
            var total_harga = table.column(5).data().sum();
            $("#tbltotal").text((+total_harga).toLocaleString('id-ID'));

            //dropdown
            $('#custom-select-filter-1').on('change', function(){
                table.draw();
                var total_harga = table.column(5,{filter:'applied'}).data().sum();
                $("#tbltotal").text((+total_harga).toLocaleString('id-ID'));
            });
            
            $('#custom-select-filter-2').on('change', function(){
                table.draw();
                var total_harga = table.column(5,{filter:'applied'}).data().sum();
                $("#tbltotal").text((+total_harga).toLocaleString('id-ID'));
            });
            
        });

        function filterDateTransaksi() {
            var date_awal = document.getElementById('date_awal').value;
            var date_akhir = document.getElementById('date_akhir').value;
            var kategori = document.getElementById('custom-select-filter-1').value;
            var kegiatan = document.getElementById('custom-select-filter-2').value;

            if (date_awal != "" && date_akhir != "") {
                if (kategori == "" && kegiatan == ""){
                    kategori = "all";
                    kegiatan = "all";
                    open("{{ url('kelola-laporan/laporan-transaksi-filter/') }}/" + date_awal + "/" +
                    date_akhir + "/" + kategori + "/" + kegiatan, "_self");
                }
                else if(kategori == ""){
                kategori = "all";
                open("{{ url('kelola-laporan/laporan-transaksi-filter/') }}/" + date_awal + "/" +
                    date_akhir + "/" + kategori + "/" + kegiatan, "_self");
                }
                else if(kegiatan == ""){
                kegiatan = "all";
                open("{{ url('kelola-laporan/laporan-transaksi-filter/') }}/" + date_awal + "/" +
                    date_akhir + "/" + kategori + "/" + kegiatan, "_self");
                }
                else{
                    open("{{ url('kelola-laporan/laporan-transaksi-filter/') }}/" + date_awal + "/" +
                    date_akhir + "/" + kategori + "/" + kegiatan, "_self");
                }
            }
            
        };

        function resetDataTransaksi() {
            open("{{ url('kelola-laporan/laporan-transaksi') }}", "_self");
        };

        $(document).on('click', '#exportpdf', function(e) {
            var date_awal = document.getElementById('date_awal').value;
            var date_akhir = document.getElementById('date_akhir').value;
            var kategori = document.getElementById('custom-select-filter-1').value;
            var kegiatan = document.getElementById('custom-select-filter-2').value;
            var url = window.location.pathname;
            console.log(url);

            if (date_awal == "" || date_akhir == "") {
                date_awal = 0;
                date_akhir = 0;
            }

            if(kategori == ""){
                kategori = "all";
            }

            if(kegiatan == ""){
                kegiatan = "all";
            }

            if( url == "/kelola-laporan/laporan-transaksi"){
                var windowOpen = window.open("{{ url('kelola-laporan/laporan-transaksi') }}/" + date_awal + "/" +
                date_akhir + "/" + kategori + "/" + kegiatan);
                windowOpen.print();
            }
            else{
                var tgl_awl = url.split('/')[3];
                var tgl_akh = url.split('/')[4];
                var ktgr = url.split('/')[5];
                var keg  = url.split('/')[6];

                var windowOpen = window.open("{{ url('kelola-laporan/laporan-transaksi') }}/" + tgl_awl + "/" +
                tgl_akh + "/" + ktgr + "/" + keg);
                windowOpen.print();
            }
        });

        // $(document).on('click', '#filter_btn', function(e) {
        //     e.preventDefault();
        //     var date_awal = document.getElementById('date_awal').value;
        //     var date_akhir = document.getElementById('date_akhir').value;
        //     var kategori = document.getElementById('custom-select-filter-1').value;
        //     var Kegiatan = document.getElementById('custom-select-filter-2').value;
        //     console.log(date_awal);
        //     console.log(date_akhir);

        //     var table = $('#laporanTransaksi').DataTable();
        //     // ---------------------- Test DataTables filter ------------------- //
        //     // var filteredData = table
        //     //     .columns(1)
        //     //     .data()
        //     //     .flatten()
        //     //     .filter(function(value, index) {
        //     //         var awal = value >= date_awal ? true : false;
        //     //         var akhir = value <= date_akhir ? true : false;
        //     //         console.log(t);
        //     //         return t;
        //     //     })
        //     //     .draw();

        //     $.ajax({
        //         url: "{{ url('kelola-laporan/laporan-transaksi-filter/') }}/" + date_awal + "/" +
        //             date_akhir + "/" + kategori + "/" + Kegiatan,
        //         method: "GET",
        //         success: function(response) {
        //             console.log(response);

        //             // $("#tbody_table").empty();
        //             // var tBody = document.getElementById("tbody_table");
                    
        //             var table = $('#laporanTransaksi').DataTable();
        //             table.clear();

        //             var count = 1;
        //             response.data_trs.forEach(element => {
        //                 console.log(element);

        //                 // var data = {
        //                 //     "kode_transaksi": element.kode_transaksi,
        //                 //     "tanggal_transaksi": element.tanggal_transaksi,
        //                 //     "nama": element.nama,
        //                 //     "kategori_donasi": element.kategori_donasi,
        //                 //     "total_harga": element.total_harga,
        //                 //     "id_kegiatan_donasi": element.id_kegiatan_donasi
        //                 // }

        //                 // table.row.add(data);
        //                 table.row.add([
        //                     count,
        //                     element.kode_transaksi,
        //                     element.tanggal_transaksi,
        //                     element.nama,
        //                     element.kategori_donasi,
        //                     "<b class='text-success'>" + element.total_harga + "</b>",
        //                     element.id_kegiatan_donasi
        //                 ]);
        //                 count++;
        //                 // var row = tBody.insertRow(count);
        //                 // var c0 = row.insertCell(0);
        //                 // var c1 = row.insertCell(1);
        //                 // var c2 = row.insertCell(2);
        //                 // var c3 = row.insertCell(3);
        //                 // var c4 = row.insertCell(4);
        //                 // var c5 = row.insertCell(5);

        //                 // c0.innerHTML = element.kode_transaksi;
        //                 // c1.innerHTML = element.tanggal_transaksi;
        //                 // c2.innerHTML = element.nama;
        //                 // c3.innerHTML = element.kategori_donasi;
        //                 // c4.innerHTML = "<b>" + element.total_harga + "</b>";
        //                 // c5.innerHTML = element.id_kegiatan_donasi;

        //                 // c4.className = "text-success";
        //                 // count++;
        //             });
        //             console.log(response.total);
        //             $('#total-harga').html(response.total);
        //             $('#total-dana').html(response.total_dana);
        //             $('#total-paket').html(response.total_paket);
        //             // // table.draw();
        //             // dropDownPaketDana()
        //         }
        //     });
        // });

        // function dropDownPaket() {
        //     var table = $('#laporanTransaksi').DataTable();
        //     table.columns(4)
        //         .search('Paket')
        //         .draw();
        //     $('#KategoriButton').html("Paket");
        //     $('#total-harga').hide();
        //     $('#total-dana').hide();
        //     $('#total-paket').show();
        // }

        // function dropDownDana() {
        //     var table = $('#laporanTransaksi').DataTable();
        //     table.columns(4)
        //         .search('Dana')
        //         .draw();
        //     $('#KategoriButton').html("Dana");
        //     $('#total-harga').hide();
        //     $('#total-paket').hide();
        //     $('#total-dana').show();
        // }

        // function dropDownPaketDana() {
        //     var table = $('#laporanTransaksi').DataTable();
        //     table.columns(4)
        //         .search("Paket|Dana", true, false)
        //         .draw();
        //     $('#KategoriButton').html("Paket & Dana");
        //     $('#total-dana').hide();
        //     $('#total-paket').hide();
        //     $('#total-harga').show();
        // }
    </script>
@endsection

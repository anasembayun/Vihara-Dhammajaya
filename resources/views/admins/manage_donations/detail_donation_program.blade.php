@extends('templates.admin_main')
@section('top-header')
    <header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
        <p class="w3-left">Detail Kegiatan | {{ $donasi->nama_kegiatan_donasi }}</p>
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

        .select2 {
            width: 100% !important;
        }
    </style>
@endsection
@section('content')
    <div class="w3-main container-main" style="margin-left:250px;padding-top: 0;">
        <div class="container-fluid isi mt-4 mb-2">
            <div class="card mb-5">
                <div class="card-header">
                    <div class="mb-2 mt-2">
                        <a href="{{ url('kelola-donasi/daftar-kegiatan-donasi') }}" class="float-start" role="button"
                            tabindex="-1" aria-disabled="true">
                            <img src="{{ asset('images/app_admin/kelola_admin/back-icon.png') }}" style="width: 25px; margin-bottom: 5px;">
                        </a>
                    </div>
                </div>
                <div class="card-body mb-3">
                    <div class="container-fluid row g-3">
                        <div class="col-md-6">
                            <label for="exampleInputEmail1" class="form-label">Tanggal Mulai Kegiatan</label>
                            <input name="tanggal_mulai_donasi" value="{{ $donasi->tanggal_mulai_donasi }}" type="date"
                                class="form-control" id="ordinary" aria-describedby="emailHelp" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputEmail1" class="form-label">Tanggal Selesai Kegiatan</label>
                            <input name="tanggal_selesai_donasi" value="{{ $donasi->tanggal_selesai_donasi }}"
                                type="date" class="form-control" id="ordinary" aria-describedby="emailHelp" readonly>
                        </div>
                        <div class="col-12">
                            <label for="exampleFormControlTextarea1" class="form-label">Keterangan Kegiatan</label>
                            <textarea name="keterangan_donasi" class="form-control" id="large" rows="3" readonly>{{ $donasi->keterangan_donasi }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputEmail1" class="form-label">Total Donasi</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white" id="ordinary">Rp</span>
                                <input name="total_donasi" type="text" class="form-control total_donasi" id="ordinary"
                                    aria-describedby="emailHelp" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputEmail1" class="form-label">Total Donatur</label>
                            <input name="total_donatur" value="{{ $donasi->total_donatur }}" type="text"
                                class="form-control" id="ordinary" aria-describedby="emailHelp" readonly>
                        </div>
                        <div class="col-12">
                            <label for="Image" class="form-label">Gambar Kegiatan Donasi</label>
                            <br>
                            <img id="foto_kegiatan_donasi"
                                src="{{ asset('images/app_admin/kelola_donasi/foto_kegiatan_donasi/' . $donasi->foto_kegiatan_donasi) }}"
                                alt="" style="max-height: 250px; max-width: 250px;">
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="container mt-3 ">
                <div class="table-responsive container">
                    <div class="container text-center mb-0 mt-1">
                        <h3 style="margin-bottom:10px;"><strong>Daftar Donator</strong></h3>
                    </div>
                    <table id="daftarDonator" class="display py-3" style="width:100%;margin-top: 10%;">
                        <thead>
                            <tr>
                                <th scope="col" style="width:5%;">No</th>
                                <th scope="col" style="width:35%;">Nama Umat</th>
                                <th scope="col" style="width:60%;">Jumlah Donasi</th>
                            </tr>
                        </thead>
                        <tbody class="px-3">
                            @php
                                // $donators = \App\Models\Transaksi::join('usr_jamaat', 'usr_jamaat.id', '=', 'data_transaksi.id_jamaat')
                                //     ->where('id_kegiatan_donasi', $donasi->id)
                                //     ->get(['usr_jamaat.name', 'data_transaksi.*']);
                                
                                $donators = \App\Models\Transaksi::join('usr_jamaat', 'usr_jamaat.id', '=', 'data_transaksi.id_jamaat')
                                    ->where('id_kegiatan_donasi', $donasi->id)
                                    ->distinct('id_jamaat')
                                    ->get(['name', 'id_jamaat']);
                                // $donators = \App\Models\Transaksi::join('usr_jamaat', 'usr_jamaat.id', '=', 'detail_donasi.id')
                                //     ->where('id_data_donasi', '=', $donasi->id)
                                //     ->get(['usr_jamaat.name', 'detail_donasi.*']);
                                
                                $no_data = 0;
                            @endphp
                            @foreach ($donators as $donator)
                                <tr>
                                    <td>{{ ++$no_data }}</td>
                                    <td>{{ $donator->name }}</td>
                                    <td>
                                        @php
                                            $get_total_harga = \App\Models\Transaksi::where('id_jamaat', $donator->id_jamaat)->sum('total_harga');
                                        @endphp
                                        Rp. {{ number_format($get_total_harga, 2, ',', '.') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#daftarDonator').DataTable({
                columnDefs: [{
                        targets: [0],
                        orderData: [0, 1],
                    },
                    {
                        targets: [1],
                        orderData: [1, 0],
                    },
                    {
                        targets: [2],
                        orderData: [1, 0],
                    },
                ],
            });

        });

        function convertDecimalToRupiah(conv) {
            var x = parseInt(conv);
            const format = x.toString().split('').reverse().join('');
            const convert = format.match(/\d{1,3}/g);
            const rupiah = convert.join('.').split('').reverse().join('') + ',00';

            return rupiah;
        }

        document.getElementsByClassName("total_donasi")[0].value = convertDecimalToRupiah({{ $donasi->total_donasi }});

        // $('.s_nama_kegiatan_donasi').change(function() {
        //     $.ajax({
        //         url: "{{ url('/kelola-donasi/get-detail-kegiatan-donasi') }}/" + $(this).val(),
        //         method: 'GET',
        //         type: "JSON",
        //         success: function (data) {
        //             var bil = data.total_donasi;
        //             var	number_string = bil.toString(),
        //                 split	= number_string.split('.'),
        //                 sisa 	= split[0].length % 3,
        //                 rupiah 	= split[0].substr(0, sisa),
        //                 ribuan 	= split[0].substr(sisa).match(/\d{1,3}/gi);

        //             if (ribuan) {
        //                 separator = sisa ? '.' : '';
        //                 rupiah += separator + ribuan.join('.');
        //             }
        //             rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;

        //             $("input[name^='nama_kegiatan_donasi']").val(data.nama_kegiatan_donasi);
        //             $("input[name^='tanggal_mulai_donasi']").val(data.tanggal_mulai_donasi);
        //             $("input[name^='tanggal_selesai_donasi']").val(data.tanggal_selesai_donasi);
        //             $("input[name^='total_donasi']").val(`Rp. ${rupiah}`);
        //             $("input[name^='total_donatur']").val(data.total_donatur);
        //             $("textarea[name^='keterangan_donasi']").val(data.keterangan_donasi);
        //             $('#foto_kegiatan_donasi').attr('src', data.foto_kegiatan_donasi);
        //             $('#foto_kegiatan_donasi').attr('alt', data.foto_kegiatan_donasi);
        //         }
        //     });
        //     console.log($(this).val());
        // })
    </script>
@endsection

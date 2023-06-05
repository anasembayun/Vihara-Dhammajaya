@extends('templates.admin_main')
@section('top-header')
<header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
    <p class="w3-left">Riwayat Transaksi</p>
    <p class="w3-right">Role
        <span>: {{ Auth::guard('admin')->user()->role }} </span>
    </p>
</header>
@endsection
@section('content')
<div class="w3-main container-main" style="margin-left:250px;padding-top: 0;">
    <div class="container-fluid isi px-4 mt-3">
        <!-- isi halaman -->

        <!-- tabel -->
        <div class="container mt-3 ">
            <div class="table-responsive container">
                {{-- <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="row">
                        <div class="col-12" style="margin-left:-2% ;">
                            <h5 class="sub-judul mt-2">Riwayat Transaksi</h5>
                        </div>
                        <div class="col-12 ms-lg-4">
                            <p>{{(isset($tgl)) ? $tgl : Carbon\Carbon::parse(now())->isoFormat('D MMMM Y') }}</p>
                        </div>
                    </div>
                </div> --}}
                <table id="riwayatTransaksi" class="display py-3 " style="width:100%;margin-top: 10%;">
                    <thead>
                        <tr>
                            <th scope="col" style="width:5%;">No</th>
                            <th scope="col" style="width:15%;">Kode Transaksi</th>
                            <th scope="col" style="width:10%;">Tanggal</th>
                            <th scope="col" style="width:20%;">Nama Umat</th>
                            <th scope="col" style="width:15%;">Kategori Donasi</th>
                            <th scope="col" style="width:20%;">Total Harga</th>
                            <th scope="col" style="width:15%;">Aksi</th>
                            <th scope="col" style="width:10%;"></th>
                        </tr>
                    </thead>
                    <tbody class="px-3">
                        @php
                            $no = 0;
                        @endphp
                        @foreach ($data_transaksi as $transaksi)
                            <tr>
                                <td>{{ ++$no; }}</td>
                                <td>{{ $transaksi->kode_transaksi }}</td>
                                <td>{{ date('d M, Y', strtotime($transaksi->tanggal_transaksi)) . ' ' . date('H:i:s', strtotime($transaksi->tanggal_transaksi)) }}</td>
                                <td>{{ $transaksi->nama }}</td>
                                <td>{{ $transaksi->kategori_donasi }}</td>
                                <td class="text-success font-weight-bold">
                                    @php
                                        $total_harga = 0;
                                        if ($transaksi->kategori_donasi != "Dana") {
                                            $id_barangs = \App\Models\DetailTransaksi::where('kode_transaksi', $transaksi->kode_transaksi)->pluck('id_barang');
                                            for ($i = 0; $i < $id_barangs->count(); $i++) {
                                                $total_harga += \App\Models\Goods::where('id', $id_barangs[$i])->value('harga_jual');
                                            }
                                        }
                                        else {
                                            $total_harga = $transaksi->total_harga;
                                        }
                                    @endphp
                                    <b>Rp. {{ number_format($total_harga,2,',','.') }}</b>
                                </td>
                                <td>
                                    <a href="{{ url('kelola-transaksi/struk-transaksi-donasi/'.$transaksi->kode_transaksi) }}" class="btn btn-secondary btn-sm btn-3" role="button">
                                        <img src="{{ asset('images/app_admin/kelola_jamaat/pdf-1.png') }}" alt="" style="height:20px;margin-right: 15px;">Cetak Struk
                                    </a>
                                    <button class="btn btn-secondary btn-sm btn-3"
                                        onclick="openPrintPage('{{ $transaksi->kode_transaksi }}')">
                                        <img src="{{ asset('images/app_admin/kelola_jamaat/pdf-1.png') }}" alt="" style="height:20px;margin-right: 15px;">Cetak Html
                                    </button>
                                    {{-- <a href="{{ url('/kelola-transaksi/struk-transaksi-donasi-html/'.$transaksi->kode_transaksi) }}" class="btn btn-secondary btn-sm btn-3" role="button">
                                        <img src="{{ asset('images/app_admin/kelola_jamaat/pdf-1.png') }}" alt="" style="height:20px;margin-right: 15px;">Cetak Html
                                    </a> --}}
                                </td>
                                <td>
                                    @if ($transaksi->kategori_donasi == "Uang")
                                        <button class="btn btn-primary font-weight-bold" type="button" data-bs-toggle="modal" data-bs-target="#modalDetailTransaksiDana{{ $transaksi->kode_transaksi }}">
                                            <i class="mdi mdi-chevron-down arrow-view">Detail</i>
                                        </button>
                                    @else
                                        <button class="btn btn-primary font-weight-bold" type="button" data-bs-toggle="modal" data-bs-target="#modalDetailTransaksiPaket{{ $transaksi->kode_transaksi }}">
                                            <i class="mdi mdi-chevron-down arrow-view">Detail</i>
                                        </button>
                                    @endif
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Modal Detail Transaksi Dana -->
                @foreach ($data_transaksi as $transaksi)
                    <div class="modal fade" id="modalDetailTransaksiDana{{ $transaksi->kode_transaksi }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi Foto &nbsp;&nbsp;<b>{{ $transaksi->kode_transaksi }}</b></h5>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="row mt-2 mb-4">
                                            <table>
                                                <tr>
                                                    <td style="width: 20%;">Nama Umat</td>
                                                    <td style="width: 1%;">:</td>
                                                    <td style="width: 84%; text-align: left;">{{ $transaksi->nama }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20%;">Alamat Umat</td>
                                                    <td style="width: 1%;">:</td>
                                                    <td style="width: 84%; text-align: left;">{{ $transaksi->alamat }}</td>
                                                </tr>
                                                <tr>
                                                    @php
                                                        $nama_admin = \App\Models\User::where('id', $transaksi->id_admin)->value('name');
                                                    @endphp
                                                    <td>Admin Penanggung Jawab</td>
                                                    <td>:</td>
                                                    <td>{{ $nama_admin }}</td>
                                                </tr>
                                                <tr>
                                                    @php
                                                        $nama_kegiatan = \App\Models\Donasi::where('id', $transaksi->id_kegiatan_donasi)->value('nama_kegiatan_donasi');
                                                    @endphp
                                                    <td style="width: 15%;">Nama Kegiatan</td>
                                                    <td style="width: 1%;">:</td>
                                                    <td style="width: 84%; text-align: left;">{{ $nama_kegiatan }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Metode Pembayaran</td>
                                                    <td>:</td>
                                                    <td>{{ $transaksi->metode_pembayaran }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Modal Detail Transaksi Paket -->
                @foreach ($data_transaksi as $transaksi)
                    <div class="modal fade" id="modalDetailTransaksiPaket{{ $transaksi->kode_transaksi }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi &nbsp;&nbsp;<b>{{ $transaksi->kode_transaksi }}</b></h5>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        @if ($transaksi->kategori_donasi == "Paket")
                                            <div class="row mt-2 mb-4">
                                                <table>
                                                    <tr>
                                                        <td style="width: 20%;">Nama Umat</td>
                                                        <td style="width: 1%;">:</td>
                                                        <td style="width: 84%; text-align: left;">{{ $transaksi->nama }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 20%;">Alamat Umat</td>
                                                        <td style="width: 1%;">:</td>
                                                        <td style="width: 84%; text-align: left;">{{ $transaksi->alamat }}</td>
                                                    </tr>
                                                    <tr>
                                                        @php
                                                            $nama_admin = \App\Models\User::where('id', $transaksi->id_admin)->value('name');
                                                        @endphp
                                                        <td>Admin Penanggung Jawab</td>
                                                        <td>:</td>
                                                        <td>{{ $nama_admin }}</td>
                                                    </tr>
                                                    <tr>
                                                        @php
                                                            $nama_kegiatan = \App\Models\Donasi::where('id', $transaksi->id_kegiatan_donasi)->value('nama_kegiatan_donasi');
                                                        @endphp
                                                        <td style="width: 15%;">Nama Kegiatan</td>
                                                        <td style="width: 1%;">:</td>
                                                        <td style="width: 84%; text-align: left;">{{ $nama_kegiatan }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Metode Pembayaran</td>
                                                        <td>:</td>
                                                        <td>{{ $transaksi->metode_pembayaran }}</td>
                                                    </tr>
                                                    <tr>
                                                        @php
                                                            $total_barang = \App\Models\DetailTransaksi::where('kode_transaksi', $transaksi->kode_transaksi)->get();
                                                        @endphp
                                                        <td>Total Paket</td>
                                                        <td>:</td>
                                                        <td>{{ $total_barang->count() }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total Harga</td>
                                                        <td>:</td>
                                                        <td><b>Rp. {{ number_format($transaksi->total_harga,2,',','.') }}</b></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            @php
                                                $no = 0;
                                                $detail_transaksi = \App\Models\DetailTransaksi::where('kode_transaksi', $transaksi->kode_transaksi)->distinct('id_barang')->pluck('id_barang');
                                            @endphp
                                            <table class="table" style="width: 100%; margin-bottom: 20px;">
                                                <thead style="background-color: white; color: black;">
                                                    <tr>
                                                        <th scope="col" style="width: 10%; text-align: center;">No</th>
                                                        <th scope="col" style="width: 30%;">Nama Paket</th>
                                                        <th scope="col" style="width: 20%;">Jumlah Paket</th>
                                                        <th scope="col" style="width: 20%;">Harga Paket</th>
                                                        <th scope="col" style="width: 20%;">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-group-divider" id="cart-table">
                                                    @for ($i = 0; $i < count($detail_transaksi); $i++)
                                                        <tr>
                                                            <th scope="row" style="text-align: center;">{{ ++$no; }}</th>
                                                            <td>
                                                                @php
                                                                    $nama_barang = \App\Models\Goods::withTrashed()->where('id', $detail_transaksi[$i])->value('nama_barang');
                                                                @endphp
                                                                {{ $nama_barang }}
                                                            </td>
                                                            <td>
                                                                @php
                                                                    $barangs = \App\Models\DetailTransaksi::where('kode_transaksi', $transaksi->kode_transaksi)->get();
                                                                    $total_barang = 0;

                                                                    foreach ($barangs as $item) {
                                                                        if ($item->id_barang == $detail_transaksi[$i])
                                                                            $total_barang++;   
                                                                    }
                                                                @endphp
                                                                {{ $total_barang }}
                                                            </td>
                                                            <td>
                                                                @php
                                                                    $harga_barang = \App\Models\Goods::withTrashed()->where('id', $detail_transaksi[$i])->value('harga_jual');
                                                                @endphp
                                                                Rp. {{ number_format($harga_barang,2,',','.') }}
                                                            </td>
                                                            <td>
                                                                Rp. {{ number_format($harga_barang * $total_barang,2,',','.') }}
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                    {{-- <tr style="border-top: solid; border: none;">
                                                        <th colspan="4" style="text-align: right; padding-right: 20px;">
                                                            Total
                                                        </th>
                                                        <td><b>Rp. {{ number_format($harga_barang * $total_barang,2,',','.') }}</b></td>
                                                    </tr> --}}
                                                </tbody>
                                            </table>
                                        @else
                                            <div class="row mt-2 mb-4">
                                                <table>
                                                    <tr>
                                                        <td style="width: 20%;">Nama Umat</td>
                                                        <td style="width: 1%;">:</td>
                                                        <td style="width: 84%; text-align: left;">{{ $transaksi->nama }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 20%;">Alamat Umat</td>
                                                        <td style="width: 1%;">:</td>
                                                        <td style="width: 84%; text-align: left;">{{ $transaksi->alamat }}</td>
                                                    </tr>
                                                    <tr>
                                                        @php
                                                            $nama_admin = \App\Models\User::where('id', $transaksi->id_admin)->value('name');
                                                        @endphp
                                                        <td>Admin Penanggung Jawab</td>
                                                        <td>:</td>
                                                        <td>{{ $nama_admin }}</td>
                                                    </tr>
                                                    <tr>
                                                        @php
                                                            $nama_kegiatan = \App\Models\Donasi::where('id', $transaksi->id_kegiatan_donasi)->value('nama_kegiatan_donasi');
                                                        @endphp
                                                        <td style="width: 15%;">Nama Kegiatan</td>
                                                        <td style="width: 1%;">:</td>
                                                        <td style="width: 84%; text-align: left;">{{ $nama_kegiatan }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kategori Donasi</td>
                                                        <td>:</td>
                                                        <td>{{ $transaksi->kategori_donasi }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nominal Transaksi</td>
                                                        <td>:</td>
                                                        <td>Rp. {{ number_format($transaksi->total_harga,2,',','.') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Metode Pembayaran</td>
                                                        <td>:</td>
                                                        <td>{{ $transaksi->metode_pembayaran }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            @php
                                                $no = 0;
                                                $detail_transaksi = \App\Models\DetailTransaksi::where('kode_transaksi', $transaksi->kode_transaksi)->distinct('id_barang')->pluck('id_barang');
                                            @endphp
                                        @endif
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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
    $(document).ready(function () {
        $('#riwayatTransaksi').DataTable({
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
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        className: 'btn btn-danger btn-sm',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    'colvis'
                ]
            }
        });
    });

    function openPrintPage(nomor_kas_masuk) {
        var windowOpen = window.open("{{ url('kelola-transaksi/struk-transaksi-donasi-html') }}/" + nomor_kas_masuk);
        windowOpen.print();
    };
</script>
@endsection
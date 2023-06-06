@extends('templates.admin_main')
@section('top-header')
<header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
    <p class="w3-left">Macam-macam Paket</p>
    <p class="w3-right">Role
        <span>: {{ Auth::guard('admin')->user()->role }} </span>
    </p>
</header>
@endsection
@section('content')
<div class="w3-main container-main" style="margin-left:250px; padding-top: 0;">
    <!-- isi halaman -->
    <div class="container-fluid isi px-4 mt-3">
        <div class="row d-flex justify-content-end pe-lg-4">
            <div class="atasTable col-12 col-lg-6 d-flex" style="display: flex; justify-content: right;">
                {{-- <button type="button" onclick="" class="btn btn-secondary btn-sm btn-6" style="height:40px">
                    <img src="{{ asset('images/app_admin/kelola_barang/excel-logo.jpg') }}" alt="" style="height:20px">
                </button>
                <button type="button" onclick="" class="btn btn-secondary btn-sm btn-6" style="height:40px">
                    <img src="{{ asset('images/app_admin/kelola_barang/printing.png') }}" alt="" style="height:20px">
                </button> --}}
                <button type="button" class="btn  btn-sm btn-6" onclick="window.location.href='{{ url('kelola-barang/tambah-barang') }}'" style="height:40px; width:80px; margin-right:10px;">Add New</button>
            </div>
        </div>
        <!-- table -->
        <div class="container mt-2">
            <div class="table-responsive">
                <table id="daftarBarang" class="display py-3 " style="width:99%; margin-top: 10%;">
                    <thead>
                        <tr>
                            <th scope="col" class="align-middle" style="width:5%;">No</th>
                            <th scope="col" class="align-middle" style="width:30%;"> Barang</th>
                            <th scope="col" class="align-middle" style="width:20%;"> Harga Jual</th>
                            <th scope="col" class="align-middle" style="width:15%;"> Keterangan</th>
                            <th scope="col" class="align-middle" style="width:15%;"> Status</th>
                            <th scope="col" style="width:15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp
                        @foreach ($goods as $item)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-12" style="margin-bottom: -3%;">
                                            <p>{{ $item->nama_barang }}</p>
                                        </div>
                                        <div class="col-12" style="color:#D09222">
                                            {{ $item->kode_barang }}
                                        </div>
                                    </div>
                                </td>
                                @php
                                    $rupiah = number_format($item->harga_jual, 2, ",", ".");
                                @endphp
                                <td><b>Rp. {{ $rupiah }}</b></td>
                                <td>
                                    <div class="btn-container">
                                        @if ($item->keterangan == "Tersedia")
                                            <button type="button" class="btn btn-secondary btn-sm btn-5" style="background: #7C6A0A;">{{ $item->keterangan }}</button>
                                        @else
                                            <button type="button" class="btn btn-secondary btn-sm btn-5" style="background: #C70039;">{{ $item->keterangan }}</button>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-container">
                                        @if ($item->status_keaktifan == "Aktif")
                                            <button type="button" class="btn btn-secondary btn-sm btn-5" style="background: #7C6A0A;">{{ $item->status_keaktifan }}</button>
                                        @else
                                            <button type="button" class="btn btn-secondary btn-sm btn-5" style="background: #C70039;">{{ $item->status_keaktifan }}</button>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-2">
                                            <a href="{{ url('kelola-barang/edit-barang/'.$item->id) }}" id="btn-6" class="btn bg-white" tabindex="-1" role="button" aria-disabled="true">
                                                <img src="{{ asset('images/app_admin/kelola_admin/edit.png') }}" style="width:20px">
                                            </a>
                                        </div>
                                        <div class="col-1">
                                            <button class="btn bg-white" id="btn-6" type="button" data-bs-toggle="modal" data-bs-target="#deleteGoodsModal{{ $item->id }}">
                                                <img src="{{ asset('images/app_admin/kelola_admin/trash-can.png') }}" style="width:20px">
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Modal Edit -->
                @foreach ($goods as $item)
                    <div class="modal fade" id="editGoodsModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data {{ $item->id }}</h5>
                                </div>
                                <form action="/kelola-barang/daftar-barang/update/{{ $item->id }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    Nama Barang :
                                                </div>
                                                <div class="col-md-8 ms-auto">
                                                    <input type="text" name="nama_barang" value="{{ $item->nama_barang }}" class="form-control" aria-describedby="emailHelp" readonly>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-4">
                                                    Kode Barang :
                                                </div>
                                                <div class="col-md-8 ms-auto">
                                                    <input type="text" name="kode_barang" value="{{ $item->kode_barang }}" class="form-control" aria-describedby="emailHelp" readonly>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-4">
                                                    Keterangan :
                                                </div>
                                                <div class="col-md-8 ms-auto">
                                                    <select name="keterangan" class="isi-form form-select" aria-label="Example select with button addon">
                                                        <option selected value="Tersedia">Tersedia</option>
                                                        <option value="Tidak Tersedia">Tidak Tersedia</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-4">
                                                    Harga Jual :
                                                </div>
                                                <div class="col-md-8 ms-auto">
                                                    <input type="text" name="harga_jual" value="{{ $item->harga_jual }}" class="form-control" aria-describedby="emailHelp">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Modal Delete -->
                @foreach ($goods as $item)
                    <div class="modal fade" id="deleteGoodsModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Data {{ $item->id }}</h5>
                                </div>
                                <form action="/kelola-barang/daftar-barang/delete/{{ $item->id }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <p>Apakah anda yakin ingin menghapus,<br>
                                            Nama Barang: "{{ $item->nama_barang }}"<br>
                                            Kode Barang: "{{ $item->kode_barang }}"<br>
                                            ?
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
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
        $('#daftarBarang').DataTable({
            columnDefs: [
                {
                    targets: [0],
                    orderData: [0, 1],
                },
                {
                    targets: [1],
                    orderData: [1, 0],
                },
                {
                    targets: [4],
                    orderData: [4, 0],
                },
            ],
        });

    });
</script>
@endsection
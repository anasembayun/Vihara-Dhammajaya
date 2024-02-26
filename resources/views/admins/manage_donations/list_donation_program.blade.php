@extends('templates.admin_main')
@section('top-header')
<header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
    <p class="w3-left">Daftar Kegiatan</p>
    <p class="w3-right">Role
        <span>: {{ Auth::guard('admin')->user()->role }} </span>
    </p>
</header>
@endsection
@section('content')
<div class="w3-main container-main" style="margin-left:250px;padding-top: 0;">
    <div class="container-fluid isi px-0 px-lg-4 mt-3">
        <!-- isi halaman -->

        <!-- tabel -->
        <div class="container mt-3 ">
            <div class="table-responsive container">
                <table id="daftarDonasi" class="display py-3 " style="width:100%;margin-top: 10%;">
                    <thead>
                        <tr>
                            <th scope="col" style="width:5%;">No</th>
                            <th scope="col" style="width:25%;">Nama Kegiatan</th>
                            <th scope="col" style="width:20%;">Tanggal Mulai Kegiatan</th>
                            <th scope="col" style="width:20%;">Tanggal Selesai Kegiatan</th>
                            <th scope="col" style="width:15%;">Status Kegiatan</th>
                            <th scope="col" style="width:15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="px-3">
                        @php
                            $no_data = 0;
                        @endphp
                        @foreach ($donasis as $donasi)
                            <tr>
                                <td>{{ ++$no_data }}</td>
                                <td>{{ $donasi->nama_kegiatan_donasi }}</td>
                                <td>{{ $donasi->tanggal_mulai_donasi }}</td>
                                <td>{{ $donasi->tanggal_selesai_donasi }}</td>
                                <td>
                                    <div class="btn-container">
                                        @if ($donasi->status_keaktifan == 0)
                                            <button type="button" class="btn btn-secondary btn-sm btn-5" style="background: #7C6A0A;">Aktif</button>
                                        @else
                                            <button type="button" class="btn btn-secondary btn-sm btn-5" style="background: #C70039;">Tidak Aktif</button>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-2">
                                            <a href="{{ url('kelola-donasi/edit-kegiatan-donasi/'.$donasi->id) }}" id="btn-6" class="btn bg-white" tabindex="-1" role="button" aria-disabled="true">
                                                <img src="{{ asset('images/app_admin/kelola_admin/edit.png') }}" style="width:20px">
                                            </a>
                                        </div>
                                        <div class="col-2">
                                            <a href="{{ url('/kelola-donasi/detail-kegiatan-donasi/'.$donasi->id) }}" id="btn-6" class="btn bg-white" tabindex="-1" role="button" aria-disabled="true">
                                                <img src="{{ asset('images/app_admin/kelola_admin/detail.png') }}" style="width:20px">
                                            </a>
                                        </div>
                                        <div class="col-2">
                                            <button class="btn bg-white" id="btn-6" type="button" data-bs-toggle="modal" data-bs-target="#deleteDataDonasiModal{{ $donasi->id }}">
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
                @foreach ($donasis as $donasi)
                    <div class="modal fade" id="editDataDonasiModal{{ $donasi->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Kegiatan <b>{{ $donasi->nama_kegiatan_donasi }}</b></h5>
                                </div>
                                <form action="/kelola-donasi/daftar-kegiatan-donasi/update/{{ $donasi->id }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    Tanggal Mulai Kegiatan :
                                                </div>
                                                <div class="col-md-8 ms-auto">
                                                    <input type="date" name="tanggal_mulai_donasi" value="{{ $donasi->tanggal_mulai_donasi }}" class="form-control" aria-describedby="emailHelp" readonly required>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-4">
                                                    Tanggal Selesai Kegiatan :
                                                </div>
                                                <div class="col-md-8 ms-auto">
                                                    <input type="date" min="{{ date('Y-m-d') }}" name="tanggal_selesai_donasi" value="{{ $donasi->tanggal_selesai_donasi }}" class="form-control" aria-describedby="emailHelp" required>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-4">
                                                    Status :
                                                </div>
                                                <div class="col-md-8 ms-auto">
                                                    <select name="status" class="form-select" aria-label="Example select with button addon" required>
                                                        @php
                                                            $status = ['Dana terus dikumpul', 'Pengumpulan dana selesai'];
                                                        @endphp
                                                        @foreach ($status as $st)
                                                            @if ($st != $donasi->status)
                                                                <option value="{{ $st }}">{{ $st }}</option>
                                                            @else
                                                                <option selected value="{{ $st }}">{{ $st }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-4">
                                                    Keterangan Kegiatan :
                                                </div>
                                                <div class="col-md-8 ms-auto">
                                                    <textarea name="keterangan_donasi" class="form-control" id="large" rows="3" required>{{ $donasi->keterangan_donasi }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-4">
                                                    Foto Kegiatan (512 x 512 pixel):
                                                </div>
                                                <div class="col-md-8 ms-auto">
                                                    <input name="foto_kegiatan_donasi" class="form-control inp-img" type="file" id="ordinary" accept=".jpg,.jpeg,.png">
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
                @foreach ($donasis as $donasi)
                    <div class="modal fade" id="deleteDataDonasiModal{{ $donasi->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Data Kegiatan {{ $no_data }}</h5>
                                </div>
                                <form action="/kelola-donasi/daftar-kegiatan-donasi/delete/{{ $donasi->id }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <p>Apakah anda yakin ingin menghapus berita "<b>{{ $donasi->nama_kegiatan_donasi }}</b>"?</p>
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
        $('#daftarDonasi').DataTable({
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

    var _URL = window.URL || window.webkitURL;
    $(".inp-img").change(function (e) {
        var file, img;
        if ((file = this.files[0])) {
            img = new Image();
            var objectUrl = _URL.createObjectURL(file);
            img.onload = function () {
                if (this.width != 512 || this.height != 512) {
                    alert('Ukuran gambar harus 512x512px.');
                    $(".inp-img").val('');
                }
                _URL.revokeObjectURL(objectUrl);
            };
            img.src = objectUrl;
        }
    });
</script>
@endsection
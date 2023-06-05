@extends('templates.admin_main')
@section('top-header')
<header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
    <p class="w3-left">Daftar Berita</p>
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
                <table id="daftarBerita" class="display py-3 " style="width:100%;margin-top: 10%;">
                    <thead>
                        <tr>
                            <th scope="col" style="width:10%;">No</th>
                            <th scope="col" style="width:35%;">Judul Berita</th>
                            <th scope="col" style="width:20%;">Nama Penulis</th>
                            <th scope="col" style="width:20%;">Tanggal Dimuat</th>
                            <th scope="col" style="width:15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="px-3">
                        @php
                            $no_data = 0;
                        @endphp
                        @foreach ($beritas as $berita)
                            <tr>
                                <td>{{ ++$no_data }}</td>
                                <td>{{ $berita->judul_berita }}</td>
                                <td>{{ $berita->nama_penulis }}</td>
                                <td>{{ $berita->tanggal_berita_dibuat }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-6 col-sm-12 col-md-6 col-lg-6">
                                            <a href="{{ url('kelola-berita/detail-berita/'.$berita->id) }}" id="btn-6" class="btn bg-white" tabindex="-1" role="button" aria-disabled="true">
                                                <img src="{{ asset('images/app_admin/kelola_admin/edit.png') }}" style="width:20px">
                                            </a>
                                            <button class="btn bg-white" id="btn-6" type="button" data-bs-toggle="modal" data-bs-target="#deleteBeritaModal{{ $berita->id }}">
                                                <img src="{{ asset('images/app_admin/kelola_admin/trash-can.png') }}" style="width:20px">
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Modal Delete -->
                @foreach ($beritas as $berita)
                    <div class="modal fade" id="deleteBeritaModal{{ $berita->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Data {{ $no_data }}</h5>
                                </div>
                                <form action="/kelola-berita/daftar-berita/delete/{{ $berita->id }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <p>Apakah anda yakin ingin menghapus berita "{{ $berita->judul_berita }}"?</p>
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
        $('#daftarBerita').DataTable({
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
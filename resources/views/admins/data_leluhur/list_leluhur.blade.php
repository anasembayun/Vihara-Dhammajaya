@extends('templates.admin_main')
@section('top-header')
<header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
    <p class="w3-left">Daftar Leluhur</p>
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
                <table id="daftarLeluhur" class="display py-3 " style="width:100%;margin-top: 10%;">
                    <thead>
                        <tr>
                            <th scope="col" style="width:5%;">No</th>
                            <th scope="col" style="width:15%;">ID Penanggung Jawab</th>
                            <th scope="col" style="width:20%;">Nama Penanggung Jawab</th>
                            <th scope="col" style="width:15%;">Nama Mendiang</th>
                            <th scope="col" style="width:15%;">No Lokasi Foto</th>
                            <th scope="col" style="width:15%;">Tanggal Terakhir Bayar</th>
                            <th scope="col" style="width:15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="px-3">
                        @php
                        $no_data = 0;
                        @endphp
                        @foreach ($leluhurs as $leluhur)
                        <tr>
                            <td>{{ ++$no_data }}</td>
                            <td>{{ $leluhur->id_pemesan }}</td>
                            <td>{{ $leluhur->pemesan->name }}</td>
                            <td>{{ $leluhur->nama_mendiang }}</td>
                            <td>{{ $leluhur->lokasi_foto->kode_lokasi }}</td>
                            <td>{{ date("F Y", strtotime($leluhur->transaksi_terakhir))}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-2">
                                        <a href="{{ url('/data-leluhur/edit-leluhur/' . $leluhur->id)}}" class="btn btn-secondary btn-sm btn-3" role="button">
                                            Edit Leluhur
                                        </a>
                                        @php
                                        $data_leluhur = [
                                        "id" => $leluhur->id,
                                        "idUmat" => $leluhur->id_pemesan,
                                        "namaUmat" => $leluhur->pemesan->name,
                                        "relasi" => $leluhur->relasi,
                                        "namaleluhur" => $leluhur->nama_mendiang,
                                        "tempatlahir" => $leluhur->tempat_lahir,
                                        "tempatmeninggal" => $leluhur->tempat_meninggal,
                                        "tanggallahir" => $leluhur->tanggal_lahir,
                                        "tanggalmeninggal" => $leluhur->tanggal_meninggal,
                                        "transaksiterakhir" => $leluhur->transaksi_terakhir,
                                        "kode_lokasi" => $leluhur->lokasi_foto->kode
                                        ];
                                        @endphp
                                        <a href="{{ url('/data-leluhur/edit-lokasi-foto/' . json_encode($data_leluhur))}}" class="btn btn-secondary btn-sm btn-3" role="button">
                                            Edit Lokasi Foto
                                        </a>
                                        <button class="btn btn-secondary btn-sm btn-3" id="btn-6" type="button" data-bs-toggle="modal" data-bs-target="#deleteDataLeluhurModal{{ $leluhur->id }}">
                                            Hapus Leluhur
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- isi tiap halaman sampai sini -->

        <!-- Modal Delete -->
        @foreach ($leluhurs as $leluhur)
        <div class="modal fade" id="deleteDataLeluhurModal{{ $leluhur->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Data Leluhur {{ $no_data }}</h5>
                    </div>
                    <form action="/data-leluhur/daftar-leluhur/delete/{{ $leluhur->id }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <p>Apakah anda yakin ingin menghapus leluhur "<b>{{ $leluhur->nama_mendiang }}</b>"?</p>
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
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('#daftarLeluhur').DataTable({
            columnDefs: [{
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
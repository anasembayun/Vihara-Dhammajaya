@extends('templates.admin_main')
@section('top-header')
<header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
    <p class="w3-left">Daftar Data Baptisan</p>
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
                <table id="daftarBaptisan" class="display py-3 " style="width:100%;margin-top: 10%;">
                    <thead>
                        <tr>
                            <th scope="col" style="width:5%;">No</th>
                            <th scope="col" style="width:15%;">No Sertifikat</th>
                            <th scope="col" style="width:20%;">Nama</th>
                            <th scope="col" style="width:15%;">Tanggal Wisuda</th>
                            <th scope="col" style="width:25%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="px-3">
                        @php
                            $no = 0;
                        @endphp
                        @foreach ($baptisans as $baptisan)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $baptisan->no_sertifikat }}</td>
                                <td>{{ $baptisan->name }}</td>
                                <td>{{ $baptisan->tanggal_wisuda }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-7">
                                            <a href="{{ url('kelola-jamaat/sertifikat-baptis/'.$baptisan->id_jamaat) }}" class="btn btn-secondary btn-sm btn-3" role="button">
                                                <img src="{{ asset('images/app_admin/kelola_jamaat/pdf-1.png') }}" alt="" style="height:20px;margin-right: 15px;">Export to PDF
                                            </a>
                                            {{-- <button type="button" onclick="" class="btn btn-secondary btn-sm btn-3"><img 
                                                src="{{ asset('images/app_admin/kelola_jamaat/pdf-1.png') }}" alt="" style="height:20px;margin-right: 15px;">Export to PDF</button> --}}
                                        </div>
                                        <div class="col-3">
                                            <button class="btn bg-white" id="btn-6" type="button" data-bs-toggle="modal" data-bs-target="#deleteDataBaptisModal{{ $baptisan->id }}">
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
                @foreach ($baptisans as $baptisan)
                    <div class="modal fade" id="deleteDataBaptisModal{{ $baptisan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Data Baptisan <b>{{ $baptisan->no_sertifikat }}</b></h5>
                                </div>
                                <form action="{{ url('kelola-jamaat/daftar-baptisan/delete/'.$baptisan->id) }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <p>Apakah anda yakin ingin menghapus data baptisan dari "<b>{{ $baptisan->name }}</b>"?</p>
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
        $('#daftarBaptisan').DataTable({
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
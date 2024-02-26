@extends('templates.admin_main')
@section('top-header')
<header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
    <p class="w3-left">Daftar Admin</p>
    <p class="w3-right">Role
        <span>: {{ Auth::guard('admin')->user()->role }} </span>
    </p>
</header>
@endsection
@section('css')
<style>
    /* Hide Arrow - Input Number */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
@endsection
@section('content')
<div class="w3-main container-main" style="margin-left:250px;padding-top: 0;">
    <div class="container-fluid isi px-0 px-lg-4 mt-3">
        <!-- isi halaman -->

        <!-- tabel -->
        <div class="container mt-3 ">
            <div class="table-responsive container">
                <table id="daftarAdmin" class="display py-3 " style="width:100%;margin-top: 10%;">
                    <thead>
                        <tr>
                            <th scope="col" style="width:5%;">No</th>
                            <th scope="col" style="width:18%;">Nama</th>
                            <th scope="col" style="width:18%;">Username</th>
                            <th scope="col" style="width:18%;">Posisi</th>
                            <th scope="col" style="width:20%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="px-3">
                        @php
                            $no_data = 0;
                        @endphp
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ ++$no_data }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>
                                    <div class="btn-container  ">
                                        <button type="button" class="btn btn-secondary btn-sm btn-5" style="background: #F8C400;"><b>{{ $user->role }}</b></button>
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                            <a href="{{ url('kelola-admin/detail-admin/'.$user->username) }}" id="btn-6" class="btn bg-white" tabindex="-1" role="button" aria-disabled="true">
                                                <img src="{{ asset('images/app_admin/kelola_admin/edit.png') }}" style="width:20px">
                                            </a>
                                            <button class="btn bg-white" id="btn-6" type="button" data-bs-toggle="modal" data-bs-target="#deleteAdminModal{{ $user->id }}">
                                                <img src="{{ asset('images/app_admin/kelola_admin/trash-can.png') }}" style="width:20px">
                                            </button>
                                            <a href="{{ url('kelola-admin/history-admin/'.$user->id) }}" id="btn-6" 
                                                class="btn bg-white" tabindex="-1" role="button" aria-disabled="true">
                                                <i style="color:#6F6C6C; width:20px" class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Modal Edit -->
                @foreach ($users as $user)
                    <div class="modal fade" id="editAdminModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data {{ $user->name }}</h5>
                                </div>
                                <form action="/kelola-admin/daftar-admin/update/{{ $user->id }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    Nama :
                                                </div>
                                                <div class="col-md-8 ms-auto">
                                                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" aria-describedby="emailHelp" required>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-4">
                                                    Username :
                                                </div>
                                                <div class="col-md-8 ms-auto">
                                                    <input type="text" name="username" value="{{ $user->username }}" class="form-control" aria-describedby="emailHelp" readonly>
                                                </div>
                                            </div>
                                            {{-- <div class="row mt-2">
                                                <div class="col-md-4">
                                                    Posisi :
                                                </div>
                                                <div class="col-md-8 ms-auto">
                                                    <select name="role" class="form-select" aria-label="Example select with button addon" required>
                                                        @php
                                                            $roles = ['Ketua', 'Sekretaris', 'Bendahara'];
                                                        @endphp
                                                        @foreach ($roles as $role)
                                                            @if ($role != $user->role)
                                                                <option value="{{ $role }}">{{ $role }}</option>
                                                            @else
                                                                <option selected value="{{ $role }}">{{ $role }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div> --}}
                                            <div class="row mt-2">
                                                <div class="col-md-4">
                                                    No HP :
                                                </div>
                                                <div class="col-md-8 ms-auto">
                                                    <input type="number" name="no_handphone" value="{{ $user->no_handphone }}" class="form-control" pattern="[0-9]+" aria-describedby="emailHelp" required>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-4">
                                                    Alamat :
                                                </div>
                                                <div class="col-md-8 ms-auto">
                                                    <input type="text" name="alamat" value="{{ $user->alamat }}" class="form-control" aria-describedby="emailHelp" required>
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
                @foreach ($users as $user)
                    <div class="modal fade" id="deleteAdminModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Data {{ $user->name }}</h5>
                                </div>
                                <form action="/kelola-admin/daftar-admin/delete/{{ $user->username }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <p>Apakah anda yakin ingin menghapus admin {{ $user->name }}?</p>
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
        $('#daftarAdmin').DataTable({
            responsive: true,
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

@extends('templates.admin_main')
@section('top-header')
<header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
    <p class="w3-left">Daftar Data Umat (Tidak Terdaftar)</p>
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
                <table id="daftarJamaatUnreg" class="display py-3 " style="width:100%;margin-top: 10%;">
                    <thead>
                        <tr>
                            <th scope="col" style="width:5%;">No</th>
                            <th scope="col" style="width:30%;">Nama</th>
                            <th scope="col" style="width:50%;">Alamat</th>
                            <th scope="col" style="width:15%;">No Handphone</th>
                        </tr>
                    </thead>
                    <tbody class="px-3">
                        @php
                            $no = 0;
                        @endphp
                        @foreach ($jamaats_unreg as $jamaat)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $jamaat->name }}</td>
                                <td>{{ $jamaat->alamat }}</td>
                                <td>{{ $jamaat->no_handphone_1 }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- isi tiap halaman sampai sini -->
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function () {
        $('#daftarJamaatUnreg').DataTable({
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
                    targets: [3],
                    orderData: [3, 0],
                },
            ],
        });

    });
</script>
@endsection
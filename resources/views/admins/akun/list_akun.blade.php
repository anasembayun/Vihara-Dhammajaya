@extends('templates.admin_main')
@section('top-header')
<header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
    <p class="w3-left">Data Akun</p>
    <p class="w3-right">Role
        <span>: {{ Auth::guard('admin')->user()->role }} </span>
    </p>
</header>
@endsection
@section('content')
<div class="w3-main container-main" style="margin-left:250px;padding-top: 0;">
    <!-- isi halaman -->
    <div class="container-fluid isi px-4 ">
        <!-- tabel -->
        <table id="tableDaftarAkun" class="display py-3" style="width:100%;margin-top: 10%;">
            <thead>
                <tr>
                    <th>Bulan</th>
                    <th>Kode </th>
                    <th>Nama</th>
                    <th>Type</th>
                    <th>Saldo Awal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Maret</td>
                    <td>XX9808</td>
                    <td>Teh botol sosro</td>
                    <td>Minuman ringan</td>
                    <td>Rp200.000</td>
                    <td>Januari</td>
                </tr>
                <tr>
                    <td>April</td>
                    <td>TY7665</td>
                    <td>Potabee</td>
                    <td>Snack</td>
                    <td>Rp200.000</td>
                    <td>Januari</td>
                </tr>
                <tr>
                    <td>Agustus</td>
                    <td>VF5532</td>
                    <td>Pilus Garuda</td>
                    <td>Snack</td>
                    <td>Rp200.000</td>
                    <td>Januari</td>
                </tr>
                <tr>
                    <td>September</td>
                    <td>MN0891</td>
                    <td>Chitato</td>
                    <td>Snack</td>
                    <td>Rp200.000</td>
                    <td>Januari</td>
                </tr>
                <tr>
                    <td>November</td>
                    <td>C322</td>
                    <td>Rambutan curah</td>
                    <td>Makanan Segar</td>
                    <td>Rp200.000</td>
                    <td>Januari</td>
                </tr>
            </tbody>
        </table>
        <!-- isi tiap halaman sampai sini -->
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function () {
        $('#tableDaftarAkun').DataTable({
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
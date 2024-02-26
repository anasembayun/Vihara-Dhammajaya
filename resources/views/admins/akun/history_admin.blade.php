@extends('templates.admin_main')
@section('top-header')
<header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
    <p class="w3-left">History {{$users}}</p>
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
                <table id="daftarAdmin" class="display py-3 " style="width:100%;">
                    <thead>
                        <tr>
                            <th scope="col" style="width:5%;">Tanggal Edit</th>
                            <th scope="col" style="width:20%;">Kegiatan</th>
                        </tr>
                    </thead>
                    <tbody class="px-3">
                        @foreach ($histories as $history)
                            <tr>
                                <td>{{ $history->created_at->format('d/m/y H:i:s') }}</td>
                                <td>{{ $history->kegiatan  }}</td>
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

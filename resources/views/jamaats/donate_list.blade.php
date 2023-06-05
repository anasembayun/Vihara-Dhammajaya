@extends('layouts.app_jamaat')
@section('css')
@endsection
@section('content')
<div class="container-fluid p-3 text-center">
    <h1>Salurkan Donasimu Disini</h1>
    <p>Silahkan pilih program donasi yang anda inginkan</p>
</div>
<div class="container-fluid p-5">
    <div class="row d-flex justify-content-center px-3">
        @foreach ($donasis as $donasi)
            <div class="col-lg-3 col-md-5 text-center mx-1" style="margin-bottom: 50px">
                <div class="card">
                    <img class="card-img-top" src="{{ url('images/app_admin/kelola_donasi/foto_kegiatan_donasi/'.$donasi->foto_kegiatan_donasi) }}" alt="Card image" style="width:100%;">
                    <div class="card-body">
                        <p class="card-title" style="width: 100%; white-space: nowrap; text-overflow: ellipsis; overflow: hidden;"><b>{{ $donasi->nama_kegiatan_donasi }}</b></p>
                        <div class="container mt-3">
                            <div class="progress">
                                @php
                                    $current_date = strtotime(date('Y-m-d'));
                                    $start_date = strtotime($donasi->tanggal_mulai_donasi);
                                    $end_date = strtotime($donasi->tanggal_selesai_donasi);
                                    $get_total_hari = $end_date - $start_date;
                                    $total_hari = round($get_total_hari / (60 * 60 * 24));
                                    $get_progress_hari = $current_date - $start_date;
                                    $progress_hari = round($get_progress_hari / (60 * 60 * 24));
                                    if($progress_hari > $total_hari){
                                        $get_persen = 100;
                                    }
                                    else if($total_hari == 0){
                                        $get_persen = 100;
                                    }
                                    else{
                                        $get_persen = $progress_hari / $total_hari * 100;
                                    }
                                    $persen = (String) (Int) $get_persen . "%";
                                @endphp
                                <div class="progress-bar" style="width:{{$persen}}; background-color: #D09222;">{{$persen}}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 mt-2">
                                <p>{{ $donasi->total_donatur }} Donatur</p>
                            </div>
                            <div class="col-sm-6 mt-2">
                                @php
                                    date_default_timezone_set('Asia/Jakarta');
                                    $getcurrentdate = explode("-", date('Y-m-d'));
                                    $getenddate = explode("-", $donasi->tanggal_selesai_donasi);
                                    $currentdate = (int)$getcurrentdate[2];
                                    $newcurrentdate = strtotime(date('Y-m-d'));
                                    $newenddate = strtotime($donasi->tanggal_selesai_donasi);
                                    $selisih = $newenddate - $newcurrentdate;
                                    $getselisih = round($selisih / (60 * 60 * 24));
                                    $enddate = (int)$getenddate[2];

                                    $keterangan = "";
                                    if ($getselisih < 0){
                                        $keterangan = $donasi->status;
                                    }
                                    else {
                                        $keterangan = (String)$getselisih . " Hari Lagi";
                                    }
                                @endphp
                                <p>{{ $keterangan }}</p>
                            </div>
                        </div>
                        <div class="container mt-3 text-end">
                            <a href="/daftar-donasi/detail/{{ $donasi->id }}" class="btn btn-primary" style="background-color: #E57616; border: #D09222;">Donasi</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="mt-3">
    <div class="col-lg-12">
        <div class="pagination justify-content-center">
            {{ $donasis->links() }}
        </div>
    </div>
</div>
@endsection
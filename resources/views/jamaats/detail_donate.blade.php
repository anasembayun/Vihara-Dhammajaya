@extends('layouts.app_jamaat')
@section('css')
@endsection
@section('content')
<div class="container-fluid py-5">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <img src="{{ url('images/app_admin/kelola_donasi/foto_kegiatan_donasi/'.$donasi->foto_kegiatan_donasi) }}" alt="{{ $donasi->foto_kegiatan_donasi }}" class="img-fluid" style="width: 100%;">
            </div>
            <div class="col-6">
                <h1 class="text-start">{{ $donasi->nama_kegiatan_donasi }}</h1>
                <p class="text-start">{{ $donasi->status }}</p>

                @php
                    // date_default_timezone_set('Asia/Jakarta');
                    // $getcurrentdate = explode("-", date('Y-m-d'));
                    // $getenddate = explode("-", $donasi->tanggal_selesai_donasi);
                    // $currentdate = (int)$getcurrentdate[2];
                    // $enddate = (int)$getenddate[2];

                    //Progress Bar
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
                    
                    //Count Day
                    $newcurrentdate = strtotime(date('Y-m-d'));
                    $newenddate = strtotime($donasi->tanggal_selesai_donasi);
                    $selisih = $newenddate - $newcurrentdate;
                    $getselisih = round($selisih / (60 * 60 * 24));
                    $keterangan = "";
                    if ($getselisih < 0){
                        $keterangan = "";
                    }
                    else {
                        $keterangan = (String)$getselisih . " Hari Lagi";
                    }

                @endphp
                <div class="mt-3">
                    <div class="progress">
                        <div class="progress-bar" style="width:{{$persen}}; background-color: #D09222;">{{$persen}}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mt-2">
                        <p>{{ $donasi->total_donatur }} Donatur</p>
                    </div>
                    <div class="col-sm-6 mt-2 text-end">
                        <p>{{ $keterangan }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <a href="{{ url('donasi/'.$donasi->id) }}" class="btn btn-primary" style="background-color: #D09222; border: #D09222; width: 150px;">Donasi</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid p-5 text-end">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-1 col-xs-1 text-end">
                    <p>Bagikan ke: </p>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-11 col-xs-11">
                    <div class="footer-icons" >
                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" fill="#D09222"
                            class="bi bi-facebook" viewBox="0 0 16 16">
                            <path
                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                        </svg></a>
                        <a href="#" style="padding-left: 20px ;"><svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px"
                            fill="#D09222" class="bi bi-instagram" viewBox="0 0 16 16">
                            <path
                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                        </svg></i></a>
                        <a href="#" style="padding-left: 20px ;"><svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px"
                            fill="#D09222" class="bi bi-whatsapp" viewBox="0 0 16 16">
                            <path
                            d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                        </svg></a>
                        <a href="#" style="padding-left: 20px ;"><svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px"
                            fill="#D09222" class="bi bi-line" viewBox="0 0 16 16">
                            <path
                            d="M8 0c4.411 0 8 2.912 8 6.492 0 1.433-.555 2.723-1.715 3.994-1.678 1.932-5.431 4.285-6.285 4.645-.83.35-.734-.197-.696-.413l.003-.018.114-.685c.027-.204.055-.521-.026-.723-.09-.223-.444-.339-.704-.395C2.846 12.39 0 9.701 0 6.492 0 2.912 3.59 0 8 0ZM5.022 7.686H3.497V4.918a.156.156 0 0 0-.155-.156H2.78a.156.156 0 0 0-.156.156v3.486c0 .041.017.08.044.107v.001l.002.002.002.002a.154.154 0 0 0 .108.043h2.242c.086 0 .155-.07.155-.156v-.56a.156.156 0 0 0-.155-.157Zm.791-2.924a.156.156 0 0 0-.156.156v3.486c0 .086.07.155.156.155h.562c.086 0 .155-.07.155-.155V4.918a.156.156 0 0 0-.155-.156h-.562Zm3.863 0a.156.156 0 0 0-.156.156v2.07L7.923 4.832a.17.17 0 0 0-.013-.015v-.001a.139.139 0 0 0-.01-.01l-.003-.003a.092.092 0 0 0-.011-.009h-.001L7.88 4.79l-.003-.002a.029.029 0 0 0-.005-.003l-.008-.005h-.002l-.003-.002-.01-.004-.004-.002a.093.093 0 0 0-.01-.003h-.002l-.003-.001-.009-.002h-.006l-.003-.001h-.004l-.002-.001h-.574a.156.156 0 0 0-.156.155v3.486c0 .086.07.155.156.155h.56c.087 0 .157-.07.157-.155v-2.07l1.6 2.16a.154.154 0 0 0 .039.038l.001.001.01.006.004.002a.066.066 0 0 0 .008.004l.007.003.005.002a.168.168 0 0 0 .01.003h.003a.155.155 0 0 0 .04.006h.56c.087 0 .157-.07.157-.155V4.918a.156.156 0 0 0-.156-.156h-.561Zm3.815.717v-.56a.156.156 0 0 0-.155-.157h-2.242a.155.155 0 0 0-.108.044h-.001l-.001.002-.002.003a.155.155 0 0 0-.044.107v3.486c0 .041.017.08.044.107l.002.003.002.002a.155.155 0 0 0 .108.043h2.242c.086 0 .155-.07.155-.156v-.56a.156.156 0 0 0-.155-.157H11.81v-.589h1.525c.086 0 .155-.07.155-.156v-.56a.156.156 0 0 0-.155-.157H11.81v-.589h1.525c.086 0 .155-.07.155-.156Z" />
                        </svg></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr color="gray" style="width: 80%; margin: auto;">
    <div class="container">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="#" style="color:#D09222 ;">Deskripsi</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="#" style="color:#D09222 ;">Info Terbaru</a>
            </li> --}}
            {{-- <li class="nav-item">
                <a class="nav-link" href="#" style="color:#D09222 ;">Info Donatur</a>
            </li> --}}
        </ul>
    </div>
    <hr color="gray" style="width: 80%; margin: auto;">
    <div class="col-lg-8  mt-3 mb-5 px-3 offset-lg-2 offset-md-2 offset-sm-3 offset-xs-4">
        <p>{{ $donasi->keterangan_donasi }}</p>
    </div>
</div>
@endsection
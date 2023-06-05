@extends('layouts.app_jamaat')
@section('css')
@endsection
@section('content')
<div class="container-fluid">
    <div id="demo" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
        </div>
    
        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/app_jamaat/carousel/utama1.jpg') }}" alt="Kegiatan 1">
            </div>
            {{-- <div class="carousel-item">
                <img src="{{ asset('images/app_jamaat/galeri/gal2.jpg') }}" alt="Kegiatan 2">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/app_jamaat/galeri/gal3.jpg') }}" alt="Kegiatan 3">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/app_jamaat/galeri/gal1.jpg') }}" alt="Kegiatan 4">
            </div> --}}
        </div>
    
        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    {{-- <div class="row d-flex justify-content-center">
        <div class="col-lg-2 col-md-10 col-sm-2 text-center py-1 px-0 mx-1"
            style="background-color:#D09222; border-radius: 5px;width: 25%;">
            <div class="isibox">
                <p>Program Donasi</p>
                <h4>{{ count($donasis) }}</h4>
            </div>
        </div>
        <div class="col-lg-2 col-md-5 col-sm-2 text-center  py-1 px-0 mx-1"
            style="background-color:#D09222; border-radius: 5px;width: 25%;">
            <div class="isibox">
                <p>Donatur Terdaftar</p>
                <h4>-</h4>
            </div>
        </div>
    </div> --}}
    
    {{-- <div class="container-fluid p-5 text-center">
        <h1>Salurkan Donasimu Disini</h1>
        <p>Silahkan pilih program donasi yang anda inginkan</p>
    </div> --}}
    
    <!-- CARD DONASI-->
    {{-- <div class="row d-flex justify-content-center px-3">
        <div class="col-lg-3 col-md-5 text-center mx-1">
            @foreach ($donasis as $donasi)
                <div class="card">
                    <a href="donasi.html"><img class="card-img-top" src="{{ url('images/app_admin/kelola_donasi/foto_kegiatan_donasi/'.$donasi->foto_kegiatan_donasi) }}" alt="Card image" style="width:100%; height: 250px;"></a>
                    <div class="card-body">
                        <p class="card-title"><b>{{ $donasi->nama_kegiatan_donasi }}</b></p>
                        <div class="container mt-3">
                            <div class="progress">
                                <div class="progress-bar" style="width:90%; background-color: #D09222;"></div>
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
                                    $enddate = (int)$getenddate[2];
                                @endphp
                                <p>{{ $enddate - $currentdate }} Hari Lagi</p>
                            </div>
                        </div>
                        <div class="container mt-3 text-end">
                            <a href="/daftar-donasi/detail/{{ $donasi->id }}" class="btn btn-primary" style="background-color: #E57616; border: #D09222;">Donasi</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    <div class="container-fluid p-5 text-center">
        <a href="{{ url('daftar-donasi') }}" class="btn btn-primary" style="background-color: #D09222; border: #D09222;">Lihat Semua</a>
    </div>
    
    <div class="container-fluid py-5" style="background-color: black">
        <div class="container">
            <div class="row">
                <div class="col-12" style="color:white;">
                    <h1 class="text-center">Masih bingung untuk berdonasi? </h1>
                    <p class="text-center">Untuk membantu Anda, klik tombol dibawah ini</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 col-md-6 col-sm-12  d-flex justify-content-end align-items-center" >
                    <a href="https://wa.me/6283845552000?text=Isi Pesan" class="btn btn-primary" style="background-color: #E57616; border: #E57616;width:30%">Konsultasi</a>
                </div>
        
                <div class="col-lg-6 col-md-6 col-sm-12  d-flex justify-content-start">
                    <a href="https://wa.me/6283845552000?text=Isi Pesan" class="btn btn-primary" style="background-color: #E57616; border: #E57616;width:30%">Konfirmasi Donasi</a>
                </div>
            </div>
        </div>
    </div> --}}
    
    <!-- INFO TERKINI -->
    <div class="container-fluid p-5 text-center">
        <h1>Berita Vihara Dhammajaya</h1>
        <p>Berita terbaru dari Vihara Dhammajaya</p>
    </div>
    <div class="container-fluid p-5">
        <div class="row d-flex justify-content-center px-3">
            @foreach ($beritas as $berita)
                <div class="col-lg-3 col-md-5 text-center mx-1" style="margin-bottom: 50px">
                    <div class="card">
                        @if ($berita->foto_berita == NULL)
                            <a href="detailnews4.html"><img class="card-img-top" src="{{ url('images/app_jamaat/newspaper-images.jpg') }}" alt="Card image" style="width:100%"></a>
                        @else
                            <a href="detailnews4.html"><img class="card-img-top" src="{{ url('images/app_admin/kelola_berita/foto_berita/'.$berita->foto_berita) }}" alt="Card image" style="width:100%"></a>
                        @endif
                        <div class="card-body">
                            <p class="card-title" style="font-size: 20px; width: 100%; white-space: nowrap; text-overflow: ellipsis; overflow: hidden;"><b>{{ $berita->judul_berita }}</b></p>
                            <div class="mt-3">
                                <div class="isicard" style="width: 100%; white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">
                                    {{ $berita->isi_berita }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 mt-3">
                                    <p><b>{{ $berita->tanggal_berita_dibuat }}</b></p>
                                </div>
                                <div class="col-sm-6 container mt-3 text-end">
                                    <a href="detailnews4.html" class="btn btn-primary" style="background-color: #E57616; border: #E57616;">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-3 col-md-5 text-center mx-1">
                    <div class="card">
                        <a href="detailnews4.html"><img class="card-img-top" src="{{ url('images/app_admin/kelola_berita/foto_berita/'.$berita->foto_berita) }}" alt="Card image" style="width:100%"></a>
                        <div class="card-body">
                            <p class="card-title" style="width: 100%; white-space: nowrap; text-overflow: ellipsis; overflow: hidden;"><b>{{ $berita->judul_berita }}</b></p>
                            <div class="mt-3">
                                <div class="isicard">
                                    {{ $berita->isi_berita }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 mt-3">
                                    <p style="width: 100%; white-space: nowrap; text-overflow: ellipsis; overflow: hidden;"><b>{{ $berita->tanggal_artikel_dibuat }}</b></p>
                                </div>
                                <div class="col-sm-6 container mt-3 text-end">
                                    <a href="detailnews4.html" class="btn btn-primary" style="background-color: #E57616; border: #E57616;">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            @endforeach
        </div>
    </div>
    <div class="container-fluid p-5 text-center">
        <a href="{{ url('info-terkini') }}" class="btn btn-primary" style="background-color: #D09222; border: #D09222;">Lihat Info Lainnya</a>
    </div>

    <!-- ARTIKEL -->
    <div class="container-fluid p-5 text-center">
        <div class="row">
            <div class="col-lg-5 offset-lg-1 col-md-12 mb-3 text-end">
                <h3>Video</h3>
                <iframe width=90%" height="90%" src="https://www.youtube.com/embed/e_p1sZ2IytA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                {{-- <img src="{{ asset('images/app_jamaat/artikel/video.jpg') }}" class="img-fluid" style="height:90% ;"> --}}
            </div>
            <div class="col-lg-5 col-md-12 text-start" style="display:block ;">
                <h3>Artikel</h3>
                <div class="row mb-1 ">
                    <div class="col-lg-4 col-md-4">
                        <a href="detailnews.html"><img src="{{ asset('images/app_jamaat/artikel/foto_1.jpeg') }}" class="img-fluid" ></a>
                    </div>
                    <div class="col-lg-8 mt-4 col-md-8">
                        <a href="detailnews.html" style="font-size: 20px; color:black ;text-decoration: none;"><b>Ibadah Waisak di Vihara</b></a>
                        <p style="font-size: 15px;"></p>
                    </div>
                </div>
                <div class="row mt-3 mb-1">
                    <div class="col-lg-4 col-md-4">
                        <a href="detailnews2.html"><img src="{{ asset('images/app_jamaat/artikel/foto_2.jpg') }}" class="img-fluid" ></a>
                    </div>
                    <div class="col-lg-8 mt-4 col-md-8">
                        <a href="detailnews2.html" style="font-size: 20px; color: black;text-decoration:none ; "><b>Acara Pabbajja Samanera</b></a>
                        <p style="font-size: 15px;"></p>
                    </div>
                </div>
                <div class="row mt-3 mb-1">
                    <div class="col-lg-4 col-md-4">
                        <a href="detailnews3.html"><img src="{{ asset('images/app_jamaat/artikel/foto_2.jpg') }}" class="img-fluid" ></a>
                    </div>
                    <div class="col-lg-8 mt-4 col-md-8">
                        <a href="detailnews3.html" style="font-size: 20px; color: black; text-decoration: none;"><b>Pelatihan Menjadi Samanera</b></p>
                        <p style="font-size: 15px;"></p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-6">
                        <a href="berita.html" class="btn btn-primary" style="background-color: #D09222; border: #D09222; width: 150px;">Lihat Semua</a>
                    </div>
                </div>
    
            </div>
        </div>
    </div>

    <!-- GALERI -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>Galeri</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 mt-3">
                    <img src="{{ asset('images/app_jamaat/galeri/gal3.jpg') }}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 mt-3">
                    <img src="{{ asset('images/app_jamaat/galeri/gal6.jpg') }}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 mt-3">
                    <img src="{{ asset('images/app_jamaat/galeri/gal3.jpg') }}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 mt-3">
                    <img src="{{ asset('images/app_jamaat/galeri/gal6.jpg') }}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 mt-3">
                    <img src="{{ asset('images/app_jamaat/galeri/gal3.jpg') }}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 mt-3">
                    <img src="{{ asset('images/app_jamaat/galeri/gal6.jpg') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid p-5 text-center">
        <a href="#" class="btn btn-primary" style="background-color: #D09222; border: #D09222;">Lihat Semua</a>
    </div>

    <!-- KEGIATAN TERBARU -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <img src="{{ asset('images/app_jamaat/galeri/gal3.jpg') }}" alt="" class="img-fluid">
                </div>
                <div class="col-6">
                    <h1 class="text-start">Kegiatan Terbaru Vihara Dhammajaya</h1>
                    <p class="text-start">Untuk Melihat lebih banyak kegiatan terkini, klik tombol dibawah ini</p>
                    <div class="row">
                        <div class="col-6">
                        <a href="{{ url('info-kegiatan') }}" class="btn btn-primary"
                            style="background-color: #E57616; border: #E57616; width: 150px;">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
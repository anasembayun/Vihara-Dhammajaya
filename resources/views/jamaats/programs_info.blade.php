@extends('layouts.app_jamaat')
@section('css')
@endsection
@section('content')
<div class="container-fluid p-5 text-center">
    <h1>Info Kegiatan Vihara Dhammajaya</h1>
    <p>Kegiatan terbaru dari Vihara Dhammajaya</p> 
</div>
<div class="container-fluid p-5">
    <div class="row d-flex justify-content-center px-3">
        @foreach ($kegiatans as $kegiatan)
            <div class="col-lg-3 col-md-5 text-center mx-1" style="margin-bottom: 50px">    
                <div class="card">
                    @if ($kegiatan->foto_kegiatan == NULL)
                        <a href="detailnews4.html"><img class="card-img-top" src="{{ url('images/app_jamaat/no-image.jpg') }}" alt="Card image" style="width:100%"></a>
                    @else
                        <a href="detailnews4.html"><img class="card-img-top" src="{{ url('images/app_admin/kelola_kegiatan/foto_kegiatan/'.$kegiatan->foto_kegiatan) }}" alt="Card image" style="width:100%"></a>
                    @endif
                    <div class="card-body">
                        <p class="card-title" style="font-size: 20px; width: 100%; white-space: nowrap; text-overflow: ellipsis; overflow: hidden;"><b>{{ $kegiatan->nama }}</b></p>
                        <div class="mt-3">
                            <div class="isicard" style="width: 100%; white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">
                                {{ $kegiatan->keterangan }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 mt-3">
                                <p><b>{{ $kegiatan->tanggal_mulai }}</b></p>
                            </div>
                            <div class="col-sm-6 container mt-3 text-end">
                                <a href="detailnews4.html" class="btn btn-primary" style="background-color: #E57616; border: #E57616;">Selengkapnya</a>
                            </div>
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
            {{ $kegiatans->links() }}
        </div>
    </div>
</div>
@endsection
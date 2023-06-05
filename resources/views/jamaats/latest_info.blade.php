@extends('layouts.app_jamaat')
@section('css')
@endsection
@section('content')
<div class="container-fluid p-3 text-center">
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
        @endforeach
    </div>
</div>
<div class="mt-3">
    <div class="col-lg-12">
        <div class="pagination justify-content-center">
            {{ $beritas->links() }}
        </div>
    </div>
</div>

{{-- <div class="mt-3">    
    <div class="col-lg-12">
        <ul class="pagination justify-content-center">
            <li class="page-item"><a class="page-link" href="javascript:void(0);">Previous</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a></li>
        </ul>
    </div>
</div>  --}}

@endsection
@section('script')

@endsection
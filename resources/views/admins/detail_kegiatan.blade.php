@extends('templates.admin_main')
@section('top-header')
<header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
    <p class="w3-left">Detail Kegiatan</p>
    <p class="w3-right">Role
        <span>: {{ Auth::guard('admin')->user()->role }} </span>
    </p>
</header>
@endsection
@section('content')
<div class="w3-main container-main" style="margin-left:250px;padding-top: 0;">
    <div class="container-fluid isi px-4 mt-3">
        {{-- <form action="{{ url('kelola-admin/detail-kegiatan') }}" method="POST" enctype="multipart/form-data">
            @csrf --}}
            <div class="container-fluid isi px-4 mt-3">
                <div class="mono row d-flex justify-content-center mb-1">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Kegiatan</label>
                            <select class="isi-form form-select s_nama_kegiatan" id="ordinary" aria-label="Example select with button addon" name="s_nama_kegiatan">
                                <option value="" disabled selected>--Nama Kegiatan--</option>
                                @foreach ($data_kegiatan as $detail_kegiatan)
                                    <option value="{{ $detail_kegiatan->id }}">{{ $detail_kegiatan->nama }}</option>
                                @endforeach
                            </select>
                            {{-- <input name="nama_kegiatan" value="nama_kegiatan" type="text" class="form-control" id="ordinary" aria-describedby="emailHelp" readonly> --}}
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center mb-1">
                    <div class="col-12 col-xs-12 col-sm-12 col-lg-5">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tempat Pelaksanaan</label>
                            <input name="tempat" value="" type="f-name" class="form-control" id="ordinary" aria-describedby="emailHelp" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-xs-12 col-sm-12 ms-lg-3 col-lg-5">
                        <div class="row tanggal" style="margin-top: 0px">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Tanggal Mulai</label>
                                    <input name="tanggal_mulai" value="" type="date" class="form-control" id="ordinary" aria-describedby="emailHelp" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jam Mulai</label>
                                    <input name="jam_mulai" value="" type="time" class="form-control" id="ordinary" aria-describedby="emailHelp" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center mb-1">
                    <div class="col-12 col-xs-12 col-sm-12 col-lg-5">
                        {{-- <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tempat Tanggal Akhir Pelaksanaan</label>
                            <input name="tempat_akhir_kegiatan" type="f-name" class="form-control" id="ordinary" aria-describedby="emailHelp">
                        </div> --}}
                    </div>
                    <div class="col-12 col-xs-12 col-sm-12 ms-lg-3 col-lg-5">
                        <div class="row tanggal" style="margin-top: 0px">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Tanggal Selesai</label>
                                    <input name="tanggal_selesai" value="" type="date" class="form-control" id="ordinary" aria-describedby="emailHelp" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jam Selesai</label>
                                    <input name="jam_selesai" value="" type="time" class="form-control" id="ordinary" aria-describedby="emailHelp" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mono row d-flex justify-content-center mb-1">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Keterangan Acara</label>
                            <textarea name="keterangan" value="" class="form-control" id="large" rows="3" readonly></textarea>
                        </div>
                    </div>
                </div>
                <div class="mono row d-flex justify-content-center mb-1">
                    <div class="col-12">
                        <div class="mb-3">
                            <label name="foto_kegiatan" for="Image" value="" class="form-label">Gambar Kegiatan</label>
                            <br>
                            <img id="foto_kegiatan" src="" alt="" style="max-height: 650px; max-width: 650px;">
                        </div>
                    </div>
                </div>
        {{-- </form> --}}
    </div>
</div>
@endsection
@section('script')
<script>
    $('.s_nama_kegiatan').change(function() {
        $.ajax({
            url: "{{ url('/kelola-kegiatan/get-detail-kegiatan') }}/" + $(this).val(),
            method: 'GET',
            type: "JSON",
            success: function (data) {
                $("input[name^='tempat']").val(data.tempat);
                $("input[name^='tanggal_mulai']").val(data.tanggal_mulai);
                $("input[name^='jam_mulai']").val(data.jam_mulai);
                $("input[name^='tanggal_selesai']").val(data.tanggal_selesai);
                $("input[name^='jam_selesai']").val(data.jam_selesai);
                $("textarea[name^='keterangan']").val(data.keterangan);
                $('#foto_kegiatan').attr('src', data.foto_kegiatan);
                $('#foto_kegiatan').attr('alt', data.foto_kegiatan);
            }
        });
        console.log($(this).val());
    })
</script>
@endsection


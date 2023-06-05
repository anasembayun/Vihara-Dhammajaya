@extends('templates.admin_main')
@section('top-header')
    <header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
        <p class="w3-left">Pesan Pas Foto</p>
        <p class="w3-right">Role
            <span>: {{ Auth::guard('admin')->user()->role }} </span>
        </p>
    </header>
@endsection
@section('css')
    <style>
        .form-label {
            font-family: 'Trebuchet MS', sans-serif;
            font-weight: bold;
            color: #2A363B;
        }
    </style>
@endsection
@section('content')
    <div class="w3-main container-main" style="margin-left:250px;padding-top: 0;">
        <!-- isi halaman -->
        <div class="container-fluid isi px-4 mt-3">
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row mb-4">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="card mb-5">
                        <div class="card-body">
                            <div class="container-fluid row g-3">
                                <div class="col-md-4">
                                    <label for="umat" class="form-label">ID Umat <span
                                            class="text-danger">*</span></label>
                                    <input class="form form-control" list="biodata" id="jemaat">
                                    <datalist id="biodata"></datalist>
                                    {{-- <label for="exampleInputEmail1" class="form-label">Id Umat</label>
                                    <select class="isi-form form-select id_jamaat" id="ordinary" aria-label="Example select with button addon" name="id_jamaat">
                                        <option value="" selected disabled>-- Id Umat --</option>
                                        @foreach ($jamaats as $jamaat)
                                            <option value="{{ $jamaat->id }}">{{ $jamaat->id }}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                                <div class="col-md-8">
                                    <label for="exampleInputEmail1" class="form-label mb-2">Nama Umat</label>
                                    <input name="nama_jamaat" type="text" class="form-control" id="namaUmat"
                                        aria-describedby="emailHelp" readonly>
                                </div>
                                <div class="col-12">
                                    <label for="exampleInputEmail1" class="form-label">Nama Leluhur <span
                                            class="text-danger">*</span></label>
                                    <input name="nama_leluhur" type="text" class="form-control" id="nama_leluhur"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="col-12">
                                    <label for="exampleInputEmail1" class="form-label">Relasi Leluhur dengan Penanggung
                                        Jawab <span class="text-danger">*</span></label>
                                    <input name="relasi" type="text" class="form-control" id="relasi"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1" class="form-label">Tempat Lahir</label>
                                    <input name="tempat_lahir" type="f-name" class="form-control" id="tempat_lahir"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                                    <input name="tanggal_lahir" type="date" class="form-control" id="tanggal_lahir"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1" class="form-label">Tempat Meninggal</label>
                                    <input name="tempat_meninggal" type="f-name" class="form-control" id="tempat_meninggal"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1" class="form-label">Tanggal Meninggal</label>
                                    <input name="tanggal_meninggal" type="date" class="form-control"
                                        id="tanggal_meninggal" aria-describedby="emailHelp">
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1" class="form-label">Transaksi Terakhir <span
                                            class="text-danger">*</span></label>
                                    <input name="tanggal_meninggal" type="month" class="form-control"
                                        id="transaksi_terakhir" aria-describedby="emailHelp">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-muted text-center">
                            <div class="mb-2 mt-2">
                                {{-- <button type="button" onclick="window.location.href='denahFoto.html'" class="btn btn-sm btn-3" id="pilihLokasi" >Pilih Lokasi Foto</button> --}}
                                <button type="button" class="btn btn-sm btn-3" id="pilihLokasi">Pilih Lokasi Foto</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $.ajax({
            type: 'json',
            method: 'get',
            url: '/data-leluhur/data-umat',
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: function(data) {
                var dataList = document.getElementById("biodata");
                dataList.innerHTML = data["message"];
                // alert(data["table"]);
            },
            error: function(data) {
                alert("fail");
                console.log(data);
            }
        });

        $(document).ready(function() {
            $('#pilihLokasi').on('click', function(e) {
                e.preventDefault();

                var namaUmat = document.getElementById("namaUmat").value;
                var idUmat = document.getElementById("jemaat").value;
                var namaleluhur = document.getElementById("nama_leluhur").value;
                var relasi = document.getElementById("relasi").value;
                var tempatlahir = document.getElementById("tempat_lahir").value;
                var tempatmeninggal = document.getElementById("tempat_meninggal").value;
                var tanggallahir = document.getElementById("tanggal_lahir").value;
                var tanggalmeninggal = document.getElementById("tanggal_meninggal").value;
                var transaksiterakhir = document.getElementById("transaksi_terakhir").value;

                if (idUmat != "" && namaleluhur != "" && relasi != "" &&transaksiterakhir != "") {
                    let text = '{"idUmat":"' + idUmat + '", "namaUmat":"' + namaUmat + '", "relasi":"' +
                        relasi + '", "namaleluhur":"' + namaleluhur + '", "tempatlahir":"' + tempatlahir +
                        '", "tempatmeninggal":"' + tempatmeninggal + '", "tanggallahir":"' + tanggallahir +
                        '", "tanggalmeninggal":"' + tanggalmeninggal + '", "transaksiterakhir":"' + transaksiterakhir +'"}';
                    var href = "/data-leluhur/pesan-lokasi/" + text;
                    window.location.replace(href);
                } else {
                    Swal.fire({
                        title: 'Data belom terisi!',
                        text: 'Silahkan data dilengkapi.',
                        icon: 'error',
                        showConfirmButton: true,
                        allowOutsideClick: false
                    });
                }

            })

            $(document).on('change', 'input', function() {
                var options = $('datalist')[0].options;
                var val = $(this).val();
                for (var i = 0; i < options.length; i++) {
                    if (options[i].value === val) {
                        $.ajax({
                            method: 'get',
                            url: '/data-leluhur/getNamabyId',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                val: val
                            },
                            success: function(data) {

                                var namaUmat = document.getElementById("namaUmat");
                                namaUmat.value = data;

                            },
                            error: function(data) {
                                alert("fail");
                                console.log(data);
                            }
                        });
                    }
                }
            });
        });
    </script>
@endsection

@extends('templates.admin_main')
@section('top-header')
    <header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
        <p class="w3-left">Tambah Data Baptisan</p>
        <p class="w3-right">Role
            <span>: {{ Auth::guard('admin')->user()->role }} </span>
        </p>
    </header>
@endsection
@section('css')
    <!-- Select2 Plugin for search in select -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style>
        .form-label {
            font-family: 'Trebuchet MS', sans-serif;
            font-weight: bold;
            color: #2A363B;
        }

        .select2 {
            width: 100% !important;
        }
    </style>
@endsection
@section('content')
    <div class="w3-main container-main" style="margin-left:250px;padding-top: 0;">
        <!-- isi halaman -->
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
        <div class="container-fluid isi mt-3 mb-2">
            <!-- id, no sertifikat -->
            <form action="{{ url('kelola-jamaat/i-tambah-data-baptisan') }}" method="POST">
                @csrf
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="container-fluid row g-3">
                            <div class="col-md-4">
                                <label for="exampleInputEmail1" class="form-label">ID Umat <span
                                        class="text-danger">*</span></label>
                                <select class="isi-form form-select id_jamaat" id="ordinary" data-select2-id="_id_jamaat"
                                    aria-label="Example select with button addon" name="id_jamaat" required>
                                    <option value="" selected disabled>-- ID Umat --</option>
                                    @foreach ($jamaats as $jamaat)
                                        <option value="{{ $jamaat->id }}">{{ $jamaat->id_code }} - {{ $jamaat->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-8">
                                <label for="exampleInputEmail1" class="form-label">No Sertifikat <span
                                        class="text-danger">*</span></label>
                                <input name="no_sertifikat" value="{{ old('no_sertifikat') }}" type="text"
                                    class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-12">
                                <label for="exampleInputEmail1" class="form-label">Nama</label>
                                <input name="name" value="" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Tempat Lahir</label>
                                <input name="tempat_lahir" value="" type="text" class="form-control" id="ordinary"
                                    aria-describedby="emailHelp" required readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                                <input name="tanggal_lahir" value="" type="date" class="form-control"
                                    id="ordinary" aria-describedby="emailHelp" required readonly>
                            </div>
                            <div class="col-12">
                                <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control" id="ordinary" rows="3" required readonly></textarea>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleFormControlTextarea1" class="form-label">Kelurahan/Kecamatan</label>
                                <div class="mb-3">
                                    <input name="kelurahan_kecamatan" value="{{ old('kelurahan_kecamatan') }}"
                                        type="text" class="form-control" id="ordinary" aria-describedby="emailHelp"
                                        required readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleFormControlTextarea1" class="form-label">Kabupaten/Kota</label>
                                <div class="mb-3">
                                    <input name="kabupaten_kota" value="{{ old('kabupaten_kota') }}" type="text"
                                        class="form-control" id="ordinary" aria-describedby="emailHelp" required readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleFormControlTextarea1" class="form-label">RT/RW</label>
                                <div class="mb-3">
                                    <input name="rt_rw" value="{{ old('rt_rw') }}" type="text"
                                        class="form-control" id="ordinary" aria-describedby="emailHelp" required
                                        readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Tempat Wisuda <span
                                        class="text-danger">*</span></label>
                                <input name="tempat_wisuda" value="{{ old('tempat_wisuda') }}" type="text"
                                    class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Tanggal Wisuda <span
                                        class="text-danger">*</span></label>
                                <input name="tanggal_wisuda" value="{{ old('tanggal_wisuda') }}" type="date"
                                    class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-12">
                                <label for="exampleInputEmail1" class="form-label">Nama Baptis <span
                                        class="text-danger">*</span></label>
                                <input name="nama_baptis" value="{{ old('nama_baptis') }}" type="text"
                                    class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-12">
                                <label for="exampleInputEmail1" class="form-label">Arti Nama Baptis <span
                                        class="text-danger">*</span></label>
                                <input name="arti_nama_baptis" value="{{ old('arti_nama_baptis') }}" type="text"
                                    class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-12">
                                <label for="exampleInputEmail1" class="form-label">Bhikhu Pemberi Wisuda <span
                                        class="text-danger">*</span></label>
                                <input name="bhikhu_pemberi_wisuda" value="{{ old('bhikhu_pemberi_wisuda') }}"
                                    type="text" class="form-control" id="ordinary" aria-describedby="emailHelp"
                                    required>
                            </div>
                            <div class="col-12">
                                <label for="exampleInputEmail1" class="form-label">Pandita Pemimpin Upacara <span
                                        class="text-danger">*</span></label>
                                <input name="pandita_pemimpin_upacara" value="{{ old('pandita_pemimpin_upacara') }}"
                                    type="text" class="form-control" id="ordinary" aria-describedby="emailHelp"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted text-center">
                        <div class="mb-2 mt-2">
                            <button type="submit" class="btn btn-secondary btn-sm btn-1">SIMPAN</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.id_jamaat').change(function() {
            $.ajax({
                url: "{{ url('/kelola-jamaat/tampil-data-baptisan') }}/" + $(this).val(),
                method: 'GET',
                type: "JSON",
                success: function(data) {
                    $("input[name^='name']").val(data.name);
                    $("input[name^='tempat_lahir']").val(data.tempat_lahir);
                    $("input[name^='tanggal_lahir']").val(data.tanggal_lahir);
                    $("textarea[name^='alamat']").val(data.alamat);
                    $("input[name^='kelurahan_kecamatan']").val(data.kelurahan_kecamatan);
                    $("input[name^='kabupaten_kota']").val(data.kabupaten_kota);
                    $("input[name^='rt_rw']").val(data.rt_rw);
                }
            });
            console.log($(this).val());
        })

        $(".id_jamaat").select2();
    </script>
@endsection

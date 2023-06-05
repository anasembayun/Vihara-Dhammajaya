@extends('templates.admin_main')
@section('top-header')
    <header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
        <p class="w3-left">Tagih Iuran</p>
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
        <div class="container-fluid isi px-4 mt-3">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <form action="" method="GET" id="FormIuran">
                        @csrf
                        <div class="card mb-3">
                            <div class="card-body mb-3">
                                <div class="container-fluid row g-3">
                                    <div class="col-md-4">
                                        <label for="exampleInputEmail1" class="form-label">ID Umat <span
                                                class="text-danger">*</span></label>
                                        <select class="isi-form form-select id_jamaat" id="ordinary"
                                            data-select2-id="_id_jamaat" aria-label="Example select with button addon"
                                            name="id_jamaat" required>
                                            <option value="" selected disabled>-- ID Umat --</option>
                                            @foreach ($jamaats as $jamaat)
                                                <option value="{{ $jamaat->id }}">{{ $jamaat->id_code }} -
                                                    {{ $jamaat->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="exampleInputEmail1" class="form-label">Nama</label>
                                        <input type="tel" name="name" class="form-control" id="ordinary"
                                            aria-describedby="emailHelp" value="" readonly>
                                    </div>
                                    <div class="col-12" hidden>
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="password" name="email" class="form-control" id="ordinary"
                                            aria-describedby="emailHelp" value="" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header">
                                <div class="mb-2 mt-2">
                                    <h5 class="sub-judul" style="margin: 5px;">Iuran Wajib</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="container-fluid row g-3">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1" class="form-label">Nominal Iuran <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-white" id="ordinary">Rp</span>
                                            <input type="text" name="nominal_tagihan"
                                                onkeypress="return /[0-9]/i.test(event.key)" class="form-control"
                                                id="ordinary" aria-describedby="emailHelp" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="exampleInputEmail1" class="form-label">Bulan <span
                                                class="text-danger">*</span></label>
                                        <input type="month" name="bulan_tagihan" class="form-control " id="ordinary"
                                            aria-describedby="emailHelp" required>
                                    </div>
                                    <div class="col-md-3 d-flex align-items-end">
                                        <button type="submit"
                                            class="btn btn-secondary btn-sm btn-1 kirim_tagihan">Kirim</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="alert alert-info alert-email-proses" role="alert"
                        style="display: none; justify-content: center; margin-left:auto; margin-right:auto;">
                        Mohon tunggu sebentar, permintaan anda sedang di proses
                    </div>

                    <div class="alert alert-success alert-email-berhasil" role="alert"
                        style="display: none; justify-content: center; margin-left:auto; margin-right:auto;">
                        Tagihan berhasil di kirim melalui email
                    </div>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(".id_jamaat").select2();

        $('.id_jamaat').change(function() {
            $.ajax({
                url: "{{ url('/kelola-jamaat/tampil-data-baptisan') }}/" + $(this).val(),
                method: 'GET',
                type: "JSON",
                success: function(data) {
                    $("input[name^='name']").val(data.name);
                    $("input[name^='email']").val(data.email);
                }
            });
            console.log($(this).val());
        })

        $(document).on('submit', 'form', function(e) {
            e.preventDefault();
            var nama = $("input[name^='name']").val();
            var email = $("input[name^='email']").val();
            var nominal_tagihan = $("input[name^='nominal_tagihan']").val();
            var bulan_tagihan = $("input[name^='bulan_tagihan']").val();
            console.log(nama, email, nominal_tagihan, bulan_tagihan);
            const form = document.getElementById('FormIuran')

            $.ajax({
                url: "{{ url('tagih-iuran/kirim-email') }}/" + nama + "/" + email + "/" + nominal_tagihan +
                    "/" + bulan_tagihan,
                method: 'GET',
                type: "JSON",
                beforeSend: function() {
                    $(".alert-email-proses").delay(500).fadeIn();
                },
                success: function(data) {
                    console.log(data.pesan);
                    form.reset();
                    $(".alert-email-proses").delay(200).fadeOut();

                    $(".alert-email-berhasil").delay(600).fadeIn();
                    $(".alert-email-berhasil").delay(3000).fadeOut();
                }
            });
        });
    </script>
@endsection

@extends('templates.admin_main')
@section('top-header')
<header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
    <p class="w3-left">Presensi Kegiatan</p>
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

        .card {
            border: none;
        }
        
        .card .card-footer {
            border: none;
            background-color: white;
        }
    </style>
@endsection
@section('content')
<div class="w3-main container-main" style="margin-left:250px;padding-top: 0;">
    <div class="container-fluid isi px-4 mt-3">
        <section id = "createAbsenForm" class ="my-5 Finish">
            <div class="container-fluid isi px-4 mt-3">
                <div class="accordion" id="createAbsenFormAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne" style="background-color:#100701">
                            <strong class='text-white'>Jadwalkan Kegiatan</strong>
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body" style="background-color: #ffffff">
                                <form action="{{ url('kelola-kegiatan/i-tambah-jadwal-kegiatan') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-10">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="container-fluid row g-3">
                                                        <div class="col-12">
                                                            <label for="exampleInputEmail1" class="form-label">Nama Kegiatan <span class="text-danger">*</span></label>
                                                            <input name="nama" type="text" class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="exampleInputEmail1" class="form-label">Tempat Kegiatan <span class="text-danger">*</span></label>
                                                            <input name="tempat" type="f-name" class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="exampleInputEmail1" class="form-label">Tanggal (dd/mm/yyyy) <span class="text-danger">*</span></label>
                                                            <input name="tanggal_mulai" type="date" class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="exampleInputEmail1" class="form-label">Jam Awal Kegiatan <span class="text-danger">*</span></label>
                                                            <input name="jam_mulai" type="time" class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                                                        </div>
                                                        <div class="col-md-9"></div>
                                                        <div class="col-md-3">
                                                            <label for="exampleInputEmail1" class="form-label">Jam Akhir Kegiatan <span class="text-danger">*</span></label>
                                                            <input name="jam_selesai" type="time" class="form-control" id="ordinary" aria-describedby="emailHelp" required>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="exampleFormControlTextarea1" class="form-label">Keterangan Acara <span class="text-danger">*</span></label>
                                                            <textarea name="keterangan" class="form-control" id="large" rows="3" required></textarea>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="Image" class="form-label">Pilih Gambar Kegiatan (512 x 512 pixel) | Opsional</label>
                                                            <input name="foto_kegiatan" class="form-control inp-img" type="file" id="ordinary" onchange="preview()" accept=".jpg,.jpeg,.png">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer text-muted text-center">
                                                    <div class="mb-2 mt-2">
                                                        <button type="submit" class="btn  btn-sm border-0 btn-4 ab">JADWALKAN </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-1"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="data_kegiatan container">
            <div class="container text-center mb-0 mt-1">
                <h3 style="margin-bottom:0px;"><strong>Daftar Kegiatan</strong></h3>
            </div>
            <div class="table-responsive container mb-5" id='logTableDiv'>
            </div>

        </section>

        <section id="data_lastVisit container mt-5">
            <hr>
            <div class="container text-center mb-0 mt-5">
                <h3 style="margin-bottom:0px;"><strong>Kunjungan Terakhir</strong></h3>
            </div>
            <div class="table-responsive container" id='logTableDiv2'>
            </div>

        </section>
        
    </div>
</div>
@endsection
@section('script')
<script>
    $.ajax({
        type:'get',
        url:'/kelola-kegiatan/showAll',
        data: {
            "_token": "{{ csrf_token() }}"                
        },
        success:function(data) {
            document.getElementById("logTableDiv").innerHTML = data;
            $('#logTable').DataTable({
                "aaSorting": [],
                dom: 'Blfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf','print'
                ]
            });
        },
        error: function(data){
            alert("fail");
            console.log(data);
        }
    });

    $.ajax({
        type:'get',
        url:'/kelola-kegiatan/showLastVisit',
        data: {
            "_token": "{{ csrf_token() }}"                
        },
        success:function(data) {
            document.getElementById("logTableDiv2").innerHTML = data;
            $('#logTable2').DataTable({"aaSorting": [],
                dom: 'Blfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf','print'
                ]
            });
        },
        error: function(data){
            alert("fail");
            console.log(data);
        }
    });

    $(document).ready(function() {
        setInterval(function () {
            $.ajax({
                type:'get',
                url:'/kelola-kegiatan/showAll',
                data: {
                    "_token": "{{ csrf_token() }}"                
                },
                success:function(data) {
                    document.getElementById("logTableDiv").innerHTML = data;
                    $('#logTable').DataTable({
                        "aaSorting": [],
                        dom: 'Blfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf','print'
                        ]
                    });
                },
                error: function(data){
                    alert("fail");
                    console.log(data);
                }
            });

            $.ajax({
                type:'get',
                url:'/kelola-kegiatan/showLastVisit',
                data: {
                    "_token": "{{ csrf_token() }}"                
                },
                success:function(data) {
                    document.getElementById("logTableDiv2").innerHTML = data;
                    $('#logTable2').DataTable({"aaSorting": [],
                        dom: 'Blfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf','print'
                        ]
                    });
                },
                error: function(data){
                    alert("fail");
                    console.log(data);
                }
            });
        },30000);
    });

    $('#deleteKegiatan').on('click', function(e) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    });

    var _URL = window.URL || window.webkitURL;
    $(".inp-img").change(function (e) {
        var file, img;
        if ((file = this.files[0])) {
            img = new Image();
            var objectUrl = _URL.createObjectURL(file);
            img.onload = function () {
                if (this.width != 512 || this.height != 512) {
                    alert('Ukuran gambar harus 512x512px.');
                    $(".inp-img").val('');
                }
                _URL.revokeObjectURL(objectUrl);
            };
            img.src = objectUrl;
        }
    });
</script>
@endsection


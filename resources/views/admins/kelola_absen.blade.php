@extends('templates.admin_main')
@section('top-header')
<header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
    <p class="w3-left">Presensi Acara | <span id="acara"></span> (<span id="status_acara"></span>)</p>
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
        
        .btn {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 12px;
            font-weight: bold;
            background: #D09222;
            width: 100px;
            padding: 3px;
            text-align: center;
            text-decoration: none;
            text-transform: uppercase;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
            -webkit-transition-property: box-shadow, transform;
            transition-property: box-shadow, transform;
        }

        .btn:hover, .btn:focus, .btn:active {
            box-shadow: 0 0 15px rgba(159, 129, 22, 0.598);
            -webkit-transform: scale(1.05);
            transform: scale(1.05);
            color: #fff;
        }
    </style>
@endsection
@section('content')
<div class="w3-main container-main" style="margin-left:250px;padding-top: 0;">
    <div class="container-fluid isi px-4 mt-3">
        <div class="card mb-5">
            <div class="card-header">
                <div class="mb-2 mt-2">
                    <a href="{{ url('kelola-kegiatan/tambah-jadwal-kegiatan') }}" class="float-start" role="button"
                        tabindex="-1" aria-disabled="true">
                        <img src="{{ asset('images/app_admin/kelola_admin/back-icon.png') }}" style="width: 25px; margin-bottom: 5px;">
                    </a>
                    <form action="{{ url('kelola-kegiatan/absen/change-status-kegiatan/'.$idj) }}" method="POST">
                        @csrf
                        <button id="changeStatusKegiatan" class="btn float-end" type="submit" style="margin-bottom: 5px;">Mulai</button>
                    </form>
                </div>
            </div>
            <div class="card-body mt-2">
                {{-- <div class="text-center mb-4 " >
                    <img id="foto_kegiatan" class="rounded img-thumbnail img-fluid" alt="" 
                        style="max-height: 200px; max-width: 200px;">
                </div> --}}
                <section id="absenSection" class="mb-5" style="display:none">
                    <div class="container-fluid row g-3">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <table style="width: 100%; border-collapse: collapse; border-collapse: separate; border-spacing: 0 16px;">
                                <tr>
                                    <th style="width: 30%">Cari Umat</th>
                                    <th style="width: 5%">:</th>
                                    <td style="width: 65%">
                                        <input class="form-control" onchange="input()" list="biodata" name="browser" id="jemaat">
                                        <datalist id="biodata"></datalist>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 30%">Kunjungan Terakhir</th>
                                    <th style="width: 5%">:</th>
                                    <td id="last_visit_jamaat" style="width: 65%"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-3"></div>

                        {{-- <div class="col-md-1 d-flex align-items-end">
                            <label for="jemaat" class="form-label">Cari Umat</label>
                        </div>
                        <div class="col-md-1 d-flex align-items-center">:</div>
                        <div class="col-md-4">
                            <input class="form-control" onchange="input()" list="biodata" name="browser" id="jemaat">
                            <datalist id="biodata"></datalist>
                        </div>
                        <div class="col-md-3"></div>

                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Kunjungan Terakhir:</label>
                        </div>
                        <div class="col-md-3"></div> --}}
                        
                        {{-- <div class="row pt-3">
                            <div class="col"></div>
                            <div class="col-sm">
                                <label for="jemaat" class="form-label"><strong>Cari Umat: </strong></label>
                                <input class="form-control" onchange="input()" list="biodata" name="browser" id="jemaat">
                                <datalist id="biodata">
                                </datalist>
                            </div>
                            <div class="col"></div>
                        </div> --}}
                        
                        {{-- <div class="row mt-4">
                            <div class="col-sm-6 d-flex justify-content-end">
                                <button id="reset" class="btn btn-danger" style="min-width: 150px; font-weight:600">Reset Absen</button>
                            </div>
                            <div class="col-sm-12 d-flex justify-content-center">
                                <button id="generate" class="btn btn-success" style="min-width: 150px; font-weight:600">Generate Barcode</button>
                            </div>
                        </div> --}}
            
                        {{-- <div class="row">
                            <div class="col-12 d-flex justify-content-center pt-5" id='qrCode'></div>
                            <div class="col-12 d-flex justify-content-center pt-5" id='barCode'></div>
                            <div class="col-12 d-flex justify-content-center pt-5" id='barCodeNum' style="margin-top:-40px"></div>
            
                        </div> --}}

                        {{-- <div class="col-md-4 d-flex align-items-end">
                            <label class="form-label" style="font-style: italic;">(Tekan enter untuk input data)</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control " placeholder="Absen" aria-describedby="basic-addon1" id="absensi">
                        </div> --}}
                        
                        {{-- <div class="row text-center">
                            <div class="col-12 d-flex justify-content-center pt-5">
                                <input type="text" class="form-control " placeholder="Absen" aria-label="Username" aria-describedby="basic-addon1" style="width: 30%" id="absensi">
                            </div>
                        </div> --}}

                    </div>
                </section>
                
                <div class="table-responsive container mb-3" id='logTableDiv'></div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    var k={{ $idj }}
    
    $.ajax({
        type:'json',
        method:'get',
        url:'/kelola-kegiatan/getStatusKegiatan',
        data: {
            "_token": "{{ csrf_token() }}",
            id:k           
        },
        success:function(data) {
            var sectionAbsen = document.getElementById("absenSection");
            var changeStatusKegiatan = document.getElementById("changeStatusKegiatan");
            if (data == 0)
            {
                sectionAbsen.style.display = "block";
                changeStatusKegiatan.textContent = "Selesai";
            }
            else
            {
                sectionAbsen.style.display= "none";
                changeStatusKegiatan.textContent = "Mulai";
            }
            // alert(data["table"]);
        },
        error: function(data){
            alert("fail");
            console.log(data);
        }
    });

    function input()
    {
        // document.getElementById('absensi').value = document.getElementById('jemaat').value;
        
        $.ajax({
            url: "{{ url('/tampil-data-jamaat-by-id_code') }}/" + document.getElementById('jemaat').value,
            method: 'GET',
            type: "JSON",
            success: function(data) {
                $.each(data.jamaat, function(nama, key) {
                    if (key.last_visit != null) {
                        var get_date = new Date(key.last_visit);
                        var date = get_date.getDate() + '-' + (get_date.getMonth() + 1) + '-' + get_date.getFullYear();
                        document.getElementById('last_visit_jamaat').innerHTML = date;
                    }
                    else {
                        document.getElementById('last_visit_jamaat').innerHTML = "-";
                    }
                })
            }
        });
    }
    
    function getDataTable()
    {
        $.ajax({
            type:'json',
            method:'get',
            url:'/kelola-kegiatan/kegiatan',
            data: {
                "_token": "{{ csrf_token() }}",
                id:k
            },
            success:function(data) {
                var dataList = document.getElementById("biodata");
                dataList.innerHTML = data["message"];

                var dataList = document.getElementById("acara");
                dataList.innerHTML = data["kegiatan"];

                var dataList = document.getElementById("status_acara");
                if (data["status_kegiatan"] > 0) {
                    dataList.innerHTML = "Tidak Berlangsung";
                }
                else { 
                    dataList.innerHTML = "Berlangsung";
                }

                // var photo_link = data["photo_link"];
                // var src_photo = `{{ asset('images/app_admin/kelola_kegiatan/foto_kegiatan/` + photo_link + `') }}`;
                // $("#foto_kegiatan").attr("src", src_photo);
                
                document.getElementById("logTableDiv").innerHTML = data["table"];
                // $('#logTable').DataTable({
                //     dom: 'Bfrtip',
                //     buttons: ['copy', 'csv', 'excel', 'pdf','print'],
                //     pagingType: 'full_numbers'
                // });

                $('#logTable').DataTable({
                    dom: 'lBfrtip',
                    responsive: true,
                    buttons: {
                        buttons: [
                            'spacer',
                            {
                                extend: 'copyHtml5',
                                exportOptions: {
                                    columns: [0, ':visible']
                                }
                            },
                            {
                                extend: 'spacer',
                                style: 'bar'
                            },
                            {
                                extend: 'csvHtml5',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            'print'
                        ]
                    }
                });

                // alert(data["table"]);
            },
            error: function(data){
                alert("fail");
                console.log(data);
            }
        });
    }
    $(document).ready(function() {
        getDataTable();
        setInterval(function () {
            getDataTable();
        },10000);
        
        // $('#jemaat').on('change', function () {
        //     document.getElementById('absensi').value = document.getElementById('jemaat').value;
        // });

        $('#generate').on('click', function (e) {
            e.preventDefault();
            var idJemaat = document.getElementById("jemaat").value;
            if(idJemaat=="")
            {
                Swal.fire
                ({
                    title: 'Gagal Generate!',
                    text: 'Silahkan pilih data sesuai.',
                    icon: 'error',
                    showConfirmButton: true,
                    allowOutsideClick: false
                });
            }
            else
            {
                $.ajax({
                    type:'GET',
                    url:'/kelola-kegiatan/generateQR',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        idJemaat: idJemaat              
                    },
                    success:function(data) {
                        if(data ==404)
                        {
                            Swal.fire
                            ({
                                title: 'Gagal Generate!',
                                text: 'Silahkan pilih data sesuai.',
                                icon: 'error',
                                showConfirmButton: true,
                                allowOutsideClick: false
                            });
                        }
                        else
                        {
                            document.getElementById("qrCode").innerHTML = data;
                            $.ajax({
                                type:'GET',
                                url:'/kelola-kegiatan/generateBarcode',
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    idJemaat: idJemaat              
                                },
                                success:function(data) {
                                    if(data ==404)
                                    {

                                    }
                                    else
                                    {
                                        document.getElementById("barCode").innerHTML = data;
                                        document.getElementById("barCodeNum").innerHTML = idJemaat;
                                    }
                                },
                                error: function(data){
                                    alert("Server Dalam Gangguan!");
                                }
                            });
                            // document.getElementById("barCode").innerHTML = data['barCode'];
                        }
                    },
                    error: function(data){
                        alert("Server Dalam Gangguan!");
                    }
                });

            }       
        });

        var input = document.getElementById("jemaat");
        input.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                    $.ajax({
                    type:'GET',
                    url:'/kelola-kegiatan/addAbsensiKegiatan',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        idJemaat: input.value,
                        idKegiatan:k              
                    },
                    success:function(data) {
                        input.value="";
                        //console.log(data);
                        // alert(data);
                        getDataTable();
                        if(data==200)
                        {
                            Swal.fire
                            ({
                                title: 'Berhasil!',
                                text: 'Jemaat telah terabsen.',
                                icon: 'success',
                                timer: 1000,
                                showConfirmButton: false,
                                allowOutsideClick: false
                            });
                            document.getElementById('jemaat').value = "";
                            document.getElementById('last_visit_jamaat').innerHTML = "";
                            
                        }else if(data==202)
                        {
                            Swal.fire
                            ({
                                title: 'Gagal!',
                                text: 'Jemaat sudah terabsen.',
                                icon: 'error',
                                timer: 1000,
                                showConfirmButton: false,
                                allowOutsideClick: false
                            });
                            document.getElementById('jemaat').value = "";
                            document.getElementById('last_visit_jamaat').innerHTML = "";
                        }else
                        {
                            Swal.fire
                            ({
                                title: 'Gagal!',
                                text: 'Jemaat tidak ditemukan.',
                                icon: 'error',
                                timer: 1000,
                                showConfirmButton: false,
                                allowOutsideClick: false
                            });
                            document.getElementById('jemaat').value = "";
                            document.getElementById('last_visit_jamaat').innerHTML = "";
                        }

                    },
                    error: function(data){
                        // alert(data);
                        console.log(data);
                        alert("Server Dalam Gangguan!");
                    }
                });
            }
        });

    });

</script>
@endsection
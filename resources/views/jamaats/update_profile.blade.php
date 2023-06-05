@extends('layouts.app_jamaat')
@section('css')
    <style>
        .carousel-control-next,
        .carousel-control-prev {
            filter: invert(100%);
            width: 40%;
        }

        .carousel-control-next-icon,
        .carousel-control-prev-icon {
            width: 5rem;
            height: 8rem;
        }

        .carousel-item img {
            width: 75%;
            height: 450px;
            display: block;
            margin: auto;
        }

        .isibox {
            color: white;
        }

        .navbar-dark .navbar-nav .nav-link {
            color: white;

        }

        .navbar-dark .navbar-nav .nav-link:hover {
            color: chocolate;

        }

        #qrCode {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        #qrCode:hover {
            opacity: 0.7;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 300px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(255, 255, 255);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.5);
            /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 300px;
        }

        /* Caption of Modal Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 300px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation */
        .modal-content,
        #caption {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        .close2 {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close2:hover,
        .close2:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <form action="/update-profile/update/{{ $id_code }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row d-flex justify-content-center mt-5">
                <div class="col-lg-3">
                    <div class="mb-3 mt-3 mx-5">
                        @if ($jamaats->foto_profile == '')
                            <img src="{{ asset('images/app_jamaat/profile-icon.jpg') }}" class="img-fluid mt-3 mb-3"
                                style="border-radius:150px ;" width="256px" height="256px">
                        @else
                            <img src="{{ asset('images/app_jamaat/foto_profile/' . $jamaats->foto_profile) }}"
                                class="img-fluid mt-3 mb-3" style="border-radius:150px ;" width="256px" height="256px">
                        @endif
                        <h5 style="margin-top: 15px;">{{ $jamaats->name }}</h5>
                    </div>
                    <div class="mb-3 mx-5">
                        <table>
                            <tr>
                                <td>
                                    <input name="foto_profile" style="border-radius: 3px;" class="form-control inp-img"
                                        type="file" id="ordinary" onchange="preview()" accept=".jpg,.jpeg,.png">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-lg-3 mx-5">
                    <div class="col-12 d-flex justify-content-center pt-5">
                        <img id="qrCode" src="data:image/png;base64,{{ $qr_code }}" alt="">
                        <div id="myModal" class="modal">
                            <span class="close">&times;</span>
                            <img class="modal-content" id="modalQrCode">
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center pt-5">
                        <img id="barCode" src="data:image/png;base64,{{ $barCode }}" alt="">
                        <div id="myModal2" class="modal">
                            <span class="close2">&times;</span>
                            <img class="modal-content" id="modalBarCode" width="1000px" height="40px">
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center pt-3">
                        <h5>{{ $jamaats->id_code }}</h5>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-5">
                <div class="col-lg-6 col-md-6 col-xs-6 px-6">
                    <hr style="border: 1px solid black;">
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 col-md-6 col-xs-6 px-6">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>
            {{-- <div class="row d-flex justify-content-center mt-5">
                <div class="col-lg-2 col-md-4 col-xs-4 px-4">
                    <p><b>ID Code Umat</b></p>
                </div>
                <div class="col-lg-4 col-md-8 col-xs-8 px-4">
                    <input name="id_code" type="text" value="{{ $jamaats->id_code }}" class="form-control" id="ordinary"
                        aria-describedby="emailHelp" readonly>
                </div>
            </div> --}}
            <div class="row d-flex justify-content-center mt-4">
                <div class="col-lg-2 col-md-4 col-xs-4 px-4">
                    <p><b>Nama</b></p>
                </div>
                <div class="col-lg-4 col-md-8 col-xs-8 px-4">
                    <input name="nama_baru" type="text" value="{{ $jamaats->name }}" class="form-control" id="ordinary"
                        aria-describedby="emailHelp">
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-2">
                <div class="col-lg-2 col-md-4 col-xs-4 px-4">
                    <p><b>No Handphone 1</b></p>
                </div>
                <div class="col-lg-4 col-md-8 col-xs-8 px-4">
                    <input name="no_handphone_1" type="tel" value="{{ $jamaats->no_handphone_1 }}" class="form-control"
                        id="ordinary" aria-describedby="phone number" required>
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-2">
                <div class="col-lg-2 col-md-4 col-xs-4 px-4">
                    <p><b>No Handphone 2</b></p>
                </div>
                <div class="col-lg-4 col-md-8 col-xs-8 px-4">
                    <input name="no_handphone_2" type="tel" value="{{ $jamaats->no_handphone_2 }}" class="form-control"
                        id="ordinary" aria-describedby="phone number">
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-2">
                <div class="col-lg-2 col-md-4 px-4">
                    <p><b>Golongan Darah</b></p>
                </div>
                <div class="col-lg-4 col-md-8 px-4">
                    <select name="gol_darah" class="form-select" id="ordinary"
                        aria-label="Example select with button addon">
                        @php
                            $status = ['A', 'B', 'AB', 'O'];
                        @endphp
                        @foreach ($status as $st)
                            @if ($st != $jamaats->gol_darah)
                                <option value="{{ $st }}">{{ $st }}</option>
                            @else
                                <option selected value="{{ $st }}">{{ $st }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-2">
                <div class="col-lg-2 col-md-4 px-4">
                    <p><b>Jenis Kelamin</b></p>
                </div>
                <div class="col-lg-4 col-md-8 px-4">
                    <select name="jenis_kelamin" class="form-select" id="ordinary"
                        aria-label="Example select with button addon">
                        @php
                            $status = ['Laki-laki', 'Perempuan'];
                        @endphp
                        @foreach ($status as $st)
                            @if ($st != $jamaats->jenis_kelamin)
                                <option value="{{ $st }}">{{ $st }}</option>
                            @else
                                <option selected value="{{ $st }}">{{ $st }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-2">
                <div class="col-lg-2 col-md-4 px-4">
                    <p><b>Email</b></p>
                </div>
                <div class="col-lg-4 col-md-8 px-4">
                    <input name="email" type="email" value="{{ $jamaats->email }}" class="form-control"
                        id="ordinary" aria-describedby="emailHelp" readonly>
                </div>
            </div>

            <div class="row d-flex justify-content-center mt-2">
                <div class="col-lg-2 col-md-4 px-4">
                    <p><b>Tempat Lahir</b></p>
                </div>
                <div class="col-lg-4 col-md-8 px-4">
                    <input name="tempat_lahir" type="text" value="{{ $jamaats->tempat_lahir }}" class="form-control"
                        id="ordinary" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-2">
                <div class="col-lg-2 col-md-4 px-4">
                    <p><b>Tanggal Lahir</b></p>
                </div>
                <div class="col-lg-4 col-md-8 px-4">
                    <input name="tanggal_lahir" type="date" value="{{ $jamaats->tanggal_lahir }}"
                        class="form-control" id="ordinary" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-2">
                <div class="col-lg-2 col-md-4 px-4">
                    <p><b>Alamat</b></p>
                </div>
                <div class="col-lg-4 col-md-8 px-4">
                    <textarea name="alamat" class="form-control" id="ordinary" aria-describedby="emailHelp">{{ $jamaats->alamat }}</textarea>
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-2">
                <div class="col-lg-2 col-md-4 px-4">
                    <p><b>Kelurahan/Kecamatan</b></p>
                </div>
                <div class="col-lg-4 col-md-8 px-4">
                    <input name="kelurahan_kecamatan" type="text" class="form-control"
                        value="{{ $jamaats->kelurahan_kecamatan }}" id="ordinary" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-2">
                <div class="col-lg-2 col-md-4 px-4">
                    <p><b>Kabupaten/Kota</b></p>
                </div>
                <div class="col-lg-4 col-md-8 px-4">
                    <input name="kabupaten_kota" type="text" class="form-control"
                        value="{{ $jamaats->kabupaten_kota }}" id="ordinary" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-2">
                <div class="col-lg-2 col-md-4 px-4">
                    <p><b>RT/RW</b></p>
                </div>
                <div class="col-lg-4 col-md-8 px-4">
                    <input name="rt_rw" type="text" class="form-control" value="{{ $jamaats->rt_rw }}"
                        id="ordinary" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-2">
                <div class="col-lg-2 col-md-4 px-4">
                    <p><b>Bidang Usaha</b></p>
                </div>
                <div class="col-lg-4 col-md-8 px-4">
                    <input name="bidang_usaha" type="text" value="{{ $jamaats->bidang_usaha }}" class="form-control"
                        id="ordinary" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-2">
                <div class="col-lg-2 col-md-4 px-4">
                    <p><b>Pekerjaan</b></p>
                </div>
                <div class="col-lg-4 col-md-8 px-4">
                    <input name="pekerjaan" type="text" value="{{ $jamaats->pekerjaan }}" class="form-control"
                        id="ordinary" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-5 mb-5">
                <button type="submit" class="btn btn-primary mt-2"
                    style="background-color:#D09222; border: #D09222; width: auto;">Simpan Perubahan</button>
            </div>
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-lg-6 col-md-6 col-xs-6 px-6">
                    <hr style="border: 1px solid black;">
                </div>
            </div>
            <div class="container text-center mt-3">
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <h5><b>Riwayat Kegiatan</b></h5>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-3 mb-5">
                <div class="col-lg-6 col-md-6 col-xs-6 px-6">
                    <div class="table-responsive container">
                        <table id="daftarRiwayatKegiatanUmat" class="table" style="width:100%"">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 10%; text-align: center">No</th>
                                    <th scope="col" style="width: 90%">Nama Kegiatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 0;
                                @endphp
                                @for ($i = 0; $i < count($kegiatans); $i++)
                                    <tr>
                                        <th scope="row" style="text-align: center">{{ ++$no }}</th>
                                        <td>{{ $kegiatans[$i] }}</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#daftarRiwayatKegiatanUmat').DataTable({
                responsive: true
            });

        });

        var _URL = window.URL || window.webkitURL;
        $(".inp-img").change(function(e) {
            var file, img;
            if ((file = this.files[0])) {
                img = new Image();
                var objectUrl = _URL.createObjectURL(file);
                img.onload = function() {
                    if (this.width != 256 || this.height != 256) {
                        alert('Ukuran gambar harus 256x256px.');
                        $(".inp-img").val('');
                    }
                    _URL.revokeObjectURL(objectUrl);
                };
                img.src = objectUrl;
            }
        });

        // Show QR-Code as Modal
        var modal = document.getElementById("myModal");
        var modal2 = document.getElementById("myModal2");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var imgQrCode = document.getElementById("qrCode");
        var imgBarCode = document.getElementById("barCode");
        var modalQrCode = document.getElementById("modalQrCode");
        var modalBarCode = document.getElementById("modalBarCode");

        imgQrCode.onclick = function() {
            modal.style.display = "block";
            modalQrCode.src = this.src;
        }
        imgBarCode.onclick = function() {
            modal2.style.display = "block";
            modalBarCode.src = this.src;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        var span2 = document.getElementsByClassName("close2")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
        span2.onclick = function() {
            modal2.style.display = "none";
        }
    </script>
@endsection

<?php
require "session.php";
include_once "head.html";
$_SESSION['pagename']="";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body{
            background-color: rgb(212, 115, 110);
            color: white;
        }
        .iq-card{
            background-color:rgb(69, 13, 13);
        }
        h1,p{
            margin: 0;
            padding: 0;
        }
        input[type=button]:hover{
            text-decoration:underline;
            
        }
    </style>
</head>
<body>

    <div class="wrapper">
        <div class="container justify-content-center align-items-center text-center" >
            <div class="iq-card">
                <div class="row justify-content-center align-items-center text-center">
                    <div class="col-sm-3">
                        <div class="iq-card-body">
                            <div class="row">
                                <div class="col">
                                    <h1>FERTO GROUP</h1>
                                    <p>(Vinilon Group)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="iq-card-body">
                            <div class="row">
                                <div class="col text-left">
                                    <h4>Buat Akun Baru</h4>
                                    <hr>
                                </div>
                            </div>
                            <form>
                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <input type="text" id="" class="form-control" placeholder="Masukkan Nama Depan">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <input type="text" id="" class="form-control" placeholder="Masukkan Nama Belakang">
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <input type="text" id="" class="form-control" placeholder="Masukkan Nomor Telepon">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <input type="text" id="" class="form-control" placeholder="Masukkan Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <input class="form-control" id="date" name="date" placeholder="Masukkan Tanggal Lahir" type="text" readonly="readonly" style="background-color:white"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <select class="form-control" style="height:45px">
                                                <option>Masukkan Jenis Kelamin</option>
                                                <option>Pria</option>
                                                <option>Wanita</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="row form-group">
                                    <div class="col-sm">
                                        <div class="input-group">
                                            <input type="text" id="" class="form-control" placeholder="Masukkan Username">
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm">
                                        <div class="input-group">
                                            <input type="password" id="" class="form-control" placeholder="Masukkan Password Baru">
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm">
                                        <div class="input-group">
                                            <input type="password" id="" class="form-control" placeholder="Masukkan Kembali Password Baru">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm" style="text-align:left; color:yellow;">
                                        Digunakan Untuk Pemulihan Kata Sandi
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm">
                                        <div class="input-group">
                                            <select class="form-control" style="height:45px">
                                                <option>Apa Warna Kesukaanmu?</option>
                                                <option>Siapakah Nama Orang Tuamu?</option>
                                                <option>Anda Merupakan Anak Dari Berapa Bersaudara?</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm">
                                        <div class="input-group">
                                            <input type="text" id="" class="form-control" placeholder="Masukkan Jawabanmu Disini">
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm text-center">
                                        <button type="button" class="btn" style="background-color:green; color:white; width:50%; font-size:20px" onclick="location.href=''">Daftar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>      
        $(document).ready(
            function(){
                $('#sidebarcollapse').on('click',function(){
                    $('#sidebar').toggleClass('active');
                });
            }
        )

        $(document).ready(function () {
            var date_input = $('input[name="date"]'); //our date input has the name "date"
            var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
            var options = {
                format: 'mm/dd/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            };
            date_input.datepicker(options);
        });
    </script>
</body>
</html>

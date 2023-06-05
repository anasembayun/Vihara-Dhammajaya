<?php
require "session.php";
include_once "head.html";
$_SESSION['pagename']="";
?>

<!DOCTYPE html>
<html lang="en">
<body>

    <div class="wrapper">
        <?php include_once "sidebar.html"?>
            <div class="container">
                    <nav>
                        <div class="row">
                            <div class="col-sm">
                                <button type="button" id="sidebarcollapse" class="btn btn-info">
                                    <i class="fas fa-align-left"></i>
                                    <span>Menu</span>
                                </button>
                            </div>
                            <div class="col-sm">
                                <h2>    
                                    <?php echo $_SESSION['pagename'];?>
                                </h2>
                            </div>
                        </div>
                    </nav>
                    <div class="container justify text-center">
                        <div class="d-flex justify-content-between">
                            <div class="container">
                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col-sm">
                                        <h4 style="text-align:left;">Tambah Master Periode Undian</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="iq-card">
                            <div class="iq-card-body">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <label class="control-label col-sm-2 align-self-center mb-0 labelclass">Nama Program:</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="" placeholder="Masukkan Nama Program">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-2 align-self-center mb-0 labelclass">Periode Program:</label>
                                        <div class="col-sm">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="background-color:white;"><i class="fa fa-calendar-o"></i></span>
                                                </div>
                                                <input class="form-control form-control-sm" id="" name="date" placeholder="Masukkan Tanggal Mulai" type="text" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="background-color:white;"><i class="fa fa-calendar-o"></i></span>
                                                </div>
                                                <input class="form-control form-control-sm" id="" name="date" placeholder="Masukkan Tanggal Selesai" type="text" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-2 align-self-center mb-0 labelclass">Konversi Nilai Kupon:</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">IDR</span>
                                                </div>
                                                <input class="form-control form-control-sm" id="" placeholder="Masukkan Konversi Nilai Kupon" type="number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-2 mb-0 labelclass">Keterangan:</label>
                                        <div class="col-sm-10">
                                        <textarea class="form-control " rows="3" id="" placeholder="Masukkan Keterangan Program"></textarea>
                                        </div>
                                    </div>                                    
                            </div>
                        </div>
                        <div class="iq-card">
                            <div class="iq-card-body">
                                <div class="form-group row text-left align-items-center">
                                <div class="col-sm-4">
                                    <button type="button" class="btn btn-info" onclick="location.href='add-detail-hadiah.php'">+ Tambah Detail Hadiah</button>
                                </div>
                                </div>
                                <table id="mytable" class="table table-hover table-striped table-light" style="text-align:left;">
                                    <thead>
                                        <tr>
                                            <th scope="col">Hadiah</th>
                                            <th scope="col">Kuantitas</th>
                                            <th scope="col">Tanggal Pengundian</th>
                                            <th scope="col">Pengundian ke-</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Sudah Diundi/Belum</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="showdata">
                                        <tr>
                                            <td class="align-middle">Hadiah 1</td>
                                            <td class="align-middle">10</td>
                                            <td class="align-middle">15 Juli 2022</td>
                                            <td class="align-middle">1</td>
                                            <td class="align-middle">Keterangan hadiah 1</td>
                                            <td class="align-middle">Sudah</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <button type="button" class="btn btn-warning btn-sm mr-1 " onclick="location.href='edit-detail-hadiah.php'"><i class="fa fa-edit"></i></button>
                                                    </div>
                                                    <div class="col-3">
                                                        <button type="button" class="btn btn-danger btn-sm " ><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">Hadiah 2</td>
                                            <td class="align-middle">15</td>
                                            <td class="align-middle">16 Juli 2022</td>
                                            <td class="align-middle">2</td>
                                            <td class="align-middle">Keterangan hadiah 2</td>
                                            <td class="align-middle">Belum</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <button type="button" class="btn btn-warning btn-sm mr-1 "onclick="location.href='edit-detail-hadiah.php'"><i class="fa fa-edit"></i></button>
                                                    </div>
                                                    <div class="col-3">
                                                        <button type="button" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm text-right">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>
                        </form>
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

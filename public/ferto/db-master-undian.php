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
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-sm">
                                        <h4 style="text-align:left;">Master Periode Pengundian</h4>
                                    </div>
                                    <div class="col-sm">
                                        <button type="button" class="btn btn-success">
                                            <i class="fa fa-file-excel-o"></i>
                                            <span>Import</span>
                                        </button>
                                        <button type="button" class="btn btn-primary">
                                            <i class="fa fa-file-excel-o"></i>
                                            <span>Export</span>
                                        </button>
                                    </div>
                                    <div class="col-sm text-right">
                                        <button type="button" class="btn btn-primary" onclick="location.href='form-master-undian.php'">
                                            <span>+ Tambah Periode Undian</span>
                                        </button>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>

                        <!-- <div class="iq-card">
                            <div class="iq-card-body">
                                <div class="col text-left">
                                    <div class="row">
                                        <div class="col">
                                            <label class="labelclass">Nama Program:</label>
                                            <input type="text" id="" class="form-control" placeholder="Masukkan Nama Program">
                                        </div>
                                        <div class="col" style="padding-right:32px">
                                            <label class="labelclass">Periode:</label>
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" name="date" id="" class="form-control" placeholder="Periode Mulai" readonly>
                                                </div>
                                                <div class="col">
                                                    <input type="text" name="date" id="" class="form-control" placeholder="Periode Akhir" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col" style="padding-right:32px">
                                            <label class="labelclass"> &#8203</label>
                                            <button type="button" class="form-control btn btn-primary" onclick="#">
                                                <span>Cari</span>
                                            </button>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div> -->

                        <div class="iq-card">
                            <div class="iq-card-body">
                                <div class="form-group row text-left justify-content-between align-items-center">
                                    <div class="col-sm-3">
                                        <div class="row">
                                            <div class="col">
                                                &nbsp
                                            </div>
                                        </div>
                                        <div class="row">    
                                            <div class="col-sm">
                                            <form class="position-relative" style="margin-right:8px;">
                                                <div class="form-group mb-0">
                                                <input type="text" class="form-control todo-search" id="" placeholder="Cari Nama Program">
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>    
                                    <div class="col-sm-3">
                                        <div class="row">
                                            <div class="col">
                                                Periode Tanggal Belanja
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" style="background-color:white;"><i class="fa fa-calendar-o"></i></span>
                                                    </div>
                                                    <input class="form-control form-control-sm" id="" name="date" placeholder="Masukkan Tanggal Mulai" type="text" readonly="readonly">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="row">
                                            <div class="col">
                                                &nbsp
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" style="background-color:white;"><i class="fa fa-calendar-o"></i></span>
                                                    </div>
                                                    <input class="form-control form-control-sm" id="" name="date" placeholder="Masukkan Tanggal Mulai" type="text" readonly="readonly">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="row">
                                            <div class="col">
                                                &nbsp
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm">
                                            <form class="position-relative" style="margin-right:8px;">
                                                <div class="form-group mb-0">
                                                <button type="button" class="form-control btn btn-primary" id="">Cari</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table id="mytable" class="table table-hover table-striped table-light" style="text-align:left;">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nama Program</th>
                                            <th scope="col">Periode</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Total Pengundian</th>                                                        
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="showdata">
                                        <tr>
                                            <td class="align-middle">Program 1</td>
                                            <td class="align-middle">Juli 2022 - Agustus 2022</td>
                                            <td class="align-middle">Keterangan Program 1</td>
                                            <td class="align-middle">2</td>
                                            <td class="align-middle">
                                                <div class="row">
                                                    <div class="col-3">
                                                    <button class="btn btn-warning btn-sm" onclick="location.href='edit-form-master-undian.php'"><i class="fa fa-edit"></i></button>
                                                    </div>
                                                    <div class="col-3">
                                                        <button type="button" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">Program 2</td>
                                            <td class="align-middle">Agustus 2022 - September 2022</td>
                                            <td class="align-middle">Keterangan Program 2</td>
                                            <td class="align-middle">2</td>
                                            <td class="align-middle">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <button class="btn btn-warning btn-sm" onclick="location.href='edit-form-master-undian.php'"><i class="fa fa-edit"></i></button>
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

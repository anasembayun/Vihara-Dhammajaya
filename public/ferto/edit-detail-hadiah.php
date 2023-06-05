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
                    <div class="container justify text-left">
                        <div class="d-flex justify-content-between">
                            <div class="container">
                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col-sm">
                                        <h4 style="text-align:left;">Edit Hadiah</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <form>
                            <div class="form-group">
                                <div class="row">
                                <div class="col-sm-2">
                                        <label for="exampleInputFirstName" class="text">Nama Hadiah</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="firstname" class="form-control textField" id=""
                                            placeholder="Masukkan Nama Hadiah">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                    <label for="exampleInputLastName" class="text">Kuantitas</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control textField" id=""
                                            placeholder="Masukkan Kuantitas Hadiah">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Alamat" class="col-sm-2 col-form-label">Keterangan Hadiah</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="" rows="3" placeholder="Masukkan Keterangan Hadiah"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Tanggal Belanja" class="col-sm-2 col-form-label">Tanggal Pengundian Hadiah</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="background-color:white;"><i class="fa fa-calendar-o"></i></span>
                                        </div>
                                        <input type="text" name="date" class="form-control" id="" placeholder="Masukkan Tanggal Pengundian Hadiah" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                    <label for="exampleInputLastName" class="text">Urutan Pengundian</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control textField" id=""
                                            placeholder="Masukkan Urutan Pengundian Hadiah">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label for="exampleInputLastName" class="text">Gambar Hadiah</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="col-sm">
                                            <input type="file" class="custom-file-input" id="pictfile">
                                            <label class="custom-file-label" for="pictfile">Pilih Gambar</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group text-right">
                                <input type="submit" onclick="nextpage()" class="btn btn-primary submit" value="Edit">
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

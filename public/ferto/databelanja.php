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
            <div class="container">
                <div class="class text-right">
                    <button type="submit" class="btn btn-primary text-right" onclick="location.href='inputData_Belanja.php'"
                        style="background-color:rgba(52, 25, 80, 1);">Input Data Belanja</button>
                </div>

                <div class="container" style="text-align:left">
                    <!-- <div id="rcorners1"> -->
                    <form action="#">
                        <div class="form-row align-items-center">
                            <div class="col">
                                <div class="form-group">
                                    <label for="Periode Undian">Periode Undian:</label>
                                    <select class="selectpicker form-control" data-live-search="true" data-width="100%">
                                        <option value="" disabled selected hidden>Pilih Nama Pegawai</option>
                                        <option>Pegawai 1</option>
                                        <option>Pegawai 2</option>
                                        <option>Pegawai 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="No. HP">No. HP:</label>
                                    <input type="text" class="form-control" id="No. HP" placeholder="No. HP">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="Toko">Toko:</label>
                                    <input type="text" class="form-control form-control-sm" id="No. HP" placeholder="Toko">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="Awal">Periode Tanggal Belanja:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="background-color:white;"><i class="fa fa-calendar-o"></i></span>
                                        </div>
                                        <input class="form-control form-control-sm" id="" name="date" placeholder="Masukkan Tanggal Mulai" type="text" readonly="readonly">
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top: 15px">
                                S/D
                            </div>
                            <div class="col">
                                <div class="form-group">
                                <label for="Akhir">&nbsp;</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="background-color:white;"><i class="fa fa-calendar-o"></i></span>
                                        </div>
                                        <input class="form-control form-control-sm" id="" name="date" placeholder="Masukkan Tanggal Mulai" type="text" readonly="readonly">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" style="width:25%;">Cari</button>
                        </div>
                        <br>
                    </form>
                    <!-- </div> -->
                </div>

                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col grid-margin">
                        <div class="iq-card">

                            <div class="iq-card-body ">
                                <div class="table-responsive-xl" style="overflow: scroll;">
                                    <table
                                        class="table table-hover table-striped table-light display sortable table-responsive text-nowrap"
                                        cellspacing="0" id="myTable">
                                        <thead class="custom-thead-bg">
                                            <tr>
                                                <th>No</th>
                                                <th>Periode Undian</th>
                                                <th>No. HP</th>
                                                <th>Nama</th>
                                                <th>Toko</th>
                                                <th>Tanggal Belanja</th>
                                                <th>Nilai Belanja</th>
                                                <th>Kupon</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>5 Juli 2010</td>
                                                <td>08123238482</td>
                                                <td>Hendro</td>
                                                <td>UD Maju Jaya</td>
                                                <td>20 Juni 2010</td>
                                                <td>Rp 1.000.000</td>
                                                <td>5</td>
                                                <td class="align-middle">
                                                    <div class='btn-group'>
                                                        <button type='button' class='btn btn-edit' onclick="location.href='editDbCustomer.php'"  style='color: #FDBE33;'>
                                                            <i class='fas fa-edit'></i>&nbspEdit</button>
                                                        <button type='button' class='btn btn-remove' data-toggle='modal'
                                                            data-target='#mmMyModal' style='color: grey;'>
                                                            <i class='fas fa-trash'></i>&nbspRemove</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>5 Juli 2010</td>
                                                <td>08123238482</td>
                                                <td>Hendro</td>
                                                <td>UD Maju Jaya</td>
                                                <td>20 Juni 2010</td>
                                                <td>Rp 1.000.000</td>
                                                <td>5</td>
                                                <td class="align-middle">
                                                    <div class='btn-group'>
                                                        <button type='button' class='btn btn-edit' onclick="location.href='editDbCustomer.php'"  style='color: #FDBE33;'>
                                                            <i class='fas fa-edit'></i>&nbspEdit</button>
                                                        <button type='button' class='btn btn-remove' data-toggle='modal'
                                                            data-target='#mmMyModal' style='color: grey;'>
                                                            <i class='fas fa-trash'></i>&nbspRemove</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>5 Juli 2010</td>
                                                <td>08123238482</td>
                                                <td>Hendro</td>
                                                <td>UD Maju Jaya</td>
                                                <td>20 Juni 2010</td>
                                                <td>Rp 1.000.000</td>
                                                <td>5</td>
                                                <td class="align-middle">
                                                    <div class='btn-group'>
                                                        <button type='button' class='btn btn-edit' onclick="location.href='editDbCustomer.php'"  style='color: #FDBE33;'>
                                                            <i class='fas fa-edit'></i>&nbspEdit</button>
                                                        <button type='button' class='btn btn-remove' data-toggle='modal'
                                                            data-target='#mmMyModal' style='color: grey;'>
                                                            <i class='fas fa-trash'></i>&nbspRemove</button>
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
            </div>
            <!-- Modal Remove Account -->
            <div class="modal fade" id="mmMyModal" role="dialog" style="border-radius:45px">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header" style="background:rgba(52, 25, 80, 1); color:white;">
                                                    <p id="employeeidname" style="font-weight: bold;">Hendro</p>
                                                    <button type="button" class="close" data-dismiss="modal" style="color:white;">×</button>
                                                </div>

                                                <div class="modal-body">
                                                    <button id="btnModalBiodata" onclick="msuccess('remove')" style="text-align:left">
                                                        <a style="color: rgba(3, 15, 39, 1);">
                                                            <i class='fas fa-edit'></i>&nbspRemove Data Belanja</a></button>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

        </div>
    </div>
    </div>

    <script>
        $(document).ready(
            function () {
                $('#sidebarcollapse').on('click', function () {
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
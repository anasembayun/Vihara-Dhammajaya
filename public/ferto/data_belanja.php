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
                                        <h4 style="text-align:left;">Data Belanja</h4>
                                    </div>
                                    <div class="col-sm text-right">
                                        <button type="button" class="btn btn-primary" onclick="location.href='inputData_Belanja.php'">
                                            <span>+ Tambah Data Belanja</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="iq-card">
                            <div class="iq-card-body">
                                <div class="form-group row text-left align-items-center">
                                    <div class="col-sm-2">
                                        <div class="row">
                                            <div class="col">
                                                Periode Undian
                                            </div>
                                        </div>
                                        <div class="row" >
                                            <div class="col" >
                                                <select id="" class="form-control selectpicker">
                                                    <option value="" selected disabled>Pilih Periode</option>
                                                    <option value="">Juli 2022 - Agustus 2022</option>
                                                    <option value="">Agustus 2022 - September 2022</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="row">
                                            <div class="col">
                                                Keyword
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm">
                                                <form class="position-relative" style="margin-right:8px;">
                                                    <div class="form-group mb-0">
                                                        <input type="text" class="form-control todo-search" id="" placeholder="">
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
                                        &nbsp
                                        <div class="row">
                                            <div class="col-sm">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" style="background-color:white;"><i class="fa fa-calendar-o"></i></span>
                                                    </div>
                                                    <input class="form-control form-control-sm" id="" name="date" placeholder="Masukkan Tanggal Selesai" type="text" readonly="readonly">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 text-right">
                                        &nbsp
                                        <div class="row">
                                            <div class="col-sm">
                                                <button type="button" class="form-control btn btn-primary" onclick="location.href='inputData_Belanja.php'">
                                                    <span>Cari</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-hover table-striped table-light table-responsive text-nowrap text-left" id="myTable">
                                    <thead class="custom-thead-bg">
                                        <tr>
                                            <th>Aksi</th>
                                            <th>Kode Transaksi</th>
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
                                            <td>
                                                <div class='btn-group'>
                                                    <button type='button' class='btn btn-edit' onclick="location.href='editdata_belanja.php'"  style='color: #FDBE33;'>
                                                        <i class='fas fa-edit'></i>&nbspEdit</button>
                                                    <button type='button' class='btn btn-remove' data-toggle='modal'
                                                        data-target='#modaldelete' style='color: grey;'>
                                                        <i class='fas fa-trash'></i>&nbspRemove</button>
                                                </div>
                                            </td>
                                            <td class="align-middle">DB12563</td>
                                            <td class="align-middle">Juli 2021 - Agustus 2021</td>
                                            <td class="align-middle">08123238482</td>
                                            <td class="align-middle">Alvanja</td>
                                            <td class="align-middle">UD Maju Jaya</td>
                                            <td class="align-middle">21 Juli 2021</td>
                                            <td class="align-middle">IDR 500.000</td>
                                            <td>
                                                <button type='button' class='btn btn-link' data-toggle='modal' data-target='#modalkupon' style='color: black;text-decoration:underline;'>5 kupon
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Modal kupon-->
                        <div class="modal fade" id="modalkupon" role="dialog" style="border-radius:45px">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header" style="background:rgba(52, 25, 80, 1); color:white;">
                                        <p id="employeeidname" style="font-weight: bold;">Kupon Belanja</p>
                                        <button type="button" class="close" data-dismiss="modal" style="color:white;">×</button>
                                    </div>

                                    <div class="modal-body text-left">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-4">
                                                    Kode Transaksi
                                                </div>
                                                <div class="col-1">
                                                    :
                                                </div>
                                                <div class="col-2">
                                                    DB12563
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    Nama
                                                </div>
                                                <div class="col-1">
                                                    :
                                                </div>
                                                <div class="col-2">
                                                    Alvanja
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    No Hp
                                                </div>
                                                <div class="col-1">
                                                    :
                                                </div>
                                                <div class="col-2">
                                                    08123238482
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    Jumlah Kupon
                                                </div>
                                                <div class="col-1">
                                                    :
                                                </div>
                                                <div class="col-2">
                                                    5
                                                </div>
                                        </div>
                                        </div>
                                        <div class="iq-card">
                                            <div class="iq-card-body">
                                                <div class="form-group row text-left justify-content-between align-items-center">
                                                    <table class="table table-hover table-striped table-light text-nowrap text-left" id="myTable">
                                                        <thead class="custom-thead-bg">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Kode Kupon</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>XZ78786KJL</td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>XZ78786KJL</td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>XZ78786KJL</td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>XZ78786KJL</td>
                                                            </tr>
                                                            <tr>
                                                                <td>5</td>
                                                                <td>XZ78786KJL</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal delete-->
                        <div class="modal fade" id="modaldelete" role="dialog" style="border-radius:45px">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header" style="background:rgba(52, 25, 80, 1); color:white;">
                                        <p id="employeeidname" style="font-weight: bold;">Hapus Data Belanja</p>
                                        <button type="button" class="close" data-dismiss="modal" style="color:white;">×</button>
                                    </div>

                                    <div class="modal-body text-left">
                                        <div class="form-group row">
                                            <div class="col">
                                                Hapus data belanja berikut :
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-4">
                                                    Kode Transaksi
                                                </div>
                                                <div class="col-1">
                                                    :
                                                </div>
                                                <div class="col-2">
                                                    XXXXXXX
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    Periode Undian
                                                </div>
                                                <div class="col-1">
                                                    :
                                                </div>
                                                <div class="col-2">
                                                    XXXXXXX
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    Tanggal Belanja
                                                </div>
                                                <div class="col-1">
                                                    :
                                                </div>
                                                <div class="col-2">
                                                    XXXXXXX
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    Toko
                                                </div>
                                                <div class="col-1">
                                                    :
                                                </div>
                                                <div class="col-2">
                                                    XXXXXXX
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    Nomor HP
                                                </div>
                                                <div class="col-1">
                                                    :
                                                </div>
                                                <div class="col-2">
                                                    XXXXXXX
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    Nama Lengkap
                                                </div>
                                                <div class="col-1">
                                                    :
                                                </div>
                                                <div class="col-2">
                                                    XXXXXXX
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    Alamat Domisili
                                                </div>
                                                <div class="col-1">
                                                    :
                                                </div>
                                                <div class="col-2">
                                                    XXXXXXX
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    Kelurahan
                                                </div>
                                                <div class="col-1">
                                                    :
                                                </div>
                                                <div class="col-2">
                                                    XXXXXXX
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    Kecamatan
                                                </div>
                                                <div class="col-1">
                                                    :
                                                </div>
                                                <div class="col-2">
                                                    XXXXXXX
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    Kota/Kabupaten
                                                </div>
                                                <div class="col-1">
                                                    :
                                                </div>
                                                <div class="col-2">
                                                    XXXXXXX
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    Kode Pos
                                                </div>
                                                <div class="col-1">
                                                    :
                                                </div>
                                                <div class="col-2">
                                                    XXXXXXX
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    Total Nilai Belanja
                                                </div>
                                                <div class="col-1">
                                                    :
                                                </div>
                                                <div class="col-2">
                                                    XXXXXXX
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col text-center">
                                                <button type="button" class="btn btn-secondary" onclick="">Batal</button>
                                                <button type="button" class="btn btn-danger" onclick="">Hapus</button>
                                            </div>
                                        </div>
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
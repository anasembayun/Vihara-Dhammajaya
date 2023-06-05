<?php
require "session.php";
include_once "head.html";
$_SESSION['pagename']="";
?>

<head>
    <style>
    </style>
</head>

<!DOCTYPE html>
<html>


<body>
    <div class="wrapper">
        <?php include_once "sidebar.html";?>
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
                        <div class="row d-flex align-items-center">
                            <div class="col-sm-4" style="text-align:left;">
                                <h4 style="text-align:left;">Database Pemenang</h4>
                            </div>
                            <div class="col-sm text-left">
                                <button type="button" class="btn btn-success">
                                    <i class="fa fa-file-excel-o"></i>
                                    <span>Import</span>
                                </button>
                                <button type="button" class="btn btn-primary">
                                    <i class="fa fa-file-excel-o"></i>
                                    <span>Export</span>
                                </button>
                                <button type='button' class='btn btn-primary'><i class='fa fa-print'></i> Cetak</button>
                            </div>
                            <!-- <div class="col-sm text-right">
                                <button type="button" class="btn btn-primary"
                                    onclick="location.href='addDbPemenang.php'">
                                    <span>+ Tambah Database Pemenang</span>
                                </button>
                            </div> -->
                        </div>
                    </div>
                </div>
                <hr>
                <div class="iq-card">
                    <div class="iq-card-body">
                        <div class="form-group row text-left justify-content-between align-items-center">
                            <div class="col-sm-3">
                                <div class="row">
                                    <div class="col">
                                        <select id="" class="form-control selectpicker">
                                            <option value="" selected disabled>Pilih Periode</option>
                                            <option value="">Juli 2022 - Agustus 2022</option>
                                            <option value="">Agustus 2022 - September 2022</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="row">
                                    <div class="col-sm">
                                    <form class="position-relative" style="margin-right:8px;">
                                        <div class="form-group mb-0">
                                        <input type="text" class="form-control todo-search" id="" placeholder="Cari Nama Pemenang">
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>                                    
                        </div>
                        <table id="mytable" class="table table-hover table-striped table-light text-nowrap"
                            style="text-align:left;">
                            <thead>
                                <tr id="_judul" onkeyup="_filter()" id="myFilter">
                                    <th scope="col">ID</th>
                                    <th scope="col">Nama Pemenang</th>
                                    <th scope="col">Periode</th>
                                    <th scope="col">Hadiah</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-middle">H1</td>
                                    <td>
                                        Hendro
                                    </td>
                                    <td class="align-middle">Juli 2022 - Agustus 2022</td>
                                    <td class="align-middle">Televisi 14 inch</td>
                                    <td class="align-middle">
                                        <div class='btn-group'>
                                            <button type='button' class='btn btn-edit'
                                                onclick="location.href='editDbPemenang.php'" style='color: #FDBE33;'>
                                                <i class='fas fa-edit'></i>&nbspEdit</button>
                                            <button type='button' class='btn btn-remove' data-toggle='modal'
                                                data-target='#mmMyModal' style='color: grey;'>
                                                <i class='fas fa-trash'></i>&nbspRemove</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">H2</td>
                                    <td>
                                        Setiawan
                                    </td>
                                    <td class="align-middle">Juli 2022 - Agustus 2022</td>
                                    <td class="align-middle">Iphone 13 Pro Max</td>
                                    <td class="align-middle">
                                        <div class='btn-group'>
                                            <button type='button' class='btn btn-edit'
                                                onclick="location.href='editDbPemenang.php'" style='color: #FDBE33;'>
                                                <i class='fas fa-edit'></i>&nbspEdit</button>
                                            <button type='button' class='btn btn-remove' data-toggle='modal'
                                                data-target='#mmMyModal' style='color: grey;'>
                                                <i class='fas fa-trash'></i>&nbspRemove</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle"> H3</td>
                                    <td>
                                        Hendro
                                    </td>
                                    <td class="align-middle">Juli 2022 - Agustus 2022</td>
                                    <td class="align-middle">Camera Canon</td>
                                    <td class="align-middle">
                                        <div class='btn-group'>
                                            <button type='button' class='btn btn-edit'
                                                onclick="location.href='editDbPemenang.php'" style='color: #FDBE33;'>
                                                <i class='fas fa-edit'></i>&nbspEdit</button>
                                            <button type='button' class='btn btn-remove' data-toggle='modal'
                                                data-target='#mmMyModal' style='color: grey;'>
                                                <i class='fas fa-trash'></i>&nbspRemove</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">H4</td>
                                    <td>
                                        Pakuti
                                    </td>
                                    <td class="align-middle">Juli 2022 - Agustus 2022</td>
                                    <td class="align-middle">Oppo F1S</td>
                                    <td class="align-middle">
                                        <div class='btn-group'>
                                            <button type='button' class='btn btn-edit'
                                                onclick="location.href='editDbPemenang.php'" style='color: #FDBE33;'>
                                                <i class='fas fa-edit'></i>&nbspEdit</button>
                                            <button type='button' class='btn btn-remove' data-toggle='modal'
                                                data-target='#mmMyModal' style='color: grey;'>
                                                <i class='fas fa-trash'></i>&nbspRemove</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">H4</td>
                                    <td>
                                        Maried
                                    </td>
                                    <td class="align-middle">Agustus 2022 - September 2022</td>
                                    <td class="align-middle">Rumah 1 hektar</td>
                                    <td class="align-middle">
                                        <div class='btn-group'>
                                            <button type='button' class='btn btn-edit'
                                                onclick="location.href='editDbPemenang.php'" style='color: #FDBE33;'>
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
    <script>
        // $('#myTable').DataTable();

        $(document).ready(function () {
            $('#myTable').DataTable({
                "order": [[3, "desc"]]
            });
            $('.dataTables_length').addClass('bs-select');
        });
        $(document).ready(
            function () {
                $('#sidebarcollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                });
            }
        )

    </script>
</body>

</html>
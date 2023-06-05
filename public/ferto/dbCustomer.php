<?php
require "session.php";
include_once "head.html";
$_SESSION['pagename']="";
?>

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
                            <div class="col-sm" style="text-align:left;">
                                <h4 style="text-align:left;">Database Customer</h4>
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
                                <button type='button' class='btn btn-primary'><i class='fa fa-print'></i> Cetak</button>
                            </div>
                            <div class="col-sm text-right">
                                <button type="button" class="btn btn-primary"
                                    onclick="location.href='addDbCustomer.php'">
                                    <span>+ Tambah Data Customer</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="iq-card">
                    <div class="iq-card-body ">
                        <div class="row d-flex justify-content-end">
                            <div class="col-sm-4 ">
                                <div class="row ">
                                    <div class="col-sm">
                                        <form class="position-relative">
                                            <div class="form-group mb-0">
                                                <input type="text" class="form-control todo-search" id=""
                                                    placeholder="Cari Nama">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="mytable" class="table table-hover table-striped table-light text-nowrap"
                            style="text-align:left;">
                            <thead>
                                <br>
                                <tr id="_judul" onkeyup="_filter()" id="myFilter">
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Nomor Telepon</th>
                                    <th>Alamat Domisili</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-middle">C145601</td>
                                    <td class="align-middle">
                                        <img src=images/user/11.png alt=profile-img class=avatar-50 img-fluid />
                                        Hendro
                                    </td>
                                    <td class="align-middle">08123818273</td>
                                    <td class="align-middle">Jalan Jagalan 12 Surabaya</td>
                                    <td class="align-middle">Laki - laki</td>
                                    <td class="align-middle">25 Februari 2002</td>
                                    <td class="align-middle">
                                        <div class='btn-group'>
                                            <button type='button' class='btn btn-edit'
                                                onclick="location.href='editDbCustomer.php'" style='color: #FDBE33;'>
                                                <i class='fas fa-edit'></i>&nbspEdit</button>
                                            <button type='button' class='btn btn-remove' data-toggle='modal'
                                                data-target='#mmMyModal' style='color: grey;'>
                                                <i class='fas fa-trash'></i>&nbspRemove</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">C2145601</td>
                                    <td class="align-middle">
                                        <img src=images/user/11.png alt=profile-img class=avatar-50 img-fluid />
                                        Hendro
                                    </td>
                                    <td class="align-middle">08123818273</td>
                                    <td class="align-middle">Jalan Jagalan 12 Surabaya</td>
                                    <td class="align-middle">Laki - laki</td>
                                    <td class="align-middle">25 Februari 2002</td>
                                    <td class="align-middle">
                                        <div class='btn-group'>
                                            <button type='button' class='btn btn-edit'
                                                onclick="location.href='editDbCustomer.php'" style='color: #FDBE33;'>
                                                <i class='fas fa-edit'></i>&nbspEdit</button>
                                            <button type='button' class='btn btn-remove' data-toggle='modal'
                                                data-target='#mmMyModal' style='color: grey;'>
                                                <i class='fas fa-trash'></i>&nbspRemove</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">C3145601</td>
                                    <td class="align-middle">
                                        <img src=images/user/11.png alt=profile-img class=avatar-50 img-fluid />
                                        Hendro
                                    </td>
                                    <td class="align-middle">08123818273</td>
                                    <td class="align-middle">Jalan Jagalan 12 Surabaya</td>
                                    <td class="align-middle">Laki - laki</td>
                                    <td class="align-middle">25 Februari 2002</td>
                                    <td class="align-middle">
                                        <div class='btn-group'>
                                            <button type='button' class='btn btn-edit'
                                                onclick="location.href='editDbCustomer.php'" style='color: #FDBE33;'>
                                                <i class='fas fa-edit'></i>&nbspEdit</button>
                                            <button type='button' class='btn btn-remove' data-toggle='modal'
                                                data-target='#mmMyModal' style='color: grey;'>
                                                <i class='fas fa-trash'></i>&nbspRemove</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">C4145601</td>
                                    <td class="align-middle">
                                        <img src=images/user/11.png alt=profile-img class=avatar-50 img-fluid />
                                        Hendro
                                    </td>
                                    <td class="align-middle">08123818273</td>
                                    <td class="align-middle">Jalan Jagalan 12 Surabaya</td>
                                    <td class="align-middle">Laki - laki</td>
                                    <td class="align-middle">25 Februari 2002</td>
                                    <td class="align-middle">
                                        <div class='btn-group'>
                                            <button type='button' class='btn btn-edit'
                                                onclick="location.href='editDbCustomer.php'" style='color: #FDBE33;'>
                                                <i class='fas fa-edit'></i>&nbspEdit</button>
                                            <button type='button' class='btn btn-remove' data-toggle='modal'
                                                data-target='#mmMyModal' style='color: grey;'>
                                                <i class='fas fa-trash'></i>&nbspRemove</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">C5145601</td>
                                    <td class="align-middle">
                                        <img src=images/user/11.png alt=profile-img class=avatar-50 img-fluid />
                                        Hendro
                                    </td>
                                    <td class="align-middle">08123818273</td>
                                    <td class="align-middle">Jalan Jagalan 12 Surabaya</td>
                                    <td class="align-middle">Laki - laki</td>
                                    <td class="align-middle">25 Februari 2002</td>
                                    <td class="align-middle">
                                        <div class='btn-group'>
                                            <button type='button' class='btn btn-edit'
                                                onclick="location.href='editDbCustomer.php'" style='color: #FDBE33;'>
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
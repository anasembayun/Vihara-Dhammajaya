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
                                        <h4 style="text-align:left;">Detail Program</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="iq-card">
                            <div class="iq-card-body">
                                <table class="table table-hover table-striped table-light text-nowrap text-left" cellspacing="0" id="myTable">
                                    <thead class="custom-thead-bg">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Program</th>
                                            <th>Periode</th>
                                            <th>Total Belanja</th>
                                            <th>Detail Kupon</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>TUP108092022</td>
                                            <td>Program 1</td>
                                            <td>Agustus 2022 - September 2022</td>
                                            <td>Rp. 1.000.000</td>
                                            <td><button type='button' class='btn btn-primary' onclick="location.href='detail-kupon.php'"><i class='fas fa-eye'></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>TUP108092022</td>
                                            <td>Program 2</td>
                                            <td>Oktober 2022 - November 2022</td>
                                            <td>Rp. 2.000.000</td>
                                            <td><button type='button' class='btn btn-primary' onclick="location.href='detail-kupon.php'"><i class='fas fa-eye'></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>TUP108092022</td>
                                            <td>Program 3</td>
                                            <td>Desember 2022 - Januari 2023</td>
                                            <td>Rp. 3.000.000</td>
                                            <td><button type='button' class='btn btn-primary' onclick="location.href='detail-kupon.php'"><i class='fas fa-eye'></i></button></td>
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
    </script>
</body>
</html>

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
                                    <div class="col-sm-1">
                                        <h4 style="text-align:left;">Pengundian</h4>
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
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="iq-card">
                            <div class="iq-card-body">
                                <div class="form-group row text-left justify-content-between align-items-center">
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col">
                                                <select id="" class="form-control selectpicker">
                                                    <option value="" selected disabled>Pilih Periode</option>
                                                    <option value="">Juli 2022 - Agustus 2022</option>
                                                    <option value="">Agustus 2022 - September 2022</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <select id="" class="form-control selectpicker">
                                                    <option value="" selected disabled>Pilih Status</option>
                                                    <option value="">Sah</option>
                                                    <option value="">Tidak Sah</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="row">
                                            <div class="col-sm">
                                            <form class="position-relative" style="margin-right:8px;">
                                                <div class="form-group mb-0">
                                                <input type="text" class="form-control todo-search" id="" placeholder="Cari Customer">
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                                
                                <table id="mytable" class="table table-hover table-striped table-light" style="text-align:left;">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Customer</th>
                                            <th scope="col">Tiket Undian</th>
                                            <th scope="col">Periode Pengundian</th>
                                            <th scope="col">Admin</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="showdata">
                                        <tr>
                                            <td class="align-middle">22/07/2022</td>
                                            <td class="align-middle">John Doe</td>
                                            <td class="align-middle">TU00107082022</td>
                                            <td class="align-middle">Juli 2022 - Agustus 2022</td>
                                            <td class="align-middle">Cecil Mark</td>
                                            <td class="align-middle">Sah</td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">22/07/2022</td>
                                            <td class="align-middle">Mark John</td>
                                            <td class="align-middle">TU00207082022</td>
                                            <td class="align-middle">Juli 2022 - Agustus 2022</td>
                                            <td class="align-middle">Doe Cecil</td>
                                            <td class="align-middle">Tidak Sah</td>
                                        </tr>
                                    </tbody>
                                </table>
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
    </script>
</body>
</html>

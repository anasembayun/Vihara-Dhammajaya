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
                                        <h4 style="text-align:left;">Detail Kupon - Program 1</h4>
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
                                            <th>Tiket Kupon</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>9MD3T6Y1</td>
                                            <td>Sah</td>
                                        </tr>
                                        <tr>
                                            <td>9MD3T7Z1</td>
                                            <td>Tidak Sah</td>
                                        </tr>
                                        <tr>
                                            <td>9MD3T6A1</td>
                                            <td>Tidak Sah</td>
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

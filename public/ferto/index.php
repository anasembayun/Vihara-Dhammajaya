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

<?php
require "session.php";
include_once "head.html";
$_SESSION['pagename']="";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitur Undian</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="undian.css"> -->
</head>
<style>
    .bootstrap-select > .dropdown-toggle.bs-placeholder:active {
        background-color: #FFF;
        color: black;
        border-color: #999;
    }
    .imagebg{
        position: absolute;
        top: 5%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        z-index: -1;
    }

    /* button */
    .spinbutton{
    position: relative;
    padding: 20px 60px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: rgba(0, 0, 0, 0.5);
    margin: 40px;
    text-decoration: none;
    transition: 1s;
    border-radius: 4px;
    overflow: hidden;
    -webkit-box-reflect: below 1px linear-gradient(transparent, transparent, #0004);
    }
    .spinbutton:hover{
    background: var(--clr);
    box-shadow: 0 0 10px var(--clr),
                0 0 30px var(--clr),
                0 0 60px var(--clr),
                0 0 100px var(--clr);
    }
    .spinbutton:before{
    content: '';
    position: absolute;
    width: 40px;
    height: 400%;
    background: var(--clr);
    transition: 1s;
    animation: animate 2s linear infinite;
    animation-delay: calc(0.33s * var(--1));
    }
    .spinbutton:hover:before{
    width: 120%;
    }
    @keyframes animate{
    0%{
        transform: rotate(0deg);
    }
    100%{
        transform: rotate(360deg);
    }
    }
    .spinbutton:after{
    content: '';
    position: absolute;
    inset: 4px;
    background: #0e1538;
    }
    .spinbutton:hover:after{
    background: var(--clr);
    }
    .spinbutton span{
    position: relative;
    z-index: 1;
    font-size: 2em;
    color: #fff;
    opacity: 0.5;
    text-transform: uppercase;
    letter-spacing: 5px;
    transition: 0.5s;
    }
    .spinbutton:hover span{
    opacity: 1;
    }
</style>
<body>
    <div class="wrapper">
        <?php include_once "sidebar.html"?>
            <div class="container">
                    <nav>
                        <div class="row form-group">
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
                    <div class="container d-flex justify-content-center form-group ">
                        <div class="container-fluid h-100 p-5 form-group">
                            <div class="row" style="position:relative;">
                                <img src="img/party.png" class="imagebg">
                            </div>
                            <div class="row d-flex justify-content-center judul">
                                <h1 style="font-weight:bold;">
                                    Undian Spesial Liburan
                                </h1>
                            </div>
                            <div class="row d-flex justify-content-center judul form-group">
                                <div class="col-sm-3">
                                    <select id="" class="selectpicker">
                                        <option value="">Pilih Periode</option>
                                        <option value="">Juli 2022 - Agustus 2022</option>
                                        <option value="">Agustus 2022 - September 2022</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select id="list_hadiah" class="selectpicker"></select>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center judul form-group">
                                
                            </div>
                            <div class="row d-flex justify-content-center">
                                    <div class="doors justify-content-center form-group">
                                        <div class="door">
                                            <div class="boxes"></div>
                                        </div>
                                        <div class="door">
                                            <div class="boxes"></div>
                                        </div>
                                        <div class="door">
                                            <div class="boxes"></div>
                                        </div>
                                        <div class="door">
                                            <div class="boxes"></div>
                                        </div>
                                        <div class="door">
                                            <div class="boxes"></div>
                                        </div>
                                        <div class="door">
                                            <div class="boxes"></div>
                                        </div>
                                        <div class="door">
                                            <div class="boxes"></div>
                                        </div>
                                        <div class="door">
                                            <div class="boxes"></div>
                                        </div>
                                    </div>
                            </div>
                            <div class="row justify-content-center form-group">
                                <a class="spinbutton" href="#" style="--clr:#ff22bb;--1:0;"><button id="spinner" onclick="spin()"><span>Undi Sekarang!</span></button></a>
                            </div>
                            <hr>
                            <div class="row form-group">
                                <table class="table table-hover table-striped table-light" style='overflow:scroll;'>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Undian</th>
                                            <th>Nama</th>
                                            <th>Hadiah</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-winner">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
    </div>

    <!-- Modal menang -->
    <div class="modal fade" id="mmMyModal" role="dialog" style="border-radius:45px">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Modal content-->
            <div class="modal-content" style="background-color:transparent; border:none;text-align:center;">
                <div class="modal-header text-center" style="background-color:rgba(255,0,0,0.75); color:black;border:none; text-align:center;">
                    <h2 id="employeeidname" class="modal-title w-100" style="font-weight: bold;color:white;">CONGRATULATIONS !!!</h2>
                </div>
                <div class="modal-body text-left" style="background-color:white; color:black;border:none;">
                    <div class="row text-center" >
                        <div class="col-12" >
                            <img src=images/user/11.png alt=profile-img class=avatar-50 img-fluid/>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="row" >
                            <div class="col-3">
                                Nama
                                </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-5">
                                Hendry
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-3">
                                Undian
                            </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-5">
                                BD123567
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-3">
                                Toko
                            </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-5">
                                PT Jaya Mulia
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-3">
                                Kota
                        </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-5">
                                Surabaya
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button type="button" class="btn btn-secondary" onclick="">Ulang</button>
                            <button type="button" class="btn btn-danger" onclick="">Sah</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

    <script src="undian.js"></script>
    <script>
    $(document).ready(
            function(){
                $('#sidebarcollapse').on('click',function(){
                    $('#sidebar').toggleClass('active');
                });
            }
        )

    $("#mmMyModal").on("shown.bs.modal", function() {
        //confetti();
        start();
        stop();
    });
        const start = () => {
            setTimeout(function() {
                confetti.start()
            }, 100);
        };
        const stop = () => {
            setTimeout(function() {
                confetti.stop()
            }, 3000);
        };
        
    </script>
    <script src="confetti.js"></script>
</html>
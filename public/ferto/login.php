<?php
require "session.php";
include_once "head.html";
$_SESSION['pagename']="";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        #error{
            display:none;
        }
        body{
            background-color: rgb(212, 115, 110);
            color: white;
        }
        .iq-card{
            background-color:rgb(69, 13, 13);
        }
        h1,p{
            margin: 0;
            padding: 0;
        }
        input[type=button]:hover{
            text-decoration:underline;
            
        }
    </style>
</head>
<body>

    <div class="wrapper">
        <div class="container justify-content-center align-items-center text-center" style="margin-top:8%;">
            <div class="iq-card">
                <div class="row justify-content-center align-items-center text-center">
                    <div class="col-sm-3">
                        <div class="iq-card-body">
                            <div class="row">
                                <div class="col">
                                    <h1>FERTO GROUP</h1>
                                    <p>(Vinilon Group)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="iq-card-body">
                            <div class="row">
                                <div class="col text-left">
                                    <h4>Login</h4>
                                    <hr>
                                </div>
                            </div>
                            <form class="needs-validation" novalidate>
                                <!-- <div class="row form-group">
                                    <div class="col-sm">
                                        <select type="text" id="" class="form-control" placeholder="Login Sebagai">
                                            <option value="0">Login Sebagai Pabrik/Distributor...</option>
                                            <option value="1">Pabrik</option>
                                            <option value="2">Distributor</option>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="row form-group">
                                    <div class="col-sm">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" style="background-color:white;"><i class="fa fa-user"></i></span>
                                            </div>
                                            <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username..." required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" style="background-color:white;"><i class="fa fa-lock"></i></span>
                                            </div>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password..." required>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="invalid-feedback" id="error">
                                    Username atau password yang anda masukkan salah.
                                </div> -->
                                <div id="error" class="alert alert-danger" role="alert">
                                    Username atau password yang anda masukkan salah.
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm text-center">
                                        <button onclick="login()" type="button" class="btn btn-primary" style="color:white; width:50%; font-size:20px" >Login</button>
                                        <!-- onclick="location.href='data_belanja.php'" -->
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm text-center">
                                        <button type="button" class="btn" style="background: transparent; border:none; color:white;" onclick="location.href='lupaKataSandi.php'">Lupa Kata Sandi?</button>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm text-center">
                                        <button type="button" class="btn" style="background-color:green; color:white" onclick="location.href='createNewAccount.php'">Buat Akun Baru</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>   
        // (function() {
        // 'use strict';
        // window.addEventListener('load', function() {
        //     // Fetch all the forms we want to apply custom Bootstrap validation styles to
        //     var forms = document.getElementsByClassName('needs-validation');
        //     // Loop over them and prevent submission
        //     var validation = Array.prototype.filter.call(forms, function(form) {
        //     form.addEventListener('submit', function(event) {
        //         if (form.checkValidity() === false) {
        //         event.preventDefault();
        //         event.stopPropagation();
        //         }
        //         form.classList.add('was-validated');
        //     }, false);
        //     });
        // }, false);
        // })();

        function login(){
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            if (username == "alan" && password == "12345") {
                window.location.href = "data_belanja.php";
            }else{
                document.getElementById("error").style.display = "block";
                return false;
            }
        }
    </script>
</body>
</html>

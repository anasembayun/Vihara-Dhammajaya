<?php
require "session.php";
include_once "head.html";
$_SESSION['pagename']="";
?>

<body>

<style>
    .upload{
        background-color:rgba(52, 25, 80, 1);
        color:white;
        width:100px;
        border: 1px solid white;
        border-radius: 5px;
        width:150px;
        height:50px;
        
    }
    .text{
        color:rgba(52, 25, 80, 1);
        float: left;
    }
    .textField{
        background-color:white;
        border-radius: 5px;
        text-align:left;
    }
    .btnCircle{
        width: 50px;
        height: 50px;
        padding: 7px 10px;
        border-radius: 25px;
        text-align: center;
        border:solid white 2px;

        position: absolute;
        top: 90%;
        left: 75%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
    }
</style>

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
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <img src="images/user/11.png" alt="profile-img" class="avatar-130"/>
                                    <button type="button" class="btn btn-primary btnCircle">
                                        &nbsp<i class="fa fa-camera"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row align-items-center">
                                <div class="col-sm-2">
                                    <label for="exampleInputFirstName" class="text">Nama Depan</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="firstname" class="form-control textField" id="exampleInputFirstName"
                                        placeholder="Masukkan Nama Lengkap">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row align-items-center">
                                <div class="col-sm-2">
                                <label for="exampleInputLastName" class="text">Nama Belakang</label>
                                </div>
                                <div class="col-sm-10">
                                <input type="lastname" class="form-control textField" id="exampleInputLastName"
                                        placeholder="Masukkan Nama Belakang">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row align-items-center">
                                <div class="col-sm-2">
                                <label for="exampleInputLastName" class="text">Periode</label>
                                </div>
                                <div class="col-sm-10">
                                <input type="lastname" class="form-control textField" id="exampleInputLastName"
                                        placeholder="Masukkan Periode Pemenang">
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row align-items-center">
                                <div class="col-sm-2">
                                <label for="exampleInputLastName" class="text">Bulan-Tahun</label>
                                </div>
                                <div class="col-sm-10">
                                <input type="lastname" class="form-control textField" id="exampleInputLastName"
                                        placeholder="Masukkan Bulan-Tahun (ex:Januari-2021)">
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row align-items-center">
                                <div class="col-sm-2">
                                <label for="exampleInputLastName" class="text">Hadiah</label>
                                </div>
                                <div class="col-sm-10">
                                <input type="lastname" class="form-control textField" id="exampleInputLastName"
                                        placeholder="Masukkan Hadiah">
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row align-items-center">
                                <div class="col-sm-2">
                                    <label for="exampleInputEmail" class="text">Email</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control textField" id="exampleInputEmail" placeholder="Masukkan Email">
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row align-items-center">
                                <div class="col-sm-2">
                                    <label class="text">Provinsi</label>
                                </div>
                                
                                <div class="col-sm-10">
                                    <select class="form-control" id="province" name="province">
                                        <option value="pilihprovinsi">Pilih Provinsi</option>
                                        <option value="sulawesitenggara">Sulawesi Tenggara</option>
                                        <option value="jawabarat">Jawa Barat</option>
                                        <option value="jawatimur">Jawa Timur</option>
                                    </select>
                                </div>
                                
                            </div>
                    </div>

                    <div class="form-group">
                        <div class="row align-items-center">
                            <div class="col-sm-2">
                                <label class="text">Kota</label>
                            </div>
                            <div class="col-sm-10">
                                <select class="form-control" id="city" name="city" >
                                    <option value="pilihkota">Pilih Kota</option>
                                    <option value="surabaya">Surabaya</option>
                                    <option value="malang">Malang</option>
                                    <option value="makassar">Makassar</option>
                                </select>
                            </div>
                            
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row align-items-center">
                            <div class="col-sm-2">
                                <label for="exampleInputAddress" class="text">Alamat</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="address" class="form-control" id="exampleInputAddress"
                                    placeholder="Masukkan Alamat">
                            </div>
                            
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row align-items-center">
                            <div class="col-sm-2">
                                <label class="text">Kode Pos</label>
                            </div>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" min=5 max=5 name="postcode" placeholder="Masukkan Kode Pos">
                            </div>
                            
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row align-items-center">
                            <div class="col-sm-2">
                                <label class="text">Nomor Telepon</label>
                            </div>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" min=5 max=5 name="postcode" placeholder="Masukkan Nomor Telepon">
                            </div>
                            
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row align-items-center">
                            <div class="col-sm-2">
                                <label class="text">Jenis Kelamin</label>
                            </div>
                            <div class="col-sm-10 text-left">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="laki-laki">
                                    <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="perempuan">
                                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="form-group text-right">
                    <input type="submit" onclick="nextpage()" class="btn btn-primary submit" value="Submit">
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

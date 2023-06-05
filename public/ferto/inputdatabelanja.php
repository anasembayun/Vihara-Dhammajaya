<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Input Data Belanja End User</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- custom CSS -->
        <link rel="stylesheet" href="styleferto.css">
        <!-- custom CSS -->

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
        <!-- Untuk table -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <!-- SideBar -->
        <div class="sidebar">
            <div class="logo-header">
                <span class="logo">
                    <i class="fa fa-dropbox"></i>
                </span>
                <div class="logo-text">
                    <p class="namapt">PT Bank Perkreditan Rakyat</p>
                    <p class="namaperusahaan">DINAR PUSAKA</p>
                </div>
            </div>
            <button class="dropdown-btn">Data Belanja End User
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="databelanja.php">Data Belanja</a>
                <a href="inputdatabelanja.php">Input Data Belanja</a>
            </div>
        </div>
        
        <div class="header">
            <p class="p-text">Input Data Belanja End User</p>
        </div>
        <div class="main">
            <div class="container">
                <div id="rcorners2">
                    <form action="#">
                        <div class="form-group row">
                        <label for="Periode Undian" class="col-sm-3 col-form-label">Periode Undian</label>
                            <div class="col-sm-5">
                                <select class="selectpicker" data-live-search="true" data-width="100%">
                                    <option value="" disabled selected hidden>Pilih Periode</option>
                                    <option>Periode 1</option>
                                    <option>Periode 2</option>
                                    <option>Periode 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Tanggal Belanja" class="col-sm-3 col-form-label">Tanggal Belanja</label>
                            <div class="col-sm-5">
                                <input type="date" class="form-control" id="tglbelanja">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Toko" class="col-sm-3 col-form-label">Toko</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="toko">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Toko" class="col-sm-3 col-form-label">Toko</label>
                            <div class="col-sm-5">
                                <select class="selectpicker" data-live-search="true" data-width="100%">
                                    <option value="" disabled selected hidden>Pilih Nama Toko</option>
                                    <option>Toko 1</option>
                                    <option>Toko 2</option>
                                    <option>Toko 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="No HP" class="col-sm-3 col-form-label">Nomor HP</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="nohp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Alamat" class="col-sm-3 col-form-label">Alamat Domisili</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" id="alamat" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Kelurahan" class="col-sm-3 col-form-label">Kelurahan</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="kelurahan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="kecamatan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kota/kabupaten" class="col-sm-3 col-form-label ">Kota / Kabupaten</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="kota/kab">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Total Nilai Belanja" class="col-sm-3 col-form-label ">Total Nilai Belanja</label>
                            <div class="col-sm-8">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="Input Total">IDR</label>
                                    </div>
                                    <input type="text" class="form-control" id="total">
                                    <div class="kupon-inline">
                                    <small>
                                        Anda akan mendapatkan
                                            <span id="">50</span>
                                        Kupon
                                    </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="container" style="margin-bottom: 30px">
                <div class="form-row justify-content-center">
                    <div class="row justify-content-center">
                        <br>
                            <button class="btn btn-primary" id="save" style="margin-right: 25px; margin-left: -40px">Simpan</button>
                            <button class="btn btn-success" id="saveadd">Simpan dan Tambah Data Baru</button>
                        </br>
                    </div>
                </div>
            </div>
        </div>

    <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
            } else {
            dropdownContent.style.display = "block";
            }
        });
        }
    </script>
    </body>
</html>

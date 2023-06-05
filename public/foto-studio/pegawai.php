<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Pegawai</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- custom CSS -->
        <link rel="stylesheet" href="stylestudio.css">
        <!-- custom CSS -->

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
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
                    <p class="namapt">Nama PT</p>
                    <p class="namaperusahaan">Studio</p>
                </div>
            </div>
            <a href="cabang.php">Cabang</a>
            <a href="pegawai.php">Pegawai</a>
            <a href="absen.php">Absen</a>
            <a href="transaksi.php">Transaksi</a>
        </div>
        
        <div class="header">
            <p class="p-text">Pegawai</p>
        </div>
        <div class="main">
            <div class="container">
                <div id="rcorners3">
                    <form action="/action_page.php">
                    <div class="form-group">
                        <label for="Nama Pegawai">Nama Pegawai:</label>
                        <input type="text" class="form-control" id="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="Alamat">Alamat:</label>
                        <input type="text" class="form-control" id="alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="Nomor Telepon">Nomor Telepon:</label>
                        <input type="text" class="form-control" id="notelp" required>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email:</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="Password">Password:</label>
                        <input type="password" class="form-control" id="password" required>
                    </div>
                    <div class="form-group">
                        <label for="Pegawai Role">Role:</label>
                        <select required class="form-control">
                            <option value="" disabled selected hidden>Pilih Role</option>
                            <option>Admin</option>
                            <option>Developer</option>
                            <option>Kasir</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalconfirm">Simpan</button>
                    <!-- The Modal -->
                    <div class="modal fade" id="modalconfirm">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            
                                <!-- Modal Header -->
                                <div class="modal-header">
                                <h4 class="modal-title">Simpan Data</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                
                                <!-- Modal body -->
                                <div class="modal-body">
                                    Apakah anda yakin ingin menyimpan?
                                </div>
                                
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-success" data-dismiss="modal">Simpan</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    </form>
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

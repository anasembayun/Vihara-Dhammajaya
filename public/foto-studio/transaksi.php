<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Transaksi</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- custom CSS -->
        <link rel="stylesheet" href="stylestudio.css">
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
                    <p class="namapt">Nama PT</p>
                    <p class="namaperusahaan">Studio</p>
                </div>
            </div>
            <a href="cabang.php">Cabang</a>
            <a href="pegawai.php">Pegawai</a>
            <a href="absen.php">Absen</a>
            <button class="dropdown-btn">Transaksi
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="pesanruangan.php">Pesan Ruangan</a>
                <a href="transaksi.php">Transaksi</a>
            </div>
        </div>
        
        <div class="header">
            <p class="p-text">Transaksi</p>
        </div>
        <div class="main">
            <div class="container">
                <div id="rcorners1">
                    <form action="#">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="Nama Pelanggan">Nama Pelanggan:</label>
                                    <select class="selectpicker" data-live-search="true" data-width="100%" required>
                                                        <option value="" disabled selected hidden>Pilih Nama Pelanggan</option>
                                                        <option>Pelanggan 1</option>
                                                        <option>Pelanggan 2</option>
                                                        <option>Pelanggan 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="Tanggal Transaksi">Tanggal Transaksi:</label>
                                    <input type="date" class="form-control" id="tgltransaksi" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Jam Mulai">Jam Mulai:</label>
                                    <input type="time" class="form-control" id="mulai" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label for="Jam Selesai">Jam Selesai:</label>
                                    <input type="time" class="form-control" id="selesai" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Ruangan">Ruangan:</label>
                                    <select class="selectpicker" data-live-search="true" data-width="100%" required>
                                                        <option value="" disabled selected hidden>Pilih Ruangan</option>
                                                        <option>Ruangan 1</option>
                                                        <option>Ruangan 2</option>
                                                        <option>Ruangan 3</option>
                                                        <option>Ruangan 4</option>
                                                        <option>Ruangan 5</option>
                                                        <option>Ruangan 6</option>
                                                        <option>Ruangan 7</option>
                                                        <option>Ruangan 8</option>
                                                        <option>Ruangan 9</option>
                                                        <option>Ruangan 10</option>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="col">
                                <div class="form-group">
                                    <label for="Tema">Tema:</label>
                                    <select class="selectpicker" data-live-search="true" data-width="100%">
                                                        <option value="" disabled selected hidden>Pilih Tema</option>
                                                        <option>Tema 1</option>
                                                        <option>Tema 2</option>
                                                        <option>Tema 3</option>
                                    </select>
                                </div>
                            </div> -->
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="Dp">Dp:</label>
                                    <input type="number" class="form-control" id="Dp" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="Sisa Pembayaran">Sisa Pembayaran:</label>
                                    <input type="number" class="form-control" id="sisapembayaran" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="Total Pembayaran">Total Pembayaran:</label>
                                    <input type="number" class="form-control" id="total" required>
                                </div>
                            </div>   
                        </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalconfirm">Transaksi Baru</button>
                            </div>
                            <!-- The Modal -->
                            <div class="modal fade" id="modalconfirm">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                        <h4 class="modal-title">Pesan Ruangan</h4>
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
            <div class="container" id="container-table">
                <h4>List Transaksi</h4>
                <div class="table-responsive" style="margin-top: 10px;">
                    <table class="table table-bordered table-hover datatab" style="width: 100%">
                        <thead class="custom-thead-bg">
                            <tr>
                                <th>No</th>
                                <th style="width: 5%">Transaksi ID</th>
                                <th>Nama Pelanggan</th>
                                <th>Tanggal Transaksi</th>
                                <th>Jam Mulai</th>
                                <th>Jam Selesai</th>
                                <th>Ruangan</th>
                                <th>Tema</th>
                                <th>Dp</th>
                                <th>Sisa Pembayaran</th>
                                <th>Total</th>
                                <th style="width: 100%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>2398G20J9GJ</td>
                                <td>David</td>
                                <td>25/07/2022</td>
                                <td>07:00</td>
                                <td>10:00</td>
                                <td>Ruangan 5</td>
                                <td>Valentine</td>
                                <td>Rp 10.000.000</td>
                                <td>Rp 5.000.000</td>
                                <td>Rp 15.000.000</td>
                                <td>
                                    <button type="submit" class="btn btn-primary">Detail Transaksi</button>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>0Q8J023419GJ</td>
                                <td>David Riski</td>
                                <td>25/07/2022</td>
                                <td>07:00</td>
                                <td>13:00</td>
                                <td>Ruangan 2</td>
                                <td>Pre Wedding</td>
                                <td>Rp 5.000.000</td>
                                <td>Rp 5.000.000</td>
                                <td>Rp 10.000.000</td>
                                <td>
                                    <button type="submit" class="btn btn-primary">Detail Transaksi</button>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.datatab').DataTable({

        });
    } );
    </script>
</html>

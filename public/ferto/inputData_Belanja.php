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
            <div class="container justify text-left">
                <div class="container">
                            <div class="form-group row">
                                <label for="Toko" class="col-sm-2 col-form-label">Kode Transaksi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kodetransaksi" value="TR01082022001" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Periode Undian" class="col-sm-2">Periode Undian</label>

                                <div class="col-10">
                                    <select class="form-control selectpicker" id="province" name="province">
                                        <option value="department">Pilih Periode</option>
                                        <option value="periode1">Periode 1</option>
                                        <option value="periode2">Periode 2</option>
                                        <option value="periode3">Periode 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Tanggal Belanja" class="col-sm-2 col-form-label">Tanggal Belanja</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="background-color:white;"><i class="fa fa-calendar-o"></i></span>
                                        </div>
                                        <input type="text" name="date" class="form-control" id="tglbelanja" placeholder="Masukkan Tanggal" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Toko" class="col-sm-2 col-form-label">Toko</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="toko" placeholder="Masukkan Toko">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="No HP" class="col-sm-2 col-form-label">Nomor HP</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nohp" placeholder="Masukkan Nomor Handphone" onkeyup="phone(this)">
                                    <span>
                                </div>
                                <div class="col-sm-2">
                                    <button class="btn form-control btn-primary" id="">Validasi</button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Alamat" class="col-sm-2 col-form-label">Alamat Domisili</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="alamat" rows="3" placeholder="Masukkan Alamat Domisili"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Kelurahan" class="col-sm-2 col-form-label">Kelurahan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kelurahan" placeholder="Masukkan Kelurahan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kecamatan" placeholder="Masukkan Kecamatan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kota/kabupaten" class="col-sm-2 col-form-label ">Kota / Kabupaten</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kota/kab" placeholder="Masukkan Kota/Kabupaten">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Total Nilai Belanja" class="col-sm-2 col-form-label ">Total Nilai
                                    Belanja</label>
                                <div class="col-sm-10">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="Input Total">IDR</label>
                                        </div>
                                        <input type="text" class="form-control" id="total" onkeyup="formatRupiah1(this.value,this)">
                                    </div>
                                    <small style="font-weight:bold">
                                        &nbsp* Anda akan mendapatkan
                                        <span id="">50</span>
                                        Kupon
                                    </small>
                                </div>
                            </div>
                </div>
                <div class="form-group text-center">
                    <input type="submit" onclick="" class="btn btn-primary submit" value="Simpan">
                    <input type="submit" onclick="" class="btn btn-primary submit" value="Simpan dan Tambah Data Baru">
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(
            function () {
                $('#sidebarcollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                });
            }
        )
        $(document).ready(function () {
            var date_input = $('input[name="date"]'); //our date input has the name "date"
            var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
            var options = {
                format: 'mm/dd/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            };
            date_input.datepicker(options);
        });
        function formatRupiah1(val,obj){
            obj.value=formatRupiah(val, "");
        }
        function formatRupiah(angka, prefix){
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split    = number_string.split(','),
                sisa     = split[0].length % 3,
                rupiah     = split[0].substr(0, sisa),
                ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
                        
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
                    
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
        }
        function phone(angka){
            angka.value=number_string = angka.replace(/[^,\d]/g, '').toString();
        }
    </script>
</body>

</html>
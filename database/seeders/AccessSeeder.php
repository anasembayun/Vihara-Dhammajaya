<?php

namespace Database\Seeders;

use App\Models\DataAccess;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $access_list = [
            ["nama" => "Kelola Admin"],
            ["nama" => "Tambah Umat"],
            ["nama" => "Tambah Data Upa - Upi"],
            ["nama" => "Tambah Data Pernikahan"],
            ["nama" => "Daftar Data Umat"],
            ["nama" => "Daftar Data Umat Tidak Terdaftar"],
            ["nama" => "Daftar Data Upa - Upi"],
            ["nama" => "Daftar Data Pernikahan"],
            ["nama" => "Tambah Berita"],
            ["nama" => "Daftar Berita"],
            ["nama" => "Presensi Kegiatan"],
            ["nama" => "Jadwalkan Kegiatan"],
            ["nama" => "Daftar Kegiatan"],
            ["nama" => "Kelola Paket"],
            ["nama" => "Kelola Pesan Baik"],
            ["nama" => "Kelola Leluhur"],
            ["nama" => "Tagih Iuran"],
            ["nama" => "Transaksi"],
            ["nama" => "Transaksi Foto"],
            ["nama" => "Riwayat Transaksi"],
            ["nama" => "Riwayat Transaksi Foto"],
            ["nama" => "Kelola Laporan"],
            ["nama" => "Kas Masuk"],
            ["nama" => "Kas Keluar"],
            ["nama" => "Laporan Kas"],
            ["nama" => "Laporan Keuangan"],
        ];

        foreach ($access_list as $access) {
            DataAccess::create($access);
        }
    }
}

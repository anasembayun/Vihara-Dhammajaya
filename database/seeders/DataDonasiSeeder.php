<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Donasi;

class DataDonasiSeeder extends Seeder
{
    public function run()
    {
        $data_donasi = [
            [
                'nama_kegiatan_donasi' => 'Donasi Kepada Sekolah',
                'tanggal_mulai_donasi' => date_create("2022-07-21"),
                'tanggal_selesai_donasi' => date_create("2022-07-30"),
                'foto_kegiatan_donasi' => 'donasi_ke_sekolah.jpg',
                'keterangan_donasi' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
                'total_donasi' => 0,
                'total_donatur' => 0,
                'status' => 'Dana terus dikumpul',
            ],
        ];

        foreach ($data_donasi as $_donasi) {
            Donasi::create($_donasi);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\DataPernikahan;

class DataPernikahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_pernikahan = [
            [
                'no_sertifikat' => '202209080001',
                'tanggal_pernikahan' => date_create("2022-08-09"),
                'tempat_pernikahan' => 'Vihara_Dhammajaya',
                'rt_rw' => '01/02',
                'kelurahan' => 'Bangkul',
                'kecamatan' => 'Monorejo',
                'kabupaten_kota' => 'Surabaya',
                'p_nama' => 'Bona Ventura',
                'p_ayah' => 'Bona Andano',
                'p_ibu' => 'Mihara Sumiawati',
                'p_tempat_lahir' => 'Gondang',
                'p_tanggal_lahir' => date_create("2001-05-28"),
                'p_alamat' => 'Jl. Kendang Solo',
                'p_rt_rw' => '02/03',
                'p_kelurahan' => 'Minggaran',
                'p_kecamatan' => 'Konorejo',
                'p_kabupaten_kota' => 'Kendangbumi',
                'w_nama' => 'Kono Hajanai',
                'w_ayah' => 'Bhukam Ayana',
                'w_ibu' => 'Lailay Anjayani',
                'w_tempat_lahir' => 'Gurun Tahu',
                'w_tanggal_lahir' => date_create("2002-03-11"),
                'w_alamat' => 'Jl. Mangga No. 2',
                'w_rt_rw' => '03/03',
                'w_kelurahan' => 'Kali Malang',
                'w_kecamatan' => 'Siwalanjaya',
                'w_kabupaten_kota' => 'Surabaya',
                'pandita' => 'Bhukam Aninuka',
                'saksi_1' => 'Mikha',
                'saksi_2' => 'Subarashi',
            ],
        ];

        foreach ($data_pernikahan as $item) {
            DataPernikahan::create($item);
        }
    }
}

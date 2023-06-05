<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Baptisan;

class DataBaptisanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_baptisan = [
            [
                'id_jamaat' => 1,
                'no_sertifikat' => '202207280001',
                'name' => 'Bona Ventura',
                'tempat_lahir' => 'Trenggalek',
                'tanggal_lahir' => date_create("2012-05-21"),
                'alamat' => 'Jl. Imam Bonjol',
                'kelurahan_kecamatan' => 'Sukorejo',
                'kabupaten_kota' => 'Madiun',
                'rt_rw' => '01/02',
                'tempat_wisuda' => 'Vihara Dhammajaya Surabaya',
                'tanggal_wisuda' => date_create("2022-07-28"),
                'nama_baptis' => 'Sugomukti',
                'arti_nama_baptis' => 'Kepercayaan adalah berkat',
                'bhikhu_pemberi_wisuda' => 'Monk Syamba',
                'pandita_pemimpin_upacara' => 'Khoma Nandya',
            ],
        ];

        foreach ($data_baptisan as $_data) {
            Baptisan::create($_data);
        }
    }
}

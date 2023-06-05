<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Goods;

class GoodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $goods = [
            [
                'kode_barang' => '001',
                'nama_barang' => 'Paket A',
                'harga_jual' => '50000',
                'keterangan' => 'Tersedia',
            ],
        ];

        foreach ($goods as $good) {
            Goods::create($good);
        }
    }
}

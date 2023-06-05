<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Access;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'deus',
                'no_handphone' => '081291223123',
                'gol_darah' => 'A',
                'jenis_kelamin' => 'Laki-laki',
                'role' => 'Ketua',
                'username' => 'deus',
                'alamat' => 'Jl. Kerapu',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => date_create("2014-04-20"),
                'password' => bcrypt('123'),
                'id_role' => 2
            ],
            [
                'name' => 'Parmin',
                'no_handphone' => '081291891632',
                'gol_darah' => 'AB',
                'jenis_kelamin' => 'Laki-laki',
                'role' => 'Bendahara',
                'username' => 'parmin',
                'alamat' => 'Jl. Kembang Doro',
                'tempat_lahir' => 'Klaten',
                'tanggal_lahir' => date_create("1998-04-02"),
                'password' => bcrypt('123'),
                'id_role' => 3
            ],
            [
                'name' => 'Michael',
                'no_handphone' => '081291891990',
                'gol_darah' => 'B',
                'jenis_kelamin' => 'Laki-laki',
                'role' => 'Supervisor',
                'username' => 'mekel',
                'alamat' => 'Jl. Kembang Indah',
                'tempat_lahir' => 'Manado',
                'tanggal_lahir' => date_create("2001-04-30"),
                'password' => bcrypt('123'),
                'id_role' => 4
            ],
            [
                'name' => 'Axel',
                'no_handphone' => '081333444333',
                'gol_darah' => 'O',
                'jenis_kelamin' => 'Laki-laki',
                'role' => 'Operator',
                'username' => 'axel',
                'alamat' => 'Jl. Klaten',
                'tempat_lahir' => 'Sumberurip',
                'tanggal_lahir' => date_create("2001-05-10"),
                'password' => bcrypt('123'),
                'id_role' => 7
            ],
        ];

        $_access = [
            [
                'username' => 'deus',
                'access_ketua' => '1',
                'access_bendahara' => '1',
                'access_supervisor' => '1',
                'access_operator' => '1',
            ],
            [
                'username' => 'parmin',
                'access_ketua' => '0',
                'access_bendahara' => '1',
                'access_supervisor' => '0',
                'access_operator' => '0',
            ],
            [
                'username' => 'mekel',
                'access_ketua' => '0',
                'access_bendahara' => '0',
                'access_supervisor' => '1',
                'access_operator' => '0',
            ],
            [
                'username' => 'axel',
                'access_ketua' => '0',
                'access_bendahara' => '0',
                'access_supervisor' => '0',
                'access_operator' => '1',
            ]
        ];

        foreach($users as $user){
           User::create($user);
        }

        foreach($_access as $acces){
            Access::create($acces);
        }
    }
}

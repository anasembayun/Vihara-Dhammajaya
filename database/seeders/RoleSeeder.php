<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ["nama" => "Admin"],
            ["nama" => "Ketua"],
            ["nama" => "Bendahara"],
            ["nama" => "Supervisor"],
            ["nama" => "Staff Senior"],
            ["nama" => "Staff Junior"],
            ["nama" => "Operator"]
        ];

        foreach($roles as $role){
            Role::create($role);
        }
    }
}

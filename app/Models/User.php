<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'no_handphone',
        'gol_darah',
        'jenis_kelamin',
        'role',
        'username',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'password',
        'id_role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public function addDataAdmin($data, $access)
    {
        DB::table('users')->insert($data);
        DB::table('access')->insert($access);
    }

    public function addDataAdminOnly($data)
    {
        DB::table('users')->insert($data);
    }

    public function editDataAdmin($id, $data)
    {
        DB::table('users')->where('id', $id)->update($data);
    }

    public function editDataAdminByUsername($username, $data)
    {
        DB::table('users')->where('username', $username)->update($data);
    }

    public function deleteDataAdmin($username)
    {
        User::where('username', $username)->delete();
    }
}

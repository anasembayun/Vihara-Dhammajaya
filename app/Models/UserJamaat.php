<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class UserJamaat extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    protected $table = "usr_jamaat";
    // protected $primaryKey = "id";
    protected $fillable = [
        'id_code',
        'name',
        'no_handphone_1',
        'no_handphone_2',
        'email',
        'password',
        'gol_darah',
        'jenis_kelamin',
        'alamat',
        'kelurahan_kecamatan',
        'kabupaten_kota',
        'rt_rw',
        'tempat_lahir',
        'tanggal_lahir',
        'bidang_usaha',
        'pekerjaan',
        'nama_kerabat',
        'no_handphone_kerabat',
        'alamat_kerabat',
        'last_visit'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public function addDataJamaat($data)
    {
        DB::table('usr_jamaat')->insert($data);
    }

    public function editDataJamaat($id_code, $data)
    {
        DB::table('usr_jamaat')->where('id_code', $id_code)->update($data);
    }
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class Kegiatan extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "data_kegiatan";
    // protected $primaryKey = "id";
    protected $fillable = [
        'nama',
        'tempat',
        'tanggal_mulai',
        'jam_mulai',
        'jam_selesai',
        'file_path',
        'keterangan',
        'status',
        'created_by'
    ];

    protected $hidden = [
        'remember_token'
    ];

    public function DBaddJadwalKegiatan($data)
    {
        DB::table('data_kegiatan')->insert($data);
    }

    public function DBfindById($id)
    {
        DB::table('data_kegiatan')->find($id);
    }

    public function detailDataKegiatan($id)
    {
        return DB::table('data_kegiatan')->where('id', $id)->first();
    }

    public function DBeditJadwalKegiatan($id, $data)
    {
        DB::table('data_kegiatan')->where('id', $id)->update($data);
    }

    public function deleteDataKegiatan($id)
    {
        DB::table('data_kegiatan')->where('id', $id)->delete();
    }
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];


}

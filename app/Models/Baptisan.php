<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Baptisan extends Model
{
    use HasFactory;

    protected $table = 'data_baptisan';

    protected $fillable = [
        'id_jamaat',
        'no_sertifikat',
        'name',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'kelurahan_kecamatan',
        'kabupaten_kota',
        'rt_rw',
        'tempat_wisuda',
        'tanggal_wisuda',
        'nama_baptis',
        'arti_nama_baptis',
        'bhikhu_pemberi_wisuda',
        'pandita_pemimpin_upacara',
    ];
    
    public function addDataBaptisan($data)
    {
        DB::table('data_baptisan')->insert($data);
    }

    public function deleteDataBaptisan($id)
    {
        DB::table('data_baptisan')->where('id', $id)->delete();
    }
}

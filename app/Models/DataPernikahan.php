<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataPernikahan extends Model
{
    use HasFactory;

    protected $table = 'data_pernikahan';

    protected $fillable = [
        'no_sertifikat',
        'tanggal_pernikahan',
        'tempat_pernikahan',
        'rt_rw',
        'kelurahan',
        'kecamatan',
        'kabupaten_kota',
        'p_nama',
        'p_ayah',
        'p_ibu',
        'p_tempat_lahir',
        'p_tanggal_lahir',
        'p_alamat',
        'p_rt_rw',
        'p_kelurahan',
        'p_kecamatan',
        'p_kabupaten_kota',
        'w_nama',
        'w_ayah',
        'w_ibu',
        'w_tempat_lahir',
        'w_tanggal_lahir',
        'w_alamat',
        'w_rt_rw',
        'w_kelurahan',
        'w_kecamatan',
        'w_kabupaten_kota',
        'pandita',
        'saksi_1',
        'saksi_2',
    ];

    public function addDataPernikahan($data)
    {
        DB::table('data_pernikahan')->insert($data);
    }

    public function deleteDataPernikahan($id)
    {
        DB::table('data_pernikahan')->where('id', $id)->delete();
    }
}

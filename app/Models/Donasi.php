<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Donasi extends Model
{
    use HasFactory;

    protected $table = 'data_donasi';

    protected $fillable = [
        'nama_kegiatan_donasi',
        'tanggal_mulai_donasi',
        'tanggal_selesai_donasi',
        'foto_kegiatan_donasi',
        'keterangan_donasi',
        'total_donasi',
        'total_donatur',
        'status',
    ];

    public function addDataDonasi($data)
    {
        DB::table('data_donasi')->insert($data);
    }

    public function detailDataDonasi($id_kegiatan_donasi)
    {
        return DB::table('data_donasi')->where('id', $id_kegiatan_donasi)->first();
    }

    public function editDataDonasi($id_kegiatan_donasi, $data)
    {
        DB::table('data_donasi')->where('id', $id_kegiatan_donasi)->update($data);
    }

    public function deleteDataDonasi($id_kegiatan_donasi)
    {
        DB::table('data_donasi')->where('id', $id_kegiatan_donasi)->delete();
    }
}

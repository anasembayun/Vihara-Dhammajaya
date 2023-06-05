<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'data_transaksi';

    protected $fillable = [
        'id_jamaat',
        'id_admin',
        'id_kegiatan_donasi',
        'nama',
        'alamat',
        'kode_transaksi',
        'kategori_donasi',
        'tanggal_transaksi',
        'total_harga',
    ];

    public function addDataTransaction($data)
    {
        DB::table('data_transaksi')->insert($data);
    }
}

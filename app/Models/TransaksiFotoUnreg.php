<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TransaksiFotoUnreg extends Model
{
    use HasFactory;

    protected $table = 'data_transaksi_foto_unreg';

    protected $fillable = [
        'nama_pemesan',
        'id_admin',
        'alamat_pemesan',
        'no_telepon_pemesan',
        'id_kegiatan',
        'kode_transaksi',
        'tanggal_transaksi',
        'total_harga',
    ];

    public function addDataTransactionPhotoUnreg($data)
    {
        DB::table('data_transaksi_foto_unreg')->insert($data);
    }
}

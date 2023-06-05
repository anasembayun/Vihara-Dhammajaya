<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TransaksiFoto extends Model
{
    use HasFactory;

    protected $table = 'data_transaksi_foto';

    protected $fillable = [
        'id_pemesan',
        'id_admin',
        'alamat_pemesan',
        'kode_transaksi',
        'tanggal_transaksi',
        'total_harga',
    ];

    public function addDataTransactionPhoto($data)
    {
        DB::table('data_transaksi_foto')->insert($data);
    }
}

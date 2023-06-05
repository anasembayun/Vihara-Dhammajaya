<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailTransaksiFoto extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi_foto';

    protected $fillable = [
        'kode_transaksi',
        'id_leluhur',
        'total_periode',
        'bayar_bulan_terakhir',
        'bayar_sampai_bulan',
        'total_harga',
    ];

    public function addDataDetailTransactionPhoto($data)
    {
        DB::table('detail_transaksi_foto')->insert($data);
    }
}

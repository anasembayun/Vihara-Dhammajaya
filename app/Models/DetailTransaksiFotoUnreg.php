<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailTransaksiFotoUnreg extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi_foto_unreg';

    protected $fillable = [
        'kode_transaksi',
        'nama_leluhur',
        'total_harga',
    ];

    public function addDataDetailTransactionPhotUnreg($data)
    {
        DB::table('detail_transaksi_foto_unreg')->insert($data);
    }
}

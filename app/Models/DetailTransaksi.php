<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi';

    protected $fillable = [
        'kode_transaksi',
        'id_barang',
    ];

    public function addDataDetailTransaction($data)
    {
        DB::table('detail_transaksi')->insert($data);
    }
}

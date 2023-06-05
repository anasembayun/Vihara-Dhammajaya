<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Goods extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'data_barang';

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'harga_jual',
        'keterangan',
    ];

    public function addDataGoods($data)
    {
        DB::table('data_barang')->insert($data);
    }

    public function editDataGoods($id, $data)
    {
        DB::table('data_barang')->where('id', $id)->update($data);
    }

    public function deleteDataGoods($id)
    {
        // DB::table('data_barang')->where('id', $id)->delete();
        Goods::where('id', $id)->delete();
    }
}

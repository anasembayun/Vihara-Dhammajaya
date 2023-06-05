<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataPesanBaik extends Model
{
    use HasFactory;

    protected $table = 'data_pesan_baik';
    public $timestamps = false;

    protected $fillable = [
        'pesan_baik',
    ];

    public function addDataPesanBaik($data)
    {
        DB::table('data_pesan_baik')->insert($data);
    }

    public function editDataPesanBaik($id, $data)
    {
        DB::table('data_pesan_baik')->where('id', $id)->update($data);
    }

    public function deleteDataPesanBaik($id)
    {
        DB::table('data_pesan_baik')->where('id', $id)->delete();
    }

    public function detailDataPesanBaik($id)
    {
        return DB::table('data_pesan_baik')->where('id', $id)->first();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KasKeluar extends Model
{
    use HasFactory;

    protected $table = 'data_kas_keluar';

    protected $fillable = [
        'nomor_kas_keluar',
        'id_admin',
        'nama_admin',
        'penerima',
        'keterangan_keperluan',
        'tanggal',
        'nominal_pengeluaran',
        'diberikan_secara'
    ];

    public function addDataCashOut($data)
    {
        DB::table('data_kas_keluar')->insert($data);
    }

    public function deleteDataCashOut($id)
    {
        DB::table('data_kas_keluar')->where('id', $id)->delete();
    }
}

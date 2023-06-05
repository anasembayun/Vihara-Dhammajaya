<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KasMasuk extends Model
{
    use HasFactory;

    protected $table = 'data_kas_masuk';

    protected $fillable = [
        'nomor_kas_masuk',
        'id_admin',
        'nama_admin',
        'keterangan_keperluan',
        'tanggal',
        'nominal_pemasukan'
    ];

    public function addDataCashIn($data)
    {
        DB::table('data_kas_masuk')->insert($data);
    }

    public function deleteDataCashIn($id)
    {
        DB::table('data_kas_masuk')->where('id', $id)->delete();
    }
}

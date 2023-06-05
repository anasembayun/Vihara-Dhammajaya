<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Leluhur extends Model
{
    use HasFactory;

    protected $table = 'data_leluhur';
    public $timestamps = false;

    protected $fillable = [
        'id_pemesan',
        'nama_mendiang',
        'relasi',
        'tempat_lahir',
        'tanggal_lahir',
        'tempat_meninggal',
        'tanggal_meninggal',
        'transaksi_terakhir',
        'periode_pemesanan',
        // 'periode', //gk di pake
    ];

    public function addDataLeluhur($data)
    {
        DB::table('data_leluhur')->insert($data);
    }

    public function editDataLeluhur($id, $data)
    {
        DB::table('data_leluhur')->where('id', $id)->update($data);
    }

    public function pemesan()
    {
        return $this->belongsTo(UserJamaat::class, 'id_pemesan', 'id_code');
    }

    public function lokasi_foto()
    {
        return $this->hasOne(detail_pesan_foto::class, 'id_leluhur', 'id');
    }
}

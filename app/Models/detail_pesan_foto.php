<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class detail_pesan_foto extends Model
{
    use HasFactory;

    protected $table = "detail_pesan_foto";
    public $timestamps = false;
    // protected $primaryKey = "id";
    protected $fillable = [
        'kode',
        'kode_lokasi',
        'status',
        'id_leluhur'
    ];
    
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public function addDataPesanFoto($data)
    {
        DB::table('detail_pesan_foto')->insert($data);
    }
}

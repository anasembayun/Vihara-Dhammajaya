<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailDonasi extends Model
{
    use HasFactory;

    protected $table = 'detail_donasi';

    protected $fillable = [
        'id_data_donasi',
        'id_usr_jamaat',
        'jumlah_donasi',
    ];

    public function addDataDetailDonasi($data)
    {
        DB::table('detail_donasi')->insert($data);
    }
}

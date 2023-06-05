<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class absensiJamaat extends Model
{
    use HasFactory;

    protected $table = 'data_absensi_jamaat';

    protected $fillable = [
        'idjamaat',
        'idkegiatan',
    ];

    public function addDataAbsensiJamaat($data)
    {
        DB::table('data_absensi_jamaat')->insert($data);
    }

    public function deleteDataAbsensiJamaatByIdKegiatan($id)
    {
        DB::table('data_absensi_jamaat')->where('idkegiatan', $id)->delete();
    }
}

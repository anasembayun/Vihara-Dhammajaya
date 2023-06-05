<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = 'data_berita';

    protected $fillable = [
        'id_penulis',
        'judul_berita',
        'tanggal_berita_dibuat',
        'isi_berita',
        'foto_berita',
    ];

    public function addDataNews($data)
    {
        DB::table('data_berita')->insert($data);
    }

    public function editDataNews($id, $data)
    {
        DB::table('data_berita')->where('id', $id)->update($data);
    }

    public function deleteDataNews($id)
    {
        DB::table('data_berita')->where('id', $id)->delete();
    }

    public function detailDataNews($id)
    {
        return DB::table('data_berita')->where('id', $id)->first();
    }
}

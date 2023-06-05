<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAccess extends Model
{
    use HasFactory;
    protected $table = 'data_access';

    protected $fillable = [
        'nama',
        'keterangan'
    ];

    public function details()
    {
        return $this->belongsToMany(Role::class, 'detail_role', 'id_access', 'id_role');
    }
}

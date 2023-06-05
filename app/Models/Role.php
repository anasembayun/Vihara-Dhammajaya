<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'data_role';

    protected $fillable = [
        'nama',
        'keterangan'
    ];

    public function details(){
        return $this->belongsToMany(DataAccess::class, 'detail_role', 'id_role', 'id_access');
    }
}

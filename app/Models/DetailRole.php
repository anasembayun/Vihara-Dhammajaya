<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailRole extends Model
{
    use HasFactory;

    protected $table = 'detail_role';
    public $timestamps = false;

    protected $fillable = [
        'id_role',
        'id_access',
    ];
}

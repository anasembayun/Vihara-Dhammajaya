<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Access extends Model
{
    use HasFactory;

    protected $table = 'access';

    protected $fillable = [
        'username',
        'access_ketua',
        'access_bendahara',
        'access_supervisor',
        'access_operator',
    ];

    public function editAccess($id, $data)
    {
        DB::table('access')->where('id', $id)->update($data);
    }

    public function deleteAccess($username)
    {
        DB::table('access')->where('username', $username)->delete();
    }
}

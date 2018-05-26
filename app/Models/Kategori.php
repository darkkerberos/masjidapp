<?php

namespace MasjidApp\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'kategori';

    protected $fillable = [
        'nama_kategori'
    ];
}

<?php

namespace MasjidApp\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    //
    protected $table = 'profil';

    protected $fillable = ['isi_profil', 'sejarah'];

}

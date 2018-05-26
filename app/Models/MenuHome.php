<?php

namespace MasjidApp\Models;

use Illuminate\Database\Eloquent\Model;

class MenuHome extends Model
{
    //
    protected $table = "home";

    protected $fillable = [
        'pict_banner', 'title_banner'
    ];

}

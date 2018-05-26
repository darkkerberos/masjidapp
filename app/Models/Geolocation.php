<?php

namespace MasjidApp\Models;

use Illuminate\Database\Eloquent\Model;

class Geolocation extends Model
{
    //
    protected $table = 'geolocation';

    protected $fillable = [
        'ip_start', 'ip_end', 'country', 'stateprov', 'city'
    ];
}

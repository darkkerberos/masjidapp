<?php

namespace MasjidApp\Models;

use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    //
    protected $table = "pengunjung";

    protected $fillable = [
        'ip_address', 'os', 'user_agent', 'created_at'
    ];

}

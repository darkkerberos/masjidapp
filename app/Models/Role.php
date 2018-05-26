<?php

namespace MasjidApp\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = "role";
    protected $fillable = [
        'role_name'
    ];

    public function user()
    {
        return $this->belongsTo('MasjidApp\User');
    }
}

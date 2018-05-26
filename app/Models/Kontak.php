<?php

namespace MasjidApp\Models;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'kontak1';
    protected $fillable = [
        'telepon1', 'telepon2', 'alamat', 'longlat', 'email', 'fb_link', 'twitter_link', 'instagram_link'
    ];
}

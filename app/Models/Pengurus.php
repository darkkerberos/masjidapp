<?php

namespace MasjidApp\Models;

use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    //
    protected $table = "pengurus";
    protected $primaryKey = 'id_pengurus';

    protected $fillable = [
        'nama_pengurus', 'email', 'foto', 'phone', 'is_deleted'
    ];

    public function user(){
        return $this->hasMany('MasjidApp\User', 'id_user');
    }
}

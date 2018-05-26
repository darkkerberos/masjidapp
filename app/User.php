<?php

namespace MasjidApp;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'id_user', 'name', 'email', 'password', 'role_id', 'is_deleted'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pengurus(){
        return $this->belongsTo('MasjidApp\Pengurus', 'email', 'email');
    }

    public function role(){
        return $this->hasOne('MasjidApp\Models\Role', 'id', 'role_id');
    }


}

<?php

namespace MasjidApp\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    //
    protected $table = "artikel";
    protected $primaryKey = 'id';
    //protected $hidden = "id";

    protected $fillable = [
        'judul_artikel', 'slug_url', 'konten', 'id_kategori', 'id_user','cover_bg', 'deskripsi_singkat'
    ];

    public function user(){
        return $this->hasOne('MasjidApp\User', 'id_user', 'id_user');
    }

    public function kategori(){
        return $this->hasOne('MasjidApp\Models\Kategori', 'id', 'id_kategori');
    }
}

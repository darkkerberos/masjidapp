<?php

namespace MasjidApp;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    //
    protected $primaryKey = 'id_event';

    protected $fillable = [
        'nama_event', 'isi_event'
    ];
}

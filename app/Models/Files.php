<?php

namespace MasjidApp;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    //
    protected $primaryKey = 'id_files';

    protected $fillable = [
        'file_name', 'display_name', 'extension', 'content_type', 'file_size'
    ];
}

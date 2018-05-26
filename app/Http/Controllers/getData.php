<?php

namespace MasjidApp\Http\Controllers;

use Illuminate\Http\Request;
use MasjidApp\Pengurus;
use MasjidApp\User;

class getData extends Controller
{
    public function dataPengurus(){
        $pengurus = Pengurus::all();
        $data = $pengurus;
        return $data;
    }
}

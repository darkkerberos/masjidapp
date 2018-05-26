<?php

namespace MasjidApp\Http\Controllers;

use Illuminate\Http\Request;
use MasjidApp\Models\Kontak;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class KontakController extends Controller
{
    public function __construct()
    {

    }

    public function index() {
        $kontak = Kontak::get()->first();
        return view('kontak')->with('kontak', $kontak);
    }
}

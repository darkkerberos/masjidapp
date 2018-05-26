<?php

namespace MasjidApp\Http\Controllers\backend;

use MasjidApp\Models\Artikel;
use MasjidApp\User;
use Illuminate\Http\Request;
use MasjidApp\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use MasjidApp\Models\Kategori;
use Illuminate\Support\Facades\Auth;



class AdminProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::get();
        $kategori->user = Auth::user()->id_user;
        return Response::view('admin.artikel', compact('kategori'));
    }

    public function editProfile(Request $req)
    {

    }
}

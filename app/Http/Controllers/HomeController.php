<?php

namespace MasjidApp\Http\Controllers;

use Illuminate\Http\Request;
use MasjidApp\Helpers\ViewerStatistic;
use MasjidApp\Models\MenuHome;
use MasjidApp\Models\Artikel;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ViewerStatistic::addViewer();
        $artikel = DB::table('artikel')
            ->leftJoin('kategori', 'artikel.id_kategori', '=', 'kategori.id')
            ->leftJoin('users', 'artikel.id_user', '=', 'users.id_user')
            ->orderBy('artikel.created_at', 'desc')
            ->take(3)
            ->get();
        $home = MenuHome::get()->first();
        return view('home')->with(['menuhome'=> $home, 'artikel'=>$artikel]);
    }
}

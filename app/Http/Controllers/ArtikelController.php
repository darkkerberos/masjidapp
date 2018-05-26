<?php

namespace MasjidApp\Http\Controllers;

use Illuminate\Http\Request;
use MasjidApp\Models\Artikel;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Resources\Json\PaginatedResourceResponse;


class ArtikelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Artikel::get()->first();
        return view('artikel')->with('artikel', $artikel);
    }

    public function kategori($kategori)
    {
        $kat = ucwords(str_replace("-", " ", $kategori));
        $artikel = DB::table('artikel')
            ->leftJoin('kategori', 'artikel.id_kategori', '=', 'kategori.id')
            ->leftJoin('users', 'artikel.id_user', '=', 'users.id_user')
            ->where('kategori.nama_kategori', '=', "$kat")
            ->orderBy('artikel.created_at', 'desc')
            ->paginate(3);
        $pagination = $artikel->links();
       // dd($artikel->links());
        return view('artikel')->with(['artikels' => $artikel, 'kategori' => $kat, 'pagination'=>$pagination ]);
    }

    public function detail($kategori, $slug_url)
    {
        $kat = $kategori;
        $slug = $slug_url;
        $artikel = DB::table('artikel')
            ->leftJoin('kategori', 'artikel.id_kategori', '=', 'kategori.id')
            ->leftJoin('users', 'artikel.id_user', '=', 'users.id_user')
            ->where('artikel.slug_url', '=', "$slug_url")
            ->get()->first();
        $kat_ = ucwords(str_replace("-", " ", $kategori));
        $artikels = DB::table('artikel')
            ->select('*', 'artikel.id as id', 'artikel.created_at as created_at')
            ->leftJoin('kategori', 'artikel.id_kategori', '=', 'kategori.id')
            ->leftJoin('users', 'artikel.id_user', '=', 'users.id_user')
            ->where('kategori.nama_kategori', '=', "$kat_")
            ->orderBy('artikel.created_at', 'desc')
            ->get();
        $page = array();
        $currentpage = 1;
        $numpage = 1;
        $totalpage = 0;
        foreach ($artikels as $ar) {
            if ($ar->slug_url == $artikel->slug_url) {
                $currentpage = $numpage;
            }
            $totalpage = $numpage;
            $numpage++;
        }
        $numpage_ = 1;
        foreach ($artikels as $ar) {
            $nextpage = $currentpage + 1;
            $prevpage = $currentpage - 1;
            if ($nextpage == $numpage_) {
                $page["next"] = $ar->slug_url;
            }
            if ($prevpage == $numpage_) {
                $page["prev"] = $ar->slug_url;
            }

            if($nextpage > $totalpage){
                $page['next'] = 'mentok';
            }
            if($prevpage < 1){
                $page['prev'] = 'mentok';
            }

            $numpage_++;
        }

        //print_r($page);
        //dd($artikels);
        return view('artikel_detail')->with(['kategori' => $kat, 'slug' => $slug, 'artikel' => $artikel, 'page' => $page]);
    }
}

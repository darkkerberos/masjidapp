<?php

namespace MasjidApp\Http\Controllers\backend;

use function foo\func;
use MasjidApp\Models\Artikel;
use MasjidApp\User;
use Illuminate\Http\Request;
use MasjidApp\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use MasjidApp\Models\Kategori;
use Illuminate\Support\Facades\Auth;



class ArtikelController extends Controller
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

    public function tambahArtikel(Request $req)
    {
        if($req->ajax()){
            $resp = null;
            $valid = Validator::make($req->all(), [
                'judul_artikel' => 'required|string',
                'slugurl_artikel' => 'required|string|unique:artikel,slug_url',
                'kategori_artikel' => 'required|int',
                'konten_artikel' => 'required|string'
            ],[
                'kategori_artikel.required' => 'Harap pilih kategori artikel',
                'judul_artikel.required' => 'Harap isi judul artikel',
                'slugurl_artikel.unique' => 'Slug url sudah ada, ganti yg lain',
                'slugurl_artikel.required' => 'Harap isi slug url, untuk akses url',
                'konten_artikel.required' => 'Harap isi konten artikel   '
            ]);

            if ($valid->passes()){
                /* try to update */
                try {
                    $artikel = new Artikel();
                    $artikel->judul_artikel = $req->judul_artikel;
                    $artikel->slug_url = $req->slugurl_artikel;
                    $artikel->konten = $req->konten_artikel;
                    $artikel->cover_bg = $req->feature_image;
                    $artikel->deskripsi_singkat = $req->deskripsi;
                    $artikel->id_kategori = $req->kategori_artikel;
                    $artikel->id_user = $req->user;
                    $artikel->save();
                    $resp = response()->json(['success'=>'Berhasil tambah artikel']);
                }catch (exception $e){
                    $resp = response()->json(['error'=>$e]);
                }

            }else{
                $resp = response()->json(['error'=>$valid->errors()]);
            }
            return json_encode($resp);
        }else {
            $resp = response()->json(['error'=>"not ajax"]);
            return json_encode($resp);
        }
    }

    public function editArtikel(Request $req)
    {
        if($req->ajax()){
            $artikelid = $req->artikelid;
            $valid = Validator::make($req->all(), [
                'artikelid' => 'required|int',
                'judul_artikel' => 'required|string',
                "slugurl_artikel' => 'required|string|unique:artikel,slug_url,$artikelid",
                'kategori_artikel' => 'required|int',
                'konten_artikel' => 'required|string'
            ],[
                'artikelid.required' => 'Anda belum memilih artikel yg akan di edit!',
                'kategori_artikel.required' => 'Harap pilih kategori artikel',
                'judul_artikel.required' => 'Harap isi judul artikel',
                'slugurl_artikel.required' => 'Harap isi slug url, untuk akses url',
                'konten_artikel.required' => 'Harap isi konten artikel   '
            ]);

            if ($valid->passes()){
                /* try to update */
                try {
                    $artikel = Artikel::find($req->artikelid);
                    $artikel->judul_artikel = $req->judul_artikel;
                    $artikel->slug_url = $req->slugurl_artikel;
                    $artikel->konten = $req->konten_artikel;
                    $artikel->cover_bg = $req->feature_image;
                    $artikel->deskripsi_singkat = $req->deskripsi;
                    $artikel->id_kategori = $req->kategori_artikel;
                    $artikel->id_user = $req->user;
                    $artikel->update();
                    $resp = response()->json(['success'=>'Berhasil edit artikel']);
                }catch (exception $e){
                    $resp = response()->json(['error'=>$e]);
                }
            }else{
                $resp = response()->json(['error'=>$valid->errors()]);
            }
            return json_encode($resp);
        }else {
            return json_encode("no");
        }
    }

    public function hapusArtikel(Request $req){
        $resp = null;
        if($req->ajax()){
            $valid = Validator::make($req->all(),
                ['artikel' => 'required|int']
            );
            if($valid->passes()){
                $artikel = Artikel::find($req->artikel);
                $artikel->delete();
                $resp = ["success" => "berhasil dihapus"];
            }else{
                $resp = ["error" => $valid->errors()];
            }
        }else{
            $resp = ["error" => "Bukan ajax"];
        }
        return json_encode($resp);
    }

    public function tabelDataArtikel(){
        $artikel = Artikel::with('user', 'kategori')->orderBy('artikel.created_at','desc')->get();
        $data = array();
        $no = 0;
        foreach ($artikel as $list){
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->judul_artikel;
            $row[] = $list->user->name;
            $row[] = $list->kategori->nama_kategori;
            $row[] = "<div class='text-right'>
                        <button class='btn btn-info btn-icon' rel='tooltip' title='Lihat Data' 
                                data-toggle=\"modal\" data-target=\"#modalDialog\">
                                <i class=\"material-icons\">person</i><div class='ripple-container ' ></div>
                        </button>
                        <button class='btn btn-success btn-icon' rel='tooltip' title='Edit Data' 
                                data-toggle=\"modal\" onclick='artikel.viewedit(".$list->id.")' >
                                <i class=\"material-icons\">edit</i><div class='ripple-container ' ></div>
                        </button>
                        <button class='btn btn-danger btn-icon' rel='tooltip' title='Hapus Data' 
                                onclick=\"artikel.deleteArtikel('$list->id', '$list->judul_artikel')\">
                                <i class=\"material-icons\">close</i><div class='ripple-container ' ></div>
                        </button>
                      </div>";
            $data[] = $row;

        }
        return DataTables::of($data)->escapeColumns([])->make(true);
    }

    public function viewArtikel(Request $req){
        $idArtikel = $req->artikel;
        $artikel = Artikel::with('user', 'kategori')->find($idArtikel);
        return json_encode($artikel);
    }
}

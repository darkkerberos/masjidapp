<?php

namespace MasjidApp\Http\Controllers\backend;

use function foo\func;
use MasjidApp\Models\MenuHome;
use Illuminate\Http\Request;
use MasjidApp\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use MasjidApp\Models\Profil;

class MenuController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        $home = MenuHome::get()->first();
        return view('admin.menu_home')->with('menuhome', $home);
    }

    public function sejarah()
    {
        $sejarah = Profil::get()->first();
        return view('admin.menu_sejarah')->with('menusejarah', $sejarah);
    }

    public function profil()
    {
        $home = Profil::get()->first();
        return view('admin.menu_home')->with('menuhome', $home);
    }

    public function homeUpdate(Request $req){
        $resp = null;
        $idmenu = $req['menuhome_id'];
        $upload = $req['upload'];
        if($upload == 'true') {
            $pictbanner = $_FILES['pict_banner'];
            $file = $req->file('pict_banner');
        }
        $valid = Validator::make($req->all(),[
                'menuhome_id' => 'required|int|max:191|',
                'title_banner' => 'required|string',
                'desc_title' => "required|string"
                ]);
        if($valid->passes()){
            try {
                $menuhome = MenuHome::find($idmenu);
                $menuhome->title_banner = $req['title_banner'];
                $menuhome->desc_title = $req['desc_title'];
                if($upload == 'true'){
                    if($req->hasFile('pict_banner')){
                        $namafile = $pictbanner['name'];
                        if(!file_exists(public_path().'/assets/img/mesjid/'.md5($idmenu.$namafile).'.jpg')) {
                            $file->move(public_path() . '/assets/img/mesjid/', md5($idmenu. $namafile) . '.jpg');
                        }
                        $menuhome->pict_banner = "/assets/img/mesjid/".md5($idmenu.$namafile).".jpg";
                    }
                }
                $menuhome->update();
                $resp = response()->json(['success'=>'berhasil update']);
            }catch (exception $e){
                $resp = response()->json(['error'=>$e]);
            }
        }else{
            $resp = response()->json(['error'=>$valid->errors()]);
        }
        return $resp;
    }

    public function sejarahUpdate(Request $req){
        $resp = null;
        $idsejarah = $req['menusejarah_id'];

        $valid = Validator::make($req->all(),[
            'menusejarah_id' => 'required|int|max:191|'
        ]);
        if($valid->passes()){
            try {
                $menusejarah = Profil::find($idsejarah);
                $menusejarah->sejarah = $req['konten_sejarah'];
                $menusejarah->update();
                $resp = response()->json(['success'=>'berhasil update']);
            }catch (exception $e){
                $resp = response()->json(['error'=>$e]);
            }
        }else{
            $resp = response()->json(['error'=>$valid->errors()]);
        }
        return json_encode($resp);
    }

    public function profilUpdate(Request $req){
        $resp = null;
        $idmenu = $req['menuprofil_id'];
        $upload = $req['upload'];
        if($upload == 'true') {
            $pictbanner = $_FILES['pict_banner'];
            $file = $req->file('pict_banner');
        }
        $valid = Validator::make($req->all(),[
            'menuhome_id' => 'required|int|max:191|',
            'title_banner' => 'required|string',
            'desc_title' => "required|string"
        ]);
        if($valid->passes()){
            try {
                $menuhome = MenuHome::find($idmenu);
                $menuhome->title_banner = $req['title_banner'];
                $menuhome->desc_title = $req['desc_title'];
                if($upload == 'true'){
                    if($req->hasFile('pict_banner')){
                        $namafile = $pictbanner['name'];
                        if(!file_exists(public_path().'/assets/img/mesjid/'.md5($idmenu.$namafile).'.jpg')) {
                            $file->move(public_path() . '/assets/img/mesjid/', md5($idmenu. $namafile) . '.jpg');
                        }
                        $menuhome->pict_banner = "/assets/img/mesjid/".md5($idmenu.$namafile).".jpg";
                    }
                }
                $menuhome->update();
                $resp = response()->json(['success'=>'berhasil update']);
            }catch (exception $e){
                $resp = response()->json(['error'=>$e]);
            }
        }else{
            $resp = response()->json(['error'=>$valid->errors()]);
        }
        return $resp;
    }
}

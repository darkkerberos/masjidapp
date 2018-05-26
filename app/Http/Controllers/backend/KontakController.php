<?php

namespace MasjidApp\Http\Controllers\backend;

use Illuminate\Http\Request;
use MasjidApp\Http\Controllers\Controller;
use MasjidApp\Models\Kontak;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class KontakController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $kontak = Kontak::get()->first();
        return view('admin.kontak')->with('kontak', $kontak);
    }

    public function update(Request $req){
        $resp = null;
        $idkontak = $req['kontak_id'];
        $valid = Validator::make($req->all(),[
            'kontak_id' => 'required|int|max:191|',
            'alamat' => 'string|nullable',
            'email' => 'string|email|nullable',
            'telepon1' => "string|nullable",
            'telepon2' => "string|nullable",
            'longlat' => "string|nullable",
            'fb_link' => "string|url|nullable",
            'twitter_link' => "string|url|nullable",
            'instagram_link' => "string|url|nullable",
        ]);
        if($valid->passes()){
            try {
                $kontak = Kontak::find($idkontak);
                $kontak->alamat = $req['alamat'];
                $kontak->email= $req['email'];
                $kontak->telepon1 = $req['telepon1'];
                $kontak->telepon2 = $req['telepon2'];
                $kontak->longlat = $req['longlat'];
                $kontak->fb_link = $req['fb_link'];
                $kontak->twitter_link = $req['twitter_link'];
                $kontak->instagram_link = $req['instagram_link'];
                $kontak->update();
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

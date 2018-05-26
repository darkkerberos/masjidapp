<?php

namespace MasjidApp\Http\Controllers\backend;

use function foo\func;
use MasjidApp\Models\Pengurus;
use MasjidApp\User;
use Illuminate\Http\Request;
use MasjidApp\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;



class PengurusController extends Controller
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
        $pengurus = Pengurus::get();
        return Response::view('admin.pengurus', compact('pengurus'));
    }

    public function tambahPengurus(Request $req)
    {
        if($req->ajax()){
            $resp = null;
            $tempArr = array();
            $tempArr['id_pengurus'] = $_POST['pengurusid'];
            $tempArr['nama_pengurus'] = $_POST['namapengurus'];
            $tempArr['phone'] = $_POST['phonepengurus'];
            $tempArr['email'] = $_POST['emailpengurus'];
            $file = null;
            if($req['upload'] == 'true') {
                $tempArr['fotopengurus'] = $_FILES['fotopengurus'];
                $file = $req->file('fotopengurus');
            }
            $valid = Validator::make($tempArr, [
                'nama_pengurus' => 'required|string|max:191|regex:/(^([a-zA-z]+)(\d+)?$)/u',
                'email' => "required|string|email|max:191|unique:pengurus,email",
                //'fotopengurus' => 'mimes:jpg,jpeg,png'
            ]);

            if ($valid->passes()){
                /* try to update */
                try {
                    $pengurus = new Pengurus();
                    $pengurus->nama_pengurus = $tempArr['nama_pengurus'];
                    $pengurus->email = $tempArr['email'];
                    $pengurus->phone = $tempArr['phone'];
                    $pengurus->is_deleted = 0;
                    $pengurus->save();
                    $idpengurus = $pengurus->id_pengurus;
                    $upPengurus = Pengurus::find($idpengurus);
                    if($req['upload'] == 'true'){
                        if($req->hasFile('fotopengurus')){
                            $namafile = $tempArr['fotopengurus']['name'];
                            if(!file_exists(public_path().'/img/pengurus/'.md5($idpengurus.$namafile).'.jpg')) {
                                $file->move(public_path() . '/img/pengurus/', md5($idpengurus . $namafile) . '.jpg');
                            }
                            $upPengurus->foto = "img/pengurus/".md5($idpengurus.$namafile).".jpg";
                        }
                    }else{
                        $upPengurus->foto = "img/pengurus/default-avatar.png";
                    }
                    $upPengurus->update();
                    $resp = response()->json(['success'=>'berhasil update']);
                }catch (exception $e){
                    $resp = response()->json(['error'=>$e]);
                }

            }else{
                $resp = response()->json(['error'=>$valid->errors()]);
                //$resp = response()->json(['error'=>$tempArr['fotopengurus']]);
            }
            return json_encode($resp);
        }else {
            $resp = response()->json(['error'=>"not ajax"]);
            return json_encode($resp);
        }
    }

    public function editPengurus(Request $req)
    {
        if($req->ajax()){
            $resp = null;
            $tempArr = array();
            $tempArr['id_pengurus'] = $_POST['pengurusid'];
            $tempArr['nama_pengurus'] = $_POST['namapengurus'];
            $tempArr['phone'] = $_POST['phonepengurus'];
            $tempArr['email'] = $_POST['emailpengurus'];
            $idpengurus = $tempArr['id_pengurus'];
            $file = null;
            if($req['upload'] == 'true') {
                $tempArr['fotopengurus'] = $_FILES['fotopengurus'];
                $file = $req->file('fotopengurus');
            }
            $valid = Validator::make($tempArr, [
                'id_pengurus' => 'required|int|max:191|',
                'nama_pengurus' => 'required|string|max:191|regex:/(^([a-zA-z]+)(\d+)?$)/u',
                'email' => "required|string|email|max:191|unique:pengurus,email,$idpengurus,id_pengurus",
                //'fotopengurus' => 'mimes:jpg,jpeg,png'
            ]);

            if ($valid->passes()){
                /* try to update */
                try {
                    $pengurus = Pengurus::find($tempArr['id_pengurus']);
                    $pengurus->nama_pengurus = $tempArr['nama_pengurus'];
                    $pengurus->email = $tempArr['email'];
                    $pengurus->phone = $tempArr['phone'];
                    if($req['upload'] == 'true'){
                        if($req->hasFile('fotopengurus')){
                            $namafile = $tempArr['fotopengurus']['name'];
                            if(!file_exists(public_path().'/img/pengurus/'.md5($idpengurus.$namafile).'.jpg')) {
                                $file->move(public_path() . '/img/pengurus/', md5($idpengurus . $namafile) . '.jpg');
                            }
                            $pengurus->foto = "img/pengurus/".md5($idpengurus.$namafile).".jpg";
                        }
                    }
                    $pengurus->update();
                    $resp = response()->json(['success'=>'berhasil update']);
                }catch (exception $e){
                    $resp = response()->json(['error'=>$e]);
                }

            }else{
               $resp = response()->json(['error'=>$valid->errors()]);
               //$resp = response()->json(['error'=>$tempArr['fotopengurus']]);
            }
            return json_encode($resp);
        }else {

            return json_encode("no");
        }
    }

    public function hapusPengurus(Request $req){
        $resp = null;
        if($req->ajax()){
            $valid = Validator::make($req->all(),
                ['pengurus' => 'required|int']
            );
            if($valid->passes()){
                $pengurus = Pengurus::find($req->pengurus);
                $pengurus->is_deleted = 1;
                $pengurus->update();
                $resp = ["success" => "good"];
            }else{
                $resp = ["error" => $valid->errors()];
            }
        }else{
            $resp = ["error" => "Bukan ajax"];
        }
        return json_encode($resp);
    }

    public function tabelDataPengurus(){
        $pengurus = Pengurus::where('is_deleted', '!=', 1)->get();
        $data = array();
        $no = 0;
        foreach ($pengurus as $list){
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->nama_pengurus;
            $row[] = $list->email;
            $row[] = "<img src='".asset($list->foto)."' style='max-width:50px'/>";
            $row[] = $list->phone;
            $row[] = "<div class='text-right'>
                        <button class='btn btn-info btn-icon' rel='tooltip' title='Lihat Data' 
                                data-toggle=\"modal\" data-target=\"#modalDialog\">
                                <i class=\"material-icons\">person</i><div class='ripple-container ' ></div>
                        </button>
                        <button class='btn btn-success btn-icon' rel='tooltip' title='Edit Data' 
                                data-toggle=\"modal\" onclick='pengurus.viewedit(".$list->id_pengurus.")' >
                                <i class=\"material-icons\">edit</i><div class='ripple-container ' ></div>
                        </button>
                        <button class='btn btn-danger btn-icon' rel='tooltip' title='Hapus Data' 
                                onclick=\"pengurus.deletePengurus('$list->id_pengurus', '$list->nama_pengurus')\">
                                <i class=\"material-icons\">close</i><div class='ripple-container ' ></div>
                        </button>
                      </div>";
            $data[] = $row;

        }
        return DataTables::of($data)->escapeColumns([])->make(true);
    }

    public function viewEdit(){
        $idPengurus = $_POST['pengurus'];
        $pengurus = Pengurus::find($idPengurus);
        $pengurus->foto = asset($pengurus->foto);

        return json_encode($pengurus);
    }
}

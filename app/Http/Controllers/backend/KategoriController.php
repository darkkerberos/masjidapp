<?php

namespace MasjidApp\Http\Controllers\backend;

use Illuminate\Http\Request;
use MasjidApp\Http\Controllers\Controller;
use MasjidApp\Models\Kategori;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;


class KategoriController extends Controller
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
        return Response::view('admin.kategori', compact('role'));
    }

    public function add(Request $req)
    {
        if($req->ajax()){
            $resp = null;
            $valid = Validator::make($req->all(), [
                'kategori_name' => 'required|string|max:191|unique:kategori,nama_kategori',
            ]);

            if ($valid->passes()){
                /* try to update */
                try {
                    $kategori = new Kategori();
                    $kategori->nama_kategori = $req['kategori_name'];
                    $kategori->save();
                    $resp = response()->json(['success'=>'Berhasil tambah kategori']);
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

    public function update(Request $req)
    {
        if($req->ajax()){
            $valid = Validator::make($req->all(), [
                'kategori_id' => 'required|int|max:11|',
                'kategori_name' => 'required|string|max:191|unique:kategori,nama_kategori',
            ]);
            if ($valid->passes()){
                /* try to update */
                try {
                    $kategori = Kategori::find($req['kategori_id']);
                    $kategori->nama_kategori = $req['kategori_name'];
                    $kategori->update();
                    $resp = response()->json(['success'=>'Berhasil update kategori']);
                }catch (exception $e){
                    $resp = response()->json(['error'=>$e]);
                }
            }else{
                $resp = response()->json(['error'=>$valid->errors()]);
            }
        }else {
            $resp = response()->json(['error'=>"not ajax"]);
        }
        return json_encode($resp);
    }

    public function delete(Request $req){
        $resp = null;
        if($req->ajax()){
            $valid = Validator::make($req->all(),
                ['kategori' => 'required|int']
            );
            if($valid->passes()){
                $kategori = Kategori::find($req->kategori);
                $kategori->delete();
                $resp = ["success" => "berhasil hapus"];
            }else{
                $resp = ["error" => $valid->errors()];
            }
        }else{
            $resp = response()->json(['error'=>"not ajax"]);
            return json_encode($resp);
        }
        return json_encode($resp);
    }

    public function data(){
        $kategori = Kategori::all();
        $data = array();
        $no = 0;
        foreach ($kategori as $list){
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->nama_kategori;
            $row[] = "<button class='btn btn-success btn-icon pull-right' rel='tooltip' title='Edit Data' 
                                data-toggle=\"modal\" onclick='kategori.viewedit(".$list->id.")' >
                                <i class=\"material-icons\">edit</i><div class='ripple-container ' ></div>
                        </button>
                        <button class='btn btn-danger btn-icon pull-right' rel='tooltip' title='Hapus Data' 
                                onclick=\"kategori.deleteKategori('$list->id', '$list->nama_kategori')\">
                                <i class=\"material-icons\">close</i><div class='ripple-container ' ></div>
                        </button>
                      </div>";
            $data[] = $row;

        }
        return DataTables::of($data)->escapeColumns([])->make(true);
    }

    public function view(Request $req){
        $kategoriid = $req['kategori'];
        $kategori = Kategori::find($kategoriid);
        return json_encode($kategori);
    }
}

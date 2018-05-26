<?php

namespace MasjidApp\Http\Controllers\backend;

use Illuminate\Http\Request;
use MasjidApp\Http\Controllers\Controller;
use MasjidApp\Models\Role;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
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
        $role = Role::get();
        return Response::view('admin.role', compact('role'));
    }

    public function add(Request $req)
    {
        if($req->ajax()){
            $resp = null;
            $valid = Validator::make($req->all(), [
                'role_name' => 'required|string|max:191|regex:/(^([a-zA-z]+)(\d+)?$)/u'
            ]);

            if ($valid->passes()){
                /* try to update */
                try {
                    $role = new Role();
                    $role->role_name = $req['role_name'];
                    $role->save();
                    $resp = response()->json(['success'=>'berhasil update']);
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
                'role_id' => 'required|int|max:11|',
                'role_name' => 'required|string|max:191|'
            ]);
            if ($valid->passes()){
                /* try to update */
                try {
                    $role = Role::find($req['role_id']);
                    $role->role_name = $req['role_name'];
                    $role->update();
                    $resp = response()->json(['success'=>'berhasil update']);
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

    public function delete(Request $req){
        $resp = null;
        if($req->ajax()){
            $valid = Validator::make($req->all(),
                ['role' => 'required|int']
            );
            if($valid->passes()){
                $role = Role::find($req->role);
                $role->delete();
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
        $role = Role::all();
        $data = array();
        $no = 0;
        foreach ($role as $list){
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->role_name;
            $row[] = "<div class='text-right'>
                        <button class='btn btn-success btn-icon' rel='tooltip' title='Edit Data' 
                                data-toggle=\"modal\" onclick='role.viewedit(".$list->id.")' >
                                <i class=\"material-icons\">edit</i><div class='ripple-container ' ></div>
                        </button>
                        <button class='btn btn-danger btn-icon' rel='tooltip' title='Hapus Data' 
                                onclick=\"role.deleteRole('$list->id', '$list->role_name')\">
                                <i class=\"material-icons\">close</i><div class='ripple-container ' ></div>
                        </button>
                      </div>";
            $data[] = $row;

        }
        return DataTables::of($data)->escapeColumns([])->make(true);
    }

    public function view(Request $req){
        $roleid = $req['role'];
        $role = Role::find($roleid);
        return json_encode($role);
    }
}

<?php

namespace MasjidApp\Http\Controllers\backend;

use Illuminate\Http\Request;
use MasjidApp\Http\Controllers\Controller;
use MasjidApp\User;
use MasjidApp\Models\Role;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
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
        $role = Role::get(['id', 'role_name']);
        return Response::view('admin.user', compact('role'));
    }

    public function add(Request $req)
    {
        if($req->ajax()){
            $resp = null;
            $valid = Validator::make($req->all(), [
                'user_id' => 'required|int|max:11|',
                'user_name' => 'required|string|max:191|unique:users,name',
                'user_email' => 'required|email|max:191|unique:users,email',
                'user_password' => 'required|string|min:6',
                'user_password_confirm' => 'required|string|min:6|same:user_password',
            ]);

            if ($valid->passes()){
                /* try to update */
                try {
                    $user = new User();
                    $user->name = $req['user_name'];
                    $user->email = $req['user_email'];
                    $user->foto = $req['feature_image'];
                    $user->password = bcrypt($req['user_password']);
                    $user->role_id = $req['user_role'];
                    $user->save();
                    $resp = response()->json(['success'=>'Berhasil tambah user']);
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
                'user_id' => 'required|int|max:11|',
                'user_name' => 'required|string|max:191|',
                'user_email' => 'required|email|max:191|',
            ]);
            if ($valid->passes()){
                /* try to update */
                try {
                    $user = User::find($req['user_id']);
                    $user->name = $req['user_name'];
                    $user->email = $req['user_email'];
                    $user->role_id = $req['user_role'];
                    //if($req->upload == 'true'){
                    $user->foto = $req['feature_image'];
                    //}
                    $user->update();
                    $resp = response()->json(['success'=>'Berhasil update user']);
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

    public function updatePassword(Request $req)
    {
        if($req->ajax()){
            $valid = Validator::make($req->all(), [
                'user_id' => 'required|int|max:11|',
                'user_password' => 'required|string|min:6',
                'user_password_confirm' => 'required|string|min:6|same:user_password',
            ]);
            if ($valid->passes()){
                /* try to update */
                try {
                    $user = User::find($req['user_id']);
                    $user->password = bcrypt($req['user_password']);
                    $user->update();
                    $resp = response()->json(['success'=>'Berhasil update password']);
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
                ['user' => 'required|int']
            );
            if($valid->passes()){
                $user = User::find($req->user);
                $user->is_deleted = 1;
                $user->update();
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
        $user = User::with('role')->where('is_deleted', '!=', 1)->get();
        $data = array();
        $no = 0;
        foreach ($user as $list){
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->name;
            $row[] = $list->email;
            $row[] = $list->role->role_name;
            $row[] = "<div class='text-right'><button class='btn btn-warning btn-icon' rel='tooltip' title='Change Password' 
                                data-toggle=\"modal\" onclick='user.viewpassword(".$list->id_user.")' >
                                <i class=\"material-icons\">lock_open</i><div class='ripple-container ' ></div>
                        </button>
                        <button class='btn btn-success btn-icon' rel='tooltip' title='Edit Data' 
                                data-toggle=\"modal\" onclick='user.viewedit(".$list->id_user.")' >
                                <i class=\"material-icons\">edit</i><div class='ripple-container ' ></div>
                        </button>
                        <button class='btn btn-danger btn-icon' rel='tooltip' title='Hapus Data' 
                                onclick=\"user.deleteUser('$list->id_user', '$list->name')\">
                                <i class=\"material-icons\">close</i><div class='ripple-container ' ></div>
                        </button>
                      </div>";
            $data[] = $row;

        }
        return DataTables::of($data)->escapeColumns([])->make(true);
    }

    public function view(Request $req){
        $userid = $req['user'];
        $user = User::find($userid);
        return json_encode($user);
    }
}

<?php

namespace MasjidApp\Http\Controllers\backend;

use Illuminate\Http\Request;
use MasjidApp\Http\Controllers\Controller;
use MasjidApp\User;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfilController extends Controller
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
        $profil = User::find(Auth::user()->id_user);
        return Response::view('admin.profile', compact('profil', $profil));
        //dd($profil);
    }

    public function updateProfile(Request $request)
    {
        $resp = null;
        $foto = null;
        $iduser = Auth::user()->id_user;
        $valid = Validator::make($request->all(), [
            'username' => "required|max:191|unique:users,name,$iduser,id_user",
            'email' => "required|max:191|email|unique:users,email,$iduser,id_user"
        ]);
        if ($valid->passes()) {
            $user = User::find($iduser);
            $user->name = $request->username;
            $user->email = $request->email;
            if ($request['upload'] == 'true') {
                $base64img = $request->imgCrop;
                $eximg = explode(';', $base64img);
                $imgType = $eximg[0];
                //validate imgtype
                $namafile = $_FILES['gantifoto']['name'];
                if ($imgType == 'data:image/jpeg' || $imgType == 'data:image/png') {
                    $base64_str = substr($eximg[1], strpos($eximg[1], ",") + 1);
                    $image = base64_decode($base64_str);
                    $success = file_put_contents(public_path() . "/img/pengurus/$namafile", $image);
                    if($success){

                    }else{
                        $resp = response()->json(['error' => 'File tidak berhasil disimpan']);
                        //return json_encode($resp);
                    }
                } else {
                    $resp = response()->json(['error' => 'Format tidak sesuai']);
                    //return json_encode($resp);
                }
                $user->foto = "/img/pengurus/$namafile";
            }
            $user->update();
            $resp = response()->json(['success' => 'berhasil update']);
            //return json_encode($resp);
        } else {
            $resp = response()->json(['error' => $valid->errors()]);
            //return json_encode($resp);
        }

        return json_encode($resp);



    }

    public function changePassword(Request $request)
    {
        $resp = null;
        $iduser = Auth::user()->id_user;
        $flag = false;
        if (!(Hash::check($request->current_password, Auth::user()->password))) {
            $flag = true;
            //$resp = response()->json(['error'=> (object) [ 'current_password' => 'password saat ini tidak cocok, silahkan coba lagi.']]);
        }
        $valid = Validator::make($request->all(), [
            'new_password' => 'required|string|min:6',
            'confirm_password' => 'required|string|min:6|same:new_password',
        ], [
            'new_password.required' => 'password baru tidak boleh kosong',
            'new_password.min' => 'password minimal 6 karakter',
            'confirm_password.required' => 'harap konfirmasi password',
            'confirm_password.same' => 'password tidak cocok    ',
        ]);
        if ($valid->passes()) {
            $user = User::find($iduser);
            $user->password = bcrypt($request->new_password);
            $user->update();
            $resp = response()->json(['success' => 'berhasil update']);
        } else {
            if ($flag) {
                $valid->errors()->add('current_password', 'password saat ini tidak cocok, silahkan coba lagi.');
                $resp = response()->json(['error' => $valid->errors()]);
            } else {

            }
        }
        return json_encode($resp);
    }
}

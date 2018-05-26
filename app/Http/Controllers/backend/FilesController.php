<?php

namespace MasjidApp\Http\Controllers\backend;

use Illuminate\Http\Request;
use MasjidApp\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    //
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
        $data = $this->data();
        return Response::view('admin.file', compact('data', $data));

        //dd($data);
    }

    public function data()
    {
        $storage = Storage::disk('public')->files('files');
        $arrStorage = array();
        foreach ($storage as $list)
        {
            if(\File::extension($list) != '.tmb') {
                $arrStorage[] = ["filename" => $list, "lastModified" => Storage::disk('public')->lastModified($list), "ext"=>\File::extension($list)];
            }
        }
        return empty($storage) ? null : $arrStorage;
    }

    public function uploadFiles(Request $request)
    {
        $resp = array();
        $files = $request->file('files');
        $file_count = count($files);
        $uploadcount = 0;
        if($files != null) {
            foreach ($files as $file) {
                $rules = array('file' => 'required|mimes:png,gif,jpeg,pdf,doc|max:5000'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                $validator = Validator::make(array('file' => $file), $rules);
                if ($validator->passes()) {
                    $destinationPath = 'files';
                    $filename = $file->getClientOriginalName();
                    if($file->move($destinationPath, $filename)){
                        $resp[] = ['success'=>$filename.' berhasil di upload'];
                    }else{
                        $resp[] = ['error'=>$filename.' gagal di upload'];
                    }
                    $uploadcount++;
                } else {
                    $resp[] = ['error'=>$validator->errors()];
                }
            }
        }else{
            $resp[] = ['error'=>'File tidak boleh kosong'];
        }
        return json_encode($resp);
    }

    public function deleteFiles(Request $request)
    {
        $resp = null;
        $fileName = $request->fileName;
        $exists = Storage::disk('public')->has($fileName);
        if($exists)
        {
            Storage::disk('public')->delete($fileName);
            $resp = ["success"=>"File berhasil dihapus"];
        }else{
            $resp = ['error'=>"File tidak ada, ga jadi dihapus"];
        }
        return json_encode($resp);
    }
}

<?php

namespace MasjidApp\Http\Controllers;

use Illuminate\Http\Request;
use MasjidApp\Pengurus;
use MasjidApp\User;
use Yajra\DataTables\DataTables;

class GetDataController extends Controller
{
    public function tabelDataPengurus(){
        $pengurus = Pengurus::all();
        $data = array();
        $no = 0;
        foreach ($pengurus as $list){
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->nama_pengurus;
            $row[] = $list->email;
            $row[] = $list->foto;
            $row[] = $list->phone;
            $row[] = "<a onclick='editForm(".$list->id_pengurus.")' class='btn btn-primary btn-round'>
                        Edit <div class='ripple-container ' ></div></a><a onclick='deleteData(".$list->id_pengurus.")' class='btn btn-primary btn-round'>
                        hapus <div class='ripple-container ' ></div></a>";
            $data[] = $row;

        }
        return DataTables::of($data)->escapeColumns([])->make(true);
    }
}

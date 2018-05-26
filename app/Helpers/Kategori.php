<?php
namespace MasjidApp\Helpers;

use MasjidApp\Models\Kategori;

class KategoriHelpers {
    public static function getDataKategori(){
        $kategori = Kategori::all();
        $replace = new \stdClass();
        foreach ($kategori as $kat){
            $find = " ";
            $replace->slug = str_replace($find, "-", $kat->nama_kategori);
            $kategori->slug = $replace;
        }
        return $kategori;
    }

    public static function kategoriParseStrip($find){
        $kategori = Kategori::all();
        $replace = array();
        foreach ($kategori as $kat){
            $replace[] = str_replace($find, "-", $kat->nama_kategori);
        }
        return $replace;
    }
}
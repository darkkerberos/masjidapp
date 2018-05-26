<?php

namespace MasjidApp\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;

class JadwalController extends Controller
{
    public function index()
    {
//        $client = new Client();
//        $crawler = $client->request('GET', 'https://www.jadwalsholat.org/adzan/monthly.php?id=47');
//        $texts = $crawler->filter('table')->text();
//        $crawler->filter('.table_light')->each(function($node){
//            echo $node->text()." \n\n";
//        });
//        return view('jadwal', ['texts' => $texts]);
        return view('jadwal');
    }
}

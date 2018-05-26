<?php

namespace MasjidApp\Http\Controllers;

use Illuminate\Http\Request;
use MasjidApp\Models\Geolocation;
use MasjidApp\Models\Pengunjung;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Resources\Json\PaginatedResourceResponse;

class GeoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengunjung = Pengunjung::get();
//        dd($pengunjung);

        $geoloc = array();
        foreach ($pengunjung as $p){
            $ip = $p->ip_address;
            $geoloc[] = $this->Do_Lookup($ip);
            //echo "$ip <br>";
        }
        //$tes = $this->Do_Lookup("209.126.136.4");
        dd($geoloc);
    }

     function Lookup($addr) {
        if ($ret = $this->Do_Lookup(self::Addr_Type($addr), inet_pton($addr))) {
            $ret->ip_start = inet_ntop($ret->ip_start);
            $ret->ip_end = inet_ntop($ret->ip_end);
            return $ret;
        } else {
            throw new \Exception("address not found");
        }
    }

    public function Do_Lookup($addr_start) {
        $geoloc = DB::table('dbip_lookup')
            ->where([
                ['addr_type','=', "ipv4"],
                ['ip_start', '<=', "$addr_start"]])
            ->orderBy('ip_start', 'desc')
            ->limit(1)
            ->get()
            ->first();
//        $geoloc = DB::select("select * from dbip_lookup where addr_type = '$addr_type'
//                      and ip_start <= '$addr_start' order by ip_start desc ");

        return $geoloc;
    }

    static private function Addr_Type($addr) {
        if (ip2long($addr) !== false) {
            return "ipv4";
        } else if (preg_match('/^[0-9a-fA-F:]+$/', $addr) && @inet_pton($addr)) {
            return "ipv6";
        }
        throw new \Exception("unknown address type for {$addr}");
    }

}
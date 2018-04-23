<?php

namespace App\Http\Controllers;

use App\Models\info;
use App\Models\laporan;
use App\Models\perkembanganLap;
use Illuminate\Http\Request;
use Auth;

class profilUserController extends Controller
{
    public function index(){
        $user=auth::user();
         $laporans = laporan::where('user_id',$user->id)->paginate(30);
        $laporans2 = laporan::where('user_id',$user->id)->get();

        $tindaks=[];$n=0;
        foreach ($laporans2 as $laporan) {
            $tindak=perkembanganLap::where('laporan_id',$laporan->id)->first();
            if($tindak!=null){
                $tindaks[$n]=perkembanganLap::where('laporan_id',$laporan->id)->first();
            }
            $n++;
        }
//        dd($tindaks);
        $mesage='';
        $infos= info::where('user_id',$user->id)->paginate(5);
//        dd($infos);
        return view('user.profil.index',compact('mesage','laporans','infos','tindaks'));
    }

    public function showInfo($id){
        $info= info::where('id',$id)->first();

        return view('user.profil.show',compact('info'));
    }

    public function showTindak($id){
        $tindaks= perkembanganLap::where('laporan_id',$id)->get();
        $laporan = laporan::where('id',$id)->first();
        return view('user.profil.showTindak',compact('tindaks','laporan'));
    }
}

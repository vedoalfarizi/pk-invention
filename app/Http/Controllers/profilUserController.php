<?php

namespace App\Http\Controllers;

use App\Models\info;
use App\Models\laporan;
use Illuminate\Http\Request;
use Auth;

class profilUserController extends Controller
{
    public function index(){
        $user=auth::user();
         $laporans = laporan::where('user_id',$user->id)->get();
        $mesage='';
        $infos= info::where('user_id',$user->id)->get();
//        dd($infos);
        return view('user.profil.index',compact('mesage','laporans','infos'));
    }

    public function showInfo($id){
        $info= info::where('id',$id)->first();

        return view('user.profil.show',compact('info'));
    }
}

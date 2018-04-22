<?php

namespace App\Http\Controllers;

use App\Models\laporan;
use Illuminate\Http\Request;
use Auth;

class profilUserController extends Controller
{
    public function index(){
        $user=auth::user();
         $laporans = laporan::where('user_id',$user->id)->get();
        $mesage='';
        return view('user.profil.index',compact('mesage','laporans'));
    }
}

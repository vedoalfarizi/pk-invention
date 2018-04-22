<?php

namespace App\Http\Controllers;

use App\Models\profile;
use Illuminate\Http\Request;
use App\User;

class penggunaController extends Controller
{
    public function index(){
        $penggunas = user::where('role',1)->get();
//        dd($penggunas);

        return view('pengguna.index', compact('penggunas'));
    }
    public function verifikasi($id){
        $user = user::where('id',$id)->first();
        $user->update([
           'status_verifikasi' => 1,
        ]);
        $penggunas = user::where('role',1)->get();
        return view('pengguna.index', compact('penggunas'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\info;
use Illuminate\Http\Request;

class cariInfoController extends Controller
{
    public function index(Request $request){
        $cari = $request->all();

        $infos = info::where('judul', 'like', '%'.$cari['cari'].'%')->paginate(20);
        return view('user.infos.index')
            ->with('infos', $infos);
    }
}

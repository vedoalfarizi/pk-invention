<?php

namespace App\Http\Controllers;

use App\Models\laporan;
use Illuminate\Http\Request;

class progresLaporanController extends Controller
{
   public function index(){
       $laporans_terima = laporan::where('status_laporan',1)->paginate(25);
       $laporans_tolak = laporan::where('status_laporan',2)->paginate(25);
       return view('admin.pelaporans.index', compact('laporans_terima','laporans_tolak'));
   }
}

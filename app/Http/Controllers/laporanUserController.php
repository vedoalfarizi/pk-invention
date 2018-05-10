<?php

namespace App\Http\Controllers;

use App\Mail\LaporanMasuk;
use Illuminate\Http\Request;
use Auth;
use Flash;
use App\Models\laporan;
use Illuminate\Support\Facades\Mail;

class laporanUserController extends Controller
{
    public function create(request $request){
        $input=$request->all();

       $input['user_id']=auth::user()->id;

        laporan::create($input);

        $laporan = laporan::orderBy('id', 'desc')->first();

        Mail::to("lombaasimetr15@gmail.com")->send(new LaporanMasuk($laporan));

        Flash::success('Laporan saved successfully.');
        return redirect(action('profilUserController@index'));
    }

    public function edit(request $request){
        $input=$request->all();

        $input['user_id']=auth::user()->id;

        laporan::create($input);

        Flash::success('Laporan berhasil diubah.');
        return redirect(action('profilUserController@index'));
    }
}

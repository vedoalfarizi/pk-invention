<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Flash;
use App\Models\laporan;

class laporanUserController extends Controller
{
    public function create(request $request){
        $input=$request->all();

       $input['user_id']=auth::user()->id;

        laporan::create($input);

        Flash::success('Laporan saved successfully.');
        return redirect(route('home'));
    }
}

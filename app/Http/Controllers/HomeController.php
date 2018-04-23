<?php

namespace App\Http\Controllers;

use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 0){
            return view('admin.home');
        }elseif(Auth::user()->role == 1){
            if(Auth::user()->status_verifikasi != 0){
                return view('welcome');
            }else{
                $profile = profile::where('user_id', Auth::user()->id)->first();

                    return redirect(action('profilUserController@index'));


            }
        }

    }
}

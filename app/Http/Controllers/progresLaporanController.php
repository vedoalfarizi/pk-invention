<?php

namespace App\Http\Controllers;

use App\Models\laporan;
use App\Models\perkara;
use App\Models\perkembanganLap;
use Illuminate\Http\Request;
use App\User;
use Flash;

class progresLaporanController extends Controller
{
   public function index(){
       $laporans_terima = laporan::where('status_laporan',1)->paginate(25);
       $laporans_tolak = laporan::where('status_laporan',2)->paginate(25);
       return view('admin.pelaporans.index', compact('laporans_terima','laporans_tolak'));
   }

   public function cari(request $request){
      $cari = $request['cari'];
       $laporans_terima = laporan::where('status_laporan',1)->paginate(25);
       $laporans_tolak = laporan::where('status_laporan',2)->paginate(25);

       $hasil=0;
       //CARI BERD NAMA
       $user = user::where('name',$cari)->first();
       if($user!=null){
           $laporans_user = laporan::where('user_id', $user->id)->first();
           if($laporans_user==null){
               //cari berd nama
              $hasil=1;
           }
           else{
               //cari berd nama
               Flash::success('Laporan berhasil ditemukan');
               $laporans_terima = laporan::where('user_id', $user->id)->where('status_laporan',1)->paginate(25);
               $laporans_tolak = laporan::where('user_id', $user->id)->where('status_laporan',2)->paginate(25);
               $hasil=2;
           }
       }
       //CARI BERDS NOMOR
       $laporans_no = laporan::where('no_surat', $cari)->first();
       if($laporans_no == null){
            //no surat tidak ada
           if($hasil!=2){
               $hasil=1;
           }

        }
       else{
           //cari berd no surat
           Flash::success('Laporan berhasil ditemukan');
           $laporans_terima = laporan::where('no_surat', $cari)->where('status_laporan',1)->paginate(25);
           $laporans_tolak = laporan::where('no_surat', $cari)->where('status_laporan',2)->paginate(25);
           $hasil=0;
       }

       if($hasil==1){
           Flash::error('Laporan tidak ada');
       }

       return view('admin.pelaporans.index', compact('laporans_terima','laporans_tolak'));
   }

    public function cariPerkara (request $request){
        $cari = $request['cari'];
        $laporans_terima = laporan::where('status_laporan',1)->paginate(25);
        $laporans_tolak = laporan::where('status_laporan',2)->paginate(25);
        $laporan = laporan::where('perkara_id',$cari)->first();
        $perkara = perkara::find($cari);

        if($laporan != null){
            $laporans_terima = laporan::where('perkara_id',$cari)->where('status_laporan',1)->paginate(25);
            $laporans_tolak = laporan::where('perkara_id',$cari)->where('status_laporan',2)->paginate(25);
            Flash::success('Laporan perkara '.$perkara->nama.' tersedia');
        }
        else{
            Flash::error('Tidak ada laporan dengan perkara '.$perkara->nama);
        }
        return view('admin.pelaporans.index', compact('laporans_terima','laporans_tolak'));
    }

    public function tindak($id){
       perkembanganLap::create ([
           'laporan_id'=> $id
       ]);
        $perkembanganLaps = perkembanganLap::all();
         return view('admin.perkembangan_laps.index', compact('perkembanganLaps'));
    }

    public function tindakDokumen($id){

            $perkembangan= perkembanganLap::find($id);
            $name = $perkembangan->file;
            $path = 'storage/'.$name;

            $f = substr($perkembangan->file,-3);
            if($name)
            {
                if($f == 'pdf'){
                    return Response::make(file_get_contents($path), 200, [
                        'Content-Type' => 'application/pdf',
                        'Content-Disposition' => 'inline; filename="' . $name . '"'
                    ]);
                    return response()->download($file);
                }
                else{
                    return redirect(url($path));
                }
            }
            else{
                Flash::error('Dokumen tidak ada');
                return redirect(action('perkembanganLapController@show',$perkembangan->id));
            }


    }
}

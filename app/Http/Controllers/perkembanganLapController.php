<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateperkembanganLapRequest;
use App\Http\Requests\UpdateperkembanganLapRequest;
use App\Models\laporan;
use App\Models\perkembanganLap;
use App\Repositories\perkembanganLapRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;

class perkembanganLapController extends AppBaseController
{
    /** @var  perkembanganLapRepository */
    private $perkembanganLapRepository;

    public function __construct(perkembanganLapRepository $perkembanganLapRepo)
    {
        $this->middleware('auth');
        $this->perkembanganLapRepository = $perkembanganLapRepo;
    }

    /**
     * Display a listing of the perkembanganLap.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->perkembanganLapRepository->pushCriteria(new RequestCriteria($request));
        $perkembanganLaps = perkembanganLap::all();
        $perkembanganLaps->groupBy('laporan_id');
//        dd($perkembanganLaps);
        $laporans2 = laporan::all();
        $tindaks=[];$n=0;
        foreach ($laporans2 as $laporan) {
            $tindak=perkembanganLap::where('laporan_id',$laporan->id)->first();
            if($tindak!=null){
                $tindaks[$n]=perkembanganLap::where('laporan_id',$laporan->id)->first();
            }
            $n++;
        }
        dd($tindaks);
        return view('admin.perkembangan_laps.index', compact('perkembanganLaps','tindaks'));
    }

    /**
     * Show the form for creating a new perkembanganLap.
     *
     * @return Response
     */
    public function create($id)
    {
        return view('admin.perkembangan_laps.create');
    }

    /**
     * Store a newly created perkembanganLap in storage.
     *
     * @param CreateperkembanganLapRequest $request
     *
     * @return Response
     */
    public function store(CreateperkembanganLapRequest $request)
    {
        $input = $request->all();
        $perkembanganLap=perkembanganLap::where('laporan_id',$input['laporan_id'])->get();
        $jum =count($perkembanganLap)+1;
        if($request->file){
            $fileName = $request->file->getClientOriginalName();
            $input['file']='file_perkembangan/'.$input['laporan_id'].'/'. $input['laporan_id'].'_'.$jum;
            $request->file->storeAs('/public/file_perkembangan/'.$input['laporan_id'], $input['laporan_id'].'_'.$jum);

        }

        $perkembanganLap = $this->perkembanganLapRepository->create($input);

        Flash::success('Perkembangan Lap saved successfully.');
        $perkembanganLap = perkembanganLap::where('laporan_id',$input['laporan_id'] )->first();
//        dd($perkembanganLap);
        return redirect(action('perkembanganLapController@show',$perkembanganLap->laporan_id));
    }

    /**
     * Display the specified perkembanganLap.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tindaks= perkembanganLap::where('laporan_id',$id)->get();
        $laporan = laporan::where('id',$id)->first();
//        dd($id);
        return view('admin.perkembangan_laps.show', compact('laporan','tindaks'));
    }

    /**
     * Show the form for editing the specified perkembanganLap.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $perkembanganLap = $this->perkembanganLapRepository->findWithoutFail($id);

        if (empty($perkembanganLap)) {
            Flash::error('Perkembangan Lap not found');

            return redirect(route('perkembanganLaps.index'));
        }

        return view('perkembangan_laps.edit')->with('perkembanganLap', $perkembanganLap);
    }

    /**
     * Update the specified perkembanganLap in storage.
     *
     * @param  int              $id
     * @param UpdateperkembanganLapRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateperkembanganLapRequest $request)
    {
        $perkembanganLap = $this->perkembanganLapRepository->findWithoutFail($id);
        $input = $request->all();
        $jum =count($perkembanganLap);
        if($request->file){
            $fileName = $request->file->getClientOriginalName();
            $input['file']='file_perkembangan/'.$input['laporan_id'].'/'. $input['laporan_id'].'_'.$jum;
            $request->file->storeAs('/public/file_perkembangan/'.$input['laporan_id'], $input['laporan_id'].'_'.$jum);
        }
//        dd($input);
        if (empty($perkembanganLap)) {
            Flash::error('Perkembangan Lap not found');

            return redirect(route('perkembanganLaps.index'));
        }

        $perkembanganLap = $this->perkembanganLapRepository->update($input, $id);

        Flash::success('Perkembangan Lap updated successfully.');

//        dd($perkembanganLap);
        return redirect(action('perkembanganLapController@show',$perkembanganLap->laporan_id));
    }

    /**
     * Remove the specified perkembanganLap from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $perkembanganLap = $this->perkembanganLapRepository->findWithoutFail($id);

        if (empty($perkembanganLap)) {
            Flash::error('Perkembangan Lap not found');

            return redirect(route('perkembanganLaps.index'));
        }

        $this->perkembanganLapRepository->delete($id);

        Flash::success('Perkembangan Lap deleted successfully.');

        return view('admin.perkembangan_laps.show')->with('perkembanganLap', $perkembanganLap);
    }
}

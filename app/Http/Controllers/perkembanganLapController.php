<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateperkembanganLapRequest;
use App\Http\Requests\UpdateperkembanganLapRequest;
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
        $perkembanganLaps = perkembanganLap::selectRaw('laporan_id')->groupBy('laporan_id')->get();

//        dd($perkembanganLaps);

        return view('admin.perkembangan_laps.index')
            ->with('perkembanganLaps', $perkembanganLaps);
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
        $jum =count($perkembanganLap);
        if($request->file){
            $file = $request->file('file');
            $fileName= $input['laporan_id'].'_'.$jum.'_'.$file->getClientOriginalName();
            $input['file']='file_perkembangan/'.$input['laporan_id'].'/'.$fileName;
            $request->file('file')->storeAs('/public/file_perkembangan/'.$input['laporan_id'],$fileName);
        }

        $perkembanganLap = $this->perkembanganLapRepository->create($input);

        Flash::success('Perkembangan Lap saved successfully.');
        $perkembanganLap = perkembanganLap::where('laporan_id',$input['laporan_id'] )->first();
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
        $perkembanganLap = perkembanganLap::where('laporan_id', $id)->first();

        if (empty($perkembanganLap)) {
            Flash::error('Perkembangan Lap not found');

            return redirect(route('perkembanganLaps.index'));
        }

        return view('admin.perkembangan_laps.show')->with('perkembanganLap', $perkembanganLap);
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
        $perkemLap = $this->perkembanganLapRepository->findWithoutFail($id);
        $input=$request->all();
        $perkembangan=perkembanganLap::where('laporan_id',$input['laporan_id'])->get();
        $jum =count($perkembangan);
        if($request->file){
            $file = $request->file('file');
            $fileName= $input['laporan_id'].'_'.$jum.'_'.$file->getClientOriginalName();

            $request->file('file')->storeAs('/public/file_perkembangan/'.$input['laporan_id'],$fileName);
            $input['file']='file_perkembangan/'.$input['laporan_id'].'/'.$fileName;

        }

        if (empty($perkemLap)) {
            Flash::error('Perkembangan Lap not found');

            return redirect(route('perkembanganLaps.index'));
        }

        $perkemLap->update($input);

        Flash::success('Perkembangan Lap saved successfully.');
        $perkembanganLap = perkembanganLap::where('laporan_id',$input['laporan_id'] )->first();
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

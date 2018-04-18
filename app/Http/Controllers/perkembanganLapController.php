<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateperkembanganLapRequest;
use App\Http\Requests\UpdateperkembanganLapRequest;
use App\Repositories\perkembanganLapRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

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
        $perkembanganLaps = $this->perkembanganLapRepository->all();

        return view('perkembangan_laps.index')
            ->with('perkembanganLaps', $perkembanganLaps);
    }

    /**
     * Show the form for creating a new perkembanganLap.
     *
     * @return Response
     */
    public function create()
    {
        return view('perkembangan_laps.create');
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

        $perkembanganLap = $this->perkembanganLapRepository->create($input);

        Flash::success('Perkembangan Lap saved successfully.');

        return redirect(route('perkembanganLaps.index'));
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
        $perkembanganLap = $this->perkembanganLapRepository->findWithoutFail($id);

        if (empty($perkembanganLap)) {
            Flash::error('Perkembangan Lap not found');

            return redirect(route('perkembanganLaps.index'));
        }

        return view('perkembangan_laps.show')->with('perkembanganLap', $perkembanganLap);
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

        if (empty($perkembanganLap)) {
            Flash::error('Perkembangan Lap not found');

            return redirect(route('perkembanganLaps.index'));
        }

        $perkembanganLap = $this->perkembanganLapRepository->update($request->all(), $id);

        Flash::success('Perkembangan Lap updated successfully.');

        return redirect(route('perkembanganLaps.index'));
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

        return redirect(route('perkembanganLaps.index'));
    }
}

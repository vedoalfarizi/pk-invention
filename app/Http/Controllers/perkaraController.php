<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateperkaraRequest;
use App\Http\Requests\UpdateperkaraRequest;
use App\Repositories\perkaraRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class perkaraController extends AppBaseController
{
    /** @var  perkaraRepository */
    private $perkaraRepository;

    public function __construct(perkaraRepository $perkaraRepo)
    {
        $this->middleware('auth');
        $this->perkaraRepository = $perkaraRepo;
    }

    /**
     * Display a listing of the perkara.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->perkaraRepository->pushCriteria(new RequestCriteria($request));
        $perkaras = $this->perkaraRepository->all();

        return view('perkaras.index')
            ->with('perkaras', $perkaras);
    }

    /**
     * Show the form for creating a new perkara.
     *
     * @return Response
     */
    public function create()
    {
        return view('perkaras.create');
    }

    /**
     * Store a newly created perkara in storage.
     *
     * @param CreateperkaraRequest $request
     *
     * @return Response
     */
    public function store(CreateperkaraRequest $request)
    {
        $input = $request->all();

        $perkara = $this->perkaraRepository->create($input);

        Flash::success('Perkara saved successfully.');

        return redirect(route('perkaras.index'));
    }

    /**
     * Display the specified perkara.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $perkara = $this->perkaraRepository->findWithoutFail($id);

        if (empty($perkara)) {
            Flash::error('Perkara not found');

            return redirect(route('perkaras.index'));
        }

        return view('perkaras.show')->with('perkara', $perkara);
    }

    /**
     * Show the form for editing the specified perkara.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $perkara = $this->perkaraRepository->findWithoutFail($id);

        if (empty($perkara)) {
            Flash::error('Perkara not found');

            return redirect(route('perkaras.index'));
        }

        return view('perkaras.edit')->with('perkara', $perkara);
    }

    /**
     * Update the specified perkara in storage.
     *
     * @param  int              $id
     * @param UpdateperkaraRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateperkaraRequest $request)
    {
        $perkara = $this->perkaraRepository->findWithoutFail($id);

        if (empty($perkara)) {
            Flash::error('Perkara not found');

            return redirect(route('perkaras.index'));
        }

        $perkara = $this->perkaraRepository->update($request->all(), $id);

        Flash::success('Perkara updated successfully.');

        return redirect(route('perkaras.index'));
    }

    /**
     * Remove the specified perkara from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $perkara = $this->perkaraRepository->findWithoutFail($id);

        if (empty($perkara)) {
            Flash::error('Perkara not found');

            return redirect(route('perkaras.index'));
        }

        $this->perkaraRepository->delete($id);

        Flash::success('Perkara deleted successfully.');

        return redirect(route('perkaras.index'));
    }
}

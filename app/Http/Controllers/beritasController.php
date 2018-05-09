<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateberitasRequest;
use App\Http\Requests\UpdateberitasRequest;
use App\Repositories\beritasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use auth;

class beritasController extends AppBaseController
{
    /** @var  beritasRepository */
    private $beritasRepository;

    public function __construct(beritasRepository $beritasRepo)
    {
        $this->beritasRepository = $beritasRepo;
    }

    /**
     * Display a listing of the beritas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->beritasRepository->pushCriteria(new RequestCriteria($request));
        $beritas = $this->beritasRepository->paginate(12);

        return view('admin.beritas.index')
            ->with('beritas', $beritas);
    }

    /**
     * Show the form for creating a new beritas.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.beritas.create');
    }

    /**
     * Store a newly created beritas in storage.
     *
     * @param CreateberitasRequest $request
     *
     * @return Response
     */
    public function store(CreateberitasRequest $request)
    {
        $input = $request->all();
//        dd($input);
        if(!isset($request->foto_berita)){
            $input['foto_berita'] = 'info/default.jpg';
        }else{
            $fileName = $request->foto_berita->getClientOriginalName();

            $simpan = $request->foto_berita->storeAs('public/berita', Auth::user()->name.'_'.$fileName);
            $input['foto_berita'] = 'berita/'.Auth::user()->name.'_'.$fileName;
        }
        $beritas = $this->beritasRepository->create($input);

        Flash::success('Beritas saved successfully.');

        return redirect(route('beritas.index'));
    }

    /**
     * Display the specified beritas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $beritas = $this->beritasRepository->findWithoutFail($id);

        if (empty($beritas)) {
            Flash::error('Beritas not found');

            return redirect(route('beritas.index'));
        }

        return view('admin.beritas.show')->with('beritas', $beritas);
    }

    /**
     * Show the form for editing the specified beritas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $beritas = $this->beritasRepository->findWithoutFail($id);

        if (empty($beritas)) {
            Flash::error('Beritas not found');

            return redirect(route('beritas.index'));
        }

        return view('admin.beritas.edit')->with('beritas', $beritas);
    }

    /**
     * Update the specified beritas in storage.
     *
     * @param  int              $id
     * @param UpdateberitasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateberitasRequest $request)
    {
        $beritas = $this->beritasRepository->findWithoutFail($id);
        $input=$request->all();
        if(!isset($request->foto_berita)){
            $input['foto_berita'] = $beritas->foto_berita;
        }else{
            $fileName = $request->foto_berita->getClientOriginalName();

            $simpan = $request->foto_berita->storeAs('public/berita', Auth::user()->name.'_'.$fileName);
            $input['foto_berita'] = 'berita/'.Auth::user()->name.'_'.$fileName;
        }
        if (empty($beritas)) {
            Flash::error('Beritas not found');

            return redirect(route('beritas.index'));
        }

        $beritas = $this->beritasRepository->update($input, $id);

        Flash::success('Beritas updated successfully.');

        return redirect(route('beritas.index'));
    }

    /**
     * Remove the specified beritas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $beritas = $this->beritasRepository->findWithoutFail($id);

        if (empty($beritas)) {
            Flash::error('Beritas not found');

            return redirect(route('beritas.index'));
        }

        $this->beritasRepository->delete($id);

        Flash::success('Beritas deleted successfully.');

        return redirect(route('beritas.index'));
    }
}

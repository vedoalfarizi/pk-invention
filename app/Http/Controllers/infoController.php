<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateinfoRequest;
use App\Http\Requests\UpdateinfoRequest;
use App\Models\info;
use App\Repositories\infoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class infoController extends AppBaseController
{
    /** @var  infoRepository */
    private $infoRepository;

    public function __construct(infoRepository $infoRepo)
    {
        $this->infoRepository = $infoRepo;
    }

    /**
     * Display a listing of the info.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->infoRepository->pushCriteria(new RequestCriteria($request));
        $infos = $this->infoRepository->paginate(12);

        if(Auth::check()){
            if(Auth::user()->role == 0){
                return view('infos.index')
                    ->with('infos', $infos);
            }elseif(Auth::user()->role == 1){
                return view('user.infos.index')
                    ->with('infos', $infos);
            }
        }else{
            return view('user.infos.index')
                ->with('infos', $infos);
        }

    }

    public function showByCatagories($id)
    {
        $infos = info::where('perkara_id', '=', $id)->orderBy('created_at', 'desc')->paginate(12);

        return view('user.infos.index', compact('infos'));
    }

    /**
     * Show the form for creating a new info.
     *
     * @return Response
     */
    public function create()
    {
        return view('infos.create');
    }

    /**
     * Store a newly created info in storage.
     *
     * @param CreateinfoRequest $request
     *
     * @return Response
     */
    public function store(CreateinfoRequest $request)
    {
        $input = $request->all();



        if(!isset($request->file_foto)){
            $input['file_foto'] = 'info/default.jpg';
        }else{
            $fileName = $request->file_foto->getClientOriginalName();

            $simpan = $request->file_foto->storeAs('public/info', Auth::user()->name.'_'.$fileName);
            $input['file_foto'] = 'info/'.Auth::user()->name.'_'.$fileName;
        }


        $info = $this->infoRepository->create($input);

        Flash::success('Info saved successfully.');

        return redirect(route('infos.index'));
    }

    /**
     * Display the specified info.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $info = $this->infoRepository->findWithoutFail($id);

        if (empty($info)) {
            Flash::error('Info not found');

            return redirect(route('infos.index'));
        }

        return view('user.infos.show')->with('info', $info);
    }

    public function showWithFilter(Request $request)
    {
        $infos = info::whereYear('created_at', '=', $request->year)->orderBy('created_at', 'desc')->paginate(12);

        return view('user.infos.index', compact('infos'));
    }

    /**
     * Show the form for editing the specified info.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $info = $this->infoRepository->findWithoutFail($id);

        if (empty($info)) {
            Flash::error('Info not found');

            return redirect(route('infos.index'));
        }

        return view('infos.edit')->with('info', $info);
    }

    /**
     * Update the specified info in storage.
     *
     * @param  int              $id
     * @param UpdateinfoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateinfoRequest $request)
    {
//        dd('sas');
        $info = $this->infoRepository->findWithoutFail($id);

        if (empty($info)) {
            Flash::error('Info not found');

            return redirect(route('infos.index'));
        }

        $info = $this->infoRepository->update($request->all(), $id);

        Flash::success('Info updated successfully.');

        return redirect(route('infos.index'));
    }

    /**
     * Remove the specified info from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $info = $this->infoRepository->findWithoutFail($id);

        if (empty($info)) {
            Flash::error('Info not found');

            return redirect(route('infos.index'));
        }

        $this->infoRepository->delete($id);

        Flash::success('Info deleted successfully.');

        return redirect(route('infos.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatekomentarInfoRequest;
use App\Http\Requests\UpdatekomentarInfoRequest;
use App\Repositories\komentarInfoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class komentarInfoController extends AppBaseController
{
    /** @var  komentarInfoRepository */
    private $komentarInfoRepository;

    public function __construct(komentarInfoRepository $komentarInfoRepo)
    {
        $this->komentarInfoRepository = $komentarInfoRepo;
    }

    /**
     * Display a listing of the komentarInfo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->komentarInfoRepository->pushCriteria(new RequestCriteria($request));
        $komentarInfos = $this->komentarInfoRepository->all();

        return view('komentar_infos.index')
            ->with('komentarInfos', $komentarInfos);
    }

    /**
     * Show the form for creating a new komentarInfo.
     *
     * @return Response
     */
    public function create()
    {
        return view('komentar_infos.create');
    }

    /**
     * Store a newly created komentarInfo in storage.
     *
     * @param CreatekomentarInfoRequest $request
     *
     * @return Response
     */
    public function store(CreatekomentarInfoRequest $request)
    {
        $input = $request->all();

        $komentarInfo = $this->komentarInfoRepository->create($input);

        Flash::success('Komentar Info saved successfully.');



        return redirect()->back();
    }

    /**
     * Display the specified komentarInfo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $komentarInfo = $this->komentarInfoRepository->findWithoutFail($id);

        if (empty($komentarInfo)) {
            Flash::error('Komentar Info not found');

            return redirect(route('komentarInfos.index'));
        }

        return view('komentar_infos.show')->with('komentarInfo', $komentarInfo);
    }

    /**
     * Show the form for editing the specified komentarInfo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $komentarInfo = $this->komentarInfoRepository->findWithoutFail($id);

        if (empty($komentarInfo)) {
            Flash::error('Komentar Info not found');

            return redirect(route('komentarInfos.index'));
        }

        return view('komentar_infos.edit')->with('komentarInfo', $komentarInfo);
    }

    /**
     * Update the specified komentarInfo in storage.
     *
     * @param  int              $id
     * @param UpdatekomentarInfoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatekomentarInfoRequest $request)
    {
        $komentarInfo = $this->komentarInfoRepository->findWithoutFail($id);

        if (empty($komentarInfo)) {
            Flash::error('Komentar Info not found');

            return redirect(route('komentarInfos.index'));
        }

        $komentarInfo = $this->komentarInfoRepository->update($request->all(), $id);

        Flash::success('Komentar Info updated successfully.');

        return redirect(route('komentarInfos.index'));
    }

    /**
     * Remove the specified komentarInfo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $komentarInfo = $this->komentarInfoRepository->findWithoutFail($id);

        if (empty($komentarInfo)) {
            Flash::error('Komentar Info not found');

            return redirect(route('komentarInfos.index'));
        }

        $this->komentarInfoRepository->delete($id);

        Flash::success('Komentar Info deleted successfully.');

        return redirect(route('komentarInfos.index'));
    }
}

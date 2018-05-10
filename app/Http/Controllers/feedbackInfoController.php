<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatefeedbackInfoRequest;
use App\Http\Requests\UpdatefeedbackInfoRequest;
use App\Repositories\feedbackInfoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class feedbackInfoController extends AppBaseController
{
    /** @var  feedbackInfoRepository */
    private $feedbackInfoRepository;

    public function __construct(feedbackInfoRepository $feedbackInfoRepo)
    {
        $this->middleware('auth');
        $this->feedbackInfoRepository = $feedbackInfoRepo;
    }

    /**
     * Display a listing of the feedbackInfo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->feedbackInfoRepository->pushCriteria(new RequestCriteria($request));
        $feedbackInfos = $this->feedbackInfoRepository->all();

        return view('feedback_infos.index')
            ->with('feedbackInfos', $feedbackInfos);
    }

    /**
     * Show the form for creating a new feedbackInfo.
     *
     * @return Response
     */
    public function create()
    {
        return view('feedback_infos.create');
    }

    /**
     * Store a newly created feedbackInfo in storage.
     *
     * @param CreatefeedbackInfoRequest $request
     *
     * @return Response
     */
    public function store(CreatefeedbackInfoRequest $request)
    {
        $input = $request->all();

        $feedbackInfo = $this->feedbackInfoRepository->create($input);

        Flash::success('Feedback Info saved successfully.');

        return redirect()->back();
    }

    /**
     * Display the specified feedbackInfo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $feedbackInfo = $this->feedbackInfoRepository->findWithoutFail($id);

        if (empty($feedbackInfo)) {
            Flash::error('Feedback Info not found');

            return redirect(route('feedbackInfos.index'));
        }

        return view('feedback_infos.show')->with('feedbackInfo', $feedbackInfo);
    }

    /**
     * Show the form for editing the specified feedbackInfo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $feedbackInfo = $this->feedbackInfoRepository->findWithoutFail($id);

        if (empty($feedbackInfo)) {
            Flash::error('Feedback Info not found');

            return redirect(route('feedbackInfos.index'));
        }

        return view('feedback_infos.edit')->with('feedbackInfo', $feedbackInfo);
    }

    /**
     * Update the specified feedbackInfo in storage.
     *
     * @param  int              $id
     * @param UpdatefeedbackInfoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatefeedbackInfoRequest $request)
    {
        $feedbackInfo = $this->feedbackInfoRepository->findWithoutFail($id);

        if (empty($feedbackInfo)) {
            Flash::error('Feedback Info not found');

            return redirect(route('feedbackInfos.index'));
        }

        $feedbackInfo = $this->feedbackInfoRepository->update($request->all(), $id);

        Flash::success('Feedback Info updated successfully.');

        return redirect()->back();
    }

    /**
     * Remove the specified feedbackInfo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $feedbackInfo = $this->feedbackInfoRepository->findWithoutFail($id);

        if (empty($feedbackInfo)) {
            Flash::error('Feedback Info not found');

            return redirect(route('feedbackInfos.index'));
        }

        $this->feedbackInfoRepository->delete($id);

        Flash::success('Feedback Info deleted successfully.');

        return redirect(route('feedbackInfos.index'));
    }
}

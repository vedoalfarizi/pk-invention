<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateprofileRequest;
use App\Http\Requests\UpdateprofileRequest;
use App\Repositories\profileRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\Auth;

class profileController extends AppBaseController
{
    /** @var  profileRepository */
    private $profileRepository;

    public function __construct(profileRepository $profileRepo)
    {
        $this->profileRepository = $profileRepo;
    }

    /**
     * Display a listing of the profile.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->profileRepository->pushCriteria(new RequestCriteria($request));
        $profile = $this->profileRepository->findWithoutFail(Auth::user()->id);

        if($profile != NULL){
            return view('profiles.edit', compact('profile'));
        }else{
            return view('profiles.index', compact('profile'));
        }

    }

    /**
     * Show the form for creating a new profile.
     *
     * @return Response
     */
    public function create()
    {
        return view('profiles.create');
    }

    /**
     * Store a newly created profile in storage.
     *
     * @param CreateprofileRequest $request
     *
     * @return Response
     */
    public function store(CreateprofileRequest $request)
    {
        $input = $request->all();
        $fileName = $request->file_ktp->getClientOriginalName();

        $simpan = $request->file_ktp->storeAs('public/file_ktp', Auth::user()->name.'_'.$fileName);
        $input['file_ktp'] = 'file_ktp/'.Auth::user()->name.'_'.$fileName;

        $profile = $this->profileRepository->create($input);

        Flash::success('Profile saved successfully.');

        return redirect(route('home'));
    }

    /**
     * Display the specified profile.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $profile = $this->profileRepository->findWithoutFail($id);

        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.index'));
        }

        return view('profiles.show')->with('profile', $profile);
    }

    /**
     * Show the form for editing the specified profile.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $profile = $this->profileRepository->findWithoutFail($id);

        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.index'));
        }

        return view('profiles.edit')->with('profile', $profile);
    }

    /**
     * Update the specified profile in storage.
     *
     * @param  int              $id
     * @param UpdateprofileRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateprofileRequest $request)
    {
//        dd($request->all());
        $profile = $this->profileRepository->findWithoutFail($id);
        $data = $request->all();
        if($request->file_ktp){
            $fileName = $request->file_ktp->getClientOriginalName();

            $simpan = $request->file_ktp->storeAs('public/file_ktp', Auth::user()->name.'_'.$fileName);
            $data['file_ktp'] = 'file_ktp/'.Auth::user()->name.'_'.$fileName;
        }


        if (empty($profile)) {
            Flash::error('Profile not found');
            $mesage = 'gagal';
            return view('user.profil.index',compact('mesage'));
        }

        $profile = $this->profileRepository->update($data, $id);
        $mesage = 'berhasil';
        $isi_mesage='Profil Anda Berhasil Diubah';

        Flash::success('Profile updated successfully.');

        return view('user.profil.index', compact('mesage','isi_mesage'));
    }

    /**
     * Remove the specified profile from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $profile = $this->profileRepository->findWithoutFail($id);

        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.index'));
        }

        $this->profileRepository->delete($id);

        Flash::success('Profile deleted successfully.');

        return redirect(route('profiles.index'));
    }
}

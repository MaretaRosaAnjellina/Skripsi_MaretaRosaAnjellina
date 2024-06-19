<?php

namespace App\Http\Controllers;

use App\Http\Requests\GMM\StoreGMMJuryRequest;
use App\Http\Requests\GMM\UpdateGMMJuryRequest;
use App\Models\GMM;
use App\Models\GMMJury;
use App\Models\GMMSession;
use App\Models\Jury;
use Illuminate\Http\Request;

class GMMJuryController extends Controller
{
    /**
     * Display all gmmJuries
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(GMM $gmm, GMMSession $session) 
    {
        $gmmJuries = GMMJury::where('assessment_id', $gmm->id)->where('assessment_session_id', $session->id)->latest()->paginate(10);
        return view('gmm.juries.index', compact('gmmJuries', 'gmm', 'session'));
    }

    /**
     * Show form for creating gmmJury
     * 
     * @return \Illuminate\Http\Response
     */
    public function create(GMM $gmm, GmmSession $session) 
    {
        $juries = Jury::all();
        return view('gmm.juries.create', compact('gmm', 'juries', 'session'));
    }

    /**
     * Store a newly created gmmJury
     * 
     * @param GMMJury $gmmJury
     * @param StoreGMMJuryRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(GMMJury $gmmJury, GMM $gmm, GmmSession $session, StoreGMMJuryRequest $request) 
    {
        $assessment_id = $gmm->id;
        $data = array_merge($request->validated(), ['assessment_id' => $assessment_id, 'assessment_session_id' => $session->id]);
        $gmmJury->create($data);
        return redirect()->route('gmmJuries.index', ['gmm' => $gmm->id, 'session' => $session->id])
            ->withSuccess(__('GMMJury created successfully.'));
    }

    /**
     * Show gmmJury data
     * 
     * @param GMMJury $gmmJury
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(GMM $gmm, GmmSession $session, GMMJury $gmmJury) 
    {
        return view('gmm.juries.show', [
            'gmm' => $gmm,
            'gmmJury' => $gmmJury,
            'session' => $session
        ]);
    }

    /**
     * Edit gmmJury data
     * 
     * @param GMMJury $gmmJury
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(GMM $gmm, GmmSession $session, GMMJury $gmmJury) 
    {
        $juries = Jury::all();
        return view('gmm.juries.edit', [
            'juries' => $juries,
            'gmm' => $gmm,
            'gmmJury' => $gmmJury,
            'session' => $session
        ]);
    }

    /**
     * Update gmmJury data
     * 
     * @param GMMJury $gmmJury
     * @param UpdateGMMJuryRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(GMM $gmm, GmmSession $session, GMMJury $gmmJury, UpdateGMMJuryRequest $request) 
    {

        $gmmJury->update($request->validated());

        return redirect()->route('gmmJuries.index', ['gmm' => $gmm->id, 'session' => $session->id])
            ->withSuccess(__('GMMJury updated successfully.'));
    }

    /**
     * Delete gmmJury data
     * 
     * @param GMMJury $gmmJury
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(GMM $gmm, GmmSession $session, GMMJury $gmmJury) 
    {
        $gmmJury->delete();

        return redirect()->route('gmmJuries.index', ['gmm' => $gmm->id, 'session' => $session->id])
            ->withSuccess(__('GMMJury deleted successfully.'));
    }
}

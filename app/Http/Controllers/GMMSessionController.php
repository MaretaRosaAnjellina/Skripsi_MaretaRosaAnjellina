<?php

namespace App\Http\Controllers;

use App\Http\Requests\GMM\StoreGMMSessionRequest;
use App\Http\Requests\GMM\UpdateGMMSessionRequest;
use App\Models\GMM;
use App\Models\GMMSession;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GMMSessionController extends Controller
{
    /**
     * Display all gmmSessions
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(GMM $gmm) 
    {
        $gmmSessions = GMMSession::where('assessment_id', $gmm->id)->latest()->paginate(10);
        return view('gmm.sessions.index', compact('gmmSessions', 'gmm'));
    }

    /**
     * Show form for creating gmmSession
     * 
     * @return \Illuminate\Http\Response
     */
    public function create(GMM $gmm) 
    {
        return view('gmm.sessions.create', compact('gmm'));
    }

    /**
     * Store a newly created gmmSession
     * 
     * @param GMMSession $gmmSession
     * @param StoreGMMSessionRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(GMMSession $gmmSession, GMM $gmm, StoreGMMSessionRequest $request) 
    {
        $assessment_id = $gmm->id;
        $data = array_merge($request->validated(), ['assessment_id' => $assessment_id]);
        $gmmSession->create($data);
        return redirect()->route('gmmSessions.index', $assessment_id)
            ->withSuccess(__('GMMSession created successfully.'));
    }

    /**
     * Show gmmSession data
     * 
     * @param GMMSession $gmmSession
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(GMM $gmm, GMMSession $gmmSession) 
    {
        return view('gmm.sessions.show', [
            'gmm' => $gmm,
            'gmmSession' => $gmmSession
        ]);
    }

    /**
     * Edit gmmSession data
     * 
     * @param GMMSession $gmmSession
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(GMM $gmm, GMMSession $gmmSession) 
    {
        return view('gmm.sessions.edit', [
            'gmm' => $gmm,
            'gmmSession' => $gmmSession,
        ]);
    }

    /**
     * Update gmmSession data
     * 
     * @param GMMSession $gmmSession
     * @param UpdateGMMSessionRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(GMM $gmm, GMMSession $gmmSession, UpdateGMMSessionRequest $request) 
    {

        $gmmSession->update($request->validated());

        return redirect()->route('gmmSessions.index', $gmm->id)
            ->withSuccess(__('GMMSession updated successfully.'));
    }

    /**
     * Delete gmmSession data
     * 
     * @param GMMSession $gmmSession
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(GMM $gmm, GMMSession $gmmSession) 
    {
        $gmmSession->delete();

        return redirect()->route('gmmSessions.index', $gmm->id)
            ->withSuccess(__('GMMSession deleted successfully.'));
    }
}

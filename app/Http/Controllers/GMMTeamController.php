<?php

namespace App\Http\Controllers;

use App\Http\Requests\GMM\StoreGMMTeamRequest;
use App\Http\Requests\GMM\UpdateGMMTeamRequest;
use App\Models\GMM;
use App\Models\GMMSession;
use App\Models\GMMTeam;
use App\Models\Team;
use Illuminate\Http\Request;

class GMMTeamController extends Controller
{
    /**
     * Display all gmmTeams
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(GMM $gmm, GMMSession $session) 
    {
        $gmmTeams = GMMTeam::where('assessment_id', $gmm->id)->where('assessment_session_id', $session->id)->latest()->paginate(10);
        return view('gmm.teams.index', compact('gmmTeams', 'gmm', 'session'));
    }

    /**
     * Show form for creating gmmTeam
     * 
     * @return \Illuminate\Http\Response
     */
    public function create(GMM $gmm, GmmSession $session) 
    {
        $teams = Team::all();
        return view('gmm.teams.create', compact('gmm', 'teams', 'session'));
    }

    /**
     * Store a newly created gmmTeam
     * 
     * @param GMMTeam $gmmTeam
     * @param StoreGMMTeamRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(GMMTeam $gmmTeam, GMM $gmm, GmmSession $session, StoreGMMTeamRequest $request) 
    {
        $assessment_id = $gmm->id;
        $data = array_merge($request->validated(), ['assessment_id' => $assessment_id, 'assessment_session_id' => $session->id]);
        $gmmTeam->create($data);
        return redirect()->route('gmmTeams.index', ['gmm' => $gmm->id, 'session' => $session->id])
            ->withSuccess(__('GMMTeam created successfully.'));
    }

    /**
     * Show gmmTeam data
     * 
     * @param GMMTeam $gmmTeam
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(GMM $gmm, GmmSession $session, GMMTeam $gmmTeam) 
    {
        return view('gmm.teams.show', [
            'gmm' => $gmm,
            'gmmTeam' => $gmmTeam,
            'session' => $session
        ]);
    }

    /**
     * Edit gmmTeam data
     * 
     * @param GMMTeam $gmmTeam
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(GMM $gmm, GmmSession $session, GMMTeam $gmmTeam) 
    {
        $teams = Team::all();
        return view('gmm.teams.edit', [
            'teams' => $teams,
            'gmm' => $gmm,
            'gmmTeam' => $gmmTeam,
            'session' => $session
        ]);
    }

    /**
     * Update gmmTeam data
     * 
     * @param GMMTeam $gmmTeam
     * @param UpdateGMMTeamRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(GMM $gmm, GmmSession $session, GMMTeam $gmmTeam, UpdateGMMTeamRequest $request) 
    {

        $gmmTeam->update($request->validated());

        return redirect()->route('gmmTeams.index', ['gmm' => $gmm->id, 'session' => $session->id])
            ->withSuccess(__('GMMTeam updated successfully.'));
    }

    /**
     * Delete gmmTeam data
     * 
     * @param GMMTeam $gmmTeam
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(GMM $gmm, GmmSession $session, GMMTeam $gmmTeam) 
    {
        $gmmTeam->delete();

        return redirect()->route('gmmTeams.index', ['gmm' => $gmm->id, 'session' => $session->id])
            ->withSuccess(__('GMMTeam deleted successfully.'));
    }
}

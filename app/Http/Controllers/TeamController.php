<?php

namespace App\Http\Controllers;

use App\Http\Requests\Teams\StoreTeamRequest;
use App\Http\Requests\Teams\UpdateTeamRequest;
use App\Imports\TeamImport;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class TeamController extends Controller
{
    /**
     * Display all teams
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $teams = Team::get();

        return view('teams.index', compact('teams'));
    }

    /**
     * Show form for creating team
     * 
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        return view('teams.create');
    }

    /**
     * Store a newly created team
     * 
     * @param Team $team
     * @param StoreTeamRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Team $team, StoreTeamRequest $request) 
    {
        $team->create($request->validated());
        return redirect()->route('teams.index')
            ->withSuccess(__('Team created successfully.'));
    }

    /**
     * Show team data
     * 
     * @param Team $team
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team) 
    {
        return view('teams.show', [
            'team' => $team
        ]);
    }

    /**
     * Edit team data
     * 
     * @param Team $team
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team) 
    {
        return view('teams.edit', [
            'team' => $team,
        ]);
    }

    /**
     * Update team data
     * 
     * @param Team $team
     * @param UpdateTeamRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Team $team, UpdateTeamRequest $request) 
    {
        $team->update($request->validated());

        return redirect()->route('teams.index')
            ->withSuccess(__('Team updated successfully.'));
    }

    /**
     * Delete team data
     * 
     * @param Team $team
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team) 
    {
        $team->delete();

        return redirect()->route('teams.index')
            ->withSuccess(__('Team deleted successfully.'));
    }

    public function import(Request $request)
    {
        // validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_teams di dalam folder public
		$file->move('file_teams',$nama_file);
 
		// import data
		Excel::import(new TeamImport, public_path('/file_teams/'.$nama_file));
 
		// alihkan halaman kembali
	    return redirect()->route('teams.index')
            ->withSuccess(__('Team import successfully.'));
    }
}

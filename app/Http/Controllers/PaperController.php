<?php

namespace App\Http\Controllers;

use App\Http\Requests\Papers\StorePaperRequest;
use App\Http\Requests\Papers\UpdatePaperRequest;
use App\Models\Paper;
use App\Models\Team;

class PaperController extends Controller
{
    /**
     * Display all teams
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Team $team) 
    {
        $papers = Paper::where('team_id', $team->id)->latest()->paginate(10);

        return view('teams.papers.index', compact('papers', 'team'));
    }

    /**
     * Show form for creating team
     * 
     * @return \Illuminate\Http\Response
     */
    public function create(Team $team) 
    {
        return view('teams.papers.create', compact('team'));
    }

    /**
     * Store a newly created team
     * 
     * @param Paper $paper
     * @param StorePaperRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Team $team, Paper $paper, StorePaperRequest $request) 
{
    // Meng-upload file dan menyimpan langsung ke direktori public
    $file = $request->file('file');
    $fileName = time() . '_' . $file->getClientOriginalName();
    $file->move(public_path('papers'), $fileName);

    // Menyimpan data paper ke database
    Paper::create([
        'team_id' => $team->id,
        'description' => $request->description,
        'file' => 'papers/' . $fileName // Menyimpan path relatif ke dalam database
    ]);

    return redirect()->route('papers.index', $team->id)->with('success', 'Paper has been uploaded successfully.');
}


    /**
     * Show team data
     * 
     * @param Paper $paper
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team, Paper $paper) 
    {
        return view('teams.papers.show', [
            'team' => $team,
            'paper' => $paper
        ]);
    }

    /**
     * Edit team data
     * 
     * @param Paper $paper
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team, Paper $paper) 
    {
        return view('teams.papers.edit', [
            'team' => $team,
            'paper' => $paper,

        ]);
    }

    /**
     * Update team data
     * 
     * @param Paper $paper
     * @param UpdatePaperRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Team $team, Paper $paper, UpdatePaperRequest $request) 
    {
        if ($request->hasFile('file')) {
            // Hapus file lama
            if (file_exists(public_path($paper->file))) {
                unlink(public_path($paper->file));
            }

            // Upload file baru
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('papers'), $fileName);
            $paper->file = 'papers/' . $fileName; // Menyimpan path relatif ke dalam database
        }

        $paper->save();

        return redirect()->route('papers.index', $team->id)->with('success', 'Paper has been updated successfully.');
    }


    /**
     * Delete team data
     * 
     * @param Paper $paper
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team, Paper $paper) 
    {
        // Hapus file dari direktori public
        if (file_exists(public_path($paper->file))) {
            unlink(public_path($paper->file));
        }

        $paper->delete();

        return redirect()->route('papers.index', $team->id)
            ->withSuccess(__('Paper deleted successfully.'));
    }

}

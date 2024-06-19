<?php

namespace App\Http\Controllers;

use App\Http\Requests\Juries\StoreJuryRequest;
use App\Http\Requests\Juries\UpdateJuryRequest;
use App\Models\Jury;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JuryController extends Controller
{
    /**
     * menampikan semua juri
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $juries = Jury::get();

        return view('juries.index', compact('juries'));
    }

    /**
     * Show form for creating jury
     * 
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        $users = User::all();
        return view('juries.create', compact('users'));
    }

    /**
     * Store a newly created jury
     * 
     * @param Jury $jury
     * @param StoreJuryRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Jury $jury, StoreJuryRequest $request) 
    {
        $jury->create($request->validated());
        return redirect()->route('juries.index')
            ->withSuccess(__('Jury created successfully.'));
    }

    /**
     * Show jury data
     * 
     * @param Jury $jury
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(Jury $jury) 
    {
        return view('juries.show', [
            'jury' => $jury
        ]);
    }

    /**
     * Edit jury data
     * 
     * @param Jury $jury
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Jury $jury) 
    {
        $users = User::all();
        return view('juries.edit', [
            'jury' => $jury,
            'users' => $users
        ]);
    }

    /**
     * Update jury data
     * 
     * @param Jury $jury
     * @param UpdateJuryRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Jury $jury, UpdateJuryRequest $request) 
    {
        $jury->update($request->validated());

        return redirect()->route('juries.index')
            ->withSuccess(__('Jury updated successfully.'));
    }

    /**
     * Delete jury data
     * 
     * @param Jury $jury
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jury $jury) 
    {
        $jury->delete();

        return redirect()->route('juries.index')
            ->withSuccess(__('Jury deleted successfully.'));
    }
}

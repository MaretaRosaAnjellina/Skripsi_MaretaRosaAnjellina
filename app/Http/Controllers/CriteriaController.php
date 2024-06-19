<?php

namespace App\Http\Controllers;

use App\Http\Requests\Criterias\StoreCriteriaRequest;
use App\Http\Requests\Criterias\UpdateCriteriaRequest;
use App\Models\Criteria;

class CriteriaController extends Controller
{
    /**
     * Display all criterias
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $criterias = Criteria::get();

        return view('criterias.index', compact('criterias'));
    }

    /**
     * Show form for creating criteria
     * 
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        return view('criterias.create');
    }

    /**
     * Store a newly created criteria
     * 
     * @param Criteria $criteria
     * @param StoreCriteriaRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Criteria $criteria, StoreCriteriaRequest $request) 
    {
        $criteria->create($request->validated());
        return redirect()->route('criterias.index')
            ->withSuccess(__('Criteria created successfully.'));
    }

    /**
     * Show criteria data
     * 
     * @param Criteria $criteria
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(Criteria $criteria) 
    {
        return view('criterias.show', [
            'criteria' => $criteria
        ]);
    }

    /**
     * Edit criteria data
     * 
     * @param Criteria $criteria
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Criteria $criteria) 
    {
        return view('criterias.edit', [
            'criteria' => $criteria,
        ]);
    }

    /**
     * Update criteria data
     * 
     * @param Criteria $criteria
     * @param UpdateCriteriaRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Criteria $criteria, UpdateCriteriaRequest $request) 
    {
        $criteria->update($request->validated());

        return redirect()->route('criterias.index')
            ->withSuccess(__('Criteria updated successfully.'));
    }

    /**
     * Delete criteria data
     * 
     * @param Criteria $criteria
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Criteria $criteria) 
    {
        $criteria->delete();

        return redirect()->route('criterias.index')
            ->withSuccess(__('Criteria deleted successfully.'));
    }
}

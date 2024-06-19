<?php

namespace App\Http\Controllers;

use App\Http\Requests\Weights\StoreWeightRequest;
use App\Http\Requests\Weights\UpdateWeightRequest;
use App\Models\Criteria;
use App\Models\Weight;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WeightController extends Controller
{
    /**
     * Display all weights
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $weights = Weight::with('criteria')->get();
        return view('weights.index', compact('weights'));
    }

    /**
     * Show form for creating weight
     * 
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        $criterias = Criteria::all();
        return view('weights.create', compact('criterias'));
    }

    /**
     * Store a newly created weight
     * 
     * @param Weight $weight
     * @param StoreWeightRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Weight $weight, StoreWeightRequest $request) 
    {
        $weight->create($request->validated());
        return redirect()->route('weights.index')
            ->withSuccess(__('Weight created successfully.'));
    }

    /**
     * Show weight data
     * 
     * @param Weight $weight
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(Weight $weight) 
    {
        return view('weights.show', [
            'weight' => $weight
        ]);
    }

    /**
     * Edit weight data
     * 
     * @param Weight $weight
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Weight $weight) 
    {
        $criterias = Criteria::all();
        return view('weights.edit', [
            'weight' => $weight,
            'criterias' => $criterias
        ]);
    }

    /**
     * Update weight data
     * 
     * @param Weight $weight
     * @param UpdateWeightRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Weight $weight, UpdateWeightRequest $request) 
    {
        $weight->update($request->validated());

        return redirect()->route('weights.index')
            ->withSuccess(__('Weight updated successfully.'));
    }

    /**
     * Delete weight data
     * 
     * @param Weight $weight
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Weight $weight) 
    {
        $weight->delete();

        return redirect()->route('weights.index')
            ->withSuccess(__('Weight deleted successfully.'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\CriteriaEntropy;
use App\Models\GMM;
use App\Models\GmmResultView;
use App\Models\Weight;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CriteriaEntropyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function resultView(GMM $gmm)
    {
        $criterias = Criteria::all();
        $gmmData = GmmResultView::where('assessment_id', $gmm->id)->with('team')->get();
        $weights = Weight::all();
        $enteropies = CriteriaEntropy::with('criteria')->get();

        return view('entropies.result', compact('gmm', 'gmmData', 'criterias', 'weights', 'enteropies'));
    }

    
}

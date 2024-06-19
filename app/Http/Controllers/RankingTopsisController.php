<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\CriteriaEntropy;
use App\Models\GMM;
use App\Models\GmmResultView;
use App\Models\Weight;

class RankingTopsisController extends Controller
{
   /**
     * Display a listing of the resource about ranking of topsis
     */
    public function resultView(GMM $gmm)
    {
        $criterias = Criteria::all();
        $enteropies = CriteriaEntropy::with('criteria')->get();
        $gmmData = GmmResultView::where('assessment_id', $gmm->id)->with('team')->get();
        $weights = Weight::all();

        return view('topsis.result', compact('gmm', 'gmmData', 'criterias', 'enteropies', 'weights'));
    }
}

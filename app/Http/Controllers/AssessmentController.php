<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\GMM;
use App\Models\GMMCriteria;
use App\Models\GMMJury;
use App\Models\GMMResult;
use App\Models\GMMSession;
use App\Models\GMMTeam;
use App\Models\GmmView;
use App\Models\User;
use App\Models\Weight;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    /**
     * Display all gmms
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $gmms = GMM::latest()->paginate(10);

        return view('assessment.index', compact('gmms'));
    }

    public function assignView(GMM $gmm)
    {
        $criterias = Criteria::all();
        $gmmCriteria = GMMCriteria::where('assessment_id', $gmm->id)->with('criteria', 'gmm')->get();
        $gmmSession = GMMSession::where('assessment_id', $gmm->id)->with('gmmTeams.team.papers', 'gmmJuries.jury')->get();
        $gmmData = GmmView::where('assessment_id', $gmm->id)->get();
        $juryData = User::with('jury')->where('id', auth()->user()->id)->first();
        $maxScore = array();

        foreach ($criterias as $key => $value) {
            $maxScore[] = Weight::where('criteria_id', $value->id)->selectRaw('MAX(max_range) as max_range')->first();
        }

        if(count($gmmCriteria) == 0){
            // insert data in gmm criteria
            $allCriteria = Criteria::all();
            foreach($gmmSession as $session){
                $gmmTeams = GMMTeam::where('assessment_id', $gmm->id)->where('assessment_session_id', $session->id)->with('team', 'gmm')->get();
                $gmmJuries = GMMJury::where('assessment_id', $gmm->id)->where('assessment_session_id', $session->id)->with('jury', 'gmm')->get();
                foreach($gmmTeams as $team) {
                    foreach($gmmJuries as $jury){
                        foreach($allCriteria as $criteria) {
                            GMMCriteria::create([
                                'assessment_id' => $gmm->id,
                                'team_id' => $team->team->id,
                                'jury_id' => $jury->jury->id,
                                'criteria_id' => $criteria->id,
                                'value' => 0,
                            ]);
                        }
                    }
                }
            }
            
            return redirect()->route('gmm.jury.assignView', $gmm->id)
            ->withSuccess(__('GMM updated successfully.'));
        }else{
            return view('assessment.assign', compact('gmm', 'gmmData', 'gmmSession', 'criterias', 'juryData', 'maxScore'));
        }
    }

    public function assignSave(GMM $gmm, Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'criteria_values.*.*.*' => 'required|numeric',
        ]);
        $juryData = User::with('jury')->where('id', auth()->user()->id)->first();
        $gmmSession = GMMSession::where('assessment_id', $gmm->id)->with('gmmTeams.team', 'gmmJuries.jury')->get();

        foreach($gmmSession as $session){
            foreach($session->gmmTeams as $team) {
                foreach($session->gmmJuries as $jury){
                    if($juryData->jury->id == $jury->jury_id){
                        foreach ($validatedData['criteria_values'][$team->team_id][$jury->jury_id] as $criteriaIndex => $value) {
                            $existingEntry = GMMCriteria::where([
                                'assessment_id' => $gmm->id,
                                'team_id' => $team->team_id,
                                'jury_id' => $jury->jury_id,
                                'criteria_id' => $criteriaIndex,
                            ])->first();
                            // Jika entri sudah ada, lakukan update
                            if ($existingEntry) {
                                $existingEntry->update(['value' => $value]);
                            }
                        }
                    }
                }
            }
        }
        // Hitung Rata-Rata
        $teams = GMMCriteria::select('team_id')->distinct()->where('assessment_id', $gmm->id)->get();

        foreach ($teams as $team) {
            // Ambil semua data kriteria untuk tim tertentu
            $criteriaData = GMMCriteria::where('team_id', $team->team_id)->get();
            // Hitung rata-rata nilai untuk setiap kriteria
            $geomeans = [];
            foreach ($criteriaData->groupBy('criteria_id') as $criteriaGroup) {
                $product = 1;
                $count = 0;
                foreach ($criteriaGroup as $criteriaItem) {
                    if($criteriaItem->value != 0){
                        $product *= $criteriaItem->value;
                        $count++;
                    }
                }

                if ($count > 0) {
                    $geomeans[$criteriaGroup->first()->criteria_id] = pow($product, 1 / $count);
                } else {
                    // Jika semua nilai nol, atur geometris rata-rata ke nol
                    $geomeans[$criteriaGroup->first()->criteria_id] = 0;
                }
            }

            // Simpan atau update rata-rata nilai untuk tim tersebut di dalam tabel GMMResult
            foreach ($geomeans as $criteria_id => $value) {
                
                GMMResult::updateOrCreate(
                    ['team_id' => $team->team_id, 'criteria_id' => $criteria_id, 'assessment_id' => $gmm->id],
                    ['value' => $value]
                );
            }
        }

        return redirect()->route('gmm.jury.assignView', $gmm->id)
            ->withSuccess(__('GMM updated successfully.'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\GMM\StoreGMMRequest;
use App\Http\Requests\GMM\UpdateGMMRequest;
use App\Models\Criteria;
use App\Models\CriteriaEntropy;
use App\Models\GMM;
use App\Models\GMMCriteria;
use App\Models\GMMJury;
use App\Models\GMMResult;
use App\Models\GmmResultView;
use App\Models\GMMSession;
use App\Models\GMMTeam;
use App\Models\GmmView;
use App\Models\Team;
use App\Models\Weight;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class GMMController extends Controller
{
    /**
     * Display all gmms
     * 
     * @return \Illuminate\Http\Response
     */
    public function assessment() 
    {
        $gmms = GMM::with(['assessment_sessions', 'assessment_criterias', 'assessment_juries', 'assessment_teams'])->latest()->paginate(10); 

        return view('gmm.assessment', compact('gmms'));
    }

    /**
     * Display all gmms
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $gmms = GMM::latest()->paginate(10);

        return view('gmm.index', compact('gmms'));
    }

    /**
     * Show form for creating gmm
     * 
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        return view('gmm.create');
    }

    /**
     * Store a newly created gmm
     * 
     * @param GMM $gmm
     * @param StoreGMMRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(GMM $gmm, StoreGMMRequest $request) 
    {
        $gmm->create($request->validated());
        return redirect()->route('gmm.index')
            ->withSuccess(__('GMM created successfully.'));
    }

    /**
     * Show gmm data
     * 
     * @param GMM $gmm
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(GMM $gmm) 
    {
        return view('gmm.show', [
            'gmm' => $gmm
        ]);
    }

    /**
     * Edit gmm data
     * 
     * @param GMM $gmm
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(GMM $gmm) 
    {
        return view('gmm.edit', [
            'gmm' => $gmm,
        ]);
    }

    /**
     * Update gmm data
     * 
     * @param GMM $gmm
     * @param UpdateGMMRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(GMM $gmm, UpdateGMMRequest $request) 
    {
        $gmm->update($request->validated());

        return redirect()->route('gmm.index')
            ->withSuccess(__('GMM updated successfully.'));
    }

    /**
     * Delete gmm data
     * 
     * @param GMM $gmm
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(GMM $gmm) 
    {
        $gmm->delete();

        return redirect()->route('gmm.index')
            ->withSuccess(__('GMM deleted successfully.'));
    }

    public function assignView(GMM $gmm)
    {
        $criterias = Criteria::all();
        $gmmCriteria = GMMCriteria::where('assessment_id', $gmm->id)->with('criteria', 'gmm')->get();
        $gmmSession = GMMSession::where('assessment_id', $gmm->id)->with('gmmTeams.team', 'gmmJuries.jury')->get();
        $gmmData = GmmView::where('assessment_id', $gmm->id)->get();

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
            
            return redirect()->route('gmm.assignView', $gmm->id)
            ->withSuccess(__('GMM updated successfully.'));
        }else{
            return view('gmm.assign', compact('gmm', 'gmmData', 'gmmSession', 'criterias'));
        }
    }

    public function assignSave(GMM $gmm, Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'criteria_values.*.*.*' => 'required|numeric',
        ]);

        $gmmSession = GMMSession::where('assessment_id', $gmm->id)->with('gmmTeams.team', 'gmmJuries.jury')->get();

        // proses mengupdate data perhitungan
        foreach($gmmSession as $session){
            foreach($session->gmmTeams as $team) {
                foreach($session->gmmJuries as $jury){
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
        // Hitung Rata rata GMM
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

        return redirect()->route('gmm.assignView', $gmm->id)
            ->withSuccess(__('GMM updated successfully.'));
    }

    public function resultView(GMM $gmm)
    {
        $criterias = Criteria::all();
        $gmmData = GmmResultView::where('assessment_id', $gmm->id)->with('team')->get();

        return view('gmm.result', compact('gmm', 'gmmData', 'criterias'));
    }

    public function calculate(GMM $gmm)
    {
        // Validasi data input
        $gmmSession = GMMSession::where('assessment_id', $gmm->id)->with('gmmTeams.team', 'gmmJuries.jury')->get();

        // Hitung Rata rata GMM
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

        $criterias = Criteria::all();
        $gmmData = GmmResultView::where('assessment_id', $gmm->id)->with('team')->get();
        $weights = Weight::all();
        $enteropies = CriteriaEntropy::with('criteria')->get();

        return view('calculations.result', compact('gmm', 'gmmData', 'criterias', 'weights', 'enteropies'));
    }

    public function exportCsv(Request $request)
    {
        $csvData = $request->input('csvData');
        $filename = 'topsis_result_' . time() . '.csv';

        Storage::disk('public')->put($filename, $csvData);

        return response()->download(storage_path("app/public/{$filename}"));
    } 
}

<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\GMM;
use App\Models\Jury;
use App\Models\Team;
use App\Models\User;
use App\Models\Weight;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            "count_user" => User::count(),
            "count_criteria" => Criteria::count(),
            "count_weight" => Weight::count(),
            "count_team" => Team::count(),
            "count_jury" => Jury::count(),
            "count_calculation" => GMM::count()
        ];
        return view('home', compact('data'));
    }

    public function about()
    {
        return view('about');
    }
}

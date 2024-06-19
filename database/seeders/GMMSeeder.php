<?php

namespace Database\Seeders;

use App\Models\GMM;
use App\Models\GMMJury;
use App\Models\GMMSession;
use App\Models\GMMTeam;
use Illuminate\Database\Seeder;

class GMMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gmms = [
            [
                "name" => 'hitung'
            ]
        ];
        foreach ($gmms as $assessment_data) {
            GMM::create($assessment_data);
        }

        // gmm session
        $gmmSessions = [
            [
                "assessment_id" => "1",
                "name" => 'Sesi 1',
            ],
            [
                "assessment_id" => "1",
                "name" => 'Sesi 2',
            ]
        ];
       foreach ($gmmSessions as $session_data) { 
            GMMSession::create($session_data); 
        }

        // team juri sesi 1
        // insert team 1
        for ($i=1; $i <= 9; $i++) { 
            GMMTeam::create([
                "assessment_id" => "1",
                "assessment_session_id" => "1",
                "team_id" => $i,
            ]);
        }

        // insert jury 1
        for ($i=1; $i <= 4; $i++) { 
            $gmm = GMMJury::create([
                "assessment_id" => "1",
                "assessment_session_id" => "1",
                "jury_id" => $i,
            ]);
        }

        // team juri sesi 2
        // insert team 2
        for ($i=10; $i <= 18; $i++) { 
            $gmm = GMMTeam::create([
                "assessment_id" => "1",
                "assessment_session_id" => "2",
                "team_id" => $i,
            ]);
        }
        // insert jury 2
        for ($i=5; $i <= 8; $i++) { 
            $gmm = GMMJury::create([
                "assessment_id" => "1",
                "assessment_session_id" => "2",
                "jury_id" => $i,
            ]);
        }

    }
}

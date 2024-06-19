<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\Weight;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams = [
            [
                'name' => "CAPSULE REBORN",
            ],
            [
                'name' => "KOMAT KAMIT",
            ],
            [
                'name' => "MALIKA",
            ],
            [
                'name' => "OPTIMIZE",
            ],
            [
                'name' => "SS QUICK REBORN",
            ],
            [
                'name' => "63PBC04-1",
            ],
            [
                'name' => "63RPM01",
            ],
            [
                'name' => "ER SEPULUH",
            ],
            [
                'name' => "EXPENDITIOUS",
            ],
            [
                'name' => "BABY BELT 334BC01A",
            ],
            [
                'name' => "SGA KILN COOLER TBN.3",
            ],
            [
                'name' => "PP Lampung SIG",
            ],
            [
                'name' => "CELUKAN BAWANG",
            ],
            [
                'name' => "INPRESS",
            ],
            [
                'name' => "SGA PACKER 3-1",
            ],
            [
                'name' => "Klik 1",
            ],
            [
                'name' => "NDEPENDMAN",
            ],
            [
                'name' => "LAB-XPLORERS",
            ],
        ];
        foreach ($teams as $team_data) {
            $team = Team::create($team_data);
        }
    }
}

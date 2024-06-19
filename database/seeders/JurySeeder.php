<?php

namespace Database\Seeders;

use App\Models\Jury;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $juries = [
            [
                "name" => "DENO MANDRIAL",
                "user_id" => 2,
                "nik" => "1234567891234567",
                "category" => 'test',
            ],
            [
                "name" => "YUNUS YANUAR",
                "user_id" => 3,
                "nik" => "1234567891234567",
                "category" => 'test',
            ],
            [
                "name" => "ADI FATKHURROHMAN",
                "user_id" => 4,
                "nik" => "1234567891234567",
                "category" => 'test',
            ],
            [
                "name" => "DIDIET JOKO SUSILO",
                "user_id" => 5,
                "nik" => "1234567891234567",
                "category" => 'test',
            ],
            [
                "name" => "DEDY ERMAWANTO",
                "user_id" => 6,
                "nik" => "1234567891234567",
                "category" => 'test',
            ],
            [
                "name" => "MUYASAROH EFFENDI",
                "user_id" => 7,
                "nik" => "1234567891234567",
                "category" => 'test',
            ],
            [
                "name" => "ANON SULISTYO",
                "user_id" => 8,
                "nik" => "1234567891234567",
                "category" => 'test',
            ],
            [
                "name" => "BAYU PRATAMA P.",
                "user_id" => 9,
                "nik" => "1234567891234567",
                "category" => 'test',
            ],
        ];
        foreach ($juries as $jury_data) {
            $jury = Jury::create($jury_data);
        }
    }
}

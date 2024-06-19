<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $criterias = [
            [
                'title' => 'Penetapan Aktivitas',
                'description' => 'Penetapan Aktivitas',
            ],
            [
                'title' => 'Proses Pemecahan Masalah & Perbaikan',
                'description' => 'Proses Pemecahan Masalah & Perbaikan',
            ],
            [
                'title' => 'Solusi',
                'description' => 'Solusi',
            ],
            [
                'title' => 'Tingkat Kesulitan',
                'description' => 'Tingkat Kesulitan',
                'status' => 'cost',
            ],
            [
                'title' => 'Mutu Proses Pelaksanaan',
                'description' => 'Mutu Proses Pelaksanaan',
            ],
            [
                'title' => 'Ketepatan & Kelengkapan Evaluasi',
                'description' => 'Ketepatan & Kelengkapan Evaluasi',
            ],
            [
                'title' => 'Dampak Hasil',
                'description' => 'Dampak Hasil',
            ],
            [
                'title' => 'Standardisasi',
                'description' => 'Standardisasi',
            ],
            [
                'title' => 'Mutu Makalah',
                'description' => 'Mutu Makalah',
            ],
            [
                'title' => 'Mutu Presentasi',
                'description' => 'Mutu Presentasi',
            ],
            
        ];

        foreach ($criterias as $criteria_data) {
            $criteria = Criteria::create($criteria_data);
        }
    }
}

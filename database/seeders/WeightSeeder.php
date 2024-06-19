<?php

namespace Database\Seeders;

use App\Models\Weight;
use Illuminate\Database\Seeder;

class WeightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $weights = [
            [
                'criteria_id' => '1',
                'type' => 'Kurang',
                'min_range' => 10,
                'max_range' => 50,
                'weight' => 1
            ],
            [
                'criteria_id' => '1',
                'type' => 'Cukup',
                'min_range' => 51,
                'max_range' => 70,
                'weight' => 2
            ],
            [
                'criteria_id' => '1',
                'type' => 'Baik',
                'min_range' => 71,
                'max_range' => 80,
                'weight' => 3
            ],
            [
                'criteria_id' => '2',
                'type' => 'Kurang',
                'min_range' => 10,
                'max_range' => 50,
                'weight' => 1
            ],
            [
                'criteria_id' => '2',
                'type' => 'Cukup',
                'min_range' => 51,
                'max_range' => 70,
                'weight' => 2
            ],
            [
                'criteria_id' => '2',
                'type' => 'Baik',
                'min_range' => 71,
                'max_range' => 80,
                'weight' => 3
            ],
            [
                'criteria_id' => '3',
                'type' => 'Kurang',
                'min_range' => 10,
                'max_range' => 60,
                'weight' => 1
            ],
            [
                'criteria_id' => '3',
                'type' => 'Cukup',
                'min_range' => 61,
                'max_range' => 80,
                'weight' => 2
            ],
            [
                'criteria_id' => '3',
                'type' => 'Baik',
                'min_range' => 81,
                'max_range' => 100,
                'weight' => 3
            ],
            [
                'criteria_id' => '4',
                'type' => 'Tidak Bisa',
                'min_range' => 10,
                'max_range' => 50,
                'weight' => 1
            ],
            [
                'criteria_id' => '4',
                'type' => 'Bisa direplikasi di Internal',
                'min_range' => 51,
                'max_range' => 100,
                'weight' => 2
            ],
            [
                'criteria_id' => '4',
                'type' => 'Bisa direplikasi di internal dan antar perusahaan',
                'min_range' => 101,
                'max_range' => 120,
                'weight' => 3
            ],
            [
                'criteria_id' => '5',
                'type' => 'Tidak ada dalam rencana',
                'min_range' => 10,
                'max_range' => 40,
                'weight' => 1
            ],
            [
                'criteria_id' => '5',
                'type' => 'Penyesuaian realisasi atas rencana',
                'min_range' => 41,
                'max_range' => 70,
                'weight' => 2
            ],
            [
                'criteria_id' => '5',
                'type' => 'Realisasi sesuai dengagn rencana',
                'min_range' => 71,
                'max_range' => 80,
                'weight' => 3
            ],
            [
                'criteria_id' => '6',
                'type' => 'Tidak ada perbandingan Sasaran & Pencapaian',
                'min_range' => 10,
                'max_range' => 40,
                'weight' => 1
            ],
            [
                'criteria_id' => '6',
                'type' => 'Hasil Inovasi sesuai Target',
                'min_range' => 41,
                'max_range' => 70,
                'weight' => 2
            ],
            [
                'criteria_id' => '6',
                'type' => 'Hasil Inovasi melebihi Target',
                'min_range' => 71,
                'max_range' => 80,
                'weight' => 3
            ],
            [
                'criteria_id' => '7',
                'type' => 'Real Benefit 1- 100 jt',
                'min_range' => 50,
                'max_range' => 72,
                'weight' => 1
            ],
            [
                'criteria_id' => '7',
                'type' => 'Real Benefit > 100- 500 Jt',
                'min_range' => 73,
                'max_range' => 87,
                'weight' => 2
            ],
            [
                'criteria_id' => '7',
                'type' => 'Real Benefit > 500 Jt - 1M',
                'min_range' => 88,
                'max_range' => 102,
                'weight' => 3
            ],
            [
                'criteria_id' => '7',
                'type' => 'Real Benefit > 1 M - 5 M',
                'min_range' => 103,
                'max_range' => 122,
                'weight' => 4
            ],
            [
                'criteria_id' => '7',
                'type' => 'Real Benefit > 5 M',
                'min_range' => 123,
                'max_range' => 200,
                'weight' => 5
            ],
            [
                'criteria_id' => '8',
                'type' => 'Belum ada standarisasi',
                'min_range' => 10,
                'max_range' => 40,
                'weight' => 1
            ],
            [
                'criteria_id' => '8',
                'type' => 'Menggunakan Standard lama',
                'min_range' => 41,
                'max_range' => 70,
                'weight' => 2
            ],
            [
                'criteria_id' => '8',
                'type' => 'Terdapat Standard Baru & disahkan',
                'min_range' => 71,
                'max_range' => 80,
                'weight' => 3
            ],
            [
                'criteria_id' => '9',
                'type' => 'Tidak sesuai aturan & Tampilan Makalah kurang menarik',
                'min_range' => 10,
                'max_range' => 40,
                'weight' => 1
            ],
            [
                'criteria_id' => '9',
                'type' => 'Sesuai aturan tapi tampilan kurang menarik',
                'min_range' => 41,
                'max_range' => 70,
                'weight' => 2
            ],
            [
                'criteria_id' => '9',
                'type' => 'Sesuai aturan dan Tampilan Makalah Menarik',
                'min_range' => 71,
                'max_range' => 80,
                'weight' => 3
            ],
            [
                'criteria_id' => '10',
                'type' => 'Presentasi Kurang Jelas & Tampilan Kurang Menarik',
                'min_range' => 10,
                'max_range' => 40,
                'weight' => 1
            ],
            [
                'criteria_id' => '10',
                'type' => 'Presentasi Jelas tapi tampilan kurang menarik',
                'min_range' => 41,
                'max_range' => 70,
                'weight' => 2
            ],
            [
                'criteria_id' => '10',
                'type' => 'Presentasi Jelas & Tampilan Menarik',
                'min_range' => 71,
                'max_range' => 80,
                'weight' => 3
            ],
        ];

        foreach ($weights as $weight_data) {
            $weight = Weight::create($weight_data);
        }
    }
}

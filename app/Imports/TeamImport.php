<?php

namespace App\Imports;

use App\Models\Team;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class TeamImport implements ToModel, WithStartRow
{
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2; // Mulai dari baris kedua
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Team([
            'name' => $row[0],
            'title_innovation' => $row[1],
            'category_innovation' => $row[2],
            'name_leader' => $row[3],
            'nik_leader' => $row[4],
            'work_unit' => $row[5],
            'name_member_1' => $row[6],
            'nik_member_1' => $row[7],
            'name_member_2' => $row[8],
            'nik_member_2' => $row[9],
            'name_member_3' => $row[10],
            'nik_member_3' => $row[11],
            'name_member_4' => $row[12],
            'nik_member_4' => $row[13],
            'name_member_5' => $row[14],
            'nik_member_5' => $row[15],
        ]);
    }
}

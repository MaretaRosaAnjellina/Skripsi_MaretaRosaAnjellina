<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [
        'id',
        'updated_at',
    ];

    protected $dates = [
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'title_innovation',
        'category_innovation',
        'name_leader',
        'nik_leader',
        'work_unit',
        'name_member_1',
        'nik_member_1',
        'name_member_2',
        'nik_member_2',
        'name_member_3',
        'nik_member_3',
        'name_member_4',
        'nik_member_4',
        'name_member_5',
        'nik_member_5',
    ];

    public function papers()
    {
        return $this->hasMany(Paper::class);
    }
}

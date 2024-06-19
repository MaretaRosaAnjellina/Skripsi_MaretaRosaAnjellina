<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GMM extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'assessments';

    protected $guarded = [
        'id',
        'updated_at',
    ];

    protected $dates = [
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'year',
    ];

    public function assessment_sessions()
    {
        return $this->hasMany(GMMSession::class, 'assessment_id');
    }

    public function assessment_criterias()
    {
        return $this->hasMany(GMMCriteria::class,  'assessment_id');
    }

    public function assessment_juries()
    {
        return $this->hasMany(GMMJury::class, 'assessment_id');
    }

    public function assessment_teams()
    {
        return $this->hasMany(GMMTeam::class, 'assessment_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GMMSession extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'assessment_sessions';

    protected $guarded = [
        'id',
        'updated_at',
    ];

    protected $dates = [
        'deleted_at',
    ];

    protected $fillable = [
        'assessment_id',
        'name',
    ];

    public function gmm()
    {
        return $this->belongsTo(GMM::class, 'assessment_id');
    }

    public function gmmTeams()
    {
        return $this->hasMany(GMMTeam::class, 'assessment_session_id');
    }

    public function gmmJuries()
    {
        return $this->hasMany(GMMJury::class, 'assessment_session_id');
    }
}

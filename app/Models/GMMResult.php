<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GMMResult extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'assessment_results';

    protected $guarded = [
        'id',
        'updated_at',
    ];

    protected $dates = [
        'deleted_at',
    ];

    protected $fillable = [
        'assessment_id',
        'team_id',
        'criteria_id',
        'value'
    ];

    public function gmm()
    {
        return $this->belongsTo(GMM::class, 'assessment_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }
}

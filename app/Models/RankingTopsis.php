<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RankingTopsis extends Model
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
        'team_id',
        'assessment_id',
        'value',
        'ranking'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    
    public function gmm()
    {
        return $this->belongsTo(GMM::class, 'assessment_id');
    }
}

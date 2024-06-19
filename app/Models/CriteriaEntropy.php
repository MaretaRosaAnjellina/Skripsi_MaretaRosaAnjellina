<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CriteriaEntropy extends Model
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
        'assessment_id',
        'criteria_id',
        'weight'
    ];

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }

    public function gmm()
    {
        return $this->belongsTo(GMM::class, 'assessment_id');
    }
}

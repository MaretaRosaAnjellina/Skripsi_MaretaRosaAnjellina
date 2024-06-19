<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GMMJury extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'assessment_juries';

    protected $guarded = [
        'id',
        'updated_at',
    ];

    protected $dates = [
        'deleted_at',
    ];

    protected $fillable = [
        'assessment_id',
        'assessment_session_id',
        'jury_id',
    ];

    public function gmm()
    {
        return $this->belongsTo(GMM::class, 'assessment_id');
    }
    
    public function gmmSession()
    {
        return $this->belongsTo(GMMSession::class, 'assessment_session_id');
    }
    
    public function jury()
    {
        return $this->belongsTo(Jury::class);
    }
}

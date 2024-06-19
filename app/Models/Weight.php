<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Weight extends Model
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
        'criteria_id',
        'type',
        'min_range',
        'max_range',
        'weight'
    ];

     public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }
}

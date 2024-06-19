<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GmmResultView extends Model
{
    use HasFactory;
    protected $table = 'gmm_result_view'; 
    public $timestamps = false; 

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}

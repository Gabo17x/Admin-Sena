<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    
    protected $fillable = ['name', 'location', 'area_id', 'training_center_id'];

    public function area()
    {
        return $this->belongsTo(Areas::class);
    }
    public function trainingCenter()
    {
        return $this->belongsTo(TrainingCenters::class);
    }
}

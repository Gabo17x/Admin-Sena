<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ambient extends Model
{
    protected $fillable = [
        'number',
        'capacity',
        'type',
        'status',
        'training_center_id',
        'area_id',
    ];

    public function trainingCenter()
    {
        return $this->belongsTo(TrainingCenters::class, 'training_center_id');
    }

    public function area()
    {
        return $this->belongsTo(Areas::class, 'area_id' );
    }
}

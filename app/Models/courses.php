<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $fillable = ['course_number', 'day', 'area_id', 'training_center_id'];

    public function area()
    {
        return $this->belongsTo(Areas::class, 'area_id');
    }

    public function trainingCenters()
    {
        return $this->belongsTo(TrainingCenters::class, 'training_center_id');
    }
}

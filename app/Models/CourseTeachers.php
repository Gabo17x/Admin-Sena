<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_number',
        'day',
        'area_id',
        'training_center_id',
    ];

    // Relación con Área (soluciona el error)
    public function area()
    {
        return $this->belongsTo(areas::class, 'area_id');
    }

    // Relación con Centro de Formación
    public function trainingCenters()
    {
        return $this->belongsTo(TrainingCenters::class, 'training_center_id');
    }
}
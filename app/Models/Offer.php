<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'ficha',
        'description',
        'type',
        'duration',
        'modality',
        'schedule',
        'image',
        'area_id',
        'training_center_id',
    ];

    public function area()
    {
        return $this->belongsTo(Areas::class, 'area_id');
    }

    public function trainingCenter()
    {
        return $this->belongsTo(TrainingCenters::class, 'training_center_id');
    }
}
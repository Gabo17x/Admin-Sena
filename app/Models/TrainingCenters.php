<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingCenters extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'location'];
    
    
    public function teachers() {
        return $this->hasMany('App\Models\Teachers', 'training_center_id');
    }
    
    public function courses() {
        return $this->hasMany('App\Models\Courses', 'training_center_id');
    }

}

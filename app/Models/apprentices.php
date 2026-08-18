<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprentices extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'number',
        'course_id',
        'computer_id',
    ];

    // Relación con el Curso
    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id');
    }

    // Relación con el Computador
    public function computer()
    {
        return $this->belongsTo(Computers::class, 'computer_id');
    }
}
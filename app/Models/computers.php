<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computers extends Model
{
    use HasFactory;

    protected $table = 'computers';

    protected $fillable = [
        'number',
        'brand',
    ];

    // Relación 1 a 1 / 1 a N con Aprendiz
    public function apprentice()
    {
        return $this->hasOne(Apprentices::class, 'computer_id');
    }
}
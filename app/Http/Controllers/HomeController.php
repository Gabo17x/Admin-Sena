<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\Courses;
use App\Models\TrainingCenters;
use App\Models\Apprentices;
use App\Models\Teachers;

class HomeController extends Controller
{
    public function index()
    {
        $stats = [
            'areas'            => Areas::count(),
            'courses'          => Courses::count(),
            'training_centers' => TrainingCenters::count(),
            'apprentices'      => Apprentices::count(),
            'teachers'         => Teachers::count(),
        ];

        // Últimas ofertas de formación (cursos) para mostrar en el Home
        $offers = Courses::latest()->take(6)->get();
        $areas = Areas::all();
        $training_centers = TrainingCenters::all();

        return view('Home.home', compact('stats', 'offers', 'areas', 'training_centers'));
    }
}
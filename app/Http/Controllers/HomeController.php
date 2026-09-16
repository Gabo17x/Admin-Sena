<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\Courses;
use App\Models\TrainingCenters;
use App\Models\Apprentices;
use App\Models\Teachers;
use App\Models\Offer;

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

        // Últimas ofertas de formación para mostrar en el Home
        $offers = Offer::with(['area', 'trainingCenter'])->latest()->take(6)->get();

        return view('Home.home', compact('stats', 'offers'));
    }
}
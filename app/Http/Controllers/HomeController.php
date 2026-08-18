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

        return view('home', compact('stats'));
    }
}
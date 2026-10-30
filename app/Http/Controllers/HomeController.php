<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\Courses;
use App\Models\TrainingCenters;
use App\Models\Apprentices;
use App\Models\Teachers;
use App\Models\Offer;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{
    public function index()
    {
        $stats = [
            'areas'            => Schema::hasTable('areas') ? Areas::count() : 0,
            'courses'          => Schema::hasTable('courses') ? Courses::count() : 0,
            'training_centers' => Schema::hasTable('training_centers') ? TrainingCenters::count() : 0,
            'apprentices'      => Schema::hasTable('apprentices') ? Apprentices::count() : 0,
            'teachers'         => Schema::hasTable('teachers') ? Teachers::count() : 0,
        ];

        // Últimas ofertas de formación para mostrar en el Home
        $offers = Schema::hasTable('offers')
            ? Offer::with(['area', 'trainingCenter'])->latest()->take(6)->get()
            : collect();

        return view('Home.home', compact('stats', 'offers'));
    }
}
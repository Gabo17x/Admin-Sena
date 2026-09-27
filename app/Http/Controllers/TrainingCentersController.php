<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingCenters;

class TrainingCentersController extends Controller
{
    public function index()
    {
        $training_centers = TrainingCenters::all();
        return response()->json($training_centers);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $training_center = TrainingCenters::create($data);

        return response()->json($training_center, 201);
    }

    public function show(TrainingCenters $training_center)
    {
        return response()->json($training_center);
    }

    public function update(Request $request, TrainingCenters $training_center)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $training_center->update($data);

        return response()->json($training_center, 200);
    }

    public function destroy(TrainingCenters $training_center)
    {
        $training_center->delete();

        return response()->json(null, 204);
    }
}
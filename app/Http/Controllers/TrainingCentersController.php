<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingCenters;
use Illuminate\Support\Facades\Redirect;

class TrainingCentersController extends Controller
{
    public function index()
    {
        $training_centers = TrainingCenters::all();
        return view('Training_Center.index', compact('training_centers'));
    }
    
    public function create()
    {
        $training_centers = TrainingCenters::latest()->get();
        return view('Training_Center.create', compact('training_centers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);
        TrainingCenters::create($data);

        return redirect()->route('training_center.index')->with('succes', 'Centro creado exitosamente');
    }

    public function show(TrainingCenters $training_center)
    {
        return view('Training_Center.show', compact('training_center'));
    }

    public function edit(TrainingCenters $training_center)
    {
        return view('Training_Center.edit', compact('training_center'));
    }

    public function update(Request $request, TrainingCenters $training_center)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $training_center->update($data);

        return redirect()->route('training_center.create')->with('success', 'Centro actualizado correctamente.');
    }

    public function destroy(TrainingCenters $training_center)
    {
        $training_center->delete();

        return redirect()->route('training_center.create')->with('success', 'Centro eliminado correctamente.');
    }
}

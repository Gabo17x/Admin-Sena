<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\Teachers;
use App\Models\TrainingCenters;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index()
    {
        $teachers = Teachers::all();
        return view('Teachers.index', compact('teachers'));
    }
    
    public function create()
    {
        return view('Teachers.create', [
            'areas' => Areas::all(),
            'training_centers' => TrainingCenters::all(),
            'teachers' => Teachers::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'area_id' => 'nullable|exists:areas,id',
            'training_center_id' => 'nullable|exists:training_centers,id',
        ]);

        $teacher = Teachers::create($data);

        return redirect()->route('teacher.index')->with('success', 'Instructor guardado correctamente.');
    }

    public function show(Teachers $teacher)
    {
        return view('Teachers.show', compact('teacher'));
    }

    public function edit(Teachers $teacher)
    {
        return view('Teachers.edit', [
            'teacher' => $teacher,
            'areas' => Areas::all(),
            'training_centers' => TrainingCenters::all(),
        ]);
    }

    public function update(Request $request, Teachers $teacher)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'area_id' => 'nullable|exists:areas,id',
            'training_center_id' => 'nullable|exists:training_centers,id',
        ]);

        $teacher->update($data);

        return redirect()->route('teacher.create')->with('success', 'Instructor actualizado correctamente.');
    }

    public function destroy(Teachers $teacher)
    {
        $teacher->delete();

        return redirect()->route('teacher.create')->with('success', 'Instructor eliminado correctamente.');
    }
}

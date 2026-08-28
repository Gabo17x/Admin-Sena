<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\Courses;
use App\Models\TrainingCenters;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
        return redirect()->route('course.create');
    }
    
    public function create()
    {
    return view('Courses.create', [
        'areas'            => Areas::all(),
        'training_centers' => TrainingCenters::all(),
        'courses'          => Courses::latest()->get(),
    ]);
    }

    public function store(Request $request)
    {
        // 1. Validar datos
        $data = $request->validate([
            'course_number'     => 'required|string|max:100',
            'day'               => 'required|string|max:100',
            'area_id'           => 'required|exists:areas,id',
            'training_center_id'=> 'required|exists:training_centers,id',
        ]);

        // 2. Guardar registro
        Courses::create($data);

        // 3. Redireccionar con mensaje
        return redirect()->route('course.create')->with('success', 'Curso creado exitosamente.');
    }

    public function show(Courses $course)
    {
        return view('Courses.show', compact('course'));
    }

    public function edit(Courses $course)
    {
        return view('Courses.edit', [
            'course' => $course,
            'areas' => Areas::all(),
            'training_centers' => TrainingCenters::all(),
        ]);
    }

    public function update(Request $request, Courses $course)
    {
        $data = $request->validate([
            'course_number' => 'required|string|max:255',
            'day' => 'required|string|max:255',
            'area_id' => 'nullable|exists:areas,id',
            'training_center_id' => 'nullable|exists:training_centers,id',
        ]);

        $course->update($data);

        return redirect()->route('course.create')->with('success', 'Curso actualizado correctamente.');
    }

    public function destroy(Courses $course)
    {
        $course->delete();

        return redirect()->route('course.create')->with('success', 'Curso eliminado correctamente.');
    }
}

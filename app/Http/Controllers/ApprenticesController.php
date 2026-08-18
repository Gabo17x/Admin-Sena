<?php

namespace App\Http\Controllers;

use App\Models\Apprentices;
use App\Models\Computers;
use App\Models\Courses;
use Illuminate\Http\Request;

class ApprenticesController extends Controller
{
    public function index()
    {
        $apprentices = Apprentices::with(['course', 'computer'])->get();
        return view('Apprentices.index', compact('apprentices'));
    }
    
    public function create()
    {
    $apprentices = Apprentices::with(['course', 'computer'])->get();
    $courses = Courses::all();
    $computers = Computers::all();

    return view('Apprentices.create', compact('apprentices', 'courses', 'computers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'number' => 'nullable|string|max:255',
            'course_id' => 'nullable|exists:courses,id',
            'computer_id' => 'nullable|exists:computers,id',
        ]);

        Apprentices::create($data);

        return redirect()->route('apprentice.create')->with('success', 'Aprendiz creado exitosamente.');
    }

    public function show(Apprentices $apprentice)
    {
        return view('Apprentices.show', compact('apprentice'));
    }

    public function edit(Apprentices $apprentice)
    {
        return view('Apprentices.edit', [
            'apprentice' => $apprentice,
            'courses' => Courses::all(),
            'computers' => Computers::all(),
        ]);
    }

    public function update(Request $request, Apprentices $apprentice)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'number' => 'nullable|string|max:255',
            'course_id' => 'nullable|exists:courses,id',
            'computer_id' => 'nullable|exists:computers,id',
        ]);

        $apprentice->update($data);

        return redirect()->route('apprentice.create')->with('success', 'Aprendiz actualizado correctamente.');
    }

    public function destroy(Apprentices $apprentice)
    {
        $apprentice->delete();

        return redirect()->route('apprentice.create')->with('success', 'Aprendiz eliminado correctamente.');
    }
}
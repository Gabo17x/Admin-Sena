<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Areas;

class AreasController extends Controller
{
    public function index()
    {
        $areas = Areas::all();
        return view('Area.index', compact('areas'));
    }

    public function create()
    {
        $areas = Areas::latest()->get();
        return view('Area.create', compact('areas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        
        Areas::create($data);

        // Corregido a 'area.create' (singular)
        return redirect()->route('area.create')->with('success', 'Área creada exitosamente.');
    }

    public function show(Areas $area)
    {
        return view('Area.show', compact('area'));
    }

    public function edit(Areas $area)
    {
        return view('Area.edit', compact('area'));
    }

    public function update(Request $request, Areas $area)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $area->update($data);

        return redirect()->route('area.create')->with('success', 'Área actualizada correctamente.');
    }

    public function destroy(Areas $area)
    {
        $area->delete();

        return redirect()->route('area.create')->with('success', 'Área eliminada correctamente.');
    }
}
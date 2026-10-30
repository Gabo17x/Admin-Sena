<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use Illuminate\Http\Request;

class AreasController extends Controller
{
    public function index()
    {
        $areas = Areas::orderBy('id')->get();

        return view('Area.index', compact('areas'));
    }

    public function create()
    {
        $areas = Areas::orderBy('id')->get();

        return view('Area.create', compact('areas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $area = Areas::create($data);

        return response()->json($area, 201);
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

        return redirect()->route('area.create');
    }
}
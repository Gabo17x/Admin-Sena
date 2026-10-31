<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\TrainingCenters;
use Cloudinary\Cloudinary;
use Illuminate\Http\Request;

class AreasController extends Controller
{
   



    public function index()
    {
        $areas = Areas::all();

        return view('Area.index', compact('areas'));
    }

    public function create()
    {
        $areas = Areas::all();

        return view('Area.create', compact('areas'));
    }

   public function store(Request $request)

    {
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'brand' => 'required|string|max:255',
        'image' => 'required|image|max:2048',
    ]);

    $data['image'] = $this->subirImagen($request->file('image'), 'areas');

    Areas::create($data);

    return redirect()->route('area.create')->with('success', 'Área creada correctamente.');
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
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $this->subirImagen($request->file('image'), 'areas');
        }

        $area->update($data);

        return redirect()->route('area.create')->with('success', 'Área actualizada correctamente.');
    }

    public function destroy(Areas $area)
    {
        $area->delete();

        return redirect()->route('area.create');
    }
}
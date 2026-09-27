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
        return response()->json($areas);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $areas = Areas::create($data);

        return response()->json($areas, 201);
    }

    public function show(int $id)
    {
        $areas = Areas::findOrFail($id);

        return response()->json($areas);
    }

    public function update(Request $request, Areas $areas)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $areas->update($data);

        return response()->json($areas, 200);
    }

    public function destroy(Areas $area)
    {
        $area->delete();

        return response()->json(null, 204);
    }
}
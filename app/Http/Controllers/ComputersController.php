<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Computers;
use App\Models\Apprentices;
use Illuminate\Http\Request;

class ComputersController extends Controller
{
    public function index()
    {
        $computers = Computers::with('apprentice')->get();
        return response()->json($computers, 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'number' => 'required|string|max:50',
            'brand'  => 'required|string|max:100',
        ]);

        $computer = Computers::create($data);

        return response()->json($computer, 201);
    }

    public function show(Computers $computer)
    {
        return response()->json($computer);
    }

    public function update(Request $request, Computers $computer)
    {
        $data = $request->validate([
            'number' => 'required|string|max:50',
            'brand'  => 'required|string|max:100',
        ]);

        $computer->update($data);

        return response()->json($computer, 200);
    }

    public function destroy(Computers $computer)
    {
        $computer->delete();
        return response()->json(null, 204);
    }
}
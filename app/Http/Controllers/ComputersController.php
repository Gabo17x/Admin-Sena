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
        return view('Computers.index', compact('computers'));
    }

    public function create()
    {
        $computers = Computers::with('apprentice')->get();
        return view('Computer.create', compact('computers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'number' => 'required|string|max:50',
            'brand'  => 'required|string|max:100',
        ]);

        Computers::create($data);

        return redirect()->route('computer.create')->with('success', 'Computador registrado correctamente.');
    }

    public function destroy(Computers $computer)
    {
        $computer->delete();
        return redirect()->route('computer.create')->with('success', 'Computador eliminado correctamente.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Computers;
use Illuminate\Http\Request;

class ComputersController extends Controller
{
    public function index()
    {
        $computers = Computers::with('apprentice')->orderBy('id')->get();

        return view('Computer.create', compact('computers'));
    }

    public function create()
    {
        $computers = Computers::with('apprentice')->orderBy('id')->get();

        return view('Computer.create', compact('computers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'number' => 'required|string|max:50',
            'brand' => 'required|string|max:100',
        ]);

        Computers::create($data);

        return redirect()->route('computer.create')->with('success', 'Computador registrado correctamente.');
    }

    public function show(Computers $computer)
    {
        return view('Computer.show', compact('computer'));
    }

    public function edit(Computers $computer)
    {
        return view('Computer.edit', compact('computer'));
    }

    public function update(Request $request, Computers $computer)
    {
        $data = $request->validate([
            'number' => 'required|string|max:50',
            'brand' => 'required|string|max:100',
        ]);

        $computer->update($data);

        return redirect()->route('computer.create')->with('success', 'Computador actualizado correctamente.');
    }

    public function destroy(Computers $computer)
    {
        $computer->delete();

        return redirect()->route('computer.create')->with('success', 'Computador eliminado correctamente.');
    }
}
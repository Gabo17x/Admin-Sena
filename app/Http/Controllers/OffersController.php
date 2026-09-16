<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Areas;
use App\Models\TrainingCenters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OffersController extends Controller
{
    public function index()
    {
        $offers = Offer::with(['area', 'trainingCenter'])->get();
        return view('Offers.index', compact('offers'));
    }

    public function create()
    {
        $areas = Areas::all();
        $trainingCenters = TrainingCenters::all();
        return view('Offers.create', compact('areas', 'trainingCenters'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ficha' => 'required|string|max:20',
            'description' => 'required|string',
            'type' => 'required|string|max:100',
            'duration' => 'required|string|max:50',
            'modality' => 'required|in:presencial,virtual',
            'schedule' => 'required|in:tarde,diurna,noche',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'area_id' => 'nullable|exists:areas,id',
            'training_center_id' => 'nullable|exists:training_centers,id',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('offers', 'public');
        }

        Offer::create($data);

        return redirect()->route('offers.index')->with('success', 'Oferta registrada correctamente.');
    }

    public function show(string $id)
    {
        $offer = Offer::with(['area', 'trainingCenter'])->findOrFail($id);
        return view('Offers.show', compact('offer'));
    }

    public function edit(string $id)
    {
        $offer = Offer::findOrFail($id);
        $areas = Areas::all();
        $trainingCenters = TrainingCenters::all();
        return view('Offers.edit', compact('offer', 'areas', 'trainingCenters'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'ficha' => 'required|string|max:20',
            'description' => 'required|string',
            'type' => 'required|string|max:100',
            'duration' => 'required|string|max:50',
            'modality' => 'required|in:presencial,virtual',
            'schedule' => 'required|in:tarde,diurna,noche',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'area_id' => 'nullable|exists:areas,id',
            'training_center_id' => 'nullable|exists:training_centers,id',
        ]);

        $offer = Offer::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($offer->image) {
                \Storage::disk('public')->delete($offer->image);
            }
            $data['image'] = $request->file('image')->store('offers', 'public');
        }

        $offer->update($data);

        return redirect()->route('offers.index')->with('success', 'Oferta actualizada correctamente.');
    }

    public function destroy(string $id)
    {
        $offer = Offer::findOrFail($id);
        if ($offer->image) {
            \Storage::disk('public')->delete($offer->image);
        }
        $offer->delete();

        return redirect()->route('offers.index')->with('success', 'Oferta eliminada correctamente.');
    }
}
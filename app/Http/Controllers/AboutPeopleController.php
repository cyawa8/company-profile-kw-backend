<?php

namespace App\Http\Controllers;

use App\Models\AboutPeople;
use Illuminate\Http\Request;

class AboutPeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AboutPeople::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'job' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'contact' => 'nullable|string|max:255',
            'about' => 'nullable|string',
        ]);

        $people = AboutPeople::create($validated);

        return response()->json($people, 201);
    }

    public function show(AboutPeople $aboutPeople)
    {
        return response()->json($aboutPeople);
    }

    public function update(Request $request, AboutPeople $aboutPeople)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'birth_date' => 'sometimes|required|date',
            'job' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'contact' => 'nullable|string|max:255',
            'about' => 'nullable|string',
        ]);

        $aboutPeople->update($validated);

        return response()->json($aboutPeople);
    }

    public function destroy(AboutPeople $aboutPeople)
    {
        $aboutPeople->delete();
        return response()->json(['message' => 'data deleted successfully']);
    }
}

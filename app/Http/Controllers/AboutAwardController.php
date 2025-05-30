<?php

namespace App\Http\Controllers;

use App\Models\AboutAward;
use Illuminate\Http\Request;

class AboutAwardController extends Controller
{
    public function index()
    {
        return AboutAward::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|string', // bisa kamu ganti ke 'image' bila pakai file upload
            'job' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'contact' => 'nullable|string|max:255',
            'about' => 'nullable|string',
        ]);

        $award = AboutAward::create($validated);

        return response()->json($award, 201);
    }

    public function show(AboutAward $aboutAward)
    {
        return response()->json($aboutAward);
    }

    public function update(Request $request, AboutAward $aboutAward)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'image' => 'sometimes|required|string',
            'job' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'contact' => 'nullable|string|max:255',
            'about' => 'nullable|string',
        ]);

        $aboutAward->update($validated);

        return response()->json($aboutAward);
    }

    public function destroy(AboutAward $aboutAward)
    {
        $aboutAward->delete();
        return response()->json(['message' => 'Award deleted successfully']);
    }
}

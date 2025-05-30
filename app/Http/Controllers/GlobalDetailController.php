<?php

namespace App\Http\Controllers;

use App\Models\GlobalDetail;
use Illuminate\Http\Request;

class GlobalDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return GlobalDetail::with('category')->get(); // jika ada relasi
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'category_id' => 'required|exists:global_category,id',
        ]);

        $detail = GlobalDetail::create($validated);

        return response()->json($detail, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(GlobalDetail $globalDetail)
    {
        return $globalDetail->load('category'); // jika ada relasi
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GlobalDetail $globalDetail)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'category_id' => 'sometimes|required|exists:global_category,id',
        ]);

        $globalDetail->update($validated);

        return response()->json($globalDetail);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GlobalDetail $globalDetail)
    {
        $globalDetail->delete();
        return response()->json(['message' => 'Global detail deleted successfully']);
    }
}

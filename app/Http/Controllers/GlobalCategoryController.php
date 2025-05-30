<?php

namespace App\Http\Controllers;

use App\Models\GlobalCategory;
use Illuminate\Http\Request;

class GlobalCategoryController extends Controller
{

    public function index()
    {
        return GlobalCategory::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_category' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = GlobalCategory::create($validated);

        return response()->json($category, 201);
    }
    public function show(GlobalCategory $globalCategory)
    {
        return $globalCategory;
    }
    public function update(Request $request, GlobalCategory $globalCategory)
    {
        $validated = $request->validate([
            'title_category' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $globalCategory->update($validated);
        return response()->json($globalCategory);
    }

    public function destroy(GlobalCategory $globalCategory)
    {
        $globalCategory->delete();
        return response()->json(['message' => 'Category deleted successfully']);
    }
}

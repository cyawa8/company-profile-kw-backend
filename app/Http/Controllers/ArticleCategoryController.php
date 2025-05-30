<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ArticleCategory::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $category = ArticleCategory::create($validated);

        return response()->json($category, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ArticleCategory $articleCategory)
    {
        return $articleCategory->load('articles');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ArticleCategory $articleCategory)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $articleCategory->update($validated);

        return response()->json($articleCategory);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ArticleCategory $articleCategory)
    {
        $articleCategory->delete();
        return response()->json(['message' => 'Category deleted successfully']);
    }
}

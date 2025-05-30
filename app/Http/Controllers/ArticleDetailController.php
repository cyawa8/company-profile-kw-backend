<?php

namespace App\Http\Controllers;

use App\Models\ArticleDetail;
use Illuminate\Http\Request;

class ArticleDetailController extends Controller
{
    public function index()
    {
        return ArticleDetail::with('category')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|string',
            'category_id' => 'required|exists:article_category,id',
        ]);

        return ArticleDetail::create($validated);
    }

    public function show(ArticleDetail $articleDetail)
    {
        return $articleDetail->load('category');
    }

    public function update(Request $request, ArticleDetail $articleDetail)
    {
        $articleDetail->update($request->all());
        return $articleDetail;
    }


    public function destroy(Request $request, ArticleDetail $articleDetail)
    {
        $articleDetail->delete();
        return response()->json(['message' => 'Article deleted successfully']);
    }
}

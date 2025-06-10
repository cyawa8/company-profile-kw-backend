<?php

namespace App\Http\Controllers;

use App\models\AboutContent;
use Illuminate\Http\Request;

class AboutContentController extends Controller
{
    public function index(){
        return AboutContent::all();
    }

    public function store(Request $request){
        $validate = $request->validate([
            'title' => 'required|string',
            'subtitle' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagepath = $request->file('image')->store('banner', 'public');

        $aboutcontent = AboutContent::create([
            'title' => $validate['title'],
            'subtitle' => $validate['subtitle'],
            'content' => $validate['content'],
            'image' => $imagepath,
        ]);

        return response()->json($aboutcontent, 201);
    }

    public function show($id){
        return AboutContent::findOrFail($id);
    }

   public function update(Request $request, $id)
    {
        $aboutcontent = AboutContent::findOrFail($id);

        $aboutcontent->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'content' => $request->content,
            'image' => $imagepath,
        ]);

        return response()->json($aboutcontent, 201);
    }

    public function destroy($id){
        AbvoutContent::destroy($id);
        return response()->json(['data berhasil dihapus']);
    }
}

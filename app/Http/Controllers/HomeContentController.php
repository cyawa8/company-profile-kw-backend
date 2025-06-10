<?php

namespace App\Http\Controllers;

use App\models\HomeContent;
use Illuminate\Http\Request;

class HomeContentController extends Controller
{
    public function index(){
        return HomeContent::all();
    }

    public function store(Request $request){
        $validate = $request->validate([
            'title' => 'required|string',
            'subtitle' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagepath = $request->file('image')->store('banner', 'public');

        $homecontent = HomeContent::create([
            'title' => $validate['title'],
            'subtitle' => $validate['subtitle'],
            'image' => $imagepath,
        ]);

        return response()->json($homecontent, 201);
    }

    public function show($id){
        return HomeContent::findOrFail($id);
    }

   public function update(Request $request, $id)
    {
        $homecontent = HomeContent::findOrFail($id);

        $homecontent->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image' => $imagepath,
        ]);

        return response()->json($homecontent, 201);
    }

    public function destroy($id){
        HomeContent::destroy($id);
        return response()->json(['data berhasil dihapus']);
    }
}

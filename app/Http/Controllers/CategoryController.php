<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryController extends Controller
{
    
    public function read()
    {
        return view('member.category.read', [
            'categories' => category::all(),
        ]);
    }
    public function createView()
    {
        return view('member.category.create');
    }
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
            'slug'=> 'required|unique:categories|max:255'
        ]);
        category::create($validated);
        return redirect(route('member.berita.category'));
    }
    
    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(category::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
    public function newCategory(Request $request){
        $request['slug'] = SlugService::createSlug(category::class, 'slug', $request->name);
        $result = $request->validate([
            'name' => 'required|unique:categories|max:255',
            'slug'=> 'required|unique:categories|max:255'
        ]);
        $newCategory = category::create($result);
        return response()->json(['name' => $newCategory->name, 'slug' => $newCategory->slug, 'id' => $newCategory->id]);
    }
}

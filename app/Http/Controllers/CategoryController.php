<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    
    public function read()
    {
        if(Auth::user()->role != '1') return redirect('/');
        return view('member.category.read', [
            'categories' => category::all(),
        ]);
    }
    public function createView()
    {
        if(Auth::user()->role != '1') return redirect('/');
        return view('member.category.create');
    }
    public function create(Request $request)
    {
        if(Auth::user()->role != '1') return redirect('/');
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
        if(Auth::user()->role != '1') return redirect('/');
        $request['slug'] = SlugService::createSlug(category::class, 'slug', $request->name);
        $result = $request->validate([
            'name' => 'required|unique:categories|max:255',
            'slug'=> 'required|unique:categories|max:255'
        ]);
        $newCategory = category::create($result);
        return response()->json(['name' => $newCategory->name, 'slug' => $newCategory->slug, 'id' => $newCategory->id]);
    }
}

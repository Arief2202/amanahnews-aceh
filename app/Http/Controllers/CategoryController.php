<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function read()
    {
        return view('member.category.read', [
            'Categories' => Category::all(),
        ]);
    }
    public function createView()
    {
        return view('member.category.create');
    }
    public function create(Request $request)
    {
        dd($request);
    }
}

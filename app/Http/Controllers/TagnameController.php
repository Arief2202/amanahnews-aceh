<?php

namespace App\Http\Controllers;

use App\Models\Tagname;
use Illuminate\Http\Request;

class TagnameController extends Controller
{
    
    public function read()
    {
        return view('member.tag.read');
    }
    public function createView()
    {
        return view('member.tag.create');
    }
    public function create(Request $request)
    {
        dd($request);
    }
}

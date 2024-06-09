<?php

namespace App\Http\Controllers;

use App\Models\tag;
use App\Models\tagname;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;

class TagnameController extends Controller
{
    
    public function read()
    {
        if(Auth::user()->role != '1') return redirect('/');
        return view('member.tag.read', [
            'tags' => tagname::all(),
         ]);
    }
    public function createView()
    {
        if(Auth::user()->role != '1') return redirect('/');
        return view('member.tag.create');
    }
    public function create(Request $request)
    {
        if(Auth::user()->role != '1') return redirect('/');
        $validated = $request->validate([
            'name' => 'required|unique:tagnames|max:255',
            'slug' => 'required|unique:tagnames|max:255',
        ]);
        tagname::create($request);
        return redirect(route('member.berita.tag'));
        // return redirect($request->fromPage == route('member.berita.tag') ? route('member.berita.tag') : route('member.berita.tag'));
    }
    public function checkSlug(Request $request){
        if(Auth::user()->role != '1') return redirect('/');
        $slug = SlugService::createSlug(tagname::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
    public function newTag(Request $request){
        if(Auth::user()->role != '1') return redirect('/');
        $request['slug'] = SlugService::createSlug(tagname::class, 'slug', $request->name);
        $result = $request->validate([
            'name' => 'required|unique:categories|max:255',
            'slug'=> 'required|unique:categories|max:255'
        ]);
        $newCategory = tagname::create($result);
        return response()->json(['name' => $newCategory->name, 'slug' => $newCategory->slug, 'id' => $newCategory->id]);
    }
    
    public function addTag(Request $request){
        if(Auth::user()->role != '1') return redirect('/');
        $result = $request->validate([
            'post_id' => 'required',
            'tagname_id'=> 'required'
        ]);
        $result = tag::create($result);
        return response()->json([
            'id' => $result->id, 
            'post_id' => $result->post_id, 
            'tagname_id' => $result->tagname_id,
        ]);
    }
    public function getTag(Request $request){
        if(Auth::user()->role != '1') return redirect('/');
        $tagname = tag::with(['tagname', 'post'])->where('post_id', $request->post_id)->get();
        return response()->json([
            'tags' => $tagname, 
        ]);
    }
    public function deleteTag(Request $request){
        if(Auth::user()->role != '1') return redirect('/');
        $tag = tag::with(['tagname', 'post'])->where('id', $request->id)->first();
        if($tag->post->user_id == Auth::user()->id){
            $tag->delete();
        }
        return response()->json([
            'user' => Auth::user(), 
        ]);
    }
}

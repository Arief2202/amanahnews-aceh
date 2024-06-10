<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Http\Requests\StoreAcaraRequest;
use App\Http\Requests\UpdateAcaraRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\File; 

class AcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function createView()
    {
        if(Auth::user()->role != '1') return redirect('/');
        return view('member.acara.create');
    }
    public function create(Request $request)
    {
        if(Auth::user()->role != '1') return redirect('/');
        $validated = $request->validate([
            'user_id' => 'required',
            'image' => 'required',
            'title' => 'required',
            'slug' => 'required|unique:acaras|max:255',
            'penyelenggara' => 'required',
            'deskripsi' => 'required',
            'start_acara' => 'required',
            'lokasi' => 'required',
            'nama_pj' => 'required',
            'nomor_pj' => 'required',
            'hubungi_kami' => 'required',
            'sosial_media' => 'required',
            'peta' => 'required',
        ]);
        $destinationPath = 'uploads/acara/image';
        $imageName = $request->slug.'.'.$request->image->extension();
        $request->image->move(public_path($destinationPath), $imageName);

        $post = Acara::create([
            'poster' => $imageName,
            'user_id' => $request->user_id,
            'image' => $request->image,
            'title' => $request->title,
            'slug' => $request->slug,
            'penyelenggara' => $request->penyelenggara,
            'deskripsi' => $request->deskripsi,
            'start_daftar' => $request->start_daftar,
            'end_daftar' => $request->end_daftar,
            'start_acara' => $request->start_acara,
            'lokasi' => $request->lokasi,
            'nama_pj' => $request->nama_pj,
            'nomor_pj' => $request->nomor_pj,
            'hubungi_kami' => $request->hubungi_kami,
            'sosial_media' => $request->sosial_media,
            'peta' => $request->peta,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect(route('member.acara'));
    }

    public function read()
    {
        if(Auth::user()->role != '1') return redirect('/');
        return view('member.acara.read', [
            'acaras' => Acara::all(),
        ]);
    }

    public function delete($id)
    {
        if(Auth::user()->role != '1') return redirect('/');
        Acara::where('id', $id)->first()->delete();
        return redirect(route('member.acara'));
    }



    public function acara()
    {
        return view('landing.acara', [
            'acaras' => Acara::all(),
        ]);
    }

    public function acaraDetail($slug)
    {
        $acara = Acara::where('slug', $slug)->first();
        if($acara){
            return view('landing.acara-detail', [
                'acara' => $acara
            ]);
        }
        return redirect('acara');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function acaraget(Request $request)
    {
        $acaras = Acara::where('start_acara', '>=' ,$request->date." 00:00:00")->where('start_acara', '<=' ,$request->date." 23:59:59")->get();
        return response()->json(['acara' => $acaras]);
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Acara::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}

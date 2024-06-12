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
            'start_daftar_date' => 'required',
            'end_daftar_date' => 'required',
            'start_daftar_time' => 'required',
            'end_daftar_time' => 'required',
            'start_acara_date' => 'required',
            'end_acara_date' => 'required',
            'start_acara_time' => 'required',
            'end_acara_time' => 'required',
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
            'start_daftar_date' => $request->start_daftar_date." 00:00:00",
            'end_daftar_date' => $request->end_daftar_date." 00:00:00",
            'start_daftar_time' => date('Y-m-d ').$request->start_daftar_time.':00',
            'end_daftar_time' => date('Y-m-d ').$request->end_daftar_time.':00',
            'start_acara_date' => $request->start_acara_date." 00:00:00",
            'end_acara_date' => $request->end_acara_date." 00:00:00",
            'start_acara_time' => $request->start_acara_date.' '.$request->start_acara_time.':00',
            'end_acara_time' => $request->start_acara_date.' '.$request->end_acara_time.':00',
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
            'acaras' => Acara::paginate(9),
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
        if($request->eventCount){
            $eventCounts = [];
            for($a=0; $a<32; $a++){        
                if($request->date){
                    $acaras1 = Acara::where('start_acara_date', '<=' , $request->date."-".($a+1)." 00:00:00")->where('end_acara_date', '>=' ,$request->date."-".($a+1)." 00:00:00")->get();
                    $acaras2 = Acara::where('start_acara_date', '=' , $request->date."-".($a+1)." 00:00:00")->where('end_acara_date', '=' , null)->get();
                }
                else{
                    $acaras1 = Acara::where('start_acara_date', '<=' , date('Y-m-').($a+1)." 00:00:00")->where('end_acara_date', '>=' ,date('Y-m-').($a+1)." 00:00:00")->get();
                    $acaras2 = Acara::where('start_acara_date', '=' , date('Y-m-').($a+1)." 00:00:00")->where('end_acara_date', '=' , null)->get();
                }
                // dd($acaras1 );
                $acaras = [];
                $arr = 0;
                foreach($acaras1 as $acara1){
                    $acaras[$arr++] = $acara1; 
                }
                foreach($acaras2 as $acara2){
                    $acaras[$arr++] = $acara2; 
                }
                $acaras = collect($acaras);

                $eventCounts[$a] = $acaras->count();
            }
            return response()->json(['date' => $request->date, 'eventCount' => $eventCounts]);
        }
        
        $acaras1 = Acara::where('start_acara_date', '<=' , $request->date." 00:00:00")->where('end_acara_date', '>=' ,$request->date." 00:00:00")->get();
        $acaras2 = Acara::where('start_acara_date', '=' , $request->date." 00:00:00")->where('end_acara_date', '=' , null)->get();
        
        $acaras = [];
        $arr = 0;
        foreach($acaras1 as $acara1){
            $acaras[$arr++] = $acara1; 
        }
        foreach($acaras2 as $acara2){
            $acaras[$arr++] = $acara2; 
        }
        $acaras = collect($acaras);
        // dd($acaras);
        return response()->json(['acara' => $acaras]);
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Acara::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}

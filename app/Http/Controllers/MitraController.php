<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 


class MitraController extends Controller
{
    public function kemitraan()
    {
        return view('landing.kemitraan', [
            'mitras' => Mitra::where('show', '1')->get(),
        ]);
    }

    public function createView()
    {
        if(Auth::user()->role != '1') return redirect('/');
        return view('member.mitra.create');
    }
    public function create(Request $request)
    {
        if(Auth::user()->role != '1') return redirect('/');
        $validated = $request->validate([
            'image' => 'required',
            'title' => 'required',
            'href' => 'required',
        ]);
        
        $post = Mitra::create([
            'image' => '',
            'title' => $request->title,
            'href' => $request->href,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $destinationPath = 'uploads/mitra/image/'.$request->type.'/';
        $imageName = $post->id.'.'.$request->image->extension();
        $request->image->move(public_path($destinationPath), $imageName);
        $post->image = $imageName;
        $post->save();

        return redirect(route('member.mitra'));
    }

    public function read()
    {
        if(Auth::user()->role != '1') return redirect('/');
        return view('member.mitra.read', [
            'mitras' => Mitra::orderBy('id', 'DESC')->get(),
        ]);
    }
    
    public function updateView($id)
    {
        if(Auth::user()->role != '1') return redirect('/');
        return view('member.mitra.update', [
            'mitra' => Mitra::where('id', $id)->first()
        ]);
    }
    public function update(Request $request)
    {
        if(Auth::user()->role != '1') return redirect('/');
        $mitra = Mitra::where('id', $request->id)->first();
        if($mitra){
            if($request->type && $request->type != $mitra->type){
                $request->validate([
                    'image' => 'required',
                ]);
            }
            if($request->image){
                $destinationPath = public_path().'\uploads\mitra\image\\'.$mitra->type;
                $imageName = $destinationPath.'\\'.$mitra->image;
                File::delete($imageName);

                $destinationPath = 'uploads/mitra/image/'.$request->type.'/';
                $imageName = $mitra->id.'.'.$request->image->extension();
                $request->image->move(public_path($destinationPath), $imageName);
                $mitra->image = $imageName;
            }
            $mitra->title = $request->title;
            $mitra->href = $request->href;
            $mitra->updated_at = date('Y-m-d H:i:s');
            $mitra->save();

            return redirect(route('member.mitra'));
        }
        return redirect(route('member.mitra'));
    }


    public function delete($id)
    {
        if(Auth::user()->role != '1') return redirect('/');
        Mitra::where('id', $id)->first()->delete();
        return redirect(route('member.mitra'));
    }



    public function acara()
    {
        
        $mitras1 = Mitra::where('start_acara_date', '<=' , date('Y-m-d')." 00:00:00")->where('end_acara_date', '>=' ,date('Y-m-d')." 00:00:00")->get();
        $mitras2 = Mitra::where('start_acara_date', '=' , date('Y-m-d')." 00:00:00")->where('end_acara_date', '=' , null)->get();
        $mitras = [];
        $arr = 0;
        foreach($mitras1 as $mitra1){
            $mitras[$arr++] = $mitra1; 
        }
        foreach($mitras2 as $mitra2){
            $mitras[$arr++] = $mitra2; 
        }
        $today = collect($mitras);

        return view('landing.acara', [
            'acaras' => Mitra::paginate(9),
            'today' => $today
        ]);
    }

    public function acaraDetail($slug)
    {
        $mitra = Mitra::where('slug', $slug)->first();
        if($mitra){
            return view('landing.acara-detail', [
                'acara' => $mitra
            ]);
        }
        return redirect('acara');
    }

    
    public function publish($id, Request $request){
        if(Auth::user()->role != '1') return redirect('/');
        $post = Mitra::where('id', $id)->first();
        $post->show=1;
        $post->save();
        return redirect(route('member.mitra'));
    }
    public function unpublish($id, Request $request){
        if(Auth::user()->role != '1') return redirect('/');
        $post = Mitra::where('id', $id)->first();
        $post->show=0;
        $post->save();
        return redirect(route('member.mitra'));
    }
    
    public function click(Request $request){
        $mitra = Mitra::where('id', $request->id)->first();
        $mitra->click += 1;
        $mitra->save();
        return redirect($mitra->href);
    }

}

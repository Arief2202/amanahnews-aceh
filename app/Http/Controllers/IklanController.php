<?php

namespace App\Http\Controllers;

use App\Models\Iklan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

class IklanController extends Controller
{
    public function createView()
    {
        if(Auth::user()->role != '1') return redirect('/');
        return view('member.iklan.create');
    }
    public function create(Request $request)
    {
        if(Auth::user()->role != '1') return redirect('/');
        $validated = $request->validate([
            'image' => 'required',
            'title' => 'required',
            'type' => 'required',
            'href' => 'required',
        ]);
        
        $post = Iklan::create([
            'image' => '',
            'title' => $request->title,
            'type' => $request->type,
            'href' => $request->href,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $destinationPath = 'uploads/iklan/image/'.$request->type.'/';
        $imageName = $post->id.'.'.$request->image->extension();
        $request->image->move(public_path($destinationPath), $imageName);
        $post->image = $imageName;
        $post->save();

        return redirect(route('member.iklan'));
    }

    public function read()
    {
        if(Auth::user()->role != '1') return redirect('/');
        return view('member.iklan.read', [
            'iklans' => Iklan::orderBy('id', 'DESC')->get(),
        ]);
    }
    
    public function updateView($id)
    {
        if(Auth::user()->role != '1') return redirect('/');
        return view('member.iklan.update', [
            'iklan' => Iklan::where('id', $id)->first()
        ]);
    }
    public function update(Request $request)
    {
        if(Auth::user()->role != '1') return redirect('/');
        $iklan = Iklan::where('id', $request->id)->first();
        if($iklan){
            if($request->type && $request->type != $iklan->type){
                $request->validate([
                    'image' => 'required',
                    'type' => 'required',
                ]);
            }
            if($request->image){
                $destinationPath = public_path().'\uploads\iklan\image\\'.$iklan->type;
                $imageName = $destinationPath.'\\'.$iklan->image;
                File::delete($imageName);

                $destinationPath = 'uploads/iklan/image/'.$request->type.'/';
                $imageName = $iklan->id.'.'.$request->image->extension();
                $request->image->move(public_path($destinationPath), $imageName);
                $iklan->image = $imageName;
            }
            $iklan->title = $request->title;
            $iklan->type = $request->type;
            $iklan->href = $request->href;
            $iklan->updated_at = date('Y-m-d H:i:s');
            $iklan->save();

            return redirect(route('member.iklan'));
        }
        return redirect(route('member.iklan'));
    }


    public function delete($id)
    {
        if(Auth::user()->role != '1') return redirect('/');
        Iklan::where('id', $id)->first()->delete();
        return redirect(route('member.iklan'));
    }



    public function acara()
    {
        
        $iklans1 = Iklan::where('start_acara_date', '<=' , date('Y-m-d')." 00:00:00")->where('end_acara_date', '>=' ,date('Y-m-d')." 00:00:00")->get();
        $iklans2 = Iklan::where('start_acara_date', '=' , date('Y-m-d')." 00:00:00")->where('end_acara_date', '=' , null)->get();
        $iklans = [];
        $arr = 0;
        foreach($iklans1 as $iklan1){
            $iklans[$arr++] = $iklan1; 
        }
        foreach($iklans2 as $iklan2){
            $iklans[$arr++] = $iklan2; 
        }
        $today = collect($iklans);

        return view('landing.acara', [
            'acaras' => Iklan::paginate(9),
            'today' => $today
        ]);
    }

    public function acaraDetail($slug)
    {
        $iklan = Iklan::where('slug', $slug)->first();
        if($iklan){
            return view('landing.acara-detail', [
                'acara' => $iklan
            ]);
        }
        return redirect('acara');
    }

    
    public function publish($id, Request $request){
        if(Auth::user()->role != '1') return redirect('/');
        $post = Iklan::where('id', $id)->first();
        $post->show=1;
        $post->save();
        return redirect(route('member.iklan'));
    }
    public function unpublish($id, Request $request){
        if(Auth::user()->role != '1') return redirect('/');
        $post = Iklan::where('id', $id)->first();
        $post->show=0;
        $post->save();
        return redirect(route('member.iklan'));
    }
    
    public function click(Request $request){
        $iklan = Iklan::where('id', $request->id)->first();
        $iklan->click += 1;
        $iklan->save();
        return redirect($iklan->href);
    }

}

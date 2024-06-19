<?php

namespace App\Http\Controllers;

use App\Models\ECatalog;
use App\Http\Requests\StoreECatalogRequest;
use App\Http\Requests\UpdateECatalogRequest;
use App\Models\Acara;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\File; 

class ECatalogController extends Controller
{
    public function createView()
    {
        if(Auth::user()->role != '1') return redirect('/');
        return view('member.e-catalog.create');
    }
    public function create(Request $request)
    {
        if(Auth::user()->role != '1') return redirect('/');
        $validated = $request->validate([
            'user_id' => 'required',
            'image' => 'required',
            "title" => "required",
            "slug" => "required",
            "price" => "required",
            "owner" => "required",
            "description" => "required",
            "address" => "required",
            "hubungi" => "required",
            "sosmed" => "required",
        ]);        
        $destinationPath = 'uploads/e-catalog/image';
        $imageName = $request->slug.'.'.$request->image->extension();
        $request->image->move(public_path($destinationPath), $imageName);

        $post = ECatalog::create([
            "user_id" => $request->user_id,
            "photo" => $imageName,
            "title" => $request->title,
            "slug" => $request->slug,
            "price" => $request->price,
            "owner" => $request->owner,
            "description" => $request->description,
            "address" => $request->address,
            "hubungi" => $request->hubungi,
            "sosmed" => $request->sosmed,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect(route('member.e-catalog'));
    }

    public function read()
    {
        if(Auth::user()->role != '1') return redirect('/');
        return view('member.e-catalog.read', [
            'ecatalogs' => ECatalog::all(),
        ]);
    }
    public function updateView($id)
    {
        if(Auth::user()->role != '1') return redirect('/');
        return view('member.e-catalog.update', [
            'ecatalog' => ECatalog::where('id', $id)->first()
        ]);
    }
    public function update(Request $request)
    {
        if(Auth::user()->role != '1') return redirect('/');
        $ecatalog = ECatalog::where('id', $request->id)->first();
        if($ecatalog){

            if($request->slug == $ecatalog->slug){
                $validated = $request->validate([
                    'id' => 'required',
                    'user_id' => 'required',
                    "title" => "required",
                    "price" => "required",
                    "owner" => "required",
                    "description" => "required",
                    "address" => "required",
                    "hubungi" => "required",
                    "sosmed" => "required",
                ]);    
            }
            else {
                $validated = $request->validate([
                    'id' => 'required',
                    'user_id' => 'required',
                    "title" => "required",
                    "slug" => "required|unique:e_catalogs|max:255",
                    "price" => "required",
                    "owner" => "required",
                    "description" => "required",
                    "address" => "required",
                    "hubungi" => "required",
                    "sosmed" => "required",
                ]);        
            }
            
            if($request->image){
                $destinationPath = public_path().'\uploads\e-catalog\image';
                $imageName = $destinationPath.'\\'.$ecatalog->photo;
                File::delete($imageName);

                $destinationPath = 'uploads/e-catalog/image';
                $imageName = $request->slug.'.'.$request->image->extension();
                $request->image->move(public_path($destinationPath), $imageName);
                $ecatalog->photo =  $imageName;
            }

            $ecatalog->title = $request->title;
            $ecatalog->slug = $request->slug;
            $ecatalog->price = $request->price;
            $ecatalog->owner = $request->owner;
            $ecatalog->description = $request->description;
            $ecatalog->address = $request->address;
            $ecatalog->hubungi = $request->hubungi;
            $ecatalog->sosmed = $request->sosmed;
            $ecatalog->updated_at = date('Y-m-d H:i:s');
            $ecatalog->save();

            return redirect(route('member.e-catalog'));
        }
        return redirect(route('member.e-catalog'));
    }

    public function delete($id)
    {
        if(Auth::user()->role != '1') return redirect('/');
        Acara::where('id', $id)->first()->delete();
        return redirect(route('member.acara'));
    }



    public function eCatalog()
    {
        return view('landing.e-catalog', [
            'ecatalogs' => ECatalog::paginate(12),
        ]);
    }
    
    public function eCatalogDetail($slug)
    {
        $ECatalog = ECatalog::where('slug', $slug)->first();
        if($ECatalog){
            return view('landing.e-catalog-detail', [
                'ecatalog' => $ECatalog,
                'ecatalogs' => ECatalog::paginate(12),
            ]);
        }
        return redirect('e-catalog');
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
        $slug = SlugService::createSlug(ECatalog::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function changeBannerView(){
        return view('member.e-catalog.chbanner');
    }
    public function changeBanner(Request $request){
        $destinationPath = 'uploads/e-catalog/';
        $imageName = 'bg.png';
        $request->image->move(public_path($destinationPath), $imageName);
        return redirect(route('member.e-catalog'));
    }
}

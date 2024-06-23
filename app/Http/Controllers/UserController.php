<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function read()
    {
        // if(Auth::user()->role != '2') return redirect('/');
        return view('member.user.read', [
            'users' => User::where('id', '!=', Auth::user()->id)->get(),
        ]);
    }
    public function changeRole(Request $request){
        // if(Auth::user()->role != '2') return redirect('/');
        if(isset($request->id) && isset($request->role)){
            $user = User::where('id', $request->id)->first();
            if($request->role == 0 || $request->role == 1 || $request->role == 2 ) $user->role = $request->role;
            $user->save();
        }
        return redirect(route('member.user'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Lista;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller
{
    public function add(Request $req){
        $req->validate([
            'name'=>'required|string|max:255',
            'description'=>'required|string|max:255',
        ]);
        $user_id = Auth::id();

        Lista::create([
            'name'=>$req->name,
            'description'=>$req->description,
            'user_id'=>$user_id,
        ]);
        return redirect()->back()->with('success','list created!');
    }


    public function show(){
        return view('listForm');
    }

    // public function display_listas(){
    //     $user_id=Auth::id();
    //     $listas=$user->listas()->where("user_id",$user_id)->get();
    //     return view('welcome')->with(['listas'=>$listas]);
    // }
}

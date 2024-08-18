<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function authUser(){
        $user = Auth::user();
        $followingCount = $user->following()->count();
        $followersCount = $user->followers()->count();
        $listasCount = $user->listas()->count();
        
        return view('profile')->with(['user'=>$user,'listas'=>$listasCount,'followingCount'=>$followingCount,'followersCount'=>$followersCount]);
    }

    public function show($id){
        $user = User::findOrFail($id);
        // $isFollowing = auth()->user()->following->contains($user->id);
        $listasCount = $user->listas()->count();
        $followingCount = $user->following()->count();
        $watchedCount=$user->watched()->count();
        $watchlistCount=$user->watchlist()->count();
        $followersCount = $user->followers()->count();
        return view('user')->with(['user'=>$user,'listas'=>$listasCount,'followingCount'=>$followingCount,'followersCount'=>$followersCount,'watchedCount'=>$watchedCount,'watchlistCount'=>$watchlistCount]);
    }
}

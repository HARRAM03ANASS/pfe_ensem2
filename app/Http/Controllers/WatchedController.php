<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchedController extends Controller
{
    public function addToWatched(Request $request, $movieId)
    {
        $user = Auth::user();
        $movie = Movie::find($movieId);
    
        // Add or remove the movie from the watched list
        if ($user->watched()->where('movie_id', $movieId)->exists()) {
            $user->watched()->detach($movieId);
            session()->flash('danger', 'Movie removed from watched list.');
        } else {
            $user->watched()->attach($movieId);
            session()->flash('success', 'Movie added to watched list.');
            // Remove from watchlist if it exists
            if ($user->watchlist->contains($movieId)) {
                $user->watchlist()->detach($movieId);
            }
        }
    
        return redirect()->back();
    }
    

    public function display(){
        $user=Auth::user();
        $watched_movies=$user->watched()->get();
        return view('watched')->with(['watched_movies'=>$watched_movies]);
    }
}

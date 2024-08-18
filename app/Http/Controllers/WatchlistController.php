<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller
{
    public function addToWatchlist(Request $request, $movieId)
    {
        $user = Auth::user(); // Get the authenticated user
        // Find the movie by ID
        $movie = Movie::findOrFail($movieId);

        // Toggle the movie in the user's watchlist
        if ($user->watchlist()->where('movie_id', $movieId)->exists()) {
            // If the movie is already in the watchlist, detach it
            $user->watchlist()->detach($movieId);
            session()->flash('danger', 'Movie removed to watchlist.');
            

        } else {
            // If the movie is not in the watchlist, attach it
            $user->watchlist()->attach($movieId);
            session()->flash('success', 'Movie added to watchlist.');
        }
        return redirect()->back();

    }
    public function display(){
        $user=Auth::user();
        $watchlist_movies=$user->watchlist()->get();
        return view('watchlist')->with(['watchlist_movies'=>$watchlist_movies]);
    }
}

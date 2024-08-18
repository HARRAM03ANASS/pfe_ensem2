<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function getMovies(){
        $movies = Movie::take(30)->get();
        return view('/welcome')->with(['movies'=>$movies]);
    }

    public function showMovie($api_id) {
        // Fetch the movie data based on the api_id
        $movie_data = Movie::where('api_id', $api_id)->first();
    
        // Check if movie_data is null (meaning no movie found)
        if (!$movie_data) {
            // Optionally, handle the case where movie is not found
            // For example, redirect to a 404 page or show an error message
            abort(404); // This will show Laravel's default 404 page
        }
    
        // Pass the movie_data to the view
        return view('moviePage')->with(['movie_data' => $movie_data]);
    }
}

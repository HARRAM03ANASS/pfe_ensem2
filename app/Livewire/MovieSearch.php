<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Movie;

class MovieSearch extends Component
{
    public $searchTerm = '';

    public function render()
    {
        $movies = collect(); // Start with an empty collection

        if (strlen($this->searchTerm) > 2) {
            $movies = Movie::where('title', 'like', '%' . $this->searchTerm . '%')->get();
        }

        return view('livewire.movie-search', [
            'movies' => $movies,
        ]);
    }
}

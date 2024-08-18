<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Lista;
use App\Models\ListMovie;
use Illuminate\Support\Facades\Auth;

class AddMovieToList extends Component
{
    public $movieId;
    public $lists;
    public $showLists = false;

    public function mount($movieId)
    {
        $this->movieId = $movieId;
        $this->lists = Auth::user()->listas;
    }

    public function toggleLists()
    {
        $this->showLists = !$this->showLists;
    }

    public function addToList($listId)
    {
        ListMovie::create([
            'lista_id' => $listId,
            'movie_id' => $this->movieId,
            'user_id' => Auth::id(),
        ]);
        session()->flash('message', 'Movie added to the list successfully.');
    }

    public function render()
    {
        return view('livewire.add-movie-to-list');
    }
}

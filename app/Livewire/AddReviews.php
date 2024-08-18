<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class AddReviews extends Component
{
    public $content;
    public $movie_id;

    protected $rules = [
        'content' => 'required|max:250',
    ];

    public function addReview()
    {
        $this->validate();

        $user = Auth::user();

        // Automatically mark the movie as watched
        if (!$user->watched->contains($this->movie_id)) {
            $user->watched()->attach($this->movie_id);
        }

        // Remove the movie from the watchlist if it is present
        if ($user->watchlist->contains($this->movie_id)) {
            $user->watchlist()->detach($this->movie_id);
        }

        // Create the review
        Review::create([
            'content' => $this->content,
            'movie_id' => $this->movie_id,
            'user_id' => Auth::id(),
        ]);

        $this->reset('content');

        // Emit an event to update the review list
        session()->flash('success', 'Review submitted successfully.');
        return redirect()->to(url()->previous());
    }

    public function render()
    {
        return view('livewire.add-reviews');
    }
}

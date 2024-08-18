<?php

namespace App\Livewire;

use App\Models\Review;
use Livewire\Component;

class DisplayReviews extends Component
{
    public $movie_id;
    public $sortBy = 'newest';

    protected $listeners = ['reviewAdded' => 'render'];

    public function sortByNewest()
    {
        $this->sortBy = 'newest';
    }

    public function sortByMostLiked()
    {
        $this->sortBy = 'most_liked';
    }

    public function render()
    {
        $query = Review::where('movie_id', $this->movie_id)->with('user');

        if ($this->sortBy === 'newest') {
            $query->latest();
        } elseif ($this->sortBy === 'most_liked') {
            $query->withCount('likedByUsers')->orderBy('liked_by_users_count', 'desc');
        }

        $reviews = $query->get();

        return view('livewire.display-reviews', ['reviews' => $reviews]);
    }
}

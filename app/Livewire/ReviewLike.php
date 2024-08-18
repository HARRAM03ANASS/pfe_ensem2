<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewLike extends Component
{
    public $review;
    public $isLiked = false;
    public $likeCount = 0;

    public function mount($reviewId)
    {
        $this->review = Review::findOrFail($reviewId);

        if (Auth::check()) {
            $this->isLiked = Auth::user()->likedReviews->contains($this->review->id);
        }

        $this->likeCount = $this->review->likedByUsers()->count();
    }

    public function toggleLike()
    {
        if (!Auth::check()) {
            // Redirect guest users to the login page
            return redirect()->route('login');
        }

        $user = Auth::user();

        if ($this->isLiked) {
            $user->likedReviews()->detach($this->review->id);
            $this->isLiked = false;
            $this->likeCount--;
        } else {
            $user->likedReviews()->attach($this->review->id);
            $this->isLiked = true;
            $this->likeCount++;
        }
    }

    public function render()
    {
        return view('livewire.review-like');
    }
}

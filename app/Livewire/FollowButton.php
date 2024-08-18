<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class FollowButton extends Component
{
    public User $user;
    public bool $isFollowing;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->isFollowing = auth()->user()->following()->where('user_id', $this->user->id)->exists();
    }

    public function toggleFollow()
    {
        if ($this->isFollowing) {
            $this->unfollow();
        } else {
            $this->follow();
        }

        $this->isFollowing = !$this->isFollowing;
    }

    private function follow()
    {
        if (!auth()->user()->following()->where('user_id', $this->user->id)->exists()) {
            auth()->user()->following()->attach($this->user->id);
            session()->flash('message', 'You are now following ' . $this->user->name);
        } else {
            session()->flash('message', 'You are already following ' . $this->user->name);
        }
    }

    private function unfollow()
    {
        auth()->user()->following()->detach($this->user->id);
        session()->flash('message', 'You have unfollowed ' . $this->user->name);
    }

    public function render()
    {
        return view('livewire.follow-button');
    }
}

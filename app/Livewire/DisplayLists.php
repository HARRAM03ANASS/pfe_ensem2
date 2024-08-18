<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DisplayLists extends Component
{
    public $lists;

    public function mount()
    {
        $this->lists = Auth::user()->listas;
    }

    public function render()
    {
        return view('livewire.display-lists');
    }
}

<?php

namespace App\Http\Livewire\Team;

use Livewire\Component;

class Create extends Component
{
    public $showModal = false;

    public function render()
    {
        return view('livewire.team.create');
    }
}

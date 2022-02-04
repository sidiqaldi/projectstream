<?php

namespace App\Http\Livewire\Project;

use App\Models\Team;
use Livewire\Component;

class Create extends Component
{
    public function render(Team $currentTeam)
    {
        return view('livewire.project.create');
    }
}

<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
use App\Models\Team;
use Livewire\Component;

class Edit extends Component
{
    public $team;

    public $project;

    public function mount(Team $team, Project $project)
    {
        $this->team = $team;

        $this->project = $project;
    }

    public function render()
    {
        return view('livewire.project.edit', [
            'team' => $this->team,
            'project' => $this->project,
        ]);
    }
}

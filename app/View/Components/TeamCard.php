<?php

namespace App\View\Components;

use App\Models\Team;
use Illuminate\View\Component;

class TeamCard extends Component
{
    public function __construct(public Team $team) {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.team-card');
    }
}

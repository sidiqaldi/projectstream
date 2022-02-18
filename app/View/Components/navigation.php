<?php

namespace App\View\Components;

use App\Models\Team;
use Illuminate\View\Component;

class navigation extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $team) {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navigation');
    }
}

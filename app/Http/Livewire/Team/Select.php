<?php

namespace App\Http\Livewire\Team;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Macros\ViewMacros;

class Select extends Component
{
    public function mount() {}

    public function getTeamsProperty()
    {
        return User::find(Auth::id())->teams()
            ->withCount('users')
            ->withCount('projects')
            ->paginate();
    }

    public function render()
    {
        /** @var ViewMacros $view */
        $view = view('livewire.team.select', [
            'teams' => $this->getTeamsProperty()
        ]);
        return $view->layout('layouts.center');
    }
}

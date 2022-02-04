<?php

namespace App\Http\Livewire\Team;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

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
        return view('livewire.team.select', [
                'teams' => $this->getTeamsProperty()
            ])
            ->layout('layouts.center');
    }
}

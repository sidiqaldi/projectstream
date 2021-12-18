<?php

namespace App\Http\Livewire\Team;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $showModal = false;

    public $title = 'Create Team';

    public $customClass = '';

    public $name = '';

    protected $rules = [
        'name' => 'required|unique:teams|min:3|max:100'
    ];

    public function mount(?string $customTitle = null, string $customClass = null)
    {
        $this->title = $customTitle ?? $this->title;
        $this->customClass = $customClass ?? $this->customClass;
    }

    public function create()
    {
        $data = $this->validate();

        $user = User::find(Auth::id());

        $team = $user->teams()->create($data);

        return redirect(route('team.dashboard', [
            'team' => $team->uuid
        ]));
    }

    public function render()
    {
        return view('livewire.team.create');
    }
}

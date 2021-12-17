<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    public $title = 'Logout';

    public function mount(?string $customTitle = null)
    {
        $this->title = $customTitle ?? $this->title;
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.logout');
    }
}

<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email = '';

    public $password = '';

    public $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];

    public function login()
    {
        $credentials = $this->validate();

        return Auth::attempt($credentials)
            ? redirect()->intended(route('home'))
            : $this->addError('email', trans('auth.failed'));
    }

    public function render()
    {
        return view('livewire.auth.login')
            ->layout('layouts.auth');
    }
}

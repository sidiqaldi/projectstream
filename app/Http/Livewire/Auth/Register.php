<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Livewire\Macros\ViewMacros;

class Register extends Component
{
    public $email = '';

    public $password = '';

    public $passwordConfirmation = '';

    private function validationRules()
    {
        return [
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'same:passwordConfirmation',
                Password::min(8)->letters()->numbers(),
            ],
            'passwordConfirmation' => 'required',
        ];
    }

    public function updatedEmail()
    {
        $this->validate(['email' => 'email']);
    }

    public function updatedPassword()
    {
        $this->validate(['password' => Password::min(8)->letters()->numbers()]);
    }

    public function updatedPasswordConfirmation()
    {
        $this->validate(['password' => 'same:passwordConfirmation']);
    }

    public function register()
    {
        $data = $this->validate($this->validationRules());

        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::login($user);

        return redirect(route('home'));
    }

    public function render()
    {
        /** @var ViewMacros $view */
        $view = view('livewire.auth.register');
        return $view->layout('layouts.auth');
    }
}

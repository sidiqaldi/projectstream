<?php

namespace Tests\Feature\Livewire\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_logout()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test('auth.logout')
            ->call('logout')
            ->assertRedirect(route('login'));
    }

    public function test_user_cant_access_auth_middleware_after_logout()
    {
        Route::get('/protected-route')->middleware('auth');

        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test('auth.logout')
            ->call('logout')
            ->assertRedirect(route('login'));

        $this->get('/protected-route')
            ->assertRedirect(route('login'));
    }
}

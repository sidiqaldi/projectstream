<?php

namespace Tests\Feature\Livewire\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_render_login_page()
    {
        $this->get(route('login'))
            ->assertSuccessful()
            ->assertSeeLivewire('auth.login')
            ->assertSee('Haven\'t signed up yet?', false);
    }

    public function test_validate_email_is_required()
    {
        Livewire::test('auth.login')
            ->set('email', '')
            ->set('password', 'somepassword')
            ->runAction('login')
            ->assertHasErrors(['email' => 'required']);
    }

    public function test_validate_email_must_be_valid()
    {
        Livewire::test('auth.login')
            ->set('email', 'invalidemail')
            ->set('password', 'somepassword')
            ->runAction('login')
            ->assertHasErrors(['email' => 'email']);
    }

    public function test_validate_password_is_required()
    {
        Livewire::test('auth.login')
            ->set('email', 'email@example.com')
            ->set('password', '')
            ->runAction('login')
            ->assertHasErrors(['password' => 'required']);
    }

    public function test_user_can_login()
    {
        $user = User::factory()->create();

        Livewire::test('auth.login')
            ->set('email', $user->email)
            ->set('password', 'password')
            ->call('login')
            ->assertHasNoErrors()
            ->assertRedirect(route('home'));

        $this->assertEquals($user->email, auth()->user()->email);
    }

    public function test_user_get_intended_url_after_login()
    {
        Route::get('/intended')->middleware('auth');

        $user = User::factory()->create();

        $this->get('/intended')->assertRedirect('/login');

        Livewire::test('auth.login')
            ->set('email', $user->email)
            ->set('password', 'password')
            ->call('login')
            ->assertRedirect('/intended');
    }

    public function test_user_has_bad_login_password()
    {
        $user = User::factory()->create();

        Livewire::test('auth.login')
            ->set('email', $user->email)
            ->set('password', 'invalid-password')
            ->call('login')
            ->assertHasErrors(['email']);
    }

    public function test_user_access_guest_redirect_to_home()
    {
        Auth::login(User::factory()->create());

        $this->get(route('login'))->assertRedirect(route('home'));

        $this->get(route('register'))->assertRedirect(route('home'));
    }
}

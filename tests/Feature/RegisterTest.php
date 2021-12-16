<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    const ValidEmail = 'valid@example.com';
    const ValidPassword = 'supersafe2020';

    public function test_can_render_registeration_page()
    {
        $response = $this->get(route('register'));

        $response->assertStatus(200);

        $response->assertSee('Already Have An Account?');
    }

    public function test_typing_email_is_valid_email()
    {
        Livewire::test('auth.register')
            ->set('email', 'itsnotemail')
            ->assertHasErrors(['email' => 'email'])
            ->set('email', self::ValidEmail)
            ->assertHasNoErrors();
    }

    public function test_typing_password_is_valid_password()
    {
        Livewire::test('auth.register')
            ->set('password', 'lesdgt')
            ->assertHasErrors(['password'])
            ->set('password', 'itssworsasasas')
            ->assertHasErrors(['password'])
            ->set('password', self::ValidPassword)
            ->assertHasNoErrors();
    }

    public function test_typing_password_confirmed_must_same_with_password()
    {
        Livewire::test('auth.register')
            ->set('password', 'itspassword')
            ->set('passwordConfirmation', 'itsdifferentpassword')
            ->assertHasErrors(['password' => 'same'])
            ->set('password', self::ValidPassword)
            ->set('passwordConfirmation', self::ValidPassword)
            ->assertHasNoErrors();
    }

    public function test_validation_email_is_required()
    {
        Livewire::test('auth.register')
            ->set('email', '')
            ->set('password', self::ValidPassword)
            ->set('passwordConfirmation', self::ValidPassword)
            ->call('register')
            ->assertHasErrors(['email' => 'required']);
    }

    public function test_validation_email_must_be_valid()
    {
        Livewire::test('auth.register')
            ->set('email', 'invalidemail')
            ->set('password', self::ValidPassword)
            ->set('passwordConfirmation', self::ValidPassword)
            ->call('register')
            ->assertHasErrors(['email' => 'email']);
    }

    public function test_validation_email_must_be_unique()
    {
        $user = User::factory()->create();

        Livewire::test('auth.register')
            ->set('email', $user->email)
            ->set('password', self::ValidPassword)
            ->set('passwordConfirmation', self::ValidPassword)
            ->call('register')
            ->assertHasErrors(['email' => 'unique']);
    }

    public function test_validation_password_is_required()
    {
        Livewire::test('auth.register')
            ->set('email', self::ValidEmail)
            ->set('password', '')
            ->set('passwordConfirmation', '')
            ->call('register')
            ->assertHasErrors(['password' => 'required']);
    }

    public function test_validation_password_must_be_valid()
    {
        Livewire::test('auth.register')
            ->set('email', self::ValidEmail)
            ->set('password', 'password')
            ->set('passwordConfirmation', 'password')
            ->call('register')
            ->assertHasErrors(['password']);
    }

    public function test_validation_password_must_be_confirmed()
    {
        Livewire::test('auth.register')
            ->set('email', self::ValidEmail)
            ->set('password', self::ValidPassword)
            ->set('passwordConfirmation', self::ValidPassword.'add')
            ->call('register')
            ->assertHasErrors(['password' => 'same']);
    }

    public function test_user_can_register_then_authorized()
    {
        Livewire::test('auth.register')
            ->set('email', self::ValidEmail)
            ->set('password', self::ValidPassword)
            ->set('passwordConfirmation', self::ValidPassword)
            ->call('register')
            ->assertHasNoErrors()
            ->assertRedirect(route('home'));

        $this->assertTrue(User::whereEmail(self::ValidEmail)->exists());

        $this->assertEquals(self::ValidEmail, auth()->user()->email);
    }
}

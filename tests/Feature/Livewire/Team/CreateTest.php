<?php

namespace Tests\Feature\Livewire\Team;

use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_team()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test('team.create')
            ->set('name', 'Unique company name')
            ->call('create');

        $this->assertTrue($user->teams()->exists());
    }

    public function test_user_redirect_to_dashboard_after_create_team()
    {
        $user = User::factory()->create();

        $teamName = 'Unique team name';

        Livewire::actingAs($user)
            ->test('team.create')
            ->set('name', $teamName)
            ->call('create')
            ->assertRedirect(route('team.dashboard', [
                'team' => Team::where('name', $teamName)->first()->uuid
            ]));
    }
}

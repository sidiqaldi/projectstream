<?php

namespace Tests\Feature\Livewire\Team;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Livewire\Livewire;
use Tests\TestCase;

class SelectTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_render_list_team_page()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test('team.select')
            ->assertStatus(Response::HTTP_OK);
    }

    public function test_display_ten_teams()
    {
        $user = User::factory()->hasTeams(10)->create();

        $team = $user->teams->first();

        Livewire::actingAs($user)
            ->test('team.select')
            ->assertSee($team->name);
    }

    public function test_notification_no_team()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test('team.select')
            ->assertSee('You don\'t have a team yet...', false);
    }

    public function test_prevent_user_access_others_team()
    {
        $userA = User::factory()->hasTeams(2)->create();
        $userB = User::factory()->hasTeams(2)->create();

        $teamA = $userA->teams->first();
        $teamB = $userB->teams->first();

        $this->actingAs($userA)
            ->get(route('team.dashboard', ['currentTeam' => $teamA->uuid]))
            ->assertOk();

        $this->actingAs($userA)
            ->get(route('team.dashboard',  ['currentTeam' => $teamB->uuid]))
            ->assertNotFound();
    }
}

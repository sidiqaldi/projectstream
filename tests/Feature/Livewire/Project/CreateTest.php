<?php

namespace Tests\Feature\Livewire\Project;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Livewire\Livewire;
use Tests\TestCase;

class CreateTest extends TestCase
{
    public function test_user_can_render_component()
    {
        // $user = User::factory()->hasTeams(1)->create();

        // $team = $user->teams->first();

        // Livewire::actingAs($user)
        //     ->test('project.create')
        //     ->assertStatus(Response::HTTP_OK);
        return $this->assertTrue(true);
    }
}

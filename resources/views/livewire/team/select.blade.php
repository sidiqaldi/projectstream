<div>
    <div class="w-full text-2xl text-center mb-2">Select a team's workspace</div>

    <div class="w-full text-center mb-5"><span>or</span> Create the new one?</div>

    @forelse ($teams as $team)
        <x-team-card :team="$team"></x-team-card>
    @empty
        <div class="w-full text-lg text-center mb-2">You don't have a team yet...</div>
    @endforelse

    <div class="w-full text-lg text-center my-10"><livewire:auth.logout :custom-title="'Logout ' . auth()->user()->email" /></div>

    <livewire:team.create></livewire:team.create>
</div>

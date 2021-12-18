<div class="py-10">
    <div class="w-full text-2xl text-center mb-2">Select a team's workspace</div>

    <div class="w-full text-center mb-5"><span>or</span> <livewire:team.create title="Create the new one?" customClass="inline"></livewire:team.create></div>

    @forelse ($teams as $team)
        <x-team-card :team="$team"></x-team-card>
    @empty
        <div class="w-full text-lg text-center my-10 py-10">You don't have a team yet...</div>
    @endforelse

    <div class="w-full text-lg text-center my-10"><livewire:auth.logout :custom-title="'Logout ' . auth()->user()->email" /></div>
</div>

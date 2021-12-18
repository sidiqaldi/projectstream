<a href="{{ route('team.dashboard', ['team' => $team->uuid]) }}" class="bg-gray-100 border-indigo-400 dark:bg-gray-800 bg-opacity-95 border-opacity-60 | p-4 border-solid rounded-3xl border-2 | flex justify-around cursor-pointer | hover:bg-indigo-400 dark:hover:bg-indigo-600 hover:border-transparent | transition-colors duration-500">
    <div class="flex flex-col justify-center">
        <p class="text-gray-900 text-2xl dark:text-gray-300 font-semibold">{{ $team->name }}</p>
        <p class="text-black text-center text-sm dark:text-gray-100">{{ $team->users_count . ' ' . \Str::plural('member', $team->users_count) }}</p>
    </div>
</a>

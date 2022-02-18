<x-layouts.base>
    <div class="md:flex flex-col md:flex-row md:min-h-screen w-full">
        <x-navigation :team="$team"></x-navigation>
        <div class="w-full">
            {{ $slot }}
        </div>
    </div>
</x-layouts.base>


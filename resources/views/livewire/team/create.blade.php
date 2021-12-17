<div>
    <button wire:click="$toggle('showModal')">Create</button>

    @if($showModal)
    <form wire:submit.prevent="save">
        <div wire:model.defer="showModal" class="fixed h-full top-0 inset-x-0 px-4 pt-6 z-50 sm:px-0 sm:flex sm:items-top sm:justify-center bg-gray-500 bg-opacity-50">
            <div class="flex-col transition ease-in-out delay-150 w-full md:w-1/3 p-2">
                <div class="flex flex-row justify-between p-6 bg-white border-b border-gray-200 rounded-tl-lg rounded-tr-lg">
                    <p class="font-semibold text-gray-800">Create New Team</p>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
                <div class="flex flex-col px-6 py-5 bg-gray-50">
                    <label class="mb-2 font-semibold text-gray-700">Team name</label>
                    <input class="flex w-full px-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" name="name"/>
                </div>
                <hr />

                <div class="flex flex-row items-center justify-between p-5 bg-white border-t border-gray-200 rounded-bl-lg rounded-br-lg">
                    <p class="font-semibold text-gray-600">Cancel</p>
                    <button class="px-4 py-2 text-white font-semibold bg-blue-500 rounded">
                        Create
                    </button>
                </div>
            </div>
        </div>
    </form>
    @endif
</div>
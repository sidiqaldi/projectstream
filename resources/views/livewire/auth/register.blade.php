<div class="w-full py-5 px-5 md:px-5">
    <form wire:submit.prevent="register">
        <div class="text-center mb-10">
            <p>Enter your information to register</p>
        </div>
        <div>
            <div class="flex">
                <div class="w-full mb-5">
                    <label for="email" class="flex font-semibold px-1 mb-2">Email</label>
                    <input wire:model.debounce.1000ms="email"
                        id="email"
                        type="email"
                        class="@error('email') border-red-600 @enderror flex w-full px-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                        placeholder="johnsmith@example.com">
                    @error('email') <div class="m-2 text-red-600">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="flex">
                <div class="w-full mb-5">
                    <label for="password" class="flex font-semibold px-1 mb-2">Password</label>
                    <input
                        wire:model.debounce.1000ms="password"
                        id="password"
                        name="password"
                        type="password"
                        class="@error('password') border-red-600 @enderror flex w-full px-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="************">
                    @error('password') <div class="m-2 text-red-600">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="flex">
                <div class="w-full mb-12">
                    <label for="passwordConfirmation" class="flex font-semibold px-1 mb-2">Confirm Password</label>
                    <input
                        wire:model.debounce.1500ms="passwordConfirmation"
                        id="passwordConfirmation"
                        name="password_confirmation"
                        type="password"
                        class="@error('passwordConfirmation') border-red-600 @enderror flex w-full px-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="************">
                    @error('passwordConfirmation') <div class="m-2 text-red-600">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="flex">
                <div class="w-full mb-5">
                    <button type="submit" class="block w-full bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg py-3 font-semibold">REGISTER NOW</button>
                </div>
            </div>
            <div class="flex">
                <div class="w-full mb-5 text-center">
                    <a href="{{ route('login') }}" alt="registeration">Already Have An Account?</a>
                </div>
            </div>
        </div>
    </form>
</div>

<div>
    <div class="mt-10 p-5 mx-auto sm:w-full sm:max-w-sm shadow border-teal-500 border-t-2">
        <div class="flex">
            <div class="text-center font-semibold text-2x text-gray-800 mb-5">
                Create New Account
            </div>
        </div>

        @if (session('success'))
            <span class="text-green-500">{{ session('success') }}</span>
        @endif

        <form wire:submit="store">
            <div>
                <label for="name" class="mt-4 block text-sm font-medium leading-6 text-gray-900">
                    Name
                </label>

                <input type="text" wire:model="form.name" id="name" placeholder="name..."
                    class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full p-2.5">

                @error('form.name')
                    <div class="text-red-500 text-xs">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="email" class="mt-4 block text-sm font-medium leading-6 text-gray-900">
                    Email
                </label>

                <input type="email" wire:model="form.email" id="email" placeholder="email..."
                    class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full p-2.5">

                @error('form.email')
                    <div class="text-red-500 text-xs">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="password" class="mt-4 block text-sm font-medium leading-6 text-gray-900">
                    Password
                </label>

                <input type="password" wire:model="form.password" id="password" placeholder="password..."
                    class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full p-2.5">

                @error('form.password')
                    <div class="text-red-500 text-xs">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="image" class="mt-4 block text-sm font-medium leading-6 text-gray-900">
                    Profile Picture
                </label>

                <input type="file" wire:model="form.image" id="image" accept="image/png, image/jpg" placeholder="image..."
                    class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full p-2.5">

                @error('form.image')
                    <div class="text-red-500 text-xs">{{ $message }}</div>
                @enderror

                @if ($this->form->image)
                    <img src="{{ $this->form->image->temporaryUrl() }}" class="rounded w-10 mt-3 block" alt="">
                @endif

                <div wire:loading wire:target="image">
                    <span class="text-green-500">Uploading...</span>
                </div>
            </div>

            <button type="submit" class="block mt-3 px-4 py-2 bg-teal-500 text-white font-semibold rounded hover:bg-teal-600">Submit +</button>
        </form>
    </div>
</div>

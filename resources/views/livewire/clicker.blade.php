<div>
    @if (session('success'))
        <span class="px-3 py-3 bg-green-600 text-white rounded">{{ session('success') }}</span>
    @endif

    <form wire:submit="createUser" method="post" class="p-5">
        <input type="text" wire:model="name" class="block rounded border border-gray-100 px-3 mb-1 mt-2" placeholder="name">
        @error('name')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror

        <input type="email" wire:model="email" class="block rounded border border-gray-100 px-3 mb-1 mt-2" placeholder="email">
        @error('email')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror

        <input type="password" wire:model="password" class="block rounded border border-gray-100 px-3 mb-1 mt-2" placeholder="password">
        @error('password')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror

        <button type="submit" class="block rounded px-3 py-1 bg-gray-400 text-white">Create</button>
    </form>

    <hr>

    <table border="1" class="table">
        <tr>
            <td>No</td>
            <td>Username</td>
            <td>Email</td>
            <td>Password</td>
        </tr>

        @foreach ($users as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>Secret Password</td>
            </tr>
        @endforeach
    </table>

    {{ $users->links() }}
</div>

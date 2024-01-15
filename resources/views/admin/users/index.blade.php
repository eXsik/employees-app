<x-admin-layout>
    <div class="flex justify-between">
        <h1 class="text-3xl font-medium p-4">Users</h1>
        <div class="p-4">
            <Link href="{{ route('admin.users.create') }}"
                class="flex items-center justify-center shadow-md py-1.5 px-2.5 rounded-md text-white bg-blue-500 hover:bg-blue-600 tranition font-semibold">
            <svg data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-5 h-5 mr-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
            </svg>
            <span>Add User</span>
            </Link>
        </div>
    </div>
    <x-splade-table :for="$users">
        @cell('action', $user)
            <Link href="{{ route('admin.users.edit', $user) }}"
                class="py-1.5 px-2.5 rounded-md text-blue-500 hover:text-blue-600 tranition font-semibold">
            Edit
            </Link>
        @endcell
    </x-splade-table>
</x-admin-layout>

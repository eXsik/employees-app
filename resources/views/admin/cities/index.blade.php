<x-admin-layout>
    <div class="flex justify-between">
        <h1 class="text-3xl font-medium p-4">Cities</h1>
        <div class="py-4">
            <Link href="{{ route('admin.cities.create') }}"
                class="flex items-center justify-center shadow-md py-1.5 px-2.5 rounded-md text-white bg-blue-500 hover:bg-blue-600 tranition font-semibold">
            <svg data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-5 h-5 mr-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
            </svg>
            <span>Add City</span>
            </Link>
        </div>
    </div>
    <x-splade-table :for="$cities">
        @cell('action', $city)
            <div class="space-x-1">
                <Link href="{{ route('admin.cities.edit', $city) }}"
                    class="py-1.5 px-2.5 rounded-md text-blue-500 hover:text-blue-600 tranition font-semibold">
                Edit
                </Link>
                <Link href="{{ route('admin.cities.destroy', $city) }}" method="DELETE"
                    confirm="Are you sure you want to delete this city?" confirm-button="Yes" cancel-button="No"
                    confirm-danger
                    class="py-1.5 px-2.5 pr-0 rounded-md text-red-500 hover:text-red-600 tranition font-semibold">
                Delete
                </Link>
            </div>
        @endcell
    </x-splade-table>
</x-admin-layout>

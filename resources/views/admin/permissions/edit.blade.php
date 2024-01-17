<x-admin-layout>
    <h1 class="text-3xl font-medium py-4">Edit Permission {{ $permission->id }}</h1>
    <x-splade-form :action="route('admin.permissions.update', $permission)" method="PUT" class="grid grid-cols-1 gap-4 p-4 bg-white rounded-md"
        :default="$permission">
        <x-splade-input name="name" label="Name" />

        <x-splade-submit class="mt-2 bg-blue-400 hover:bg-blue-500 transition text-white" label="Update" />
    </x-splade-form>
</x-admin-layout>

<x-admin-layout>
    <h1 class="text-3xl font-medium py-4">Edit Role {{ $role->id }}</h1>
    <x-splade-form :action="route('admin.roles.update', $role)" method="PUT" class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4 bg-white rounded-md"
        :default="$role">
        <x-splade-input name="name" label="Name" />
        <x-splade-select name="permissions[]" label="Permissions" :options="$permissions" multiple relation choices />

        <x-splade-submit class="mt-2 bg-blue-400 hover:bg-blue-500 transition text-white" label="Update" />
    </x-splade-form>
</x-admin-layout>

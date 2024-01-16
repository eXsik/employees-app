<x-admin-layout>
    <h1 class="text-3xl font-medium py-4">New Department</h1>
    <x-splade-form :action="route('admin.departments.store')" method="POST" class="grid grid-cols-1 gap-4 p-4 bg-white rounded-md">
        <x-splade-input name="name" label="Name" />

        <x-splade-submit class="mt-2 bg-blue-400 hover:bg-blue-500 transition text-white" label="Create" />
    </x-splade-form>
</x-admin-layout>

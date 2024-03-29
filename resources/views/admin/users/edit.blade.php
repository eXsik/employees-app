<x-admin-layout>
    <h1 class="text-3xl font-medium py-4">Edit User {{ $user->id }}</h1>
    <x-splade-form :action="route('admin.users.update', $user)" method="PUT" class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4 bg-white rounded-md"
        :default="$user">
        <x-splade-input name="username" label="Username" />
        <x-splade-input name="first_name" label="First name" />
        <x-splade-input name="last_name" label="Last name" />
        <x-splade-input name="email" label="Email address" />
        <x-splade-select name="roles[]" label="Roles" :options="$roles" multiple relation choices />
        <x-splade-select name="permissions[]" label="Permissions" :options="$permissions" multiple relation choices />

        <x-splade-submit class="mt-2 bg-blue-400 hover:bg-blue-500 transition text-white" label="Update" />
    </x-splade-form>
</x-admin-layout>

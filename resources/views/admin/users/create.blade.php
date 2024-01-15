<x-admin-layout>
    <h1 class="text-3xl font-medium py-4">New User</h1>
    <x-splade-form :action="route('admin.users.store')" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4 bg-white rounded-md">
        <x-splade-input name="username" label="Username" />
        <x-splade-input name="first_name" label="First name" />
        <x-splade-input name="last_name" label="Last name" />
        <x-splade-input name="email" label="Email address" />
        <x-splade-input type="password" name="password" label="Password" />
        <x-splade-input type="password" name="password_confirmation" label="Confirm password" />

        <x-splade-submit class="mt-2 bg-blue-400 hover:bg-blue-500 transition text-white" label="Create" />
    </x-splade-form>
</x-admin-layout>

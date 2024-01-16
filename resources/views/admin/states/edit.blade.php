<x-admin-layout>
    <h1 class="text-3xl font-medium py-4">Edit State {{ $state->id }}</h1>
    <x-splade-form :action="route('admin.states.update', $state)" method="PUT" class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4 bg-white rounded-md"
        :default="$state">
        <x-splade-input name="name" label="Name" />
        <x-splade-select name="country_id" label="Country" :options="$countries"></x-splade-select>

        <x-splade-submit class="mt-2 bg-blue-400 hover:bg-blue-500 transition text-white" label="Update" />
    </x-splade-form>
</x-admin-layout>
{{-- {{ dd($state) }} --}}
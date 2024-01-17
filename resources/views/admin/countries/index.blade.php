<x-admin-layout>
    <div class="flex justify-between">
        <h1 class="text-3xl font-medium py-4">Countries</h1>
    </div>
    <x-splade-table :for="$countries">
    </x-splade-table>
</x-admin-layout>

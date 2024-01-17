<x-admin-layout>
    <h1 class="text-3xl font-medium py-4">New Employee</h1>
    <x-splade-form :action="route('admin.employees.store')" method="POST" class=" p-4 bg-white rounded-md">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <x-splade-input name="first_name" label="First name" />
            <x-splade-input name="last_name" label="Last name" />
            <x-splade-input name="middle_name" label="Middle name" />
            <x-splade-input name="zip_code" label="Zip Code" />
            <x-splade-input name="address" label="Address" />
            <x-splade-select name="department_id" label="Department" :options="$departments" />
            <x-splade-select name="city_id" label="City" :options="$cities" />
            <x-splade-input name="birth_date" label="Birth date" date />
            <x-splade-input name="date_hired" label="Date hired" date />
        </div>
        <x-splade-submit class="mt-2 bg-blue-400 hover:bg-blue-500 transition text-white" label="Create" />
    </x-splade-form>
</x-admin-layout>

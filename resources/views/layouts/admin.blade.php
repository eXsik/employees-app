<div class="min-h-screen bg-gray-100">
    @include('layouts.admin-navigation')

    <div class="flex space-x-4">
        <Sidebar />

        <!-- Page Content -->
        <main class="flex-1">
            <div class="max-w-full p-4 mx-auto">
                {{ $slot }}
            </div>
        </main>
    </div>
</div>

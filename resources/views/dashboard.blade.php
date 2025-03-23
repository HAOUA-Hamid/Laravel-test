<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
        <h1 class="text-3xl font-bold text-primary mb-6">Welcome to Your Dashboard</h1>


        <div class="mb-6">
            <a href="{{ route('properties') }}" class="text-secondary hover:underline text-lg">View Available Properties</a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-4">Make a Booking</h2>
            <livewire:booking-manager />
        </div>
    </div>
</x-app-layout>
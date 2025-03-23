<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4 text-primary">Available Properties</h1>
        @if ($properties->isEmpty())
            <p class="text-gray-500">No properties available at the moment.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach ($properties as $property)
                    <x-property-card :name="$property->name" :description="$property->description" :price="$property->price_per_night" />
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
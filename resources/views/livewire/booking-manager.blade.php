<div>
    <select wire:model="property_id" class="border p-2">
        @foreach($properties as $property)
            <option value="{{ $property->id }}">{{ $property->name }}</option>
        @endforeach
    </select>
    <input type="date" wire:model="start_date" class="border p-2">
    <input type="date" wire:model="end_date" class="border p-2">
    <button wire:click="saveBooking" class="bg-primary text-white p-2">Book</button>
    @if (session('message'))
        <p class="text-green-500">{{ session('message') }}</p>
    @endif
</div>
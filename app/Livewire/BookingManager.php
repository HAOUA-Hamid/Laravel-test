<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Property;
use App\Models\Booking;

class BookingManager extends Component
{
    public $property_id, $start_date, $end_date;

    public function saveBooking()
    {
        $this->validate([
            'property_id' => 'required|exists:properties,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        Booking::create([
            'user_id' => auth()->id(),
            'property_id' => $this->property_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);

        session()->flash('message', 'Booking saved!');
        $this->reset(['property_id', 'start_date', 'end_date']);
    }

    public function render()
    {
        return view('livewire.booking-manager', [
            'properties' => Property::all(),
        ]);
    }
}

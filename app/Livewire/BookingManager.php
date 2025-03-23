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
        Booking::create([
            'user_id' => auth()->id(),
            'property_id' => $this->property_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);
        session()->flash('message', 'Booking saved!');
    }
    
    public function render()
    {
        return view('livewire.booking-manager', [
            'properties' => Property::all(),
        ]);
    }
}

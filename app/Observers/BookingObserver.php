<?php

namespace App\Observers;

use App\Models\Booking;

class BookingObserver
{
    public function created(Booking $booking)
    {
        activity()
            ->performedOn($booking)
            ->causedBy(auth()->user())
            ->withProperties($booking->toArray())
            ->log('Reserva criada');
    }
}

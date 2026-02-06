<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_reference',
        'passenger_id',
        'flight_id',
        'seat_number',
        'total_amount',
        'payment_status',
        'booking_status',
        'booking_date',
        'special_requests',
    ];

    protected $casts = [
        'booking_date' => 'timestamp',
    ];

    // Define relationships
    public function passenger()
    {
        return $this->belongsTo(Passenger::class);
    }

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}

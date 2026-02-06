<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_number',
        'booking_id',
        'passenger_id',
        'flight_id',
        'seat_class',
        'seat_number',
        'price',
        'status',
        'issue_date',
        'valid_until',
    ];

    protected $casts = [
        'issue_date' => 'timestamp',
        'valid_until' => 'timestamp',
    ];

    // Define relationships
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function passenger()
    {
        return $this->belongsTo(Passenger::class);
    }

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Airport extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'city',
        'country',
        'latitude',
        'longitude',
    ];

    // Define relationships
    public function departingFlights()
    {
        return $this->hasMany(Flight::class, 'departure_airport_id');
    }

    public function arrivingFlights()
    {
        return $this->hasMany(Flight::class, 'arrival_airport_id');
    }
}

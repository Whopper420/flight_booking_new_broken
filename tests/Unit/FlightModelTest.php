<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Flight;

class FlightModelTest extends TestCase
{
    /** @test */
    public function it_has_fillable_attributes()
    {
        $fillable = (new Flight())->getFillable();
        
        $expected = [
            'flight_number',
            'departure_airport_id',
            'arrival_airport_id',
            'departure_time',
            'arrival_time',
            'duration_minutes',
            'price',
            'airline',
            'total_seats',
            'available_seats',
            'status',
        ];
        
        $this->assertEquals($expected, $fillable);
    }

    /** @test */
    public function it_has_correct_table_name()
    {
        $flight = new Flight();
        $this->assertEquals('flights', $flight->getTable());
    }
}
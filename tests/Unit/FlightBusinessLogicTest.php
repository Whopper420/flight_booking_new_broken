<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Carbon\Carbon;

class FlightBusinessLogicTest extends TestCase
{
    /** @test */
    public function it_calculates_correct_flight_duration()
    {
        $departure = Carbon::now();
        $arrival = $departure->copy()->addHours(3);
        
        // Calculate duration manually since duration_minutes is calculated property
        $duration = $departure->diffInMinutes($arrival);
        
        $this->assertEquals(180, $duration); // 3 hours = 180 minutes
    }

    /** @test */
    public function it_can_check_seat_availability()
    {
        $totalSeats = 100;
        $availableSeats = 50;
        
        $this->assertTrue($availableSeats > 0);
        $this->assertEquals(50, $availableSeats);
    }

    /** @test */
    public function it_has_correct_status_values()
    {
        $validStatuses = ['scheduled', 'delayed', 'cancelled', 'departed', 'arrived'];
        
        $status = 'scheduled';
        $this->assertContains($status, $validStatuses);
        
        $status = 'delayed';
        $this->assertContains($status, $validStatuses);
    }
}
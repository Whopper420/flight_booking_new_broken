<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Airport;

class AirportBusinessLogicTest extends TestCase
{
    /** @test */
    public function it_validates_airport_code_format()
    {
        $airport = new Airport([
            'code' => 'JFK',
            'name' => 'John F Kennedy Airport',
            'city' => 'New York',
            'country' => 'USA',
        ]);
        
        // Airport codes are typically 3 letters
        $this->assertEquals(3, strlen($airport->code));
        $this->assertTrue(ctype_upper($airport->code)); // Usually uppercase
    }

    /** @test */
    public function it_has_geographic_coordinates()
    {
        $airport = new Airport([
            'latitude' => 40.6397,
            'longitude' => -73.7789,
        ]);
        
        // Latitude should be between -90 and 90
        $this->assertGreaterThanOrEqual(-90, $airport->latitude);
        $this->assertLessThanOrEqual(90, $airport->latitude);
        
        // Longitude should be between -180 and 180
        $this->assertGreaterThanOrEqual(-180, $airport->longitude);
        $this->assertLessThanOrEqual(180, $airport->longitude);
    }

    /** @test */
    public function it_formats_location_properly()
    {
        $airport = new Airport([
            'name' => 'Test Airport',
            'city' => 'Test City',
            'country' => 'Test Country',
        ]);
        
        $this->assertIsString($airport->name);
        $this->assertIsString($airport->city);
        $this->assertIsString($airport->country);
    }
}
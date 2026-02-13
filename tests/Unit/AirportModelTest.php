<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Airport;

class AirportModelTest extends TestCase
{
    /** @test */
    public function it_has_fillable_attributes()
    {
        $fillable = (new Airport())->getFillable();
        
        $expected = [
            'code',
            'name',
            'city',
            'country',
            'latitude',
            'longitude'
        ];
        
        $this->assertEquals($expected, $fillable);
    }

    /** @test */
    public function it_has_correct_table_name()
    {
        $airport = new Airport();
        $this->assertEquals('airports', $airport->getTable());
    }
}
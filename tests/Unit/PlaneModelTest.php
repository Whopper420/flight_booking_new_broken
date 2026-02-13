<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Plane;

class PlaneModelTest extends TestCase
{
    /** @test */
    public function it_has_fillable_attributes()
    {
        $fillable = (new Plane())->getFillable();
        
        $expected = [
            'name',
            'model',
            'manufacturer',
            'registration_number',
            'total_seats',
            'economy_seats',
            'business_seats',
            'first_class_seats',
            'year_of_manufacture',
            'status',
        ];
        
        $this->assertEquals($expected, $fillable);
    }

    /** @test */
    public function it_has_correct_table_name()
    {
        $plane = new Plane();
        $this->assertEquals('planes', $plane->getTable());
    }
}
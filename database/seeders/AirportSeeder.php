<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Airport;

class AirportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $airports = [
            [
                'code' => 'JFK',
                'name' => 'John F. Kennedy International Airport',
                'city' => 'New York',
                'country' => 'United States',
                'latitude' => 40.6413,
                'longitude' => -73.7781,
            ],
            [
                'code' => 'LHR',
                'name' => 'London Heathrow Airport',
                'city' => 'London',
                'country' => 'United Kingdom',
                'latitude' => 51.4700,
                'longitude' => -0.4543,
            ],
            [
                'code' => 'CDG',
                'name' => 'Charles de Gaulle Airport',
                'city' => 'Paris',
                'country' => 'France',
                'latitude' => 49.0097,
                'longitude' => 2.5478,
            ],
            [
                'code' => 'HND',
                'name' => 'Haneda Airport',
                'city' => 'Tokyo',
                'country' => 'Japan',
                'latitude' => 35.5494,
                'longitude' => 139.7798,
            ],
            [
                'code' => 'DXB',
                'name' => 'Dubai International Airport',
                'city' => 'Dubai',
                'country' => 'United Arab Emirates',
                'latitude' => 25.2532,
                'longitude' => 55.3657,
            ],
            [
                'code' => 'SIN',
                'name' => 'Changi Airport',
                'city' => 'Singapore',
                'country' => 'Singapore',
                'latitude' => 1.3592,
                'longitude' => 103.9893,
            ],
            [
                'code' => 'SYD',
                'name' => 'Sydney Airport',
                'city' => 'Sydney',
                'country' => 'Australia',
                'latitude' => -33.9399,
                'longitude' => 151.1753,
            ],
            [
                'code' => 'FRA',
                'name' => 'Frankfurt Airport',
                'city' => 'Frankfurt',
                'country' => 'Germany',
                'latitude' => 50.0379,
                'longitude' => 8.5622,
            ],
            [
                'code' => 'AMS',
                'name' => 'Amsterdam Schiphol Airport',
                'city' => 'Amsterdam',
                'country' => 'Netherlands',
                'latitude' => 52.3086,
                'longitude' => 4.7639,
            ],
            [
                'code' => 'PEK',
                'name' => 'Beijing Capital International Airport',
                'city' => 'Beijing',
                'country' => 'China',
                'latitude' => 40.0725,
                'longitude' => 116.5972,
            ],
        ];

        foreach ($airports as $airport) {
            Airport::create($airport);
        }
    }
}

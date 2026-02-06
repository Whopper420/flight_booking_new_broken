<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Flight;
use Carbon\Carbon;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $flights = [
            [
                'flight_number' => 'AA101',
                'departure_airport_id' => 1, // JFK
                'arrival_airport_id' => 2,   // LHR
                'departure_time' => Carbon::now()->addDays(5)->setTime(10, 30),
                'arrival_time' => Carbon::now()->addDays(5)->setTime(22, 45),
                'duration_minutes' => 435,
                'price' => 650.00,
                'airline' => 'American Airlines',
                'total_seats' => 200,
                'available_seats' => 180,
                'status' => 'scheduled',
            ],
            [
                'flight_number' => 'BA202',
                'departure_airport_id' => 2, // LHR
                'arrival_airport_id' => 3,   // CDG
                'departure_time' => Carbon::now()->addDays(3)->setTime(14, 15),
                'arrival_time' => Carbon::now()->addDays(3)->setTime(16, 30),
                'duration_minutes' => 75,
                'price' => 180.00,
                'airline' => 'British Airways',
                'total_seats' => 180,
                'available_seats' => 165,
                'status' => 'scheduled',
            ],
            [
                'flight_number' => 'JL303',
                'departure_airport_id' => 4, // HND
                'arrival_airport_id' => 7,   // SYD
                'departure_time' => Carbon::now()->addDays(7)->setTime(16, 45),
                'arrival_time' => Carbon::now()->addDays(8)->setTime(8, 30),
                'duration_minutes' => 525,
                'price' => 1200.00,
                'airline' => 'Japan Airlines',
                'total_seats' => 300,
                'available_seats' => 285,
                'status' => 'scheduled',
            ],
            [
                'flight_number' => 'EK404',
                'departure_airport_id' => 5, // DXB
                'arrival_airport_id' => 6,   // SIN
                'departure_time' => Carbon::now()->addDays(4)->setTime(22, 30),
                'arrival_time' => Carbon::now()->addDays(5)->setTime(7, 45),
                'duration_minutes' => 375,
                'price' => 450.00,
                'airline' => 'Emirates',
                'total_seats' => 250,
                'available_seats' => 230,
                'status' => 'scheduled',
            ],
            [
                'flight_number' => 'UA505',
                'departure_airport_id' => 1, // JFK
                'arrival_airport_id' => 10,  // PEK
                'departure_time' => Carbon::now()->addDays(6)->setTime(13, 20),
                'arrival_time' => Carbon::now()->addDays(7)->setTime(16, 10),
                'duration_minutes' => 770,
                'price' => 850.00,
                'airline' => 'United Airlines',
                'total_seats' => 280,
                'available_seats' => 260,
                'status' => 'scheduled',
            ],
            [
                'flight_number' => 'AF606',
                'departure_airport_id' => 3, // CDG
                'arrival_airport_id' => 9,   // AMS
                'departure_time' => Carbon::now()->addDays(2)->setTime(9, 45),
                'arrival_time' => Carbon::now()->addDays(2)->setTime(11, 20),
                'duration_minutes' => 95,
                'price' => 120.00,
                'airline' => 'Air France',
                'total_seats' => 150,
                'available_seats' => 140,
                'status' => 'scheduled',
            ],
            [
                'flight_number' => 'DL707',
                'departure_airport_id' => 1, // JFK
                'arrival_airport_id' => 4,   // HND
                'departure_time' => Carbon::now()->addDays(8)->setTime(15, 30),
                'arrival_time' => Carbon::now()->addDays(9)->setTime(18, 45),
                'duration_minutes' => 855,
                'price' => 950.00,
                'airline' => 'Delta Airlines',
                'total_seats' => 220,
                'available_seats' => 200,
                'status' => 'scheduled',
            ],
            [
                'flight_number' => 'SQ808',
                'departure_airport_id' => 6, // SIN
                'arrival_airport_id' => 7,   // SYD
                'departure_time' => Carbon::now()->addDays(9)->setTime(20, 15),
                'arrival_time' => Carbon::now()->addDays(10)->setTime(6, 30),
                'duration_minutes' => 495,
                'price' => 580.00,
                'airline' => 'Singapore Airlines',
                'total_seats' => 240,
                'available_seats' => 225,
                'status' => 'scheduled',
            ],
        ];

        foreach ($flights as $flight) {
            Flight::create($flight);
        }
    }
}
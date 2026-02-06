<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\Flight;
use App\Models\Passenger;
use App\Models\Booking;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FlightBookingController extends Controller
{
    public function index()
    {
        return view('flight-booking.index');
    }

    // Display the flight search form
    public function searchFlights()
    {
        $airports = Airport::all();
        return view('flight-booking.search', compact('airports'));
    }

    // Search for available flights
    public function findFlights(Request $request)
    {
        $request->validate([
            'from_airport' => 'required|exists:airports,id',
            'to_airport' => 'required|exists:airports,id',
            'departure_date' => 'required|date',
            'trip_type' => 'required|in:one-way,round-trip',
            'passengers' => 'required|integer|min:1|max:10',
        ]);

        $flights = Flight::where('departure_airport_id', $request->from_airport)
            ->where('arrival_airport_id', $request->to_airport)
            ->whereDate('departure_time', $request->departure_date)
            ->where('available_seats', '>=', $request->passengers)
            ->where('status', 'scheduled')
            ->with(['departureAirport', 'arrivalAirport'])
            ->get();

        $returnFlights = collect();
        if ($request->trip_type === 'round-trip' && $request->return_date) {
            $returnFlights = Flight::where('departure_airport_id', $request->to_airport)
                ->where('arrival_airport_id', $request->from_airport)
                ->whereDate('departure_time', $request->return_date)
                ->where('available_seats', '>=', $request->passengers)
                ->where('status', 'scheduled')
                ->with(['departureAirport', 'arrivalAirport'])
                ->get();
        }

        return view('flight-booking.results', compact('flights', 'returnFlights', 'request'));
    }

    // Display passenger information form
    public function showPassengerForm($flightId, $passengers = 1)
    {
        $flight = Flight::with(['departureAirport', 'arrivalAirport'])->findOrFail($flightId);
        return view('flight-booking.passenger-info', compact('flight', 'passengers'));
    }

    // Process booking
    public function processBooking(Request $request)
    {
        $request->validate([
            'flight_id' => 'required|exists:flights,id',
            'passengers' => 'required|integer|min:1|max:10',
            'passenger_data' => 'required|array',
            'passenger_data.*.first_name' => 'required|string|max:255',
            'passenger_data.*.last_name' => 'required|string|max:255',
            'passenger_data.*.email' => 'required|email|max:255',
            'passenger_data.*.phone' => 'nullable|string|max:20',
            'passenger_data.*.date_of_birth' => 'required|date',
            'passenger_data.*.gender' => 'required|in:male,female,other',
        ]);

        DB::beginTransaction();

        try {
            $flight = Flight::findOrFail($request->flight_id);

            // Create passengers and booking
            $bookingReference = strtoupper(Str::random(10));
            $totalAmount = $flight->price * count($request->passenger_data);

            foreach ($request->passenger_data as $passengerData) {
                // Check if passenger already exists
                $passenger = Passenger::updateOrCreate(
                    ['email' => $passengerData['email']],
                    [
                        'first_name' => $passengerData['first_name'],
                        'last_name' => $passengerData['last_name'],
                        'phone' => $passengerData['phone'] ?? null,
                        'date_of_birth' => $passengerData['date_of_birth'],
                        'gender' => $passengerData['gender'],
                    ]
                );

                // Create booking
                $booking = Booking::create([
                    'booking_reference' => $bookingReference,
                    'passenger_id' => $passenger->id,
                    'flight_id' => $flight->id,
                    'seat_number' => rand(1, $flight->total_seats), // Simplified seat assignment
                    'total_amount' => $flight->price,
                    'booking_date' => now(),
                ]);

                // Create ticket
                $ticketNumber = 'TKT-' . strtoupper(Str::random(8));
                Ticket::create([
                    'ticket_number' => $ticketNumber,
                    'booking_id' => $booking->id,
                    'passenger_id' => $passenger->id,
                    'flight_id' => $flight->id,
                    'seat_class' => 'economy',
                    'seat_number' => rand(1, $flight->total_seats), // Simplified seat assignment
                    'price' => $flight->price,
                    'issue_date' => now(),
                ]);
            }

            // Update available seats
            $flight->decrement('available_seats', count($request->passenger_data));

            DB::commit();

            return redirect()->route('booking.confirmation', ['reference' => $bookingReference])
                             ->with('success', 'Booking completed successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Booking failed: ' . $e->getMessage());
        }
    }

    // Show booking confirmation
    public function showConfirmation($reference)
    {
        $bookings = Booking::where('booking_reference', $reference)
                           ->with(['passenger', 'flight.departureAirport', 'flight.arrivalAirport'])
                           ->get();

        if ($bookings->isEmpty()) {
            abort(404, 'Booking not found');
        }

        return view('flight-booking.confirmation', compact('bookings'));
    }

    // Show all bookings for a passenger
    public function showMyBookings()
    {
        // For demo purposes, showing all bookings
        $bookings = Booking::with(['passenger', 'flight.departureAirport', 'flight.arrivalAirport'])
                          ->latest()
                          ->paginate(10);

        return view('flight-booking.my-bookings', compact('bookings'));
    }

    // Show airport management page
    public function showAirports()
    {
        $airports = Airport::all();
        return view('admin.airports', compact('airports'));
    }

    // Show flight management page
    public function showFlights()
    {
        $flights = Flight::with(['departureAirport', 'arrivalAirport'])->get();
        return view('admin.flights', compact('flights'));
    }
}

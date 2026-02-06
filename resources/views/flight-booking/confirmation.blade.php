@extends('flight-booking.layout')

@section('title', 'Booking Confirmation')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0"><i class="fas fa-check-circle me-2"></i>Booking Confirmed!</h4>
            </div>
            <div class="card-body">
                <div class="alert alert-success">
                    <h5><i class="fas fa-check me-2"></i>Booking Successful</h5>
                    <p>Your booking has been confirmed. Here are your booking details:</p>
                </div>

                @foreach($bookings as $booking)
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="mb-0">Booking Reference: {{ $booking->booking_reference }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Passenger Information</h6>
                                    <p><strong>Name:</strong> {{ $booking->passenger->first_name }} {{ $booking->passenger->last_name }}</p>
                                    <p><strong>Email:</strong> {{ $booking->passenger->email }}</p>
                                    <p><strong>Phone:</strong> {{ $booking->passenger->phone ?? 'Not provided' }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h6>Flight Information</h6>
                                    <p><strong>Flight:</strong> {{ $booking->flight->flight_number }} ({{ $booking->flight->airline }})</p>
                                    <p><strong>From:</strong> {{ $booking->flight->departureAirport->city }} ({{ $booking->flight->departureAirport->code }})</p>
                                    <p><strong>To:</strong> {{ $booking->flight->arrivalAirport->city }} ({{ $booking->flight->arrivalAirport->code }})</p>
                                    <p><strong>Departure:</strong> {{ \Carbon\Carbon::parse($booking->flight->departure_time)->format('M d, Y H:i') }}</p>
                                    <p><strong>Arrival:</strong> {{ \Carbon\Carbon::parse($booking->flight->arrival_time)->format('M d, Y H:i') }}</p>
                                    <p><strong>Seat Number:</strong> {{ $booking->seat_number }}</p>
                                    <p><strong>Total Amount:</strong> ${{ number_format($booking->total_amount, 2) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="d-flex justify-content-between">
                    <a href="{{ route('my.bookings') }}" class="btn btn-primary">
                        <i class="fas fa-ticket-alt me-2"></i>View My Bookings
                    </a>
                    <a href="{{ route('home') }}" class="btn btn-secondary">
                        <i class="fas fa-home me-2"></i>Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
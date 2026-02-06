@extends('flight-booking.layout')

@section('title', 'My Bookings')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0"><i class="fas fa-ticket-alt me-2"></i>My Bookings</h4>
            </div>
            <div class="card-body">
                @if($bookings->count() > 0)
                    @foreach($bookings as $booking)
                        <div class="card mb-3 booking-card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <h5>{{ $booking->booking_reference }}</h5>
                                        <p class="text-muted mb-0">{{ \Carbon\Carbon::parse($booking->booking_date)->format('M d, Y') }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h6>{{ $booking->passenger->first_name }} {{ $booking->passenger->last_name }}</h6>
                                        <p class="text-muted mb-0">{{ $booking->passenger->email }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="mb-0"><strong>{{ $booking->flight->flight_number }}</strong> ({{ $booking->flight->airline }})</p>
                                        <p class="mb-0">{{ $booking->flight->departureAirport->code }} → {{ $booking->flight->arrivalAirport->code }}</p>
                                        <p class="text-muted mb-0">{{ \Carbon\Carbon::parse($booking->flight->departure_time)->format('M d, Y H:i') }}</p>
                                    </div>
                                    <div class="col-md-2">
                                        <span class="badge bg-{{ $booking->booking_status === 'confirmed' ? 'success' : 'warning' }}">
                                            {{ ucfirst($booking->booking_status) }}
                                        </span>
                                        <p class="mb-0">${{ number_format($booking->total_amount, 2) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                    <div class="d-flex justify-content-center">
                        {{ $bookings->links() }}
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-ticket-alt fa-5x text-muted mb-3"></i>
                        <h5 class="text-muted">No bookings found</h5>
                        <p class="text-muted">You haven't made any bookings yet.</p>
                        <a href="{{ route('search.flights') }}" class="btn btn-primary">
                            <i class="fas fa-search me-2"></i>Search Flights
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
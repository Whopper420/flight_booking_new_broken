@extends('flight-booking.layout')

@section('title', 'Available Flights')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0"><i class="fas fa-plane me-2"></i>Available Flights</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <h5>From: {{ $flights->first()->departureAirport->city ?? 'N/A' }} ({{ $flights->first()->departureAirport->code ?? 'N/A' }}) 
                        to {{ $flights->first()->arrivalAirport->city ?? 'N/A' }} ({{ $flights->first()->arrivalAirport->code ?? 'N/A' }})</h5>
                    <p>Departure Date: {{ $request->departure_date }}</p>
                </div>

                @if($flights->count() > 0)
                    <div class="row">
                        @foreach($flights as $flight)
                            <div class="col-md-12 mb-3">
                                <div class="card flight-card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-md-3">
                                                <h5>{{ $flight->flight_number }}</h5>
                                                <p class="text-muted">{{ $flight->airline }}</p>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="text-center">
                                                    <h6>{{ \Carbon\Carbon::parse($flight->departure_time)->format('H:i') }}</h6>
                                                    <small>{{ $flight->departureAirport->code }}</small>
                                                </div>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <i class="fas fa-plane fa-2x text-primary"></i>
                                                <div class="mt-1">
                                                    <small>{{ \Carbon\Carbon::parse($flight->departure_time)->diffInHours(\Carbon\Carbon::parse($flight->arrival_time)) }}h {{ $flight->duration_minutes % 60 }}m</small>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="text-center">
                                                    <h6>{{ \Carbon\Carbon::parse($flight->arrival_time)->format('H:i') }}</h6>
                                                    <small>{{ $flight->arrivalAirport->code }}</small>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <h5>${{ number_format($flight->price, 2) }}</h5>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="{{ route('passenger.info', ['flightId' => $flight->id, 'passengers' => $request->passengers]) }}" 
                                                   class="btn btn-primary btn-sm">
                                                    <i class="fas fa-plus me-1"></i>Select
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>No flights found for your search criteria.
                    </div>
                @endif

                @if($request->trip_type === 'round-trip' && $returnFlights->count() > 0)
                    <hr>
                    <h5>Return Flights</h5>
                    <div class="row">
                        @foreach($returnFlights as $flight)
                            <div class="col-md-12 mb-3">
                                <div class="card flight-card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-md-3">
                                                <h5>{{ $flight->flight_number }}</h5>
                                                <p class="text-muted">{{ $flight->airline }}</p>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="text-center">
                                                    <h6>{{ \Carbon\Carbon::parse($flight->departure_time)->format('H:i') }}</h6>
                                                    <small>{{ $flight->departureAirport->code }}</small>
                                                </div>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <i class="fas fa-plane fa-2x text-primary"></i>
                                                <div class="mt-1">
                                                    <small>{{ \Carbon\Carbon::parse($flight->departure_time)->diffInHours(\Carbon\Carbon::parse($flight->arrival_time)) }}h {{ $flight->duration_minutes % 60 }}m</small>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="text-center">
                                                    <h6>{{ \Carbon\Carbon::parse($flight->arrival_time)->format('H:i') }}</h6>
                                                    <small>{{ $flight->arrivalAirport->code }}</small>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <h5>${{ number_format($flight->price, 2) }}</h5>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="{{ route('passenger.info', ['flightId' => $flight->id, 'passengers' => $request->passengers]) }}" 
                                                   class="btn btn-primary btn-sm">
                                                    <i class="fas fa-plus me-1"></i>Select
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @elseif($request->trip_type === 'round-trip')
                    <hr>
                    <h5>Return Flights</h5>
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>No return flights found for your search criteria.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
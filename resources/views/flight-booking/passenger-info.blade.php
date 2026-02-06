@extends('flight-booking.layout')

@section('title', 'Passenger Information')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0"><i class="fas fa-user me-2"></i>Passenger Information</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <h5>Flight: {{ $flight->flight_number }}</h5>
                    <p>{{ $flight->departureAirport->city }} ({{ $flight->departureAirport->code }}) to {{ $flight->arrivalAirport->city }} ({{ $flight->arrivalAirport->code }})</p>
                    <p>Departure: {{ \Carbon\Carbon::parse($flight->departure_time)->format('M d, Y H:i') }}</p>
                    <p>Price: ${{ number_format($flight->price, 2) }} per passenger</p>
                </div>

                <form action="{{ route('process.booking') }}" method="POST">
                    @csrf
                    <input type="hidden" name="flight_id" value="{{ $flight->id }}">
                    <input type="hidden" name="passengers" value="{{ $passengers }}">

                    @for($i = 0; $i < $passengers; $i++)
                        <div class="card mb-3 passenger-card">
                            <div class="card-header">
                                <h5 class="mb-0">Passenger {{ $i + 1 }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="passenger_data[{{ $i }}][first_name]" class="form-label">First Name *</label>
                                        <input type="text" name="passenger_data[{{ $i }}][first_name]" id="passenger_data[{{ $i }}][first_name]" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="passenger_data[{{ $i }}][last_name]" class="form-label">Last Name *</label>
                                        <input type="text" name="passenger_data[{{ $i }}][last_name]" id="passenger_data[{{ $i }}][last_name]" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="passenger_data[{{ $i }}][email]" class="form-label">Email *</label>
                                        <input type="email" name="passenger_data[{{ $i }}][email]" id="passenger_data[{{ $i }}][email]" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="passenger_data[{{ $i }}][phone]" class="form-label">Phone</label>
                                        <input type="tel" name="passenger_data[{{ $i }}][phone]" id="passenger_data[{{ $i }}][phone]" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="passenger_data[{{ $i }}][date_of_birth]" class="form-label">Date of Birth *</label>
                                        <input type="date" name="passenger_data[{{ $i }}][date_of_birth]" id="passenger_data[{{ $i }}][date_of_birth]" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="passenger_data[{{ $i }}][gender]" class="form-label">Gender *</label>
                                        <select name="passenger_data[{{ $i }}][gender]" id="passenger_data[{{ $i }}][gender]" class="form-select" required>
                                            <option value="">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor

                    <div class="d-grid">
                        <button type="submit" class="btn btn-success btn-lg">
                            <i class="fas fa-check-circle me-2"></i>Complete Booking - Total: ${{ number_format($flight->price * $passengers, 2) }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
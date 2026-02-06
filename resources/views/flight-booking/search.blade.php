@extends('flight-booking.layout')

@section('title', 'Search Flights')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0"><i class="fas fa-search me-2"></i>Search Flights</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('find.flights') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="trip_type" class="form-label">Trip Type</label>
                            <select name="trip_type" id="trip_type" class="form-select" required>
                                <option value="one-way">One Way</option>
                                <option value="round-trip">Round Trip</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="passengers" class="form-label">Passengers</label>
                            <select name="passengers" id="passengers" class="form-select" required>
                                <option value="1">1 Passenger</option>
                                <option value="2">2 Passengers</option>
                                <option value="3">3 Passengers</option>
                                <option value="4">4 Passengers</option>
                                <option value="5">5 Passengers</option>
                                <option value="6">6 Passengers</option>
                                <option value="7">7 Passengers</option>
                                <option value="8">8 Passengers</option>
                                <option value="9">9 Passengers</option>
                                <option value="10">10 Passengers</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="from_airport" class="form-label">From</label>
                            <select name="from_airport" id="from_airport" class="form-select" required>
                                <option value="">Select Departure Airport</option>
                                @foreach($airports as $airport)
                                    <option value="{{ $airport->id }}">{{ $airport->code }} - {{ $airport->name }}, {{ $airport->city }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="to_airport" class="form-label">To</label>
                            <select name="to_airport" id="to_airport" class="form-select" required>
                                <option value="">Select Destination Airport</option>
                                @foreach($airports as $airport)
                                    <option value="{{ $airport->id }}">{{ $airport->code }} - {{ $airport->name }}, {{ $airport->city }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="departure_date" class="form-label">Departure Date</label>
                            <input type="date" name="departure_date" id="departure_date" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3" id="return_date_container" style="display: none;">
                            <label for="return_date" class="form-label">Return Date</label>
                            <input type="date" name="return_date" id="return_date" class="form-control">
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-search me-2"></i>Search Flights
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tripTypeSelect = document.getElementById('trip_type');
    const returnDateContainer = document.getElementById('return_date_container');
    
    tripTypeSelect.addEventListener('change', function() {
        if (this.value === 'round-trip') {
            returnDateContainer.style.display = 'block';
        } else {
            returnDateContainer.style.display = 'none';
        }
    });
    
    // Set minimum date to today
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('departure_date').min = today;
    document.getElementById('return_date').min = today;
    
    // Set return date to be after departure date when departure date changes
    document.getElementById('departure_date').addEventListener('change', function() {
        document.getElementById('return_date').min = this.value;
    });
});
</script>
@endsection
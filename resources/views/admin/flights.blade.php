@extends('flight-booking.layout')

@section('title', 'Flights Management')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="fas fa-plane me-2"></i>Flights</h4>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFlightModal">
                    <i class="fas fa-plus me-2"></i>Add Flight
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Flight Number</th>
                                <th>Route</th>
                                <th>Departure</th>
                                <th>Arrival</th>
                                <th>Duration</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Seats</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($flights as $flight)
                                <tr>
                                    <td>{{ $flight->flight_number }}</td>
                                    <td>
                                        {{ $flight->departureAirport->city }} ({{ $flight->departureAirport->code }}) → 
                                        {{ $flight->arrivalAirport->city }} ({{ $flight->arrivalAirport->code }})
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($flight->departure_time)->format('M d, Y H:i') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($flight->arrival_time)->format('M d, Y H:i') }}</td>
                                    <td>{{ $flight->duration_minutes }} min</td>
                                    <td>${{ number_format($flight->price, 2) }}</td>
                                    <td>
                                        <span class="badge bg-{{ $flight->status === 'scheduled' ? 'primary' : ($flight->status === 'delayed' ? 'warning' : ($flight->status === 'cancelled' ? 'danger' : 'secondary')) }}">
                                            {{ ucfirst($flight->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $flight->available_seats }}/{{ $flight->total_seats }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editFlightModal{{ $flight->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteFlightModal{{ $flight->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                
                                <!-- Edit Flight Modal -->
                                <div class="modal fade" id="editFlightModal{{ $flight->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Flight</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="#" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="edit_flight_number_{{ $flight->id }}" class="form-label">Flight Number</label>
                                                            <input type="text" class="form-control" id="edit_flight_number_{{ $flight->id }}" value="{{ $flight->flight_number }}">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="edit_airline_{{ $flight->id }}" class="form-label">Airline</label>
                                                            <input type="text" class="form-control" id="edit_airline_{{ $flight->id }}" value="{{ $flight->airline }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="edit_departure_airport_{{ $flight->id }}" class="form-label">Departure Airport</label>
                                                            <select class="form-select" id="edit_departure_airport_{{ $flight->id }}">
                                                                <option value="">Select Airport</option>
                                                                <!-- Options would be populated dynamically -->
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="edit_arrival_airport_{{ $flight->id }}" class="form-label">Arrival Airport</label>
                                                            <select class="form-select" id="edit_arrival_airport_{{ $flight->id }}">
                                                                <option value="">Select Airport</option>
                                                                <!-- Options would be populated dynamically -->
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="edit_departure_time_{{ $flight->id }}" class="form-label">Departure Time</label>
                                                            <input type="datetime-local" class="form-control" id="edit_departure_time_{{ $flight->id }}" value="{{ \Carbon\Carbon::parse($flight->departure_time)->format('Y-m-d\TH:i') }}">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="edit_arrival_time_{{ $flight->id }}" class="form-label">Arrival Time</label>
                                                            <input type="datetime-local" class="form-control" id="edit_arrival_time_{{ $flight->id }}" value="{{ \Carbon\Carbon::parse($flight->arrival_time)->format('Y-m-d\TH:i') }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 mb-3">
                                                            <label for="edit_duration_{{ $flight->id }}" class="form-label">Duration (minutes)</label>
                                                            <input type="number" class="form-control" id="edit_duration_{{ $flight->id }}" value="{{ $flight->duration_minutes }}">
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label for="edit_price_{{ $flight->id }}" class="form-label">Price</label>
                                                            <input type="number" class="form-control" id="edit_price_{{ $flight->id }}" value="{{ $flight->price }}" step="0.01">
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label for="edit_status_{{ $flight->id }}" class="form-label">Status</label>
                                                            <select class="form-select" id="edit_status_{{ $flight->id }}">
                                                                <option value="scheduled" {{ $flight->status === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                                                                <option value="delayed" {{ $flight->status === 'delayed' ? 'selected' : '' }}>Delayed</option>
                                                                <option value="cancelled" {{ $flight->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                                <option value="departed" {{ $flight->status === 'departed' ? 'selected' : '' }}>Departed</option>
                                                                <option value="arrived" {{ $flight->status === 'arrived' ? 'selected' : '' }}>Arrived</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="edit_total_seats_{{ $flight->id }}" class="form-label">Total Seats</label>
                                                            <input type="number" class="form-control" id="edit_total_seats_{{ $flight->id }}" value="{{ $flight->total_seats }}">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="edit_available_seats_{{ $flight->id }}" class="form-label">Available Seats</label>
                                                            <input type="number" class="form-control" id="edit_available_seats_{{ $flight->id }}" value="{{ $flight->available_seats }}">
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Update Flight</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Delete Flight Modal -->
                                <div class="modal fade" id="deleteFlightModal{{ $flight->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Flight</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete flight "{{ $flight->flight_number }}"?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <form action="#" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">No flights found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Flight Modal -->
<div class="modal fade" id="addFlightModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Flight</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="flight_number" class="form-label">Flight Number</label>
                            <input type="text" class="form-control" id="flight_number" name="flight_number" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="airline" class="form-label">Airline</label>
                            <input type="text" class="form-control" id="airline" name="airline" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="departure_airport" class="form-label">Departure Airport</label>
                            <select class="form-select" id="departure_airport" name="departure_airport" required>
                                <option value="">Select Airport</option>
                                <!-- Options would be populated dynamically -->
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="arrival_airport" class="form-label">Arrival Airport</label>
                            <select class="form-select" id="arrival_airport" name="arrival_airport" required>
                                <option value="">Select Airport</option>
                                <!-- Options would be populated dynamically -->
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="departure_time" class="form-label">Departure Time</label>
                            <input type="datetime-local" class="form-control" id="departure_time" name="departure_time" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="arrival_time" class="form-label">Arrival Time</label>
                            <input type="datetime-local" class="form-control" id="arrival_time" name="arrival_time" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="duration" class="form-label">Duration (minutes)</label>
                            <input type="number" class="form-control" id="duration" name="duration" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="scheduled">Scheduled</option>
                                <option value="delayed">Delayed</option>
                                <option value="cancelled">Cancelled</option>
                                <option value="departed">Departed</option>
                                <option value="arrived">Arrived</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="total_seats" class="form-label">Total Seats</label>
                            <input type="number" class="form-control" id="total_seats" name="total_seats" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="available_seats" class="form-label">Available Seats</label>
                            <input type="number" class="form-control" id="available_seats" name="available_seats" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Flight</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
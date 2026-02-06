@extends('flight-booking.layout')

@section('title', 'Airports Management')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="fas fa-building me-2"></i>Airports</h4>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAirportModal">
                    <i class="fas fa-plus me-2"></i>Add Airport
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Name</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>Coordinates</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($airports as $airport)
                                <tr>
                                    <td>{{ $airport->code }}</td>
                                    <td>{{ $airport->name }}</td>
                                    <td>{{ $airport->city }}</td>
                                    <td>{{ $airport->country }}</td>
                                    <td>{{ $airport->latitude ? $airport->latitude.','.$airport->longitude : 'N/A' }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editAirportModal{{ $airport->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteAirportModal{{ $airport->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                
                                <!-- Edit Airport Modal -->
                                <div class="modal fade" id="editAirportModal{{ $airport->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Airport</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="#" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="edit_code_{{ $airport->id }}" class="form-label">Code</label>
                                                        <input type="text" class="form-control" id="edit_code_{{ $airport->id }}" value="{{ $airport->code }}" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_name_{{ $airport->id }}" class="form-label">Name</label>
                                                        <input type="text" class="form-control" id="edit_name_{{ $airport->id }}" value="{{ $airport->name }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_city_{{ $airport->id }}" class="form-label">City</label>
                                                        <input type="text" class="form-control" id="edit_city_{{ $airport->id }}" value="{{ $airport->city }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_country_{{ $airport->id }}" class="form-label">Country</label>
                                                        <input type="text" class="form-control" id="edit_country_{{ $airport->id }}" value="{{ $airport->country }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_latitude_{{ $airport->id }}" class="form-label">Latitude</label>
                                                        <input type="text" class="form-control" id="edit_latitude_{{ $airport->id }}" value="{{ $airport->latitude }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_longitude_{{ $airport->id }}" class="form-label">Longitude</label>
                                                        <input type="text" class="form-control" id="edit_longitude_{{ $airport->id }}" value="{{ $airport->longitude }}">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Update Airport</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Delete Airport Modal -->
                                <div class="modal fade" id="deleteAirportModal{{ $airport->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Airport</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete the airport "{{ $airport->name }}"?</p>
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
                                    <td colspan="6" class="text-center">No airports found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Airport Modal -->
<div class="modal fade" id="addAirportModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Airport</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="code" class="form-label">Code</label>
                        <input type="text" class="form-control" id="code" name="code" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control" id="country" name="country" required>
                    </div>
                    <div class="mb-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" class="form-control" id="latitude" name="latitude">
                    </div>
                    <div class="mb-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" class="form-control" id="longitude" name="longitude">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Airport</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
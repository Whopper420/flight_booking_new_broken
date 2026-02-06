@extends('flight-booking.layout')

@section('title', 'Home')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">
                <h1 class="display-4">Welcome to Flight Booking System</h1>
                <p class="lead">Book your flights with ease and convenience. Find the best deals and manage your bookings all in one place.</p>
                <a href="{{ route('search.flights') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-search me-2"></i>Search Flights
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card h-100 flight-card">
            <div class="card-body text-center">
                <div class="icon mb-3">
                    <i class="fas fa-plane fa-3x text-primary"></i>
                </div>
                <h5 class="card-title">Search Flights</h5>
                <p class="card-text">Find the best flights for your destination with our advanced search options.</p>
                <a href="{{ route('search.flights') }}" class="btn btn-outline-primary">Search Now</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card h-100 booking-card">
            <div class="card-body text-center">
                <div class="icon mb-3">
                    <i class="fas fa-ticket-alt fa-3x text-warning"></i>
                </div>
                <h5 class="card-title">Manage Bookings</h5>
                <p class="card-text">View, modify, or cancel your existing bookings with ease.</p>
                <a href="{{ route('my.bookings') }}" class="btn btn-outline-warning">My Bookings</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card h-100 passenger-card">
            <div class="card-body text-center">
                <div class="icon mb-3">
                    <i class="fas fa-user-check fa-3x text-info"></i>
                </div>
                <h5 class="card-title">Passenger Info</h5>
                <p class="card-text">Update your passenger information and preferences.</p>
                <a href="#" class="btn btn-outline-info">Update Profile</a>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-globe-americas me-2"></i>Popular Destinations</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="text-center">
                            <i class="fas fa-city fa-2x text-primary"></i>
                            <h6>New York</h6>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="text-center">
                            <i class="fas fa-city fa-2x text-success"></i>
                            <h6>London</h6>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="text-center">
                            <i class="fas fa-city fa-2x text-danger"></i>
                            <h6>Tokyo</h6>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="text-center">
                            <i class="fas fa-city fa-2x text-warning"></i>
                            <h6>Dubai</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Flight Booking System')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-weight: bold;
        }
        body {
            background-color: #ff00ff !important; /* Magenta background */
            color: #ffff00 !important; /* Yellow text */
        }
        .card {
            background-color: #00ffff !important; /* Cyan card background */
            color: #ff00ff !important; /* Magenta text on cards */
            box-shadow: 0 0.125rem 0.25rem #ff00ff !important; /* Magenta shadow */
            border: 3px solid #ffff00 !important; /* Yellow border */
        }
        .bg-primary-custom {
            background: linear-gradient(135deg, #ff0000, #00ff00) !important; /* Red to green - worst combo */
        }
        .flight-card {
            border-left: 8px solid #ff1493 !important; /* Deep pink border */
        }
        .airport-card {
            border-left: 8px solid #00ff00 !important; /* Bright green border */
        }
        .booking-card {
            border-left: 8px solid #ff00ff !important; /* Magenta border */
        }
        .passenger-card {
            border-left: 8px solid #ffff00 !important; /* Yellow border */
        }
        .ticket-card {
            border-left: 8px solid #00ffff !important; /* Cyan border */
        }
        .table {
            background-color: #ff69b4 !important; /* Hot pink table background */
            color: #ffffff !important; /* White text on table */
        }
        .table th {
            background-color: #800080 !important; /* Purple header */
            color: #00ff00 !important; /* Green text in header */
        }
        .table td {
            background-color: #ffff00 !important; /* Yellow cell background */
            color: #ff0000 !important; /* Red text in cells */
        }
        .btn-primary {
            background-color: #ff4500 !important; /* Orange red button */
            border-color: #ff4500 !important; /* Orange red border */
            color: #ffffff !important; /* White text */
        }
        .btn-primary:hover {
            background-color: #ffd700 !important; /* Gold hover */
            border-color: #ffd700 !important; /* Gold border */
            color: #0000ff !important; /* Blue text on hover */
        }
        .form-control {
            background-color: #00ff00 !important; /* Bright green input background */
            color: #0000ff !important; /* Blue text in inputs */
            border: 2px solid #ff00ff !important; /* Magenta border */
        }
        .form-select {
            background-color: #ff1493 !important; /* Deep pink select background */
            color: #ffff00 !important; /* Yellow text in selects */
            border: 2px solid #00ffff !important; /* Cyan border */
        }
        .navbar {
            background-color: #0000ff !important; /* Blue navbar */
        }
        .modal-content {
            background: linear-gradient(45deg, #ff0000, #00ff00, #0000ff, #ffff00) !important; /* Rainbow modal */
            color: #ffffff !important; /* White text in modal */
        }
        h1, h2, h3, h4, h5, h6 {
            color: #ff00ff !important; /* Magenta headings */
            text-shadow: 2px 2px 4px #00ffff !important; /* Cyan text shadow */
        }
        a {
            color: #00ffff !important; /* Cyan links */
        }
        a:hover {
            color: #ff69b4 !important; /* Hot pink on hover */
        }
        .alert {
            background-color: #ffff00 !important; /* Yellow alerts */
            color: #ff0000 !important; /* Red text in alerts */
            border: 3px solid #ff00ff !important; /* Magenta border */
        }
        .badge {
            background-color: #ff4500 !important; /* Orange red badges */
            color: #ffff00 !important; /* Yellow text in badges */
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary-custom">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-plane-departure me-2"></i>Flight Booking System
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home me-1"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('search.flights') }}"><i class="fas fa-search me-1"></i>Search Flights</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('my.bookings') }}"><i class="fas fa-ticket-alt me-1"></i>My Bookings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.airports') }}"><i class="fas fa-building me-1"></i>Airports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.flights') }}"><i class="fas fa-plane me-1"></i>Flights</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-4">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-light mt-5 py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5><i class="fas fa-plane-departure me-2"></i>Flight Booking System</h5>
                    <p class="text-muted">Your trusted partner for flight bookings worldwide.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">&copy; 2026 Flight Booking System. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
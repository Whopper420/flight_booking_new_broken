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
        .card {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            border: 1px solid rgba(0, 0, 0, 0.125);
        }
        .bg-primary-custom {
            background: linear-gradient(135deg, #0066cc, #003d99);
        }
        .flight-card {
            border-left: 4px solid #007bff;
        }
        .airport-card {
            border-left: 4px solid #28a745;
        }
        .booking-card {
            border-left: 4px solid #ffc107;
        }
        .passenger-card {
            border-left: 4px solid #17a2b8;
        }
        .ticket-card {
            border-left: 4px solid #6f42c1;
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
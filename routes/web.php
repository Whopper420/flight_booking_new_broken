<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightBookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public routes
Route::get('/', [FlightBookingController::class, 'index'])->name('home');
Route::get('/search', [FlightBookingController::class, 'searchFlights'])->name('search.flights');
Route::post('/find-flights', [FlightBookingController::class, 'findFlights'])->name('find.flights');
Route::get('/passenger-info/{flightId}/{passengers?}', [FlightBookingController::class, 'showPassengerForm'])->name('passenger.info');
Route::post('/process-booking', [FlightBookingController::class, 'processBooking'])->name('process.booking');
Route::get('/confirmation/{reference}', [FlightBookingController::class, 'showConfirmation'])->name('booking.confirmation');
Route::get('/my-bookings', [FlightBookingController::class, 'showMyBookings'])->name('my.bookings');

// Admin routes
Route::get('/admin/airports', [FlightBookingController::class, 'showAirports'])->name('admin.airports');
Route::get('/admin/flights', [FlightBookingController::class, 'showFlights'])->name('admin.flights');

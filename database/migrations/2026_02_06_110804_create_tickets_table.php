<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_number', 20)->unique(); // Unique ticket number
            $table->foreignId('booking_id')->constrained('bookings');
            $table->foreignId('passenger_id')->constrained('passengers');
            $table->foreignId('flight_id')->constrained('flights');
            $table->string('seat_class')->default('economy'); // economy, business, first
            $table->string('seat_number');
            $table->decimal('price', 10, 2);
            $table->string('status')->default('issued'); // issued, used, cancelled
            $table->timestamp('issue_date');
            $table->timestamp('valid_until')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
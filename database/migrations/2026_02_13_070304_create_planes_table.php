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
        Schema::create('planes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('model');
            $table->string('manufacturer');
            $table->string('registration_number')->unique();
            $table->integer('total_seats')->default(0);
            $table->integer('economy_seats')->default(0);
            $table->integer('business_seats')->default(0);
            $table->integer('first_class_seats')->default(0);
            $table->integer('year_of_manufacture')->nullable();
            $table->string('status')->default('active'); // active, maintenance, retired
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planes');
    }
};

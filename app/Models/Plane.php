<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plane extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'model',
        'manufacturer',
        'registration_number',
        'total_seats',
        'economy_seats',
        'business_seats',
        'first_class_seats',
        'year_of_manufacture',
        'status',
    ];

    protected $casts = [
        'total_seats' => 'integer',
        'economy_seats' => 'integer',
        'business_seats' => 'integer',
        'first_class_seats' => 'integer',
        'year_of_manufacture' => 'integer',
    ];

    // Define relationships
    public function flights()
    {
        return $this->hasMany(Flight::class);
    }
}
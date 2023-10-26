<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Especifica o tipo de items como um array
    protected $casts = [
        'items' => 'array'
    ];

    // Especifica o tipo de dates como um date
    protected $dates = ['date'];
}

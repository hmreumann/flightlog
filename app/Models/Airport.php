<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;

    public function getStatusColorAttribute()
    {
        return [
            'Aeródromo' => 'indigo',
            'Helipuerto' => 'green',
        ][$this->status] ?? 'cool-gray';
    }

    public function departure_flights()
    {
        return $this->hasMany('App\Models\Flight','departure_airport_id');
    }

    public function arrival_flights()
    {
        return $this->hasMany('App\Models\Flight','arrival_airport_id');
    }
}

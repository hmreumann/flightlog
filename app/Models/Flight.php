<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('\App\Models\User');
    }

    public function aircraft(){
        return $this->belongsTo('App\Models\Aircraft');
    }
    
    public function departure_airport()
    {
        return $this->belongsTo('\App\Models\Airport','departure_airport_id');
    }
    
    public function arrival_airport()
    {
        return $this->belongsTo('\App\Models\Airport','arrival_airport_id');
    }

    public function purpose()
    {
        return $this->belongsTo('\App\Models\Purpose');
    }

    public function flightTimes()
    {
        return $this->hasMany('\App\Models\FlightTime');
    }
    
}

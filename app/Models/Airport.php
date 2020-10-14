<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;

    protected $fillable = [
        'local',
        'denominacion',
        'tipo',
        'coordenadas',
        'latitud',
        'longitud',
        'uom_elev',
    ];

    const TIPOS = [
        'Aeródromo' => 'Aeródromo',
        'Helipuerto' => 'Helipuerto',
    ];

    public function getStatusColorAttribute()
    {
        return [
            'Aeródromo' => 'indigo',
            'Helipuerto' => 'green',
        ][$this->tipo] ?? 'cool-gray';
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    public function user()
    {
        $this->belongsTo('\App\Models\User');
    }

    public function aircraft(){
        $this->belongsTo('App\Models\Aircraft');
    }
    
    public function departure_airport()
    {
        $this->belongsTo('\App\Models\Airport','departure_airport_id');
    }
    
    public function arrival_airport()
    {
        $this->belongsTo('\App\Models\Airport','arrival_airport_id');
    }

    public function purpose()
    {
        $this->belongsTo('\App\Models\Purpose');
    }
}

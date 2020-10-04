<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aircraft extends Model
{
    use HasFactory;

    public function flights()
    {
        return $this->hasMany('App\Models\Flight');
    }
    
}

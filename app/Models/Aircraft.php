<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aircraft extends Model
{
    use HasFactory;

    protected $fillable = [
        'manufacturer',
        'model',
        'type_designator',
        'description',
        'engine_type',
        'engine_count',
        'WTC',
        'registration',
    ];

    public function flights()
    {
        return $this->hasMany('App\Models\Flight');
    }
}

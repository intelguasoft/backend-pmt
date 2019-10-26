<?php

namespace Edgar\PMT\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['name', 'postal_code', 'cedula_code'];

    public function offending_vehicles()
    {
        return $this->hasMany(OffendingVehicle::class);
    }
}

<?php

namespace Edgar\PMT\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'state_id'];

    public function offending_vehicles()
    {
        return $this->hasMany(OffendingVehicle::class);
    }
}

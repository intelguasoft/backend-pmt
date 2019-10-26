<?php

namespace Edgar\PMT\Models;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $fillable = ['name', 'initials', 'description'];

    public function offending_vehicles()
    {
        return $this->hasMany(OffendingVehicle::class);
    }
}

<?php

namespace Edgar\PMT\Models;

use Illuminate\Database\Eloquent\Model;

class TypeVehicle extends Model
{
    protected $fillable = ['type', 'description'];

    public function offending_vehicles()
    {
        return $this->hasMany(OffendingVehicle::class);
    }

}

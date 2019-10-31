<?php

namespace Edgar\PMT\Models;

use Illuminate\Database\Eloquent\Model;

class TypeTollVehicle extends Model
{
    protected $fillable = ['type', 'type_vehicle_id', 'cost', 'description', 'prefix_car_plate'];

    public function tolls()
    {
        return $this->hasMany(Toll::class);
    }
    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getCarPlateAttribute($value)
    {
        return strtoupper($value);
    }
    public function setCarPlateAttribute($value)
    {
        $this->attributes['prefix_car_plate'] = strtoupper($value);
    }

    public function type_vehicle()
    {
        return $this->belongsTo(TypeVehicle::class);
    }
}

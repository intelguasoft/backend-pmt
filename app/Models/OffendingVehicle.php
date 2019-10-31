<?php

namespace Edgar\PMT\Models;

use Illuminate\Database\Eloquent\Model;

class OffendingVehicle extends Model
{
    protected $fillable = ['car_plate', 'nit', 'type_vehicle_id', 'mark_id', 'ballot_id', 'color_design'];

    public function ballot()
    {
        return $this->belongsTo(Ballot::class);
    }

    public function mark()
    {
        return $this->belongsTo(Mark::class);
    }

    public function type_vehicle()
    {
        return $this->belongsTo(TypeVehicle::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function setCarPlateAttribute($value)
    {
        $this->attributes['car_plate'] = strtoupper($value);
    }
    public function getCarPlateAttribute($value)
    {
        return strtoupper($value);
    }
}

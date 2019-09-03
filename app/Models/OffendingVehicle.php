<?php

namespace IntelGUA\PMT\Models;

use Illuminate\Database\Eloquent\Model;

class OffendingVehicle extends Model
{
    protected $fillable = ['car_plate', 'nit', 'type_vehicle_id', 'mark_id', 'ballot_id', 'color_design' ];

}

<?php

namespace IntelGUA\PMT\Models;

use Illuminate\Database\Eloquent\Model;

class TypeTollVehicle extends Model
{
    protected $fillable = ['type', 'cost', 'description', 'prefix_car_plate'];

}

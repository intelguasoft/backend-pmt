<?php

namespace Edgar\PMT\Models;

use Illuminate\Database\Eloquent\Model;

class Toll extends Model
{
    protected $fillable = ['date', 'time', 'user_id', 'type_toll_vehicle_id', 'car_plate'];

}

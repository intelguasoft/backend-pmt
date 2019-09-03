<?php

namespace IntelGUA\PMT\Models;

use Illuminate\Database\Eloquent\Model;

class Offender extends Model
{
    protected $fillable = ['first_name', 'last_name', 'driver_license', 'license_class', 'doc_no', 'home_address', 'state_id', 'city_id', 'ballot_id'];


}

<?php

namespace Edgar\PMT\Models;

use Illuminate\Database\Eloquent\Model;

class Offender extends Model
{
    protected $fillable = ['first_name', 'last_name', 'driver_license', 'license_class', 'dpi', 'home_address', 'state', 'city', 'ballot_id'];


    public function ballot()
    {
        return $this->belongsTo(Ballot::class);
    }
}

<?php

namespace Edgar\PMT\Models;

use Illuminate\Database\Eloquent\Model;

class Infringement extends Model
{
    protected $fillable = ['date', 'time', 'place', 'infringement_summary', 'law_basics', 'traffic_regulations', 'total', 'ballot_id'];

}

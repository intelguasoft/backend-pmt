<?php

namespace Edgar\PMT\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['name', 'postal_code', 'cedula_code'];
}

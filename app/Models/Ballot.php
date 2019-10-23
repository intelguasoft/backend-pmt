<?php

namespace Edgar\PMT\Models;

use Illuminate\Database\Eloquent\Model;

class Ballot extends Model
{
    protected $fillable = ['user_id', 'ballot_no', 'signed', 'is_voided'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

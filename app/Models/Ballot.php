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

    public function offender()
    {
        return $this->hasOne(Offender::class);
    }

    public function offending_vehicle()
    {
        return $this->hasOne(OffendingVehicle::class);
    }
    public function infringement()
    {
        return $this->hasOne(Infringement::class);
    }
    public function payment_ballot()
    {
        return $this->hasOne(PaymentBallot::class);
    }
}

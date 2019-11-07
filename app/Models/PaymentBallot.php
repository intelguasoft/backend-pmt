<?php

namespace Edgar\PMT\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentBallot extends Model
{
    protected $dates = ['date', 'create_at', 'update_at'];
    // public function getDateAttribute()
    // {
    //     // dd($this->attributesToArray());
    //     // return Carbon::parse($value)->format('d-m-Y H:i:s');
    //     return date('d/m/Y', strtotime($this->attributes['date']));
    // }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function ballot()
    {
        return $this->belongsTo(Ballot::class);
    }
}

<?php

namespace Edgar\PMT\Models;

use Illuminate\Database\Eloquent\Model;

class Toll extends Model
{
    protected $fillable = ['date', 'time', 'user_id', 'type_toll_vehicle_id', 'car_plate'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'date',
        'created_at',
        'updated_at'
    ];

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    // protected $dateFormat = 'y-m-d';

    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getCarPlateAttribute($value)
    {
        return strtoupper($value);
    }

    /**
     * Obtiene la fecha de cumpleaños de manera correcta en base a nuestro pais.
     *
     * @return string
     */
    // public function getDateAttribute()
    // {
    //     // dd($this->attributesToArray());
    //     // return Carbon::parse($value)->format('d-m-Y H:i:s');
    //     return date('d/m/Y', strtotime($this->attributes['date']));
    // }

    /**
     * Formatea la fecha de nacimiento para ser almacenada de manera correcta en la base de datos.
     *
     * @param  string  $value
     * @return void
     */
    // public function setDateAttribute($value)
    // {
    //     $date_parts = explode('-', $value);
    //     $this->attributes['date'] = $date_parts[2] . '-' . $date_parts[1] . '-' . $date_parts[0];
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function type_toll_vehicle()
    {
        return $this->belongsTo(TypeTollVehicle::class);
    }

    public function setCarPlateAttribute($value)
    {
        $this->attributes['car_plate'] = strtoupper($value);
    }
}

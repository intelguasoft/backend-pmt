<?php

namespace Edgar\PMT\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'user_id',
        'oficial_id',
        'date_birthday',
        'first_name',
        'last_name',
        'gender',
        'nit',
        'dpi',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    //     'created_at' => 'datetime',
    //     'updated_at' => 'datetime',
    //     'date_birthday' => 'date'
    // ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'date_birthday',
        'email_verified_at',
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
     * Devuelve el nombre completo del usuario en contexto.
     *
     * @param  string  $value
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ', ' . $this->last_name;
    }

    /**
     * Genera el hash para el password al ser almacenado en la base de datos.
     * @param  string  $value
     * @return string
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * Obtiene la fecha de cumpleaños de manera correcta en base a nuestro pais.
     *
     * @return string
     */
    public function getDateBirthdayAttribute()
    {
        // dd($this->attributesToArray());
        // return Carbon::parse($value)->format('d-m-Y H:i:s');
        return date('d/m/Y', strtotime($this->attributes['date_birthday']));
    }

    /**
     * Formatea la fecha de nacimiento para ser almacenada de manera correcta en la base de datos.
     *
     * @param  string  $value
     * @return void
     */
    public function setDateBirthdayAttribute($value)
    {
        $date_parts = explode('-', $value);
        $this->attributes['date_birthday'] = $date_parts[2] . '-' . $date_parts[1] . '-' . $date_parts[0];
    }

    /**
     * Obtiene el identificador que será almacenado en el claims contenido en el JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /**
     * Devuelve un array asociativo que contiene cualquier claims personalizado que se agregará al JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}

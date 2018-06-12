<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'first_name', 'last_name', 'is_host', 'date_of_birth', 'latitude', 'longitude'
    ];

    public $timestamps = false;
    protected $dates = ['date_of_birth'];

    public function reservations() {
        return $this->hasMany('App\Reservation');
    }

    public function reservation_id(){
        return $this->hasMany('App\Reservation')->select('id', 'created_at','updated_at');
    }

}
